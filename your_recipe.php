<?php
include("includes/header.php");?>
<?php check_login();?>
<div class="container your-recipe">
<h2 style="text-align:center">Your Recipes!</h2>
  <br>
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
td img{
  width: 200px;
  height: 150px;
}
tr:hover {
  background-color: #ddd;
}

</style>
<?php
$sql = "SELECT * FROM recipe";
$stmt = $conn->prepare($sql);

// Execute the SQL statement
if($stmt->execute()) {
  // Fetch the results as an associative array
  $recipes = $stmt->fetchAll();
 //$id_chef = $recipe['id_chef'];
 //$chef_id = $_SESSION['user']['id'];

  // Output the data in a table
  echo "<table>";
  echo "<tr><th>Recipe Name</th><th>Ingredients</th><th>Photo</th></tr>";
  //while($id_chef==$chef_id){
  foreach($recipes as $recipe) {
    $id_chef = $recipe['id_chef'];
    $chef_id = $_SESSION['user']['id'];
    if($id_chef==$chef_id){
    echo "<tr>";
    echo "<td>" . $recipe['recipe_name'] . "</td>";
    echo "<td>" . $recipe['ingredients'] . "</td>";
    echo "<td><img src='photos/" . $recipe['photo'] . "'></td>"; // Assumes the photos are stored in a folder named "photos"
    echo "</tr>";}
  }
  echo "</table>";
} 
//}
else {
  echo "Error fetching recipes";
}

// Close the database connection
$pdo = null;?>
<button class="submit"><a href="index.php">Back home</a></button>
<button class="submit"><a href="profile.php">Back to profile</a></button>

</div>
<?php
include("includes/footer.php");
?>
