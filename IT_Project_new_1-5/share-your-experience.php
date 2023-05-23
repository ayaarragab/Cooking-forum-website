<?php ob_start();
include("includes/header.php");?>
<style>.reactions{
  display: flex;
  flex-direction: row;
}
.reactions button{
  margin-left:5px;
  cursor: pointer;
  background-color: transparent;
  border: none;
} 
.reactions button:nth-of-type(1) svg path{
  color: red;
}
.reactions button:nth-of-type(4) svg path{
  color:#555;
}
.reactions button:nth-of-type(2) svg path{
  color: rgb(255, 186, 113);
}
.reactions button:nth-of-type(3) svg path{
  color: rgb(187, 82, 21);
}</style>
<?php
check_login();
$id_user=$_SESSION['user']['id'];
$username_e=$_SESSION['user']['username'];
if (isset($_POST['post'])) {
    $title_e = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['e_photo'];
    if (empty($title_e) || empty($content) || empty($image)) {
      $massege =  'please fill all the required info';
    } else {
        $insert = $conn->prepare("INSERT INTO `experience`(`title_post`, `content`, `photo`, `userid`, `username`) VALUES(:title_e, :content, :photo, :id_user, :username_e)");
        $insert->bindParam(':title_e', $title_e);
        $insert->bindParam(':content', $content);
        $insert->bindParam(':photo', $image['name']);
        $insert->bindParam(':id_user', $id_user);
        $insert->bindParam(':username_e', $username_e);
        $insert->execute();
        if ($insert->rowCount() > 0) {
            $massege = 'Your experience added successfully';
            header('Location: share-your-experience.php');
            exit();
        } else {
          $massege = 'could not add Your experience';
        }
    }
}
?>
<div class="container share-your-experience">
<h2>Share your experience with us</h2>
<div class="hr"></div>
<div class="if-you-want-to-post">
<button class="share-a-post-now" id="post-form-container" onclick="hidePostForm()">share a post now</button>
  <div class="div-share-your-experience">
<form method="post" class="share-your-experience-form " enctype="multipart/form-data">
  <label for="title">Title:</label>
  <input type="text" id="title" name="title">
  <label for="content">Content:</label>
  <textarea id="content" name="content"></textarea>
  <label for="r_photo">Choose an image:</label>
  <!-- image -->
  <input type="file"  name="e_photo" accept="image/jpeg" required>
  <input type="submit" style="width: 100px; font-size: larger;" class="submit" id="post" name="post" value="POST">
  <button class="submit discard" style="width: 100px;" type="submit"><a href="share-your-experience.php">Discard</a></button>
  </form>
</div>
</div>
</div>
<?php
$sql = "SELECT * FROM `experience`";
$stmt = $conn->prepare($sql);
if($stmt->execute()) {
  $experiences = $stmt->fetchAll();
  foreach($experiences as $experience => $x) {
    echo '<div class="container post-con">
    <div class="post" data-id=';
    echo $experiences[$experience]["id_e"].">";
    echo '<h1class=\"username\">'.$experiences[$experience]["username"].'</h1>
<hr>
  <h2>'.$experiences [$experience]["title_post"].'</h2>
  <p>'.$experiences[$experience]["content"].'</p>
  <img style="width:300px; height:300px" src="photos/'.$experiences[$experience]["photo"]. '">
  <hr>  
    <div class="reactions">
      <button class="reaction-button" data-reaction="love"><i class="fa fa-heart"></i></button><span id="love-count" class="count">'.$experiences[$experience]["loves"];
      echo "</span>";
      echo "<button class=\"reaction-button\" data-reaction=\"haha\"><i class=\"fa fa-laugh-squint\"></i></button><span id=\"haha-count\" class=\"count\">".$experiences[$experience]["hahas"];
      echo "</span>";
      echo"<button class=\"reaction-button\" data-reaction=\"dislike\"><i class=\"fa fa-thumbs-down\"></i></button><span id=\"dislike-count\" class=\"count\">".$experiences[$experience]["dislikes"];
      echo "</span>";
      echo'</div>
</div></div>';
 }
} else {
  echo "Error fetching experiences";
}
$conn = null;
include("includes/footer.php");

?>
<script>// Add an event listener to the reaction buttons
var reactionButtons = document.querySelectorAll('.reaction-button');
for (var i = 0; i < reactionButtons.length; i++) {
  reactionButtons[i].addEventListener('click', function(event) {
    var reaction = this.getAttribute('data-reaction');
    var postId = this.closest('.post').getAttribute('data-id');
    var countElement = this.nextElementSibling;
    var reactionsDiv = this.closest('.post').querySelector('.reactions');

    // Send an AJAX request to store the reaction
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'store_reaction.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Update the reaction count
        var counts = JSON.parse(xhr.responseText);
        countElement.textContent = counts[reaction];

        // Reload the reactions div
        var xhr2 = new XMLHttpRequest();
        xhr2.open('GET', 'get_reactions.php?id_e=' + encodeURIComponent(postId));
        xhr2.onreadystatechange = function() {
          if (xhr2.readyState === 4 && xhr2.status === 200) {
            // Replace the content of the reactions div with the new content
            reactionsDiv.innerHTML = xhr2.responseText;
          }
        };
        xhr2.send();
      }
    };
    xhr.send('reaction=' + encodeURIComponent(reaction) + '&id_e=' + encodeURIComponent(postId));
  });
}</script>
<?php ob_end_flush();?>