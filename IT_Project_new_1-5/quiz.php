<?php ob_start();include("includes/header.php"); check_login(); ?>
<div class="container quiz-itself">
    <h1>Competition</h1>
    <form id="quiz-form" action="quiz.php" method="get" class="quiz-itself-form">
    <div id="remove-div" class="remove hidden" style="display: flex; flex-direction:column;">
    <img style="display:block;
    width:50%;" src="gif/701c4f418e5d1bb0b278aea50296c568.gif"></img><br>
        <label for="user_id" style="font-size:30px;" >Enter your ID:</label><br>
        <input style="width:50%;" type="text" id="user_id" name="user_id"><br>
        <input type="submit" value="Submit" class="hide-on-submit remove submit" style="width:200px;height:50px; font-size:30px; line-height:40px; display:block;">
    </div>
    </form>
    <script>
  // Get the user_id parameter from the URL
  const params = new URLSearchParams(window.location.search);
  const userId = params.get('user_id');

  // If user_id is set, hide the remove class
  if (userId !== null) {
    const removeDiv = document.getElementById('remove-div');
    removeDiv.style.display = 'none';
  }
</script>

    <?php
    
    $stmt = null; // Define $stmt before the if statement
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $min_question_id = 1;
        $max_question_id = 10;
        // Assuming $user_id which user but contains the user's id which in database
        if ($_SESSION['user']['id'] == $user_id) {
            
        
        $last_number = substr($user_id, -1);
        // check the range of questions to show
        if ($last_number >= 0 && $last_number <= 3) {
            $min_question_id = 1;
            $max_question_id = $min_question_id +3;
           
        } else if ($last_number >= 4 && $last_number <= 6) {
            $min_question_id = 4;
            $max_question_id = $min_question_id + 3;
        } else if ($last_number >= 7 && $last_number <= 9) {
            $min_question_id = 7;
            $max_question_id = $min_question_id + 3;
        } else {
            echo ('error');
        } 
        try {
            // Create the Questions table if it doesn't exist
            $sql_create_table = "CREATE TABLE IF NOT EXISTS Questions (
                id int(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                question TEXT NOT NULL,
                choose1 TEXT NOT NULL,
                choose2 TEXT NOT NULL,
                choose3 TEXT NOT NULL,
                choose4 TEXT NOT NULL
            )";
            $conn->exec($sql_create_table);
            
            $stmt = $conn->prepare("SELECT question, choose1, choose2, choose3, choose4 ,answer,id ,id_q FROM Question WHERE id_q BETWEEN $min_question_id AND $max_question_id");
            $stmt->execute();
            $row = $stmt->fetch();
            $count = $stmt->rowCount();
        
            if ($count > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<form action='' class = \"container questions\" method='post'>";
                    echo "<h3 style=\"text-decoration: underline; font-weight: lighter; letter-spacing: 0.1rem;\">" . $row["question"] . "</h3>";
                    echo "<ul style=\"list-style:none; margin: 0; padding: 0;\">";
                    for ($i = 1; $i <= 4; $i++) { // choices 
                        $column_name = "choose" . $i;
                        echo "<li style=\"list-style:none; margin: 0; padding: 0;\"><input  type='radio' name='" . $row["id_q"] . "' value='" . $i . "'>" . $row[$column_name] . "</li>";
                    }
                    echo "</ul><br><br>";
                  
                }
                echo "<input type='submit' class=\"submit\" name='submit' value='Submit'>";
                echo "</form></div>";
            }else {
                echo "<p>No questions found.</p></div>";
            }
        }catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    
}else{
        echo "<p>id is incorrect</p></div>";
    }
    }
    
    

if (isset($_POST['submit'])) {
    // Get the user's answers
    $user_answers = $_POST;
    $min_question_id ++ ;
    
    unset($user_answers['submit']);
    // Retrieve the correct answers from the database
    $stmt = $conn->prepare("SELECT id_q ,id FROM Question WHERE id_q BETWEEN $min_question_id AND $max_question_id");
    $stmt->execute();
    $correct_answers = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);

    // Compare the user's answers with the correct answers
    $correct_count = 0;
    
    foreach ($user_answers as $id_q => $answer) { 
        if (isset($correct_answers[$id_q]) && $correct_answers[$id_q] == $answer) {
            $correct_count++;
        }   
    }

    // Print the result of compilation
    if ($correct_count == count($correct_answers)) {
        echo "<style>
        .container.questions{
            display:none;
        }
        </style>";
        echo "<div class=\"container cong\"><img style=\"display:block;
        width:50%;\" src=\"gif/clapping.gif\"></img>";
        echo "<h1>Congratulations! You got all the answers right!</h1>"; 
        echo "<div class=\"hr\"></div>";
        echo "<h2><a href='priz.php' style=\"width:200px;height:50px; font-size:30px; line-height:50px; display:block;\" class=\"submit\">Claim your prize</a></h2></div>";
    } else { 
        echo "<style>
        .container.questions{
            display:none;
        }
        </style>";
        echo "<div class=\"container cong\"><img style=\"display:block;
        width:35%;\" src=\"gif/dfb8f137bfa5de1ce2e56894ef089613.gif\"></img><h1>Good luck next time!</h1><button class=\"submit\"><a href=\"index.php\">Back home</a></button></div>
        "; 
    }}?>
</div>
<?php

include("includes/footer.php");
ob_end_flush(); 
?>