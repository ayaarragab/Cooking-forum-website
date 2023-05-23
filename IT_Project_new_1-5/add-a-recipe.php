<?php ob_start();
include("includes/header.php");
check_login();

$id_chef=$_SESSION['user']['id'];
$title = "add to recipes";
if (isset($_POST['Submit_Recipe'])) {
    $recipe_name = $_POST['recipe_name'];
    $ingredients = $_POST['ingredients'];
    $image = $_FILES['r_photo'];

    if (empty($recipe_name) || empty($ingredients) || empty($image) || empty($id_chef)) {
      $massege =  'please fill all the required info';
    } else {
        // Use prepared statement to prevent SQL injection
        $insert = "INSERT INTO recipe(recipe_name, ingredients, photo, id_chef) VALUES(:recipe_name, :ingredients, :photo, :id_chef)";
        $stmt = $conn->prepare($insert);
        $stmt->execute(['recipe_name' => $recipe_name, 'ingredients' => $ingredients,'photo' =>$image['name'],'id_chef' => $id_chef]);
        if ($stmt->rowCount() > 0) {
            $massege = 'new product added successfully';
        } else {
          $massege = 'could not add the product';
        }
    }
}



?>

<div class="container add-a-recipe">
<form method="POST" class="add-a-recipe-form" enctype="multipart/form-data">

  <label for="recipe_name">Recipe Name:</label>
  <input type="text"  name="recipe_name" required>

  <label for="ingredients">Ingredients:</label>
  <textarea name="ingredients" required></textarea>

  <label for="r_photo">Photo:</label>
  <input type="file"  name="r_photo" accept="image/jpeg" required>

  <input type="submit" class="submit" name="Submit_Recipe" value="Submit_Recipe">
</form>
</div>

<?php include("includes/footer.php");
 ob_end_flush();  ?>