<?php ob_start();
include("includes/header.php");

check_login(); 
if(isset($_POST['submit'])){
$type=$_POST['q3-options'];
$_SESSION['option']=$type;
header("location:Enroll-a-course.php");
}
?>
<div class="container form" style="display:flex;
flex-direction:column; align-items:center;">
<h1>Search for the course you want! </h1>
	<div class="hr"></div>
	<img style="display:block;
        width:20%;border-radius:50%"  src="gif/76cb0a1cc56e021b96277e6028764240.gif"></img>
<form method="post" action="" class="search-course">
		<label for="q3-options">What are you want to learn?</label>
		<select name="q3-options" id="q3-options">
			<option value="healthy_food">Healthy food</option>
			<option value="dessert">Dessert</option>
			<option value="popular_recipe">Popular recipe</option>
		</select>

		<input class="submit" type="submit" name="submit" value="OK">
	</form>
</div>
<?php include("includes/footer.php");
 ob_end_flush(); ?>   