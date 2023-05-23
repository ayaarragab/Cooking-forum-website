<?php include("includes/header.php");?>
<div class="container recipes" style="display:flex;
flex-direction:column; align-items:center;">
  <h1 style="text-align:center">Recipes!</h1>
<?php
if(isset($_GET['save'])) {
  check_login();
  $id_user = $_SESSION['user']['id'];
  $id_r = $_GET['save'];
  // Check if the user has already saved the recipe
  $check_saved = "SELECT * FROM saved WHERE id_user = :id_user AND id_r = :id_r";
  $stmt_check = $conn->prepare($check_saved);
  $stmt_check->execute(['id_user' => $id_user, 'id_r' => $id_r]);
  if ($stmt_check->rowCount() == 0) {
    // Insert the saved recipe into the database if the user has not already saved it
    $insert = "INSERT INTO saved(id_user, id_r) VALUES(:id_user, :id_r)";
    $stmt_insert = $conn->prepare($insert);
    $stmt_insert->execute(['id_user' => $id_user, 'id_r' => $id_r]);
    if ($stmt_insert->rowCount() > 0) {
        echo '<h4>Recipe saved successfully</h4><br><br>';
    } else {
      echo 'Could not save the recipe';
    }
  } else {
    echo 'Recipe already saved';
  }
}

// Check if the user has submitted a search query
if(isset($_GET['search'])) {
  $search_query = $_GET['search'];
  // Modify the SQL query to filter the results based on the search query
  $sql = "SELECT * FROM recipe WHERE recipe_name LIKE :search_query OR ingredients LIKE :search_query";
  $stmt = $conn->prepare($sql);
  $stmt->execute(['search_query' => "%$search_query%"]);
} else {
  // Display all recipes if no search query is provided
  $sql = "SELECT * FROM recipe";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
}

// Execute the SQL statement
if($stmt->rowCount() > 0) {
  // Fetch the results as an associative array
  $recipes = $stmt->fetchAll();

  // Output the data in a table
  echo "<br><br><form method='get'>";
  echo "<input type='text' name='search' placeholder='Search for a recipe...'>";
  echo "<button type='submit'>Search</button>";
  echo "</form>";
  echo "<table>";
  echo "<tr><th>Recipe Name</th><th>Ingredients</th><th>Photo</th><th></th></tr>";
  foreach($recipes as $recipe) {
    echo "<tr>";
    echo "<td>" . $recipe['recipe_name'] . "</td>";
    echo "<td>" . $recipe['ingredients'] . "</td>";
    echo "<td style=\"  display:flex; flex-direction:column; align-items:center;\"><img style=\"  display: block;
    width: 250px;
    height: 150px;
    \" src='photos/" . $recipe['photo'] . "'><br></td>"; // Assumes the photos are stored in a folder named "photos"
    echo "<td><form method='get'><button type='submit' class=\"submit\" name='save' value='" . $recipe['id_r'] . "'>Save</button></form></td>";
    echo "</tr>";
    echo "<br>";
  }
    // echo "<button onclick=\"window.location.href='saved-recipes.html'\">Saved Recipes</button>";
  echo "</table>";
} else {
  echo "No recipes found";
} 

// Close the database connection
$pdo = null;
?>
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
include("includes/footer.php");
?>