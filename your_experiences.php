<?php 
include("includes/header.php");

$id_user=$_SESSION['user']['id'];
$sql ="SELECT * FROM `experience` WHERE userid = '$id_user'";
$stmt =  $conn->prepare($sql);
$stmt->execute();
$your_e = $stmt->fetchAll();
if($your_e){
    echo '<div class="container post-con">';
    echo "<h2 style=\"color: #454545; text-align: center\">";
    echo "<h2>Welcome ";
    echo $_SESSION['user']['username'];
    echo "</h2>
    <img style=\" width: 50%;height: 50%;\" src=\"gif/wel.gif\" alt=\"welcoming-gif\">
    <p style=\"text-align: center; color:#454545; font-size: 30px; text-shadow: 1px 1px gray; font-weight:bold; padding:1.5%; border-radius:5%;\">We are really happy with your interaction with us!</p>
    <h1>YOUR EXPERIENCE</h1>";
    foreach($your_e as $experience => $x) {
        echo'
    <div class="post">
    <h1class="username">'.$your_e[$experience]["username"].'</h1>
    <hr>
      <h2>'.$your_e[$experience]["title_post"].'</h2>
      <p>'.$your_e[$experience]["content"].'</p>
      <img style="width:300px; height:300px" src="photos/'.$your_e[$experience]["photo"]. '">
    </div>';
     }
     echo'</div>';
}else{
    Echo"<div class=\"container post-con\"><h1>YOU SHOULD SHARE EXPERIENCE FIRST!</h1><button class=\"submit\"><a href=\"index.php\">Back home</a></button>
    </div>";
}
?>
<?php
include("includes/footer.php");
?>