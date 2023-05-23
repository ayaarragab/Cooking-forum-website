<?php 
include("includes/header.php");?>
<div class="container saved-recipe">
  <h1>Your saved recipes</h1>
  <div class="hr"></div>
  <br>
  <?php 
// Check if the user is logged in
check_login();

// Retrieve the ID of the logged-in user
$id_user = $_SESSION['user']['id'];

// Query the "saved" table to retrieve the saved recipes for the user
$sql_saved = "SELECT * FROM saved WHERE id_user = :id_user";
$stmt_saved = $conn->prepare($sql_saved);
$stmt_saved->execute(['id_user' => $id_user]);

// Fetch the saved recipes as an associative array
$saved_recipes = $stmt_saved->fetchAll();

// If the user has no saved recipes, display a message and exit
if (count($saved_recipes) == 0) {
  echo '<h2 style="text-align: center;">You have not saved any recipes yet</h2><button class="submit"><a href="index.php">Back home</a></button>
  </div>';
  include("includes/footer.php");
  exit();
}

// Query the "recipe" table to retrieve the details of each saved recipe
$sql_recipe = "SELECT * FROM recipe WHERE id_r = :id_r";
$stmt_recipe = $conn->prepare($sql_recipe);

// Output the saved recipes and their details in a table
echo "<table>";
echo "<tr><th>Recipe Name</th><th>Ingredients</th><th>Photo</th></tr>";
foreach ($saved_recipes as $saved_recipe) {
  // Retrieve the details of the saved recipe from the "recipe" table
  $stmt_recipe->execute(['id_r' => $saved_recipe['id_r']]);
  $recipe = $stmt_recipe->fetch();

  // Output the details of the saved recipe in a table row
  echo "<tr>";
  echo "<td>" . $recipe['recipe_name'] . "</td>";
  echo "<td>" . $recipe['ingredients'] . "</td>";
  echo "<td><img style=\"  display:flex; flex-direction:column; align-items:center;\"><img style=\"  display: block;
  width: 250px;
  height: 180px;
  \" src='photos/" . $recipe['photo'] . "'></td>";
  echo "</tr>";
}
echo "</table><button class=\"submit\"><a href=\"index.php\">Back home</a></button>
";

// Close the database connection
$pdo = null;?>
<style>
table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

th, td {
  text-align: center;
  padding: 8px;
}

th {
  background-color: #fb5d33 ;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}
</style>
</div>
<?php
include("includes/footer.php"); ?>