<?php 
include("includes/header.php");
session_unset(); // unset all session variables
session_destroy(); // delete the session

if($_SESSION){
    echo'<h4 style=" color:red; text-align:center;">
    Error!</h4>';
} else{
    header('Location: index.php');
    
}
include("includes/footer.php");
?>