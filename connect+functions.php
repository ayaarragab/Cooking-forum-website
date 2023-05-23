<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "project_it";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
function checkinput($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function check_login()
{
  if(!isset($_SESSION['user']['id']))
    return header('Location: login.php');
}
?>