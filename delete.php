<?php
include("includes/header.php");
$user_id = $_SESSION['user']['id'] ;
try{
    $stmt = $conn->prepare('DELETE FROM `cheifs` WHERE userid = :id');
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
}
catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
try{
    $stmt = $conn->prepare('DELETE FROM users WHERE id = :id');
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
}
catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
session_unset(); 
session_destroy();
if($_SESSION){
    echo"error";
} else{
    header('Location: index.php');
    
}
include("includes/footer.php");
?>
