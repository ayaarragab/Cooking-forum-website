<?php
include("includes/header.php");
?>
<div class="container home-chef-part">
    <h2 style="color: red; text-align: center"> welcome chef <?php
      echo $_SESSION['user']['username'] ;
    ?></h2>
      <div class="hr"></div>
      <div class="hero">
        <div class="text">
        <h1>Let's Cook</h1>
        <p>Welcome to Let's Cook, the ultimate destination for food lovers and cooking enthusiasts! We are thrilled to offer you a wide range of exciting activities and resources to help you improve your culinary skills and explore new flavors and ingredients.

          At Let's Cook, we believe that cooking is not just about preparing meals, but also about connecting with people, sharing experiences, and having fun in the kitchen. That's why we offer a variety of cooking competitions that will challenge your creativity and inspire you to try new recipes and techniques. Whether you are a seasoned chef or a beginner cook, our competitions are designed to be inclusive and accessible to everyone.</p>
        </div>
        <div class="video-container">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="services">
      <h1 class="special">We encourage you to</h1>
      <div class="h1-group">
      <h1><a style = "text-decoration: none; font-size: larger;"href="add-a-recipe.php" class="link" ><div class="container"><h1><div class="container">Share with us new recipes</h1></div></a></h1>
    <h1><a style = "text-decoration: none; font-size: larger;" href="Publish-a-course.php" class="link" ><div class="container"><h1>Benefit us with your courses</h1></div></a></h1>
    <h1><a style = "text-decoration: none; font-size: larger;" href="profile.php" class="link" ><div class="container"><h1>Check your profile and update it</h1></div></a></h1>
      </div>
      </div>
    </div>
<?php
include("includes/footer.php")
?>