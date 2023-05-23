<?php
include('connect+functions.php');

$postId = $_GET['id_e'];

// Get the reaction counts for the post from the database
$sql = "SELECT loves, hahas, dislikes FROM experience WHERE id_e = :postId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
$stmt->execute();
$counts = $stmt->fetch(PDO::FETCH_ASSOC);

// Generate HTML for the reaction buttons and counts
$html = '';
$html .= '<button class="reaction-button" data-reaction="love"><i class="fa fa-heart"></i></button><span id="love-count" class="count">' . $counts['loves'] . '</span>';
$html .= '<button class="reaction-button" data-reaction="haha"><i class="fa fa-laugh-squint"></i></button><span id="haha-count" class="count">' . $counts['hahas'] . '</span>';
$html .= '<button class="reaction-button" data-reaction="dislike"><i class="fa fa-thumbs-down"></i></button><span id="dislike-count" class="count">' . $counts['dislikes'] . '</span>';

// Return the HTML as a response
echo $html;