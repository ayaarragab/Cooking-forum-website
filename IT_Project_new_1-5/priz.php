<?php include("includes/header.php"); 
?>
<div class="container Raffle-for-prizes">
  <form id="quiz-form" action="priz.php" method="GET" class="quiz-itself-form">
    <div id="remove-div" class="remove hidden" style="display: flex; flex-direction: column;">
      <label for="number">Enter Number from 1 to 10:</label>
      <input type="int" style="width: 100%;" id="number" name="number"><br>
      <input type="submit" value="submit" name="submit" class="hide-on-submit remove"><br>
    </div>
  </form><br>

  <script>
    // Get the user_id parameter from the URL
    const params = new URLSearchParams(window.location.search);
    const number = params.get('number');

    // If number is set, hide the remove class
    if (number !== null) {
      const removeDiv = document.getElementById('remove-div');
      removeDiv.style.display = 'none';
    }
  </script>

  <?php
    if (isset($_GET["submit"]) && (isset($_GET["number"]))) {
      if ($_SESSION['user']['competition']==0) {
      $num = $_GET['number'];
      $_SESSION['user']['competition'] = 1;
      $iduser = $_SESSION['user']['id'];
      $username = $_SESSION['user']['username'];
      $stmt = $conn->prepare("UPDATE `users` SET `competition`='1' WHERE id =$iduser ");
      $stmt->execute(); //users

      $stmt = $conn->prepare("SELECT prize, photo FROM prize WHERE num =$num");
      $stmt->execute(); //prize
      $count = $stmt->rowCount();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($count > 0) {
        $prize_name = $row['prize'];
        $prize_photo = $row['photo'];

        echo "
          <h2 class=\"prize\">Congratulations, you have won a/an $prize_name.</h2>
        ";
        echo "<style>
        .prize {
          font-size: 32px;
          font-weight: bold;
          color: #FFC107;
          text-align: center;
          text-shadow: 2px 2px 4px #000000;
          margin-top: 20px;
        }
      </style>";

        echo "<img style=\"display: block; width: 30%; height: 30%;\" src='photos/" .  $prize_photo . "' alt='Prize Image'>";
        echo "<p><h1>Please come to the nearest postal office to you to take your prize.</h1></p>
        ";
        $stmt = $conn->prepare("INSERT INTO `winners`( `username`, `id_user`, `prize`,`photo_p`) VALUES ('$username ','$iduser','$prize_name','$prize_photo')");
        $stmt->execute(); // winner 
        if ($stmt->rowCount() > 0) {
          echo "<h1>Your data has been submitted correctly to the winners page. Take a look? <a style=\"text-decoration:none; color: #fb5d33;\" href='winner.php'>Click here</a></h1>";
        }
      } else {
        echo "<h1>Please enter a valid number.</h1>";}
      }else{
        echo "<h1>Sorry, you have entered the competition already!</h1>";
      }
    }
    
  ?>
            <button class='submit'><a href='index.php'>Back to home page</a></button>

</div>

<?php include("includes/footer.php"); ?>