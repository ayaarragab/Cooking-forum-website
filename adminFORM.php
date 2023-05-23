<?php
include("includes/header.php") 
?>
<div class="container form">

<?php
if(isset($_POST['submit'])) {

    $user_name = $_POST['user_name'];
    $passward =$_POST['passward'];

   $sql =$conn->prepare("SELECT * FROM admin_data");
   $result = $sql->execute();
   
   // Check if the query succeeded
   if ($sql->rowCount() > 0) {
       // Output data in a table
       while($row =$sql->fetch(PDO::FETCH_ASSOC)) {
        if($user_name==$row["user_name"] && $passward==$row["passward"] ){
            echo "hi admin are you ready to see feedbacks..";
            header('Location: feedbacks.php'); 
            exit();
        }
        else{
            echo "<h4 style=\"text-align:center\">sorry try agin..</h4>";  
        }
       
       }
    
   } else {
       echo "<h2 style=\"text-align:center\">0 results</h2>";
   }}
?>
<h1>CHECK IF YOU ARE THE ADMIN!</h1>
<div class="hr"></div>
<form class="contact_us" method="post">
   <label for="user_name">Username</label>
    <input type="text" id="user_name" name="user_name" placeholder="Your name..">
    <label for="passward">passward</label>
    <input type="password" name="passward" id="passward" placeholder="Your passward..">

    <button class="submit" type="submit" name="submit">Submit</button>
    <br>
</form>
</div>
    <?php
       include("includes/footer.php") ?>
