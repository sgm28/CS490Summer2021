<?php

/*
  Sakar Michel
  CS 490 110
  Release candidate 
*/


$query = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $query = test_input($_POST["search"]);

}

// Preventing cross site scripting by cleaning up data.
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// create & initialize a curl session
$curl = curl_init();

// set our url with curl_setopt()
curl_setopt($curl, CURLOPT_URL, 'https://api.spoonacular.com/recipes/complexSearch?query='. $query . '&addRecipeInformation=true'. '&apiKey=03cfb47edd6141b6b806837e1c114cfb');

// return the transfer as a string, also with setopt()
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// curl_exec() executes the started curl session
// $output contains the output string
$output = curl_exec($curl);

// close curl resource to free up system resources
// (deletes the variable made by curl_init)
curl_close($curl);


//////////////////////////////////////////////////////////Testing purposes/////////////////////////////////////////////////////////////
// echo $output;

// $array = array (
//   'results' => 
//   array (
//     0 => 
//     array (
//       'vegetarian' => true,
//       'vegan' => false,
//       'glutenFree' => false,
//       'dairyFree' => true,
//       'veryHealthy' => false,
//       'cheap' => false,
//       'veryPopular' => false,
//       'sustainable' => false,
//       'weightWatcherSmartPoints' => 12,
//       'gaps' => 'no',
//       'lowFodmap' => false,
//       'aggregateLikes' => 4,
//       'spoonacularScore' => 81.0,
//       'healthScore' => 42.0,
//       'creditsText' => 'Foodista.com – The Cooking Encyclopedia Everyone Can Edit',
//       'license' => 'CC BY 3.0',
//       'sourceName' => 'Foodista',
//       'pricePerServing' => 137.24,
//       'id' => 642539,
//       'title' => 'Falafel Burger',
//       'readyInMinutes' => 45,
//       'servings' => 4,
//       'sourceUrl' => 'https://www.foodista.com/recipe/DYNQRHMK/falafel-burger',
//       'image' => 'https://spoonacular.com/recipeImages/642539-312x231.png',
//       'imageType' => 'png',
//       'summary' => 'You can never have too many middl eastern recipes, so give Falafel Burger a try. For $1.37 per serving, this recipe covers 19% of your daily requirements of vitamins and minerals. One portion of this dish contains around 12g of protein, 20g of fat, and a total of 402 calories. This recipe serves 4. It is brought to you by Foodista. 4 people were impressed by this recipe. Head to the store and pick up onion, garlic, sriracha sauce, and a few other things to make it today. Only a few people really liked this main course. From preparation to the plate, this recipe takes about about 45 minutes. It is a good option if you\'re following a dairy free and lacto ovo vegetarian diet. With a spoonacular score of 81%, this dish is spectacular. Try Clean eating falafel burger, Clean eating falafel burger, and Falafel Veggie Burger with Feta Yogurt Sauce for similar recipes.',
//       'cuisines' => 
//       array (
//         0 => 'Middle Eastern',
//       ),
//       'dishTypes' => 
//       array (
//         0 => 'lunch',
//         1 => 'main course',
//         2 => 'main dish',
//         3 => 'dinner',
//       ),
//       'diets' => 
//       array (
//         0 => 'dairy free',
//         1 => 'lacto ovo vegetarian',
//       ),
//       'occasions' => 
//       array (
//       ),
//       'analyzedInstructions' => 
//       array (
//         0 => 
//         array (
//           'name' => '',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Pat the chickpeas dry with a paper towel and throw them into a food processor along with the garlic.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 16057,
//                   'name' => 'chickpeas',
//                   'localizedName' => 'chickpeas',
//                   'image' => 'chickpeas.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11215,
//                   'name' => 'garlic',
//                   'localizedName' => 'garlic',
//                   'image' => 'garlic.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404771,
//                   'name' => 'food processor',
//                   'localizedName' => 'food processor',
//                   'image' => 'food-processor.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 405895,
//                   'name' => 'paper towels',
//                   'localizedName' => 'paper towels',
//                   'image' => 'paper-towels.jpg',
//                 ),
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Puree until smooth.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Using your clean hands incorporate tahini, sriracha, parsley and onion into the chickpea mixture.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 16057,
//                   'name' => 'chickpeas',
//                   'localizedName' => 'chickpeas',
//                   'image' => 'chickpeas.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1016168,
//                   'name' => 'sriracha',
//                   'localizedName' => 'sriracha',
//                   'image' => 'hot-sauce-or-tabasco.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 11297,
//                   'name' => 'parsley',
//                   'localizedName' => 'parsley',
//                   'image' => 'parsley.jpg',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 12698,
//                   'name' => 'tahini',
//                   'localizedName' => 'tahini',
//                   'image' => 'tahini-paste.png',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             3 => 
//             array (
//               'number' => 4,
//               'step' => 'Form mixture into four patties and set aside.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             4 => 
//             array (
//               'number' => 5,
//               'step' => 'Heat peanut oil in a large skillet over medium heat.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 4042,
//                   'name' => 'peanut oil',
//                   'localizedName' => 'peanut oil',
//                   'image' => 'peanut-oil.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//               ),
//             ),
//             5 => 
//             array (
//               'number' => 6,
//               'step' => 'Once the oil begins to shimmer add the patties and cook for three minutes per side or until golden brown.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 4582,
//                   'name' => 'cooking oil',
//                   'localizedName' => 'cooking oil',
//                   'image' => 'vegetable-oil.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//               'length' => 
//               array (
//                 'number' => 3,
//                 'unit' => 'minutes',
//               ),
//             ),
//             6 => 
//             array (
//               'number' => 7,
//               'step' => 'Remove from and place in a hamburger bun.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 18350,
//                   'name' => 'hamburger bun',
//                   'localizedName' => 'hamburger bun',
//                   'image' => 'hamburger-bun.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             7 => 
//             array (
//               'number' => 8,
//               'step' => 'Top each burger with 2 slices of tomato, 2 slices of cucumber and a dollop of tzatziki.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11206,
//                   'name' => 'cucumber',
//                   'localizedName' => 'cucumber',
//                   'image' => 'cucumber.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 93777,
//                   'name' => 'tzatziki',
//                   'localizedName' => 'tzatziki',
//                   'image' => 'raita-or-tzaziki.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 11529,
//                   'name' => 'tomato',
//                   'localizedName' => 'tomato',
//                   'image' => 'tomato.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             8 => 
//             array (
//               'number' => 9,
//               'step' => 'Serve immediately.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//           ),
//         ),
//       ),
//       'spoonacularSourceUrl' => 'https://spoonacular.com/falafel-burger-642539',
//     ),
//     1 => 
//     array (
//       'vegetarian' => false,
//       'vegan' => false,
//       'glutenFree' => false,
//       'dairyFree' => true,
//       'veryHealthy' => false,
//       'cheap' => false,
//       'veryPopular' => false,
//       'sustainable' => false,
//       'weightWatcherSmartPoints' => 31,
//       'gaps' => 'no',
//       'lowFodmap' => false,
//       'aggregateLikes' => 1,
//       'spoonacularScore' => 79.0,
//       'healthScore' => 45.0,
//       'creditsText' => 'Foodista.com – The Cooking Encyclopedia Everyone Can Edit',
//       'license' => 'CC BY 3.0',
//       'sourceName' => 'Foodista',
//       'pricePerServing' => 599.92,
//       'id' => 631814,
//       'title' => '$50,000 Burger',
//       'readyInMinutes' => 45,
//       'servings' => 4,
//       'sourceUrl' => 'http://www.foodista.com/recipe/FHT4DDYV/50000-burger',
//       'image' => 'https://spoonacular.com/recipeImages/631814-312x231.jpg',
//       'imageType' => 'jpg',
//       'summary' => 'The recipe $50,000 Burger could satisfy your American craving in around 45 minutes. One serving contains 1499 calories, 114g of protein, and 97g of fat. This recipe serves 4 and costs $7.9 per serving. Only a few people really liked this main course. 1 person has made this recipe and would make it again. A mixture of onion, salt, to assemble the burgers, and a handful of other ingredients are all it takes to make this recipe so tasty. To use up the walnuts you could follow this main course with the Pistachio Cake with Walnuts as a dessert. It is a good option if you\'re following a dairy free diet. All things considered, we decided this recipe deserves a spoonacular score of 59%. This score is solid. Similar recipes include Burger Club: Award-Winning Logan County Burger Patty Melt, New York Burger Week: Pretzel Burger with Beer Cheese, and Beef Burger Recipe (elvis Burger With Salad & Gherkin).',
//       'cuisines' => 
//       array (
//         0 => 'American',
//       ),
//       'dishTypes' => 
//       array (
//         0 => 'lunch',
//         1 => 'main course',
//         2 => 'main dish',
//         3 => 'dinner',
//       ),
//       'diets' => 
//       array (
//         0 => 'dairy free',
//       ),
//       'occasions' => 
//       array (
//       ),
//       'analyzedInstructions' => 
//       array (
//         0 => 
//         array (
//           'name' => 'Prepare a medium-hot fire in a charcoal grill with a cover, or preheat a gas grill to medium-high.For the patties',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Combine the chuck, basil, sun-dried tomatoes, onion, garlic, and salt in a large bowl, handling as little as possible. Shape into 2 patties to fit the bun size. Loosely cover with plastic wrap and set aside.For the fennel:Grate 1/2 teaspoons zest from the lemons.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11955,
//                   'name' => 'sun dried tomatoes',
//                   'localizedName' => 'sun dried tomatoes',
//                   'image' => 'sundried-tomatoes.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11957,
//                   'name' => 'fennel',
//                   'localizedName' => 'fennel',
//                   'image' => 'fennel.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 11215,
//                   'name' => 'garlic',
//                   'localizedName' => 'garlic',
//                   'image' => 'garlic.png',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 9150,
//                   'name' => 'lemon',
//                   'localizedName' => 'lemon',
//                   'image' => 'lemon.png',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 2044,
//                   'name' => 'basil',
//                   'localizedName' => 'basil',
//                   'image' => 'basil.jpg',
//                 ),
//                 5 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//                 6 => 
//                 array (
//                   'id' => 2047,
//                   'name' => 'salt',
//                   'localizedName' => 'salt',
//                   'image' => 'salt.jpg',
//                 ),
//                 7 => 
//                 array (
//                   'id' => 10018364,
//                   'name' => 'wrap',
//                   'localizedName' => 'wrap',
//                   'image' => 'flour-tortilla.jpg',
//                 ),
//                 8 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404730,
//                   'name' => 'plastic wrap',
//                   'localizedName' => 'plastic wrap',
//                   'image' => 'plastic-wrap.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404783,
//                   'name' => 'bowl',
//                   'localizedName' => 'bowl',
//                   'image' => 'bowl.jpg',
//                 ),
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Put the fennel rings in a medium-sized bowl (I used half a fennel bulb) and juice the lemon over half the fennel and toss to coat all the fennel rings.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11957,
//                   'name' => 'fennel bulb',
//                   'localizedName' => 'fennel bulb',
//                   'image' => 'fennel.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11957,
//                   'name' => 'fennel',
//                   'localizedName' => 'fennel',
//                   'image' => 'fennel.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 1019016,
//                   'name' => 'juice',
//                   'localizedName' => 'juice',
//                   'image' => 'apple-juice.jpg',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 9150,
//                   'name' => 'lemon',
//                   'localizedName' => 'lemon',
//                   'image' => 'lemon.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404783,
//                   'name' => 'bowl',
//                   'localizedName' => 'bowl',
//                   'image' => 'bowl.jpg',
//                 ),
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Add oil and season with salt.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 2047,
//                   'name' => 'salt',
//                   'localizedName' => 'salt',
//                   'image' => 'salt.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 4582,
//                   'name' => 'cooking oil',
//                   'localizedName' => 'cooking oil',
//                   'image' => 'vegetable-oil.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             3 => 
//             array (
//               'number' => 4,
//               'step' => 'Put the fennel in a grill basket and grill, shaking the basket occasionally, until soft, 10 to 12 minutes. (I did this on the stove top)',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11957,
//                   'name' => 'fennel',
//                   'localizedName' => 'fennel',
//                   'image' => 'fennel.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404794,
//                   'name' => 'stove',
//                   'localizedName' => 'stove',
//                   'image' => 'oven.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//               'length' => 
//               array (
//                 'number' => 10,
//                 'unit' => 'minutes',
//               ),
//             ),
//             4 => 
//             array (
//               'number' => 5,
//               'step' => 'Transfer the fennel to a sheet of foil, sprinkle with the lemon zest, and wrap to keep warm.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 9156,
//                   'name' => 'lemon zest',
//                   'localizedName' => 'lemon zest',
//                   'image' => 'zest-lemon.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11957,
//                   'name' => 'fennel',
//                   'localizedName' => 'fennel',
//                   'image' => 'fennel.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 10018364,
//                   'name' => 'wrap',
//                   'localizedName' => 'wrap',
//                   'image' => 'flour-tortilla.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404765,
//                   'name' => 'aluminum foil',
//                   'localizedName' => 'aluminum foil',
//                   'image' => 'aluminum-foil.png',
//                 ),
//               ),
//             ),
//             5 => 
//             array (
//               'number' => 6,
//               'step' => 'Heat a large, heavy nonstick fire-proof skillet on the grill.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//             ),
//             6 => 
//             array (
//               'number' => 7,
//               'step' => 'Add the bacon and cook until crisp.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10123,
//                   'name' => 'bacon',
//                   'localizedName' => 'bacon',
//                   'image' => 'raw-bacon.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//           ),
//         ),
//         1 => 
//         array (
//           'name' => 'Transfer to paper towels to drain. Wrap in foil to keep warm.For the topping',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Drain off the bacon fat from the skillet, wipe out the skillet with paper towels, and set the skillet back on the grill.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 4609,
//                   'name' => 'bacon drippings',
//                   'localizedName' => 'bacon drippings',
//                   'image' => 'raw-bacon.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 405895,
//                   'name' => 'paper towels',
//                   'localizedName' => 'paper towels',
//                   'image' => 'paper-towels.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Add the walnuts to the skillet and toast until golden and fragrant; set aside.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 12155,
//                   'name' => 'walnuts',
//                   'localizedName' => 'walnuts',
//                   'image' => 'walnuts.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 18070,
//                   'name' => 'toast',
//                   'localizedName' => 'toast',
//                   'image' => 'toast',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Whisk the vinegar with the oil in a small bowl and season with salt, to taste.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 2053,
//                   'name' => 'vinegar',
//                   'localizedName' => 'vinegar',
//                   'image' => 'vinegar-(white).jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 2047,
//                   'name' => 'salt',
//                   'localizedName' => 'salt',
//                   'image' => 'salt.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 4582,
//                   'name' => 'cooking oil',
//                   'localizedName' => 'cooking oil',
//                   'image' => 'vegetable-oil.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404661,
//                   'name' => 'whisk',
//                   'localizedName' => 'whisk',
//                   'image' => 'whisk.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404783,
//                   'name' => 'bowl',
//                   'localizedName' => 'bowl',
//                   'image' => 'bowl.jpg',
//                 ),
//               ),
//             ),
//             3 => 
//             array (
//               'number' => 4,
//               'step' => 'Combine the figs, arugula, and toasted walnuts in a medium bowl. Toss with just enough dressing to coat. (I like a tart vinaigrette so I use a 1:1 ratio for the oil and vinegar)When the grill is ready, brush the grill rack with vegetable oil.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 4513,
//                   'name' => 'vegetable oil',
//                   'localizedName' => 'vegetable oil',
//                   'image' => 'vegetable-oil.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 4135,
//                   'name' => 'vinaigrette',
//                   'localizedName' => 'vinaigrette',
//                   'image' => 'vinaigrette.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 11959,
//                   'name' => 'arugula',
//                   'localizedName' => 'arugula',
//                   'image' => 'arugula-or-rocket-salad.jpg',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 2053,
//                   'name' => 'vinegar',
//                   'localizedName' => 'vinegar',
//                   'image' => 'vinegar-(white).jpg',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 12155,
//                   'name' => 'walnuts',
//                   'localizedName' => 'walnuts',
//                   'image' => 'walnuts.jpg',
//                 ),
//                 5 => 
//                 array (
//                   'id' => 9089,
//                   'name' => 'figs',
//                   'localizedName' => 'figs',
//                   'image' => 'figs-fresh.jpg',
//                 ),
//                 6 => 
//                 array (
//                   'id' => 4582,
//                   'name' => 'cooking oil',
//                   'localizedName' => 'cooking oil',
//                   'image' => 'vegetable-oil.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404783,
//                   'name' => 'bowl',
//                   'localizedName' => 'bowl',
//                   'image' => 'bowl.jpg',
//                 ),
//               ),
//             ),
//             4 => 
//             array (
//               'number' => 5,
//               'step' => 'Place the patties on the rack, cover, and cook, turning once, until done to preference, 5 to 7 minutes on each side for medium.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//               ),
//               'length' => 
//               array (
//                 'number' => 5,
//                 'unit' => 'minutes',
//               ),
//             ),
//             5 => 
//             array (
//               'number' => 6,
//               'step' => 'Place the cheese slices on the patties during the last 3 minutes of grilling.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1041009,
//                   'name' => 'cheese',
//                   'localizedName' => 'cheese',
//                   'image' => 'cheddar-cheese.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//               'length' => 
//               array (
//                 'number' => 3,
//                 'unit' => 'minutes',
//               ),
//             ),
//             6 => 
//             array (
//               'number' => 7,
//               'step' => 'Place the buns, cut side down, on the outer edges of the rack to toast lightly during the last 2 minutes of grilling.To assemble the burgers, place equal portions of the warm grilled fennel on each bun bottom, followed by a cheese-topped patty, 2 bacon slices, and an equal portion of the fig-arugula topping. (I would use a lot of the fig topping)',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10123,
//                   'name' => 'bacon',
//                   'localizedName' => 'bacon',
//                   'image' => 'raw-bacon.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11959,
//                   'name' => 'arugula',
//                   'localizedName' => 'arugula',
//                   'image' => 'arugula-or-rocket-salad.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 1041009,
//                   'name' => 'cheese',
//                   'localizedName' => 'cheese',
//                   'image' => 'cheddar-cheese.png',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 11957,
//                   'name' => 'fennel',
//                   'localizedName' => 'fennel',
//                   'image' => 'fennel.png',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 18070,
//                   'name' => 'toast',
//                   'localizedName' => 'toast',
//                   'image' => 'toast',
//                 ),
//                 5 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//                 6 => 
//                 array (
//                   'id' => 9089,
//                   'name' => 'figs',
//                   'localizedName' => 'figs',
//                   'image' => 'figs-fresh.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//               'length' => 
//               array (
//                 'number' => 2,
//                 'unit' => 'minutes',
//               ),
//             ),
//             7 => 
//             array (
//               'number' => 8,
//               'step' => 'Add the bun tops and serve.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//           ),
//         ),
//       ),
//       'spoonacularSourceUrl' => 'https://spoonacular.com/-50-000-burger-631814',
//     ),
//     2 => 
//     array (
//       'vegetarian' => false,
//       'vegan' => false,
//       'glutenFree' => false,
//       'dairyFree' => false,
//       'veryHealthy' => false,
//       'cheap' => false,
//       'veryPopular' => false,
//       'sustainable' => false,
//       'weightWatcherSmartPoints' => 29,
//       'gaps' => 'no',
//       'lowFodmap' => false,
//       'aggregateLikes' => 2,
//       'spoonacularScore' => 73.0,
//       'healthScore' => 31.0,
//       'creditsText' => 'Foodista.com – The Cooking Encyclopedia Everyone Can Edit',
//       'license' => 'CC BY 3.0',
//       'sourceName' => 'Foodista',
//       'pricePerServing' => 351.33,
//       'id' => 663050,
//       'title' => 'Tex-Mex Burger',
//       'readyInMinutes' => 15,
//       'servings' => 4,
//       'sourceUrl' => 'http://www.foodista.com/recipe/NSYCCHLT/tex-mex-burger',
//       'image' => 'https://spoonacular.com/recipeImages/663050-312x231.jpg',
//       'imageType' => 'jpg',
//       'summary' => 'Tex-Mex Burger might be just the main course you are searching for. For $3.51 per serving, this recipe covers 36% of your daily requirements of vitamins and minerals. One serving contains 910 calories, 52g of protein, and 63g of fat. Only a few people made this recipe, and 1 would say it hit the spot. This recipe is typical of American cuisine. Head to the store and pick up onion, ground beef, cumin, and a few other things to make it today. To use up the salt you could follow this main course with the Apple Turnovers Recipe as a dessert. From preparation to the plate, this recipe takes roughly 15 minutes. All things considered, we decided this recipe deserves a spoonacular score of 75%. This score is solid. Try Tex-Mex Burgers, Tex-Mex Chopped Chicken Salad, and Creamy Tex-Mex Pasta Salad for similar recipes.',
//       'cuisines' => 
//       array (
//         0 => 'American',
//       ),
//       'dishTypes' => 
//       array (
//         0 => 'lunch',
//         1 => 'main course',
//         2 => 'main dish',
//         3 => 'dinner',
//       ),
//       'diets' => 
//       array (
//       ),
//       'occasions' => 
//       array (
//       ),
//       'analyzedInstructions' => 
//       array (
//         0 => 
//         array (
//           'name' => '',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Preheat broiler.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 405914,
//                   'name' => 'broiler',
//                   'localizedName' => 'broiler',
//                   'image' => 'oven.jpg',
//                 ),
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Heat large frying pan to medium high heat. Make patties: Take the ground beef, add salsa and spices.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10023572,
//                   'name' => 'ground beef',
//                   'localizedName' => 'ground beef',
//                   'image' => 'fresh-ground-beef.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 2035,
//                   'name' => 'spices',
//                   'localizedName' => 'spices',
//                   'image' => 'spices.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 6164,
//                   'name' => 'salsa',
//                   'localizedName' => 'salsa',
//                   'image' => 'salsa.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Mix together till evenly distributed.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//           ),
//         ),
//         1 => 
//         array (
//           'name' => 'Place patties on frying pan and cook for 3 minutes and 30 seconds.Flip over and place 1 slice of cheese on each patty. Cook for another 3 minutes and 30 seconds. Meanwhile, get out all toppings and toast buns. Once done, let burger rest for 5 minutes on a plate.Assemble burger',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Place patty on bun. Top with 1 TBSP Salsa, then 2 slices of red onion.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10011282,
//                   'name' => 'red onion',
//                   'localizedName' => 'red onion',
//                   'image' => 'red-onion.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 6164,
//                   'name' => 'salsa',
//                   'localizedName' => 'salsa',
//                   'image' => 'salsa.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Place of the cilantro on red onion and then place avocado on top bun.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10011282,
//                   'name' => 'red onion',
//                   'localizedName' => 'red onion',
//                   'image' => 'red-onion.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11165,
//                   'name' => 'cilantro',
//                   'localizedName' => 'cilantro',
//                   'image' => 'cilantro.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 9037,
//                   'name' => 'avocado',
//                   'localizedName' => 'avocado',
//                   'image' => 'avocado.jpg',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Add bun to burger and serve.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//           ),
//         ),
//       ),
//       'spoonacularSourceUrl' => 'https://spoonacular.com/tex-mex-burger-663050',
//     ),
//     3 => 
//     array (
//       'vegetarian' => false,
//       'vegan' => false,
//       'glutenFree' => false,
//       'dairyFree' => false,
//       'veryHealthy' => false,
//       'cheap' => false,
//       'veryPopular' => false,
//       'sustainable' => false,
//       'weightWatcherSmartPoints' => 38,
//       'gaps' => 'no',
//       'lowFodmap' => false,
//       'aggregateLikes' => 1,
//       'spoonacularScore' => 79.0,
//       'healthScore' => 44.0,
//       'creditsText' => 'dsky',
//       'license' => 'spoonacular\'s terms',
//       'sourceName' => 'spoonacular',
//       'pricePerServing' => 407.86,
//       'id' => 622825,
//       'title' => 'Tortilla Burger Loco Vaca',
//       'author' => 'dsky',
//       'readyInMinutes' => 40,
//       'servings' => 2,
//       'sourceUrl' => 'https://spoonacular.com/-1418388808652',
//       'image' => 'https://spoonacular.com/recipeImages/622825-312x231.jpg',
//       'imageType' => 'jpg',
//       'summary' => 'Tortilla Burger Loco Vaca might be just the main course you are searching for. One serving contains 1136 calories, 54g of protein, and 86g of fat. This recipe serves 2 and costs $3.71 per serving. From preparation to the plate, this recipe takes approximately 40 minutes. If you have avocado, bacon, cheddar cheese, and a few other ingredients on hand, you can make it. To use up the salt you could follow this main course with the Apple Turnovers Recipe as a dessert. This recipe is typical of American cuisine. Similar recipes include Loco for Moco: Blend and Extend Loco Moco, Vaca Frita: Crispy Beef, and Loco Moco.',
//       'cuisines' => 
//       array (
//         0 => 'American',
//       ),
//       'dishTypes' => 
//       array (
//         0 => 'lunch',
//         1 => 'main course',
//         2 => 'main dish',
//         3 => 'dinner',
//       ),
//       'diets' => 
//       array (
//       ),
//       'occasions' => 
//       array (
//       ),
//       'analyzedInstructions' => 
//       array (
//         0 => 
//         array (
//           'name' => '',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Put the tortillas in the oven at about 80°C just to get them warm.Fry the strips of bacon until crispy, then put the bacon in the oven to keep it warm.Spice the ground beef with salt, pepper, and cumin.Form 2 large patties and start frying the patties in a well heated pan.Slice the avocado and the red onion.Get the tortillas out of the oven and prepare them with the onion, avocado, bacon, cheddar, cilantro, and the patties.Wrap it all up and then wrap your teeth around it.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10023572,
//                   'name' => 'ground beef',
//                   'localizedName' => 'ground beef',
//                   'image' => 'fresh-ground-beef.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 10011282,
//                   'name' => 'red onion',
//                   'localizedName' => 'red onion',
//                   'image' => 'red-onion.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 18364,
//                   'name' => 'tortilla',
//                   'localizedName' => 'tortilla',
//                   'image' => 'flour-tortilla.jpg',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 11165,
//                   'name' => 'cilantro',
//                   'localizedName' => 'cilantro',
//                   'image' => 'cilantro.png',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 9037,
//                   'name' => 'avocado',
//                   'localizedName' => 'avocado',
//                   'image' => 'avocado.jpg',
//                 ),
//                 5 => 
//                 array (
//                   'id' => 1009,
//                   'name' => 'cheddar cheese',
//                   'localizedName' => 'cheddar cheese',
//                   'image' => 'cheddar-cheese.png',
//                 ),
//                 6 => 
//                 array (
//                   'id' => 1002030,
//                   'name' => 'pepper',
//                   'localizedName' => 'pepper',
//                   'image' => 'pepper.jpg',
//                 ),
//                 7 => 
//                 array (
//                   'id' => 10123,
//                   'name' => 'bacon',
//                   'localizedName' => 'bacon',
//                   'image' => 'raw-bacon.png',
//                 ),
//                 8 => 
//                 array (
//                   'id' => 1002014,
//                   'name' => 'cumin',
//                   'localizedName' => 'cumin',
//                   'image' => 'ground-cumin.jpg',
//                 ),
//                 9 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//                 10 => 
//                 array (
//                   'id' => 2047,
//                   'name' => 'salt',
//                   'localizedName' => 'salt',
//                   'image' => 'salt.jpg',
//                 ),
//                 11 => 
//                 array (
//                   'id' => 10018364,
//                   'name' => 'wrap',
//                   'localizedName' => 'wrap',
//                   'image' => 'flour-tortilla.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404784,
//                   'name' => 'oven',
//                   'localizedName' => 'oven',
//                   'image' => 'oven.jpg',
//                   'temperature' => 
//                   array (
//                     'number' => 80.0,
//                     'unit' => 'Celsius',
//                   ),
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//               ),
//             ),
//           ),
//         ),
//       ),
//       'spoonacularSourceUrl' => 'https://spoonacular.com/tortilla-burger-loco-vaca-622825',
//     ),
//     4 => 
//     array (
//       'vegetarian' => false,
//       'vegan' => false,
//       'glutenFree' => false,
//       'dairyFree' => true,
//       'veryHealthy' => false,
//       'cheap' => false,
//       'veryPopular' => false,
//       'sustainable' => false,
//       'weightWatcherSmartPoints' => 29,
//       'gaps' => 'no',
//       'lowFodmap' => false,
//       'aggregateLikes' => 1,
//       'spoonacularScore' => 65.0,
//       'healthScore' => 26.0,
//       'creditsText' => 'Foodista.com – The Cooking Encyclopedia Everyone Can Edit',
//       'license' => 'CC BY 3.0',
//       'sourceName' => 'Foodista',
//       'pricePerServing' => 296.23,
//       'id' => 663357,
//       'title' => 'The Unagi Burger',
//       'readyInMinutes' => 45,
//       'servings' => 4,
//       'sourceUrl' => 'https://www.foodista.com/recipe/P7YT5V88/the-unagi-burger',
//       'image' => 'https://spoonacular.com/recipeImages/663357-312x231.jpg',
//       'imageType' => 'jpg',
//       'summary' => 'The Unagi Burger is a main course that serves 4. One portion of this dish contains about 52g of protein, 60g of fat, and a total of 932 calories. For $2.96 per serving, this recipe covers 34% of your daily requirements of vitamins and minerals. 1 person has made this recipe and would make it again. If you have broccoli sprouts, salt, ginger, and a few other ingredients on hand, you can make it. Only a few people really liked this American dish. From preparation to the plate, this recipe takes roughly roughly 45 minutes. It is a good option if you\'re following a dairy free diet. It is brought to you by Foodista. Taking all factors into account, this recipe earns a spoonacular score of 64%, which is good. Similar recipes are Unagi Chazuke, Eggplant & Unagi Donburi, and Unagi Kamameshi (iron Pot Rice With Eel).',
//       'cuisines' => 
//       array (
//         0 => 'American',
//       ),
//       'dishTypes' => 
//       array (
//         0 => 'lunch',
//         1 => 'main course',
//         2 => 'main dish',
//         3 => 'dinner',
//       ),
//       'diets' => 
//       array (
//         0 => 'dairy free',
//       ),
//       'occasions' => 
//       array (
//       ),
//       'analyzedInstructions' => 
//       array (
//         0 => 
//         array (
//           'name' => '',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Wasabi Dressing: 1/2 cup mayonnaise, 1/4 cup sour cream, 2 tablespoons wasabi paste or fresh grated wasabi cream -',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10011990,
//                   'name' => 'wasabi paste',
//                   'localizedName' => 'wasabi paste',
//                   'image' => 'wasabi-paste.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 4025,
//                   'name' => 'mayonnaise',
//                   'localizedName' => 'mayonnaise',
//                   'image' => 'mayonnaise.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 1056,
//                   'name' => 'sour cream',
//                   'localizedName' => 'sour cream',
//                   'image' => 'sour-cream.jpg',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 11990,
//                   'name' => 'wasabi',
//                   'localizedName' => 'wasabi',
//                   'image' => 'wasabi.jpg',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 1053,
//                   'name' => 'cream',
//                   'localizedName' => 'cream',
//                   'image' => 'fluid-cream.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Mix all ingredients well.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Taste it and add a little wasabi paste more if you like it really spicy. This can be made ahead of time and last in the refrigerator for a week or more. I always make extra because it makes a great dip.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10011990,
//                   'name' => 'wasabi paste',
//                   'localizedName' => 'wasabi paste',
//                   'image' => 'wasabi-paste.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'dip',
//                   'localizedName' => 'dip',
//                   'image' => '',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//           ),
//         ),
//         1 => 
//         array (
//           'name' => 'Burger patties',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Mix first 7 ingredients together thoroughly then add salt & pepper.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1102047,
//                   'name' => 'salt and pepper',
//                   'localizedName' => 'salt and pepper',
//                   'image' => 'salt-and-pepper.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Form patties and pat together tightly. Because of the volume of ingredients in these burgers they will fall apart easily on the grill.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Test one of the patties to see if it is holding up on the grill and not falling apart. These are delicate burgers to cook. Be sure to coat grill with non-stick spray. If its falling apart too much, try browning it in a skillet first so the outside is a little done. B careful not to brown it too much or itll dry out on the grill.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//             ),
//             3 => 
//             array (
//               'number' => 4,
//               'step' => 'Brush sesame oil on the inside of the split bakers roll and toast on the upper or outer edges of grill. When rolls are lightly toasted, spread wasabi sauce on top bun and add broccoli sprouts.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10011001,
//                   'name' => 'broccoli sprouts',
//                   'localizedName' => 'broccoli sprouts',
//                   'image' => 'alfalfa-sprouts.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 4058,
//                   'name' => 'sesame oil',
//                   'localizedName' => 'sesame oil',
//                   'image' => 'sesame-oil.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'spread',
//                   'localizedName' => 'spread',
//                   'image' => '',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 11990,
//                   'name' => 'wasabi',
//                   'localizedName' => 'wasabi',
//                   'image' => 'wasabi.jpg',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//                 5 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'sauce',
//                   'localizedName' => 'sauce',
//                   'image' => '',
//                 ),
//                 6 => 
//                 array (
//                   'id' => 18070,
//                   'name' => 'toast',
//                   'localizedName' => 'toast',
//                   'image' => 'toast',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//             ),
//             4 => 
//             array (
//               'number' => 5,
//               'step' => 'Place meat on bottom bun and 2 cucumber ribbons on top of meat. Carefully fold together and you have The Unagi Burger!',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11206,
//                   'name' => 'cucumber',
//                   'localizedName' => 'cucumber',
//                   'image' => 'cucumber.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1065062,
//                   'name' => 'meat',
//                   'localizedName' => 'meat',
//                   'image' => 'whole-chicken.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//           ),
//         ),
//       ),
//       'spoonacularSourceUrl' => 'https://spoonacular.com/the-unagi-burger-663357',
//     ),
//     5 => 
//     array (
//       'vegetarian' => false,
//       'vegan' => false,
//       'glutenFree' => false,
//       'dairyFree' => true,
//       'veryHealthy' => true,
//       'cheap' => false,
//       'veryPopular' => false,
//       'sustainable' => false,
//       'weightWatcherSmartPoints' => 12,
//       'gaps' => 'no',
//       'lowFodmap' => false,
//       'aggregateLikes' => 2,
//       'spoonacularScore' => 86.0,
//       'healthScore' => 72.0,
//       'creditsText' => 'Foodista.com – The Cooking Encyclopedia Everyone Can Edit',
//       'license' => 'CC BY 3.0',
//       'sourceName' => 'Foodista',
//       'pricePerServing' => 360.92,
//       'id' => 651190,
//       'title' => 'Masala-Tofu Burger',
//       'readyInMinutes' => 45,
//       'servings' => 4,
//       'sourceUrl' => 'https://www.foodista.com/recipe/DGH6HX5S/masala-tofu-burger',
//       'image' => 'https://spoonacular.com/recipeImages/651190-312x231.jpg',
//       'imageType' => 'jpg',
//       'summary' => 'Masala-Tofu Burger could be just the dairy free recipe you\'ve been looking for. This recipe serves 4 and costs $3.61 per serving. This main course has 486 calories, 19g of protein, and 11g of fat per serving. A mixture of tofu - shopping list, cumin powder shopping list, hing shopping list, and a handful of other ingredients are all it takes to make this recipe so delicious. 2 people were glad they tried this recipe. This recipe is typical of American cuisine. From preparation to the plate, this recipe takes about about 45 minutes. It is brought to you by Foodista. Overall, this recipe earns an amazing spoonacular score of 87%. Try Veggie Masala Burger Patty, Tofu Tikka Masala, and Masala Spiced Tofu Scramble for similar recipes.',
//       'cuisines' => 
//       array (
//         0 => 'American',
//       ),
//       'dishTypes' => 
//       array (
//         0 => 'lunch',
//         1 => 'main course',
//         2 => 'main dish',
//         3 => 'dinner',
//       ),
//       'diets' => 
//       array (
//         0 => 'dairy free',
//       ),
//       'occasions' => 
//       array (
//       ),
//       'analyzedInstructions' => 
//       array (
//         0 => 
//         array (
//           'name' => '',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'In a large skillet over medium-high heat, add spray with a generous amount of PAM and add oil.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 4582,
//                   'name' => 'cooking oil',
//                   'localizedName' => 'cooking oil',
//                   'image' => 'vegetable-oil.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 4679,
//                   'name' => 'cooking spray',
//                   'localizedName' => 'cooking spray',
//                   'image' => 'cooking-spray.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Add mustard seeds and saute for 30 seconds-till you hear popping noises.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 2024,
//                   'name' => 'mustard seeds',
//                   'localizedName' => 'mustard seeds',
//                   'image' => 'mustard-seeds.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Add curry leaves- BE CAREFUL, they pop hot oil!',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 93604,
//                   'name' => 'curry leaves',
//                   'localizedName' => 'curry leaves',
//                   'image' => 'curry-leaves.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 4582,
//                   'name' => 'cooking oil',
//                   'localizedName' => 'cooking oil',
//                   'image' => 'vegetable-oil.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'pop',
//                   'localizedName' => 'pop',
//                   'image' => '',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             3 => 
//             array (
//               'number' => 4,
//               'step' => 'Add onions and peppers- sweat for about 30 seconds.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10111333,
//                   'name' => 'peppers',
//                   'localizedName' => 'peppers',
//                   'image' => 'green-pepper.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             4 => 
//             array (
//               'number' => 5,
//               'step' => 'Add chopped garlic, chilies and turmeric.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 2043,
//                   'name' => 'turmeric',
//                   'localizedName' => 'turmeric',
//                   'image' => 'turmeric.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11819,
//                   'name' => 'chili pepper',
//                   'localizedName' => 'chili pepper',
//                   'image' => 'red-chili.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 11215,
//                   'name' => 'garlic',
//                   'localizedName' => 'garlic',
//                   'image' => 'garlic.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             5 => 
//             array (
//               'number' => 6,
//               'step' => 'Saute for about 5-7 minutes, until the onions and peppers are soft.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10111333,
//                   'name' => 'peppers',
//                   'localizedName' => 'peppers',
//                   'image' => 'green-pepper.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//               'length' => 
//               array (
//                 'number' => 7,
//                 'unit' => 'minutes',
//               ),
//             ),
//             6 => 
//             array (
//               'number' => 7,
//               'step' => 'Add peas and carrots mixture, cumin powder and salt.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11322,
//                   'name' => 'peas and carrots',
//                   'localizedName' => 'peas and carrots',
//                   'image' => 'peas-and-carrots.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1012014,
//                   'name' => 'ground cumin',
//                   'localizedName' => 'ground cumin',
//                   'image' => 'ground-cumin.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 2047,
//                   'name' => 'salt',
//                   'localizedName' => 'salt',
//                   'image' => 'salt.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             7 => 
//             array (
//               'number' => 8,
//               'step' => 'Saute for about 7-10 minutes- you want all the veggies to be soft and cooked through.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//               ),
//               'length' => 
//               array (
//                 'number' => 10,
//                 'unit' => 'minutes',
//               ),
//             ),
//             8 => 
//             array (
//               'number' => 9,
//               'step' => 'Meanwhile in a small bowl, add the cubed tofu, a pinch of turmeric, cumin powder, coarse black pepper and some cayenne pepper (totally optional!).',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'coarsely ground black pepper',
//                   'localizedName' => 'coarsely ground black pepper',
//                   'image' => 'pepper.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 2031,
//                   'name' => 'cayenne pepper',
//                   'localizedName' => 'cayenne pepper',
//                   'image' => 'chili-powder.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 1012014,
//                   'name' => 'ground cumin',
//                   'localizedName' => 'ground cumin',
//                   'image' => 'ground-cumin.jpg',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 2043,
//                   'name' => 'turmeric',
//                   'localizedName' => 'turmeric',
//                   'image' => 'turmeric.jpg',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 16213,
//                   'name' => 'tofu',
//                   'localizedName' => 'tofu',
//                   'image' => 'tofu.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404783,
//                   'name' => 'bowl',
//                   'localizedName' => 'bowl',
//                   'image' => 'bowl.jpg',
//                 ),
//               ),
//             ),
//             9 => 
//             array (
//               'number' => 10,
//               'step' => 'Mix and set aside to marinate for a bit.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             10 => 
//             array (
//               'number' => 11,
//               'step' => 'Once the veggies are cooked, add the tofu- saute until slightly brown and soft enough that it crumbles.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 16213,
//                   'name' => 'tofu',
//                   'localizedName' => 'tofu',
//                   'image' => 'tofu.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             11 => 
//             array (
//               'number' => 12,
//               'step' => 'Add juice form half a lemon and half of the chopped cilantro.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11165,
//                   'name' => 'cilantro',
//                   'localizedName' => 'cilantro',
//                   'image' => 'cilantro.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1019016,
//                   'name' => 'juice',
//                   'localizedName' => 'juice',
//                   'image' => 'apple-juice.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 9150,
//                   'name' => 'lemon',
//                   'localizedName' => 'lemon',
//                   'image' => 'lemon.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             12 => 
//             array (
//               'number' => 13,
//               'step' => 'Mix and add the diced boiled potato, and toss until everything is coated, soft and taste for salt/spices. Using a masher, mash the mixture until mushy and until the veggies are small. Set aside to cool. Once cooled, add a bit of the breadcrumbs and mix with your hands. Start forming into thick patties (mixture should make 4). If its still giving you a hard time, add more breadcrumbs. Make 4 patties, place on a plate and wrap with plastic wrap until ready to use.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 18079,
//                   'name' => 'breadcrumbs',
//                   'localizedName' => 'breadcrumbs',
//                   'image' => 'breadcrumbs.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11352,
//                   'name' => 'potato',
//                   'localizedName' => 'potato',
//                   'image' => 'potatoes-yukon-gold.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 2035,
//                   'name' => 'spices',
//                   'localizedName' => 'spices',
//                   'image' => 'spices.png',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 2047,
//                   'name' => 'salt',
//                   'localizedName' => 'salt',
//                   'image' => 'salt.jpg',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 10018364,
//                   'name' => 'wrap',
//                   'localizedName' => 'wrap',
//                   'image' => 'flour-tortilla.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404730,
//                   'name' => 'plastic wrap',
//                   'localizedName' => 'plastic wrap',
//                   'image' => 'plastic-wrap.jpg',
//                 ),
//               ),
//             ),
//             13 => 
//             array (
//               'number' => 14,
//               'step' => 'In a small skillet sprayed with PAM over medium-high heat, add one patty at a time. Cook for about 2 minutes on each side- until browned and crispy.At the same time, saute the thick slices of onion, until charred and slightly soft.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 4679,
//                   'name' => 'cooking spray',
//                   'localizedName' => 'cooking spray',
//                   'image' => 'cooking-spray.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//               ),
//               'length' => 
//               array (
//                 'number' => 2,
//                 'unit' => 'minutes',
//               ),
//             ),
//             14 => 
//             array (
//               'number' => 15,
//               'step' => 'Spread a generous amount of the chutney spread on each side on the bread, place burger, onions tomato and cilantro leaves.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11165,
//                   'name' => 'fresh cilantro',
//                   'localizedName' => 'fresh cilantro',
//                   'image' => 'cilantro.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'chutney',
//                   'localizedName' => 'chutney',
//                   'image' => '',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'spread',
//                   'localizedName' => 'spread',
//                   'image' => '',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 11529,
//                   'name' => 'tomato',
//                   'localizedName' => 'tomato',
//                   'image' => 'tomato.png',
//                 ),
//                 5 => 
//                 array (
//                   'id' => 18064,
//                   'name' => 'bread',
//                   'localizedName' => 'bread',
//                   'image' => 'white-bread.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             15 => 
//             array (
//               'number' => 16,
//               'step' => 'Serve with a slice of lemon and reduced-fat chips on the side.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11408,
//                   'name' => 'french fries',
//                   'localizedName' => 'french fries',
//                   'image' => 'french-fries-isolated.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 9150,
//                   'name' => 'lemon',
//                   'localizedName' => 'lemon',
//                   'image' => 'lemon.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//           ),
//         ),
//       ),
//       'spoonacularSourceUrl' => 'https://spoonacular.com/masala-tofu-burger-651190',
//     ),
//     6 => 
//     array (
//       'vegetarian' => false,
//       'vegan' => false,
//       'glutenFree' => false,
//       'dairyFree' => false,
//       'veryHealthy' => false,
//       'cheap' => false,
//       'veryPopular' => false,
//       'sustainable' => false,
//       'weightWatcherSmartPoints' => 24,
//       'gaps' => 'no',
//       'lowFodmap' => false,
//       'aggregateLikes' => 2,
//       'spoonacularScore' => 62.0,
//       'healthScore' => 23.0,
//       'creditsText' => 'Foodista.com – The Cooking Encyclopedia Everyone Can Edit',
//       'license' => 'CC BY 3.0',
//       'sourceName' => 'Foodista',
//       'pricePerServing' => 545.52,
//       'id' => 663252,
//       'title' => 'The Blarney Burger',
//       'readyInMinutes' => 45,
//       'servings' => 4,
//       'sourceUrl' => 'https://www.foodista.com/recipe/6W7QVCWV/the-blarney-burger',
//       'image' => 'https://spoonacular.com/recipeImages/663252-312x231.jpg',
//       'imageType' => 'jpg',
//       'summary' => 'Forget going out to eat or ordering takeout every time you crave American food. Try making The Blarney Burger at home. This recipe makes 4 servings with 777 calories, 52g of protein, and 46g of fat each. For $5.46 per serving, this recipe covers 32% of your daily requirements of vitamins and minerals. This recipe from Foodista requires ground sirloin, piccante gorgonzola crumbles, pepper, and worchester. 2 people have made this recipe and would make it again. It works well as a pricey main course. From preparation to the plate, this recipe takes approximately approximately 45 minutes. All things considered, we decided this recipe deserves a spoonacular score of 61%. This score is pretty good. Similar recipes are Blarney Stone, Blarney Stones, and Blarney Balls.',
//       'cuisines' => 
//       array (
//         0 => 'American',
//       ),
//       'dishTypes' => 
//       array (
//         0 => 'lunch',
//         1 => 'main course',
//         2 => 'main dish',
//         3 => 'dinner',
//       ),
//       'diets' => 
//       array (
//       ),
//       'occasions' => 
//       array (
//       ),
//       'analyzedInstructions' => 
//       array (
//         0 => 
//         array (
//           'name' => '',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Irish Mustard Sauce: 1 tbsp cornstarch, 2 tsp sugar, 1 tsp dry mustard, 1/2 tsp salt, 1 cup water, 1 tbsp butter, 1/4 cup vinegar, 1 tsp horseradish, 2 egg yolks, beaten. Put all ingredients in a sauce pan over medium heat. Continue whisking until smooth and thickened to consistency of pudding.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1002024,
//                   'name' => 'mustard powder',
//                   'localizedName' => 'mustard powder',
//                   'image' => 'dry-mustard.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1002055,
//                   'name' => 'horseradish',
//                   'localizedName' => 'horseradish',
//                   'image' => 'horseradish.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 20027,
//                   'name' => 'corn starch',
//                   'localizedName' => 'corn starch',
//                   'image' => 'white-powder.jpg',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 1125,
//                   'name' => 'egg yolk',
//                   'localizedName' => 'egg yolk',
//                   'image' => 'egg-yolk.jpg',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 2046,
//                   'name' => 'mustard',
//                   'localizedName' => 'mustard',
//                   'image' => 'regular-mustard.jpg',
//                 ),
//                 5 => 
//                 array (
//                   'id' => 2053,
//                   'name' => 'vinegar',
//                   'localizedName' => 'vinegar',
//                   'image' => 'vinegar-(white).jpg',
//                 ),
//                 6 => 
//                 array (
//                   'id' => 1001,
//                   'name' => 'butter',
//                   'localizedName' => 'butter',
//                   'image' => 'butter-sliced.jpg',
//                 ),
//                 7 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'sauce',
//                   'localizedName' => 'sauce',
//                   'image' => '',
//                 ),
//                 8 => 
//                 array (
//                   'id' => 19335,
//                   'name' => 'sugar',
//                   'localizedName' => 'sugar',
//                   'image' => 'sugar-in-bowl.png',
//                 ),
//                 9 => 
//                 array (
//                   'id' => 14412,
//                   'name' => 'water',
//                   'localizedName' => 'water',
//                   'image' => 'water.png',
//                 ),
//                 10 => 
//                 array (
//                   'id' => 2047,
//                   'name' => 'salt',
//                   'localizedName' => 'salt',
//                   'image' => 'salt.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404661,
//                   'name' => 'whisk',
//                   'localizedName' => 'whisk',
//                   'image' => 'whisk.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404669,
//                   'name' => 'sauce pan',
//                   'localizedName' => 'sauce pan',
//                   'image' => 'sauce-pan.jpg',
//                 ),
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Gorgonzola Butter-Wash: In a microwave safe bowl, add remaining tablespoon of Gorgonzola crumbles and 2 tablespoons of butter and melt.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1011004,
//                   'name' => 'gorgonzola',
//                   'localizedName' => 'gorgonzola',
//                   'image' => 'gorgonzola.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1001,
//                   'name' => 'butter',
//                   'localizedName' => 'butter',
//                   'image' => 'butter-sliced.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404762,
//                   'name' => 'microwave',
//                   'localizedName' => 'microwave',
//                   'image' => 'microwave.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404783,
//                   'name' => 'bowl',
//                   'localizedName' => 'bowl',
//                   'image' => 'bowl.jpg',
//                 ),
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Whisk together to create a Gorgonzola butter-wash.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1011004,
//                   'name' => 'gorgonzola',
//                   'localizedName' => 'gorgonzola',
//                   'image' => 'gorgonzola.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1001,
//                   'name' => 'butter',
//                   'localizedName' => 'butter',
//                   'image' => 'butter-sliced.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404661,
//                   'name' => 'whisk',
//                   'localizedName' => 'whisk',
//                   'image' => 'whisk.png',
//                 ),
//               ),
//             ),
//             3 => 
//             array (
//               'number' => 4,
//               'step' => 'Brush Gorgonzola butter-wash on the inside of the top & bottom buns and toast on the upper or outer edges of grill. Once rolls are lightly toasted, remove.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1011004,
//                   'name' => 'gorgonzola',
//                   'localizedName' => 'gorgonzola',
//                   'image' => 'gorgonzola.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1001,
//                   'name' => 'butter',
//                   'localizedName' => 'butter',
//                   'image' => 'butter-sliced.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 18070,
//                   'name' => 'toast',
//                   'localizedName' => 'toast',
//                   'image' => 'toast',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//             ),
//           ),
//         ),
//         1 => 
//         array (
//           'name' => 'Meat',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Mix first 7 ingredients together thoroughly then add salt & pepper. Form patties and pat together well.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1102047,
//                   'name' => 'salt and pepper',
//                   'localizedName' => 'salt and pepper',
//                   'image' => 'salt-and-pepper.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Cook meat over medium heat - be sure to coat grill with non-stick spray.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1065062,
//                   'name' => 'meat',
//                   'localizedName' => 'meat',
//                   'image' => 'whole-chicken.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Cook about 8-10 minutes on each side.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//               ),
//               'length' => 
//               array (
//                 'number' => 10,
//                 'unit' => 'minutes',
//               ),
//             ),
//             3 => 
//             array (
//               'number' => 4,
//               'step' => 'Set meat on bottom bun and spoon Irish mustard sauce on top of meat patty.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 2046,
//                   'name' => 'mustard',
//                   'localizedName' => 'mustard',
//                   'image' => 'regular-mustard.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'sauce',
//                   'localizedName' => 'sauce',
//                   'image' => '',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 1065062,
//                   'name' => 'meat',
//                   'localizedName' => 'meat',
//                   'image' => 'whole-chicken.jpg',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             4 => 
//             array (
//               'number' => 5,
//               'step' => 'Add shredded cabbage and fold top and bottom together.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11109,
//                   'name' => 'cabbage',
//                   'localizedName' => 'cabbage',
//                   'image' => 'cabbage.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//           ),
//         ),
//       ),
//       'spoonacularSourceUrl' => 'https://spoonacular.com/the-blarney-burger-663252',
//     ),
//     7 => 
//     array (
//       'vegetarian' => false,
//       'vegan' => false,
//       'glutenFree' => false,
//       'dairyFree' => false,
//       'veryHealthy' => false,
//       'cheap' => false,
//       'veryPopular' => false,
//       'sustainable' => false,
//       'weightWatcherSmartPoints' => 32,
//       'gaps' => 'no',
//       'lowFodmap' => false,
//       'aggregateLikes' => 1,
//       'spoonacularScore' => 45.0,
//       'healthScore' => 12.0,
//       'creditsText' => 'Foodista.com – The Cooking Encyclopedia Everyone Can Edit',
//       'license' => 'CC BY 3.0',
//       'sourceName' => 'Foodista',
//       'pricePerServing' => 461.22,
//       'id' => 650181,
//       'title' => 'Little Italy Burger',
//       'readyInMinutes' => 45,
//       'servings' => 4,
//       'sourceUrl' => 'https://www.foodista.com/recipe/DXM5KVFD/little-italy-burger',
//       'image' => 'https://spoonacular.com/recipeImages/650181-312x231.jpg',
//       'imageType' => 'jpg',
//       'summary' => 'Little Italy Burger might be just the American recipe you are searching for. This recipe makes 4 servings with 961 calories, 43g of protein, and 71g of fat each. For $4.61 per serving, this recipe covers 22% of your daily requirements of vitamins and minerals. Head to the store and pick up ground beef, butter, onion, and a few other things to make it today. 1 person has made this recipe and would make it again. It is brought to you by Foodista. It works best as a main course, and is done in around around 45 minutes. With a spoonacular score of 44%, this dish is solid. Users who liked this recipe also liked Florentines (Italy), Little Italy Pignoli Cookies, and Little Italy Homemade Pizza.',
//       'cuisines' => 
//       array (
//         0 => 'American',
//       ),
//       'dishTypes' => 
//       array (
//         0 => 'lunch',
//         1 => 'main course',
//         2 => 'main dish',
//         3 => 'dinner',
//       ),
//       'diets' => 
//       array (
//       ),
//       'occasions' => 
//       array (
//       ),
//       'analyzedInstructions' => 
//       array (
//         0 => 
//         array (
//           'name' => '',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Heat the grill to high. Divide the ground beef into 4 portions. Salt and pepper and press into patties.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1102047,
//                   'name' => 'salt and pepper',
//                   'localizedName' => 'salt and pepper',
//                   'image' => 'salt-and-pepper.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 10023572,
//                   'name' => 'ground beef',
//                   'localizedName' => 'ground beef',
//                   'image' => 'fresh-ground-beef.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Layer each patty with a slice of pancetta on top and bottom. Press the pancetta into the patty.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10410123,
//                   'name' => 'pancetta',
//                   'localizedName' => 'pancetta',
//                   'image' => 'pancetta.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Cut the onion and mozzarella into rounds.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1026,
//                   'name' => 'mozzarella',
//                   'localizedName' => 'mozzarella',
//                   'image' => 'mozzarella.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             3 => 
//             array (
//               'number' => 4,
//               'step' => 'Melt the butter and mix it with the tomato paste and anchovy paste.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10015002,
//                   'name' => 'anchovy paste',
//                   'localizedName' => 'anchovy paste',
//                   'image' => 'anchovy-paste.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11887,
//                   'name' => 'tomato paste',
//                   'localizedName' => 'tomato paste',
//                   'image' => 'tomato-paste.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 1001,
//                   'name' => 'butter',
//                   'localizedName' => 'butter',
//                   'image' => 'butter-sliced.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             4 => 
//             array (
//               'number' => 5,
//               'step' => 'Cut the ciabatta buns and brush the insides with tomato-butter.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 93699,
//                   'name' => 'ciabatta roll',
//                   'localizedName' => 'ciabatta roll',
//                   'image' => 'ciabatta-roll.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1001,
//                   'name' => 'butter',
//                   'localizedName' => 'butter',
//                   'image' => 'butter-sliced.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 11529,
//                   'name' => 'tomato',
//                   'localizedName' => 'tomato',
//                   'image' => 'tomato.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             5 => 
//             array (
//               'number' => 6,
//               'step' => 'CAREFULLY brush the grill with oil or use non-stick grill spray. Grill the patties and onions at the same time. Grill the patties for 3-5 minutes per side and the onions for 1-2 minutes per side.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 4582,
//                   'name' => 'cooking oil',
//                   'localizedName' => 'cooking oil',
//                   'image' => 'vegetable-oil.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//               'length' => 
//               array (
//                 'number' => 7,
//                 'unit' => 'minutes',
//               ),
//             ),
//             6 => 
//             array (
//               'number' => 7,
//               'step' => 'Once you flip the burgers, lay the onion rounds over the top of each patty, followed by the mozzarella slices. The cheese will melt while the burgers finish cooking.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1026,
//                   'name' => 'mozzarella',
//                   'localizedName' => 'mozzarella',
//                   'image' => 'mozzarella.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1041009,
//                   'name' => 'cheese',
//                   'localizedName' => 'cheese',
//                   'image' => 'cheddar-cheese.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             7 => 
//             array (
//               'number' => 8,
//               'step' => 'Place the buns on the open grill and toast for 1 minute.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 18070,
//                   'name' => 'toast',
//                   'localizedName' => 'toast',
//                   'image' => 'toast',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//               'length' => 
//               array (
//                 'number' => 1,
//                 'unit' => 'minutes',
//               ),
//             ),
//             8 => 
//             array (
//               'number' => 9,
//               'step' => 'Once the buns are toasted, slather them with pesto.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 93698,
//                   'name' => 'pesto',
//                   'localizedName' => 'pesto',
//                   'image' => 'basil-pesto.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             9 => 
//             array (
//               'number' => 10,
//               'step' => 'Layer arugula leaves, tomato slices and a patty on each bun. Top and serve!',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 11959,
//                   'name' => 'arugula',
//                   'localizedName' => 'arugula',
//                   'image' => 'arugula-or-rocket-salad.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 10511529,
//                   'name' => 'tomato slices',
//                   'localizedName' => 'tomato slices',
//                   'image' => 'sliced-tomato.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             10 => 
//             array (
//               'number' => 11,
//               'step' => 'Serves 4.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//           ),
//         ),
//       ),
//       'spoonacularSourceUrl' => 'https://spoonacular.com/little-italy-burger-650181',
//     ),
//     8 => 
//     array (
//       'vegetarian' => false,
//       'vegan' => false,
//       'glutenFree' => true,
//       'dairyFree' => false,
//       'veryHealthy' => false,
//       'cheap' => false,
//       'veryPopular' => false,
//       'sustainable' => false,
//       'weightWatcherSmartPoints' => 17,
//       'gaps' => 'no',
//       'lowFodmap' => false,
//       'aggregateLikes' => 1,
//       'spoonacularScore' => 26.0,
//       'healthScore' => 3.0,
//       'creditsText' => 'Foodista.com – The Cooking Encyclopedia Everyone Can Edit',
//       'license' => 'CC BY 3.0',
//       'sourceName' => 'Foodista',
//       'pricePerServing' => 116.02,
//       'id' => 663209,
//       'title' => 'The Benedict Burger',
//       'readyInMinutes' => 45,
//       'servings' => 6,
//       'sourceUrl' => 'http://www.foodista.com/recipe/W76B2R82/the-benedict-burger',
//       'image' => 'https://spoonacular.com/recipeImages/663209-312x231.jpg',
//       'imageType' => 'jpg',
//       'summary' => 'The recipe The Benedict Burger is ready in approximately 45 minutes and is definitely an outstanding gluten free option for lovers of American food. This recipe serves 6 and costs $1.16 per serving. One serving contains 422 calories, 15g of protein, and 39g of fat. 1 person has tried and liked this recipe. A mixture of pepper& salt, lemon juice, egg yolks, and a handful of other ingredients are all it takes to make this recipe so delicious. To use up the oatmeal you could follow this main course with the 7 Layer Oatmeal Chocolate Chip Cookie Bars as a dessert. It works well as a budget friendly main course. All things considered, we decided this recipe deserves a spoonacular score of 28%. This score is rather bad. Try Burger Club: Award-Winning Logan County Burger Patty Melt, Beef Burger Recipe (elvis Burger With Salad & Gherkin), and New York Burger Week: Pretzel Burger with Beer Cheese for similar recipes.',
//       'cuisines' => 
//       array (
//         0 => 'American',
//       ),
//       'dishTypes' => 
//       array (
//         0 => 'lunch',
//         1 => 'main course',
//         2 => 'main dish',
//         3 => 'dinner',
//       ),
//       'diets' => 
//       array (
//         0 => 'gluten free',
//       ),
//       'occasions' => 
//       array (
//       ),
//       'analyzedInstructions' => 
//       array (
//         0 => 
//         array (
//           'name' => '',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Save 2 tbsp butter and keep cold in refrigerator.In small saucepan, melt remaining butter; keep warm.In a stainless steel bowl, whisk egg yolks until thickened and pale.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1125,
//                   'name' => 'egg yolk',
//                   'localizedName' => 'egg yolk',
//                   'image' => 'egg-yolk.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1001,
//                   'name' => 'butter',
//                   'localizedName' => 'butter',
//                   'image' => 'butter-sliced.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404669,
//                   'name' => 'sauce pan',
//                   'localizedName' => 'sauce pan',
//                   'image' => 'sauce-pan.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404661,
//                   'name' => 'whisk',
//                   'localizedName' => 'whisk',
//                   'image' => 'whisk.png',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 404783,
//                   'name' => 'bowl',
//                   'localizedName' => 'bowl',
//                   'image' => 'bowl.jpg',
//                 ),
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Whisk in water and lemon juice.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 9152,
//                   'name' => 'lemon juice',
//                   'localizedName' => 'lemon juice',
//                   'image' => 'lemon-juice.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 14412,
//                   'name' => 'water',
//                   'localizedName' => 'water',
//                   'image' => 'water.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404661,
//                   'name' => 'whisk',
//                   'localizedName' => 'whisk',
//                   'image' => 'whisk.png',
//                 ),
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Add 1 tbsp of the cold butter.This will make your arm burn, and if it doesn\'t you are in wayyyy better shape than me - congratulations',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1001,
//                   'name' => 'butter',
//                   'localizedName' => 'butter',
//                   'image' => 'butter-sliced.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//               ),
//             ),
//             3 => 
//             array (
//               'number' => 4,
//               'step' => 'Set the bowl over a pot with about 2 inches of barely simmering water; whisk until bottom of pan can be seen between whisks and wires of whisk become lightly coated, 1 to 2 minutes. Oh yay, arm burn again!',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 14412,
//                   'name' => 'water',
//                   'localizedName' => 'water',
//                   'image' => 'water.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404661,
//                   'name' => 'whisk',
//                   'localizedName' => 'whisk',
//                   'image' => 'whisk.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404783,
//                   'name' => 'bowl',
//                   'localizedName' => 'bowl',
//                   'image' => 'bowl.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 404752,
//                   'name' => 'pot',
//                   'localizedName' => 'pot',
//                   'image' => 'stock-pot.jpg',
//                 ),
//               ),
//               'length' => 
//               array (
//                 'number' => 1,
//                 'unit' => 'minutes',
//               ),
//             ),
//           ),
//         ),
//         1 => 
//         array (
//           'name' => 'Remove from heat and immediately whisk in remaining cold butter to stop the cooking of the yolks.Slowly drizzle in the butter while whisking to thicken to consistency of whipping cream. Increasing amount of butter slightly, and seasoning.Burger',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'Mix all ingredients in a bowl just until combined. Shape into 6 balls, flatten with the bottom of a plate.Throw into the fridge or freezer for a few minutes while you are heating the grill.Bbq about 6 minutes on each side',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404783,
//                   'name' => 'bowl',
//                   'localizedName' => 'bowl',
//                   'image' => 'bowl.jpg',
//                 ),
//               ),
//               'length' => 
//               array (
//                 'number' => 6,
//                 'unit' => 'minutes',
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Poached Eggs:In a pot place about 3-4 inches of water. Bring to a boil and add 2 tbsp. vinegar.Slowly drop an egg into the water. Keep in the water for about 2 minutes.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1131,
//                   'name' => 'poached egg',
//                   'localizedName' => 'poached egg',
//                   'image' => 'poached-egg.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 2053,
//                   'name' => 'vinegar',
//                   'localizedName' => 'vinegar',
//                   'image' => 'vinegar-(white).jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 14412,
//                   'name' => 'water',
//                   'localizedName' => 'water',
//                   'image' => 'water.png',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 1123,
//                   'name' => 'egg',
//                   'localizedName' => 'egg',
//                   'image' => 'egg.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404752,
//                   'name' => 'pot',
//                   'localizedName' => 'pot',
//                   'image' => 'stock-pot.jpg',
//                 ),
//               ),
//               'length' => 
//               array (
//                 'number' => 2,
//                 'unit' => 'minutes',
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Remove with a slotted spoon.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404636,
//                   'name' => 'slotted spoon',
//                   'localizedName' => 'slotted spoon',
//                   'image' => 'slotted-spoon.jpg',
//                 ),
//               ),
//             ),
//           ),
//         ),
//       ),
//       'spoonacularSourceUrl' => 'https://spoonacular.com/the-benedict-burger-663209',
//     ),
//     9 => 
//     array (
//       'vegetarian' => false,
//       'vegan' => false,
//       'glutenFree' => false,
//       'dairyFree' => false,
//       'veryHealthy' => false,
//       'cheap' => false,
//       'veryPopular' => false,
//       'sustainable' => false,
//       'weightWatcherSmartPoints' => 12,
//       'gaps' => 'no',
//       'lowFodmap' => false,
//       'aggregateLikes' => 17,
//       'spoonacularScore' => 86.0,
//       'healthScore' => 32.0,
//       'creditsText' => 'Foodista.com – The Cooking Encyclopedia Everyone Can Edit',
//       'license' => 'CC BY 3.0',
//       'sourceName' => 'Foodista',
//       'pricePerServing' => 316.97,
//       'id' => 637631,
//       'title' => 'Cheesy Bacon Burger with Spicy Chipotle Aiolo Sauce',
//       'readyInMinutes' => 45,
//       'servings' => 4,
//       'sourceUrl' => 'http://www.foodista.com/recipe/VWDL3M4T/cheesy-bacon-burger-with-spicy-chipotle-aiolo-sauce',
//       'image' => 'https://spoonacular.com/recipeImages/637631-312x231.jpg',
//       'imageType' => 'jpg',
//       'summary' => 'You can never have too many main course recipes, so give Cheesy Bacon Burger with Spicy Chipotle Aiolo Sauce a try. For $3.16 per serving, this recipe covers 31% of your daily requirements of vitamins and minerals. This recipe makes 4 servings with 494 calories, 51g of protein, and 20g of fat each. A mixture of chipotle chiles in adobo, mayonnaise, garlic, and a handful of other ingredients are all it takes to make this recipe so scrumptious. To use up the ground cumin you could follow this main course with the Moroccan Chocolate Mousse as a dessert. A few people made this recipe, and 17 would say it hit the spot. From preparation to the plate, this recipe takes around 45 minutes. All things considered, we decided this recipe deserves a spoonacular score of 87%. This score is super. Try Cheesy Bacon Oven Chips with Chipotle Ranch Dipping Sauce, Chipotle-Bacon Turkey Burger, and Cheesy Bacon Burger Pizza for similar recipes.',
//       'cuisines' => 
//       array (
//         0 => 'American',
//       ),
//       'dishTypes' => 
//       array (
//         0 => 'lunch',
//         1 => 'main course',
//         2 => 'main dish',
//         3 => 'dinner',
//       ),
//       'diets' => 
//       array (
//       ),
//       'occasions' => 
//       array (
//       ),
//       'analyzedInstructions' => 
//       array (
//         0 => 
//         array (
//           'name' => '',
//           'steps' => 
//           array (
//             0 => 
//             array (
//               'number' => 1,
//               'step' => 'For Burgers:In a pan cook turkey bacon according to directions on package.Once bacon is done being cooked, take the bacon out and set aside.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 42130,
//                   'name' => 'turkey bacon',
//                   'localizedName' => 'turkey bacon',
//                   'image' => 'bacon-turkey.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 10123,
//                   'name' => 'bacon',
//                   'localizedName' => 'bacon',
//                   'image' => 'raw-bacon.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//               ),
//             ),
//             1 => 
//             array (
//               'number' => 2,
//               'step' => 'Add bell pepper and onion into same pan, cook until tender about 10 minutes.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 10211821,
//                   'name' => 'bell pepper',
//                   'localizedName' => 'bell pepper',
//                   'image' => 'bell-pepper-orange.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404645,
//                   'name' => 'frying pan',
//                   'localizedName' => 'frying pan',
//                   'image' => 'pan.png',
//                 ),
//               ),
//               'length' => 
//               array (
//                 'number' => 10,
//                 'unit' => 'minutes',
//               ),
//             ),
//             2 => 
//             array (
//               'number' => 3,
//               'step' => 'Add ground beef to a small bowl, add garlic powder and ground pepper, mix well.Divide the raw meat into 8 equal pieces (I used my scale to measure into 2oz each piece). Flatten out the hamburger, and place 1/2 a cheese wedge onto each piece of hamburger. Take the other pieces of the hamburger and place on top of the cheese , and squish them togther and seal the edges so the cheese doesnt ozzz out.',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 1022020,
//                   'name' => 'garlic powder',
//                   'localizedName' => 'garlic powder',
//                   'image' => 'garlic-powder.png',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 1002030,
//                   'name' => 'ground black pepper',
//                   'localizedName' => 'ground black pepper',
//                   'image' => 'pepper.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 10023572,
//                   'name' => 'ground beef',
//                   'localizedName' => 'ground beef',
//                   'image' => 'fresh-ground-beef.jpg',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 1041009,
//                   'name' => 'cheese',
//                   'localizedName' => 'cheese',
//                   'image' => 'cheddar-cheese.png',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 1065062,
//                   'name' => 'meat',
//                   'localizedName' => 'meat',
//                   'image' => 'whole-chicken.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404705,
//                   'name' => 'kitchen scale',
//                   'localizedName' => 'kitchen scale',
//                   'image' => 'kitchen-scale.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 404783,
//                   'name' => 'bowl',
//                   'localizedName' => 'bowl',
//                   'image' => 'bowl.jpg',
//                 ),
//               ),
//             ),
//             3 => 
//             array (
//               'number' => 4,
//               'step' => 'Place on grill and cook until done. About 5 minutes per side.',
//               'ingredients' => 
//               array (
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404706,
//                   'name' => 'grill',
//                   'localizedName' => 'grill',
//                   'image' => 'grill.jpg',
//                 ),
//               ),
//               'length' => 
//               array (
//                 'number' => 5,
//                 'unit' => 'minutes',
//               ),
//             ),
//             4 => 
//             array (
//               'number' => 5,
//               'step' => 'Place burger on buns, top the burgers with bacon, peppers & onions and sauce.For Spicy Chipotle Aiolo Sauce:In a small bowl place all the ingredients together and wisk together until combined.Makes 3/4 cups or 12 Tablespoons',
//               'ingredients' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 98839,
//                   'name' => 'chipotle chiles',
//                   'localizedName' => 'chipotle chiles',
//                   'image' => 'chile-chipotle.jpg',
//                 ),
//                 1 => 
//                 array (
//                   'id' => 10111333,
//                   'name' => 'peppers',
//                   'localizedName' => 'peppers',
//                   'image' => 'green-pepper.jpg',
//                 ),
//                 2 => 
//                 array (
//                   'id' => 11282,
//                   'name' => 'onion',
//                   'localizedName' => 'onion',
//                   'image' => 'brown-onion.png',
//                 ),
//                 3 => 
//                 array (
//                   'id' => 10123,
//                   'name' => 'bacon',
//                   'localizedName' => 'bacon',
//                   'image' => 'raw-bacon.png',
//                 ),
//                 4 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'sauce',
//                   'localizedName' => 'sauce',
//                   'image' => '',
//                 ),
//                 5 => 
//                 array (
//                   'id' => 0,
//                   'name' => 'roll',
//                   'localizedName' => 'roll',
//                   'image' => 'dinner-yeast-rolls.jpg',
//                 ),
//               ),
//               'equipment' => 
//               array (
//                 0 => 
//                 array (
//                   'id' => 404783,
//                   'name' => 'bowl',
//                   'localizedName' => 'bowl',
//                   'image' => 'bowl.jpg',
//                 ),
//               ),
//             ),
//           ),
//         ),
//       ),
//       'spoonacularSourceUrl' => 'https://spoonacular.com/cheesy-bacon-burger-with-spicy-chipotle-aiolo-sauce-637631',
//     ),
//   ),
//   'offset' => 0,
//   'number' => 10,
//   'totalResults' => 53,
// );

//$array = $output;
 //son_encode($array);


/////////////////////////////////////////////////////////////End of testing//////////////////////////////////////////////////////////////


//Converting json string into an array
$array = json_decode($output, true);

//Checking to see if there are results.
if(!isset($array))
{
  echo "No results found";
  exit();
}

//echo $array['array'];


  //Looping over each recipe
  for ($index = 0; $index < $array['number']; $index++) {


    echo "<h2>" . $array['results'][$index]['title'] . " " . $array['results'][$index]['readyInMinutes']  . " minutes" . "</h2>";
    echo  "<img src=". $array['results'][$index]['image'] . ">";
    echo "<p>" . $array['results'][$index ]['summary'] . "</p>";
    echo "Page source: ".  "<a href=" .  $array['results'][$index ]['sourceUrl'] . ">".  $array['results'][$index ]['sourceUrl'] . "</a>";
    

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

                     echo "<h3>" . "Ingredients" . "</h3>";
                     $isIngredientsPrintedOnce = true;
                   


              }
               echo "<p>" . $array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['ingredients'][$ingredientsIndex]['name']  . "</p>";
                echo "\n";

          
         }
        
          //Looping over equipment
         $isEquipmentPrintedOnce = false;
         for( $equipmentIndex = 0; $equipmentIndex < count($array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['equipment']); $equipmentIndex++)
         {

           //Preventing the computer from printing more than one equipment heading per recipe
          if (isset($array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['equipment'][$equipmentIndex]['name']) && $isEquipmentPrintedOnce == false)
             {
               echo "<h3>" . "Equipment" . "</h3>";
                $isEquipmentPrintedOnce = true;

                echo "<p>" . $array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['equipment'][$equipmentIndex]['name']  . "</p>";
             }

            



           echo "\n"; 
         }
        //Preventing the computer from printing more than one instruction heading per recipe
         if (isset( $array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['step']) && $isInstructionsPrintedOnce == false)
         {
            echo "<h3>" . "Instructions" . "</h3>";
            $isInstructionsPrintedOnce = true;
         }

         echo "<p>" . $array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['number'] . ". " . $array['results'][$index]['analyzedInstructions'][$instructionIndex]['steps'][$stepsIndex]['step'] ."</p>";
           echo "\n"; 
        
        }


       


    }


    echo "\n";
}





// echo $array['results'][0]['title'];
// echo $array['results'][0]['summary'];
// echo $array['results'][0]['analyzedInstructions'][0]['steps'][0]['ingredients'][0]['name'];
// echo $array['results'][0]['analyzedInstructions'][0]['steps'][0]['equipment'][0]['name'];
// echo $array['results'][0]['analyzedInstructions'][0]['steps'][0]['step'];





?>