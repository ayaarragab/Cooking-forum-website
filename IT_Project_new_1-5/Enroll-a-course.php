<?php
ob_start();
ini_set('display_errors',0);
include("includes/header.php");
check_login();?>
<!-- Imaginary courses tell you put the php connected with database -->
<div class="container intro">
<h1>The Importance of Cooking Courses</h1>
<div class="hr"></div>
    <p>Cooking courses are an important investment for anyone who wants to improve their culinary skills and knowledge. Whether you are an aspiring chef, a home cook, or just someone who loves to experiment in the kitchen, taking a cooking course can help you take your cooking to the next level.</p>
    <h2>Benefits of Cooking Courses:</h2>
    <p>There are many benefits to taking cooking courses, including:</p>
    <ul>
      <li>Learning new techniques and recipes</li>
      <li>Improving your cooking skills and confidence</li>
      <li>Discovering new cuisines and flavor combinations</li>
      <li>Expanding your knowledge of ingredients and cooking methods</li>
      <li>Networking and connecting with other food enthusiasts</li>
      <li>Enhancing your career opportunities in the food industry</li>
    </ul>
    <p>Whether you are looking to improve your basic cooking skills or pursue a career in the food industry, there is a cooking course out there that can help you achieve your goals.</p>
</div>
<div class="container enroll-a-course">
<h1><?php echo $_SESSION['option'];?> Course </h1>
<div class="hr"></div>
  <ul class="enroll-a-course-ul">
<?php 
$option=$_SESSION['option'];
$data="$option"."_description";
$sql = "SELECT * FROM $option";
$stmt = $conn->prepare($sql);
$stmt->execute();
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt =$conn->query("SELECT * FROM $data");


?>
<table >
        <tr>
            <th>chef name</th>
            <th>description</th>
        </tr>
<?php 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  echo "<tr><td>" .$row["name"]."</td><td>".$row["description"]."</td></tr>";
}?>
</table>
  <table >
        <tr>
            <th>Videos</th>
            <th>Recipe name</th>
        </tr>
<?php
if ($stmt->rowCount() > 0) {
foreach ($videos as $video) {
    echo "<tr><td>" . "<video controls width='250' height='200'>"."<source src='" . $video['name'] . "' type='video/mp4'>"."</video>"."</td><td>" . $video['name'] ."</td></tr>";
    
}
}
?>
</table>
<button class="submit"><a href="search-for-a-course.php">Find another course</a></button>
<button class="submit"><a href="index.php">Back home</a></button>
</div>

<?php include("includes/footer.php");
ob_end_flush(); ?>
