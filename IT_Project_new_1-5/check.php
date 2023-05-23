<?php
if (isset($_SESSION['user']['id'])) {
    $user_id = $_SESSION['user']['id'];
    $query = $conn->prepare("SELECT chef FROM users WHERE id = :id");
    $query->execute(array(":id" => $user_id));
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if ($row['chef'] == 1) {
      header('Location: chef_dashboard.php');
    } else {
      header('Location: user_dashboard.php');
    }
} 


?>