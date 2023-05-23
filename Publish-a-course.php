<?php  ob_start(); include("includes/header.php");?>
<?php
 check_login();?>
<div class="container publish-a-course">
  <?php 
  if(isset($_FILES['video'])) {
    // Get file information
    $type=$_POST['q2-options'];
    $file_name = $_FILES['video']['name'];
    $file_tmp = $_FILES['video']['tmp_name'];
    $name=$_SESSION['user']["username"];
    $description=$_POST['description'];
    $data="$type"."_description";
    $stm="INSERT INTO $data (name,description) VALUES ('$name','$description')";
		$conn-> prepare ($stm)-> execute();	
    
    // Check if file is a video
    $file_type = mime_content_type($file_tmp);
    if(!strstr($file_type, 'video/')) {
      die("File is not a video.");
    }
    
    // Move uploaded file to a permanent location
    $upload_dir = "C:/xampp/htdocs/IT_Project_new_1-5/videos/";
    $file_path = $upload_dir . $file_name;
    move_uploaded_file($file_tmp, $file_path);
    
    // Insert video information into database using prepared statement
    $sql = "INSERT INTO $type (name, path) VALUES (:name, :path)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $file_name);
    $stmt->bindParam(':path', $file_path);
    
    if($stmt->execute()) {
      echo "<h6 style=\"text-align:center; color:red;\">File uploaded successfully.</h6>";
    } else {
      echo "Error: " . $stmt->errorInfo();
    }
  } else {
    echo "<h6 style=\"text-align:center; color:red;\">No file selected.</h6>";
  }
  
  // Close database connection
  $conn = null;
  ?>
<form method="post" enctype="multipart/form-data">
<h2>Share with us your useful courses!</h2>
<div class="hr"></div>
  <label for="q2-options">What's the type of food?</label><br>
		<select name="q2-options" id="q2-options">
      <option value="dessert">Dessert</option>
			<option value="healthy_food">Healthy food</option>
			<option value="popular_recipe">Popular food</option>
		</select><br>
  <label for="text">Course description:</label>
  <input type="text" id="text" name="description" required>

  <label for="video">Course Video Content:</label>
  <input type="file" id="video" name="video" required>
  <small>Note: The name of the video must be named with the name of the recipe !!</small>
  <input class="submit" type="submit" value="Send">
</form>
</div>
<?php include("includes/footer.php");
 ob_end_flush();  ?>