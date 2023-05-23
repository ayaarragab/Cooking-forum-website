<?php 
include('connect+functions.php');?>
<?PHP
// if (isset($_POST['reaction']) && isset($_POST['id_e']) && isset($_SESSION['user_id'])) {

//     $reaction = $_POST['reaction'];
//     $postId = $_POST['id_e'];
//     $userId = $_SESSION['user_id'];

//     // Check if the user has already reacted to the post
//     $sql = "SELECT reaction FROM user_reactions WHERE post_id = :postId AND user_id = :userId";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
//     $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
//     $stmt->execute();
//     $previousreaction = $stmt->fetchColumn();

//     // If the user has already reacted to the post...
//     if ($postId == $_POST['id_e'] && $userId == $_SESSION['user_id']) {

//         if ($previousreaction){
//             // ...and the reaction is the same as before, delete the previous reaction
//             if ($previousreaction === $reaction) {
//                 $sql = "UPDATE user_reactions SET reaction = NULL WHERE post_id = :postId AND user_id = :userId";
//                 $stmt = $conn->prepare($sql);
//                 $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
//                 $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
//                 $stmt->execute();
//             }
//             // ...and the reaction is different, update the previous reaction
//             else {
//                 $sql = "UPDATE user_reactions SET reaction = :reaction WHERE post_id = :postId AND user_id = :userId";
//                 $stmt = $conn->prepare($sql);
//                 $stmt->bindParam(':reaction', $reaction, PDO::PARAM_STR);
//                 $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
//                 $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
//                 $stmt->execute();
//             }
//         }
//         // If the user has not reacted to the post, insert the new reaction
//         else {
//             $sql = "INSERT INTO user_reactions (post_id, user_id, reaction) VALUES (:postId, :userId, :reaction)";
//             $stmt = $conn->prepare($sql);
//             $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
//             $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
//             $stmt->bindParam(':reaction', $reaction, PDO::PARAM_STR);
//             $stmt->execute();
//         }
//     }else {
//         echo "Handle the case where the necessary array keys are not set";
//     }
    // Update the reaction count in the database
   $reaction = $_POST['reaction'];
   $postId = $_POST['id_e'];
//     $userId = $_SESSION['user_id'];
    $sql = "UPDATE experience SET ";
    switch ($reaction) {
        case 'love':
            $column = "loves";
            break;
        case 'haha':
            $column = "hahas";
            break;
        case 'dislike':
            $column = "dislikes";
            break;
    }
    $sql .= $column . " = " . $column . " + 1, total_reacts = loves + hahas + dislikes WHERE id_e = :postId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
    $stmt->execute();

    // Get the updated reaction counts from the database
    $sql = "SELECT loves, hahas, dislikes, total_reacts FROM experience WHERE id_e = :postId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
    $stmt->execute();
    $counts = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the updated counts as a JSON object
    header('Content-Type: application/json');
    echo json_encode($counts);
?>