<?php
ob_start();
 include("includes/header.php");?>
<div class="container form">
	<?php
check_login(); 
if(isset($_POST['submit'])){
	$userid = $_SESSION['user']['id'];
	$sql = $conn->prepare("SELECT * FROM cheifs WHERE userid = $userid");
	$sql->execute();
	$count = $sql->rowCount();
	if($count > 0){
		echo '<h2 style=" color:red; text-align:center;"> YOU JOINED BEFORE! </h2>';
	}
	else{
	$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
	$nation=filter_var($_POST['nationalitiy'],FILTER_SANITIZE_STRING);
	$about=filter_var($_POST['about_you'],FILTER_SANITIZE_STRING);
	$choose=$_POST['q1-options'];
	$error=[];
	
	if(empty($nation)){
        $error=1;
    }
    if(empty($about)){
        $error=2;
	}
	if(empty($error)){
		$stm="INSERT INTO cheifs (name,nationalitiy,qualification,about_you,userid) VALUES ('$name','$nation','$choose','$about','$userid')";
		$conn-> prepare ($stm)-> execute();	
		$_POST['name']='';
		$_POST['nationalitiy']='';
        $_POST['about_you']='';
		header('location:our-cheifs.php');

	}
	$_SESSION['cheif']=[
		"name"=> $name,
		"nationalitiy"=>$nation,
		"about_you"=>$about,
		"specialization"=>$choose,
	];
}
}


?>
	<h1>Join us!</h1>
<form method="post" action="" class="apply-as-a-chief">
<label for="name">What is your name?</label>
	<input type="name"  value="<?php if(isset($_POST['name'])){ echo $_POST['name'];}?>"name="name" placeholder="Enter your full name">
	
	<label for="nationalitiy">What is your nationalitiy?</label>
	<input type="nationalitiy"  value="<?php if(isset($_POST['nationality'])){ echo $_POST['nationality'];}?>"name="nationalitiy" placeholder="Enter your nationality">
	
	<label for="about_you">What about you?</label>
	<input type="about_you" value="<?php if(isset($_POST['about_you'])){ echo $_POST['about_you'];}?>"name="about_you" placeholder="Enter short text about you">
		

	<label for="q1-options">What's your chef qualification?</label>
		<select name="q1-options" id="q1-options">
      <option value="I too a course">I took a course</option>
			<option value="I studied cooking in college">I studied cooking in college</option>
			<option value="I have a youtube channel">I have a youtube channel</option>

		</select><br>

		<input class="submit" name="submit" type="submit" value="Send">
	</form>
</div>
    <?php include("includes/footer.php");
	 ob_end_flush();  ?>