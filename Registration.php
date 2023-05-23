<?php 
include("includes/header.php");?>
<div class="container form">
  <style>
    .error {color: #FF0000;}
  </style>
<?php
$nameErr = $emailErr = $passErr = $whatsErr = $ageErr = $chiefErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "* Name is required";
  } else {
    $name =  checkinput($_POST['name']);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "* Only letters and white space allowed";
    }
    else {
      $nameErr = '';
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "* Email is required";
  } else {
    $email = checkinput($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "* Invalid email format";
    }else{
      $emailErr = '';
    }
  }
  
  if (empty($_POST["password"])) {
    $passErr = "* Password is required";
  }elseif(strlen($_POST["password"])<8){
    $passErr = "* It is too short";
  } else {
    $password = checkinput($_POST['password']);
    $hashp = password_hash($password,PASSWORD_DEFAULT);
    if (!password_verify($password,$hashp)) {
      $passErr = "* Invalid password";
    }else{
      $passErr = '';
    }
  }

  if (empty($_POST["whatsapp"])) {
    $whatsErr = "* Whatsapp is required";
  }elseif(strlen($_POST["whatsapp"])<11){
    $whatsErr = "* It is too short";
  }elseif(strlen($_POST["whatsapp"])>12){
    $whatsErr = "* It is too long";
  }else {
    $whats = checkinput($_POST['whatsapp']);
   
  }


  if (empty($_POST["age"])) {
    $ageErr = "* Age is required";
  }
  else{
    $ageErr = '';
  }
  if (empty($_POST["chief"])) {
    $chiefErr = "* \"Are you a chef?\" is required";
  }
  else{
    $cheifErr = '';
  }

}
?>
<?php
if(isset($_POST["submit"])&& empty($nameErr) && empty($emailErr) && empty($passErr) && empty($whatsErr) && empty($ageErr) && empty($chiefErr)){
    if(checkinput($_POST['name']) && checkinput($_POST['email']) && checkinput($_POST['password']) && checkinput($_POST['whatsapp']) && checkinput($_POST['age']) && checkinput($_POST['date'])){
        $iname =  checkinput($_POST['name']);
        $iemail = checkinput($_POST['email']);
        $pass = checkinput($_POST['password']);
        $whats_num = checkinput($_POST['whatsapp']);
        $age = checkinput($_POST['age']);
        $date = checkinput($_POST['date']);
        if (isset($_POST['chief']) && $_POST['chief'] === 'yes') {
          $chef = 1;
        } else {
          $chef = 0;
        }
        
        try{
          $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
          $stmt->execute([$iemail]);
          $resultemail = $stmt->rowCount();

          $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
          $stmt->execute([$iname]);
          $resultname = $stmt->rowCount();
        }
        catch(PDOException $e) {
          die("Error: " . $e->getMessage());
        }
        if($resultemail > 0 && $resultname > 0){
            die("<h1 >This email and username already exist</h1>");
        }
        elseif($resultemail > 0){
            die("<h1 >This email already exists</h1>");
        }
        elseif($resultname > 0){
            die("<h1>This username already exists</h1>");
        }
        else{
              try {
            $sql = "INSERT INTO `users` (`username`, `email`, `password`, `what'snum`, `age`, `dateofbirth`, `chef`)VALUES('$iname', '$iemail', '$pass','$whats_num','$age','$date','$chef')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $id = $conn->lastInsertId();
                echo '<h4 style=" color:red; text-align:center;">
                Account created successfully</h4>';
                echo '<h4 style=" color:red; text-align:center;">
                Your ID is</h4>';
                echo '<h4 style=" color:red; text-align:center;">';
                echo $id;
                echo '</h4>';
            } else{
                echo '<h4 style=" color:red; text-align:center;">
                something wrong!</h4>';
            }
          }
          catch(PDOException $e) {
            die("Error: " . $e->getMessage());
          }
        }
    }  
    else{
        die('Error: Missing or invalid input');
    }
}
else {
  echo '<h4 style=" color:red; text-align:center;">
   Waiting for submission</h4>';
}
?>
<h1>Register!</h1>
<div class="hr"></div>
<form class="registration" method="post">
  <div class="group-form">
    <label for="name" class="margin-bottom">Username:</label>
    <input type="text" id="name" name="name" class="margin-bottom" placeholder="Enter your username">
    <span class="error"><?php echo $nameErr;?></span><br>

    <label for="email" class="margin-bottom">Email:</label>
    <input type="email" id="email" name="email" class="margin-bottom" placeholder="Enter your email">
    <span class="error"> <?php echo $emailErr;?></span><br>

    <label for="password" class="margin-bottom">Password:</label>
    <input type="password" id="password" name="password" class="margin-bottom" placeholder="Enter your password">
    <span class="error"> <?php echo $passErr;?></span><br>

    <label for="whatsapp" class="margin-bottom">WhatsApp Number:</label>
    <input type="number" id="whatsapp" name="whatsapp" class="margin-bottom" placeholder="Enter your WhatsApp number">
    <span class="error"> <?php echo $whatsErr;?></span><br>
  </div>
  <div class="group-form" class="margin-bottom"><br>
    <label for="age" class="margin-bottom">Age:</label>
    <input type="number" id="age" name="age" class="margin-bottom" placeholder="Enter your age">
    <span class="error"><?php echo $ageErr;?></span><br><br>

    <label for="date" class="margin-bottom">Date of Birth:</label>
    <input type="date" id="date" name="date" class="margin-bottom" placeholder="Enter your date of birth"><br>
    <input type="submit" id="submit" name="submit" value="Sign Up">
  </div>
  <div class="group-form">
    <label class="margin-bottom">Are you a chef?</label>
    <input type="radio" id="chief-yes" name="chief" value="yes" >
    <label for="chief-yes" class="no-margin-bottom">Yes</label>
    <input type="radio" id="chief-no" name="chief" value="no" >
    <label for="chief-no" class="no-margin-bottom">No</label>
    <span class="error"><?php echo $chiefErr;?></span><br><br>
  </div>
</form>
</div>
<?php include("includes/footer.php") ?>   