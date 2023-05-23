<?php
ob_start();
?>
<?php
include("includes/header.php");?>

<div class="container form">
<?php
if(isset($_POST['LOGIN']))
{
    if(checkinput($_POST['username']) && checkinput($_POST['password'])){
        $Uname = checkinput($_POST['username']);
        $Upass = checkinput($_POST['password']);
        $hashpass = sha1($Upass);
        try{
            $sql ="SELECT * FROM users WHERE username = '$Uname'";
            $stmt =  $conn->prepare($sql);
            $stmt->execute();
        }
        catch(PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user){
            if($user['password'] ==$Upass){
                $_SESSION['user'] = $user;
                echo "You are logged in";
                if ($_SESSION ['user']['chef'] == 1) {
                    header('Location: chef_dashboard.php');
                  } else {
                    header('Location: user_dashboard.php');
                  }
            } else{
                echo '<h4 style=" color:red; text-align:center;">
                your password incorrect</h4>';
            }
        } else{
            echo "you don't have account";
        }
    }else{
        die('Error: Missing or invalid input');
    }
}

?>
  <h1>Login!</h1>
  <div class="hr"></div>
  <form class="login"  method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
      <input type = "submit" id = "submit" name = "LOGIN" value="LOGIN">
  </form>
</div>
<?php
ob_end_flush();
include("includes/footer.php") 
?>