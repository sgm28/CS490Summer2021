





<!DOCTYPE html>
<html>
<head>


  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style type="text/css">
  
  :root {
  --size-limit: 1000px;
}
/*
::-webkit-scrollbar {
  width: 0px;
}
*/
body {
  position: relative;
  min-height: 100vh;
  width: 100vw;
  background-color: #fff;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' %3E%3Cdefs%3E%3ClinearGradient id='a' x1='0' x2='0' y1='0' y2='1' gradientTransform='rotate(0,0.5,0.5)'%3E%3Cstop offset='0' stop-color='%23e00e1f'/%3E%3Cstop offset='1' stop-color='%23750d42'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cpattern id='b' width='27' height='27' patternUnits='userSpaceOnUse'%3E%3Ccircle fill='%23ffffff' cx='13.5' cy='13.5' r='13.5'/%3E%3C/pattern%3E%3Crect width='100%25' height='100%25' fill='url(%23a)'/%3E%3Crect width='100%25' height='100%25' fill='url(%23b)' fill-opacity='0.11'/%3E%3C/svg%3E");
  background-attachment: fixed;
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow:  scroll;
}
* {
  box-sizing: border-box;
  border-style: none;
  margin: 0;
  padding: 0;
  font-family: roboto;
  font-size: 20px;
}
.no-select {
  user-select: none;
}
body > div {
  width: 100%;
}
#content-main {
  max-width: 1000px;
  min-height: 100vh;
  background: #fff;
  display: flex;
  flex-direction: column;
  overflow:  scroll;
}

#recipe-list {
  flex-grow: 1;
}

.recipe-header {
  width: 100%;
  height: 60px;
  display: flex;
  align-items: center;
  padding-left: 20px;
  box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}
.recipe-header:before {
  content: "▼";
  margin-right: 20px;
}
.recipe-header.active:before {
  content: "▲";
}
.recipe-body {
  position: relative;
  display: none;
  padding-left: 40px;
  padding-right: 20px;
  padding-bottom: 40px;
  box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
}

.recipe-body > div {
  width: 100%;
  margin-top: 40px;
}
.recipe-body > .ingredients,
.recipe-body > .equipment {
  display: inline-block;
  width: 40%;
  vertical-align: top;
}

.img-wrap {
  display: flex;
  justify-content: center;
}
.img-wrap > img {
  max-height: 400px;
  max-width: 400px;
}

</style>
<body>

<div id="content-main">
  <div id="recipe-list">

<?php 
//echo "1";
$query = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $query = test_input($_POST["search"]);

}
//echo "2";
// Preventing cross site scripting by cleaning up data.
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//echo "2.5";
// create & initialize a curl session
$curl = curl_init();
//echo "3";
// set our url with curl_setopt()
curl_setopt($curl, CURLOPT_URL, 'https://api.spoonacular.com/recipes/complexSearch?query='. $query . '&addRecipeInstructions=true' . '&addRecipeInformation=true'. '&apiKey=03cfb47edd6141b6b806837e1c114cfb');
//echo "4";
// return the transfer as a string, also with setopt()
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//echo "5";
// curl_exec() executes the started curl session
// $output contains the output string
$output = curl_exec($curl);
//echo "6";
// close curl resource to free up system resources
// (deletes the variable made by curl_init)
curl_close($curl);
//echo "7";


$array = json_decode($output, true);
//echo "8";
//Checking to see if there are results.
if(!isset($array))
{
  echo "No results found";
  exit();
}
//echo "9";
//echo $array['array'];


  //Variable to stored all the  ingredients per recipe 
  $allIngredientsOutput = "";
  //Variable to stored all the  equipment per recipe
  $allEquipmentOutput ="";
   //Variable to stored all the  instructions per recipe
  $allInstructionOutput ="";
  //Variable to stored the recipe summary
  $summaryPerRecipe = "";
  //Variable to stored the recipe image
  $imagePerRecipe = "";
  //Variable to stored the recipe title
  $titlePerRecipe = "";


  //Looping over each recipe
  for ($index = 0; $index < $array['number']; $index++) {

      //echo "<div class='recipe'>";
      //echo "<div class='recipe-header'>";
      $titlePerRecipe = $titlePerRecipe .  $array['results'][$index]['title'] . " " . $array['results'][$index]['readyInMinutes']  . " minutes";

   // echo "<div class='recipe-body'>";
   $imagePerRecipe =  $array['results'][$index]['image'];
    //echo "<div class='img-wrap'><img src=". $array['results'][$index]['image']   ."></div>";
   // echo  "<img src=". $array['results'][$index]['image'] . ">";
    //echo "<div class='description'>";
    $summaryPerRecipe = $summaryPerRecipe . 
     "<p>" . $array['results'][$index ]['summary'] . "</p>" .
     "Page source: ".  "<a href=" .  $array['results'][$index ]['sourceUrl'] . ">".  $array['results'][$index ]['sourceUrl'] . "</a>";
    //echo"</div>";
    

    //Looping over each instruction
	
    for ($instructionIndex = 0;  $instructionIndex < count($array['results'][$index]['analyzedInstructions']); $instructionIndex++)
    {
        
        //Looping over each step
        $isInstructionsPrintedOnce = false;
        for($stepsIndex = 0; $stepsIndex < count($array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps']); $stepsIndex++)
        {

           
           //Looping over each ingredient
           $isIngredientsPrintedOnce = false;
           for($ingredientsIndex = 0; $ingredientsIndex < count($array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['ingredients']); $ingredientsIndex++)

           {

              //Preventing the computer from printing more than one ingredients heading per recipe
              if(isset($array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['ingredients'][$ingredientsIndex]['name']) && $isIngredientsPrintedOnce == false)
              {

                    // echo "<h3>" . "Ingredients" . "</h3>";
                     $isIngredientsPrintedOnce = true;
                   


              }
              $allIngredientsOutput = $allIngredientsOutput . "<p>" . $array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['ingredients'][$ingredientsIndex]['name']  . "</p>" . "\n";
               // echo "<p>" . $array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['ingredients'][$ingredientsIndex]['name']  . "</p>";
               //  echo "\n";

          
         }
       
        
          //Looping over equipment
         $isEquipmentPrintedOnce = false;
         for( $equipmentIndex = 0; $equipmentIndex < count($array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['equipment']); $equipmentIndex++)
         {

           //Preventing the computer from printing more than one equipment heading per recipe
          if (isset($array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['equipment'][$equipmentIndex]['name']) && $isEquipmentPrintedOnce == false)
             {
               //echo "<h3>" . "Equipment" . "</h3>";
                $isEquipmentPrintedOnce = true;

                 $allEquipmentOutput = $allEquipmentOutput . 

                 "<p>" . $array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['equipment'][$equipmentIndex]['name']  . "</p>" ."\n";
             }

            



           //echo "\n"; 
         }
        //Preventing the computer from printing more than one instruction heading per recipe
         if (isset( $array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['step']) && $isInstructionsPrintedOnce == false)
         {
            //echo "<h3>" . "Instructions" . "</h3>";
            $isInstructionsPrintedOnce = true;
         }
          $allInstructionOutput = $allInstructionOutput . 
                      
                      "<p>" . $array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['number'] . ". " . $array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['step'] ."</p>";
           echo "\n"; 
        
        }

    }
	
    echo "\n";
  echo "<div class='recipe'>";
      echo "<div class='recipe-header'>";
          echo "<h2>";
              echo $titlePerRecipe;
          echo "</h2>";
      echo "</div>";

      echo "<div class='recipe-body'>";

        echo "<div class='img-wrap'>";

        echo "<img src=" . 
        $imagePerRecipe
         . ">";
        echo "</div>";
        
        echo "<div class='description'>";
        echo $summaryPerRecipe;
        echo "</div>"; 
          

        echo "<div class='ingredients'>";
        echo "<h3>Ingredients</h3>";
        echo $allIngredientsOutput;
        echo "</div>";

        echo "<div class='equipment'>";
        echo "<h3>Equipment</h3>";
        echo $allEquipmentOutput; 
        echo "</div>";

        echo "<div class='instructions'>";
        echo "<h3>Instructions</h3>";
        echo $allInstructionOutput;
        echo "</div>";
      echo "</div>";
  echo "</div>";
  
    $titlePerRecipe="";
    $imagePerRecipe="";
    $summaryPerRecipe="";
    $allIngredientsOutput="";
    $allEquipmentOutput="";
    $allInstructionOutput="";
}


?>
</div>
</div>
<script type="text/javascript">
  
  $('.recipe-header').click(function(){
  $(this).next().slideToggle();
  $(this).toggleClass('active');
});
</script>
</body>
</html>