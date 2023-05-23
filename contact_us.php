<?php

include("includes/header.php");
if(isset($_POST['submit'])) {

  $user_name = $_POST['user_name'];
  $email =$_POST['email'];
  $subject=$_POST['subject'];

  if(empty($user_name) ||  empty($email) || empty($subject)) {
      echo "Please fill in all the fields.";
  }
  else{
  $insert=$conn->prepare("insert into  contactus (user_name,email,massage) values ('$user_name','$email','$subject')");
  $insert->execute();}
  }

 
?>

<div class="container form">
<h1>Contact us!</h1>
<div class="hr"></div>
<form class="contact_us" method="post">
   <label for="user_name">Username</label>
    <input type="text" id="user_name" name="user_name" placeholder="Your name..">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Your email..">
    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <button class="submit" type="submit" name="submit">Submit</button>
    <br>
    <button class="submit" type="submit" name="submit"><a href="adminFORM.php">see feedbacks</a></button>

  </form>
</div>
<?php
include("includes/footer.php") 
?>



