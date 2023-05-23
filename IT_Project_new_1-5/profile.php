<?php 
include("includes/header.php");
?>
<div class="container profile" style="display:flex;
flex-direction:column; align-items:center;">
<?php

    echo "<h1>YOUR PROFILE</h1>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>Date of Birth</th></tr>";
        echo "<tr><td>" . $_SESSION['user']["id"] . "</td><td>" . $_SESSION['user']["username"] . "</td><td>" . $_SESSION['user']["dateofbirth"] . "</td></tr>";
    echo "</table>";

    if ($_SESSION ['user']['chef'] == 1) {
        echo "<h1 class='special'><button class='submit'><a href='your_recipe.php'>YOUR RECIPES</a></button> </a></h1>";
        echo "<h1 class='special'><button class='submit'><a href='saved_recipe.php'>YOUR SAVED RECIPE</a></button> </a></h1>";
      } else {
        echo "<div class=\"gr\" style=\"display:flex;
        flex-direction:row; justify-content:space-around;\">";
        echo "<div class=\"gr-sup\">";
        echo "<h1 class='special'><button class='submit'><a href='saved_recipe.php'>YOUR SAVED RECIPE</a></button> </a></h1>";
        echo "<h1 class='special'><button class='submit'><a href='your_experiences.php'>YOUR EXPERIENCE</a></button> </a></h1>";
        echo "<button class=\"submit\"><a href=\"index.php\">Back home</a></button>";
        echo "</div>";
        echo "<img style=\"display:block;
        width:30%;border-radius:50%\" src=\"gif/c62508406ff94c5163dfba50a6132cdd.gif\"></img>";
        echo "</div>";

      }
      ?>
       <style>
table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

th, td {
  text-align: center;
  padding: 8px;
}

th {
  background-color: #fb5d33 ;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}
</style>

</div>
<?php
include("includes/footer.php");
?>