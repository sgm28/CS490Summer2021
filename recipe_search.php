<!-- Put this before any PHP -->
<!DOCTYPE html>
<head>
  <title>Recipe Results</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="recipe_search.css" type="text/css" rel="stylesheet">
</head>
<?php
 session_start();
//Check if there is a user logged in
//Get user and profile data
if (isset($_SESSION["useruid"])){
	//echo "</p>Hello there " . $_SESSION["username"]. "</p>";
	// Variable to store username for recall
	$current_user = $_SESSION["username"];
	$user = new User();
	$user_data = $user->get_user($_SESSION["userid"]);

} else {
	header("Location: main.php");
	exit();
}
?>
<body>
<div id="nav-bar-main">
<div class="nav-bar-margin"></div>
  <div class="size-limiter">
  <form id="search-main-form" method="get" action="search.php">
    <input name="find"type="text" id="search-main" placeholder="Search users ..." spellcheck="false"/>
    <span class="material-icons">search</span>
   </form>
  </div>
    <div class="nav-bar-margin">
    <div class="pfp">
      <div class="profile-menu hidden">
        <div class="profile-menu-header">
					<?php echo $current_user; ?>
				</div>
        <div class="profile-menu-body">
          <div class="profile-menu-option-list">
						<a href="profile.php" class="profile-menu-option">Profile</a>
						<?php if(checkMainProfile()): ?>
						<a href="messages.php?id=<?php echo $user_data["usersId"]?>&read=1" class="profile-menu-option">Messages</a>
						<?php else: ?>
						<a href="messages.php?id=<?php echo $user_data["usersId"]?>&read=1" class="profile-menu-option">Message</a>
						<?php endif; ?>
            <a class="profile-menu-option">Option 3</a>
          </div>
          <div class="profile-menu-sidebar">
            <a href="logout.inc.php" class="log-out">
              <span class="material-icons">logout</span>
            </a>
          </div>
        </div>
      </div>
    </div >
  </div>
</div>
<div id="content-main">
  <form id="search-main-form" method="post" action="recipe_search.php">
    <input name="search"type="text" id="search-main" placeholder="Search recipes/ingredients ..." spellcheck="false"/>
    <span class="material-icons">search</span>
  </form>
  <div id="recipe-list">
    <!-- OUTPUT THE RECIPES HERE -->
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
curl_setopt($curl, CURLOPT_URL, 'https://api.spoonacular.com/recipes/complexSearch?query='. $query . '&addRecipeInformation=true'. '&apiKey=03cfb47edd6141b6b806837e1c114cfb');
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="recipe_search.js"></script>
</body>
