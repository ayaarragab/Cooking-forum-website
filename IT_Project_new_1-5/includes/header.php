<?php include("includes/arrays.php");
session_start();
include("connect+functions.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/js/main.js">
    <title>Let's Cook</title>
    <script src ="js/all.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="title">
            <div class="group-title">
                <h3>Call us</h3> 
                <small><a style="text-decoration: none;font-weight:bold; color: #454545;" href="mailto:letscookk654@gmail.com" href="tel:+2011223234">+2011223234</a></small>
            </div>
            <h1>Let's Cook!</h1>
            <div class="group-title">
                <h3>Email us</h3>
                <small><a style="text-decoration: none;font-weight:bold; color: #454545;" href="mailto:letscookk654@gmail.com">letscookk654@gmail.com</a></small>
            </div>
        </div>
        <div class="image-for-header">
            <img class="for-header" src="img/Food Lets Cook Youtube Channel Art Banner Template - Made with PosterMyWall.jpg" alt="Cooking image">
        </div>
    </div>
    <div class="container">
    <nav class="main-nav">
    <ul class="main-ul">
        <!-- separate pages will be done in separate html files except the home page -->
        <li class="main-li"><a href="index.php">Home</a></li> 

        <li class="menu-item">
            <a href="#">Account</a>
            <div class="sub-menu">
            <?php
            if (isset($_SESSION['user']['id'])) {
            ?>
                <div>
                    <a href="logout.php">logout</a>
                </div>
                <div>
                    <a href="delete.php">Delete Account</a>
                </div>
                <div>
                    <a href="profile.php">Profile</a>
                </div>

            <?php
            } else {
            ?>
                <div>
                    <a href="login.php">Log in</a>
                </div>
                <div>
                    <a href="Registration.php">Register</a>
                </div>
            <?php
            }
            ?>
            </div>
        </li>

        <li class="menu-item hidden">
        <?php
        if (isset($_SESSION['user']['id'])) {
            if ($_SESSION ['user']['chef'] == 1) {
        ?>
        <a href="Apply-as-a-chief.php">Join us</a>
        <?php
            } else{ 
        ?>
        <a href="search-for-a-course.php">Search for a course</a>
        <?php 
            }
        ?>
        <?php
        } else {
        ?>
            <a href="#">Apply</a>
            
            <div class="sub-menu">
                <div>
                    <a href="Apply-as-a-chief.php">Join us</a>
                </div>
                <div>
                    <a href="search-for-a-course.php">Search for a course</a>
                </div>
            </div>
        <?php
        }
        ?>
        </li>   

        <?php
        if (isset($_SESSION['user']['id'])) {
            if ($_SESSION ['user']['chef'] == 1) {
        ?>
        <li class="main-li"><a href="Publish-a-course.php">Publish a course</a></li>
        <?php
            }
        ?>
        <?php
        } else {
        ?>
        <li class="menu-item hidden">
            <a href="#">Courses</a>
            <div class="sub-menu">
                <div>
                    <a href="Enroll-a-course.php">Enroll a course</a>
                </div>
                <div>
                    <a href="Publish-a-course.php">Publish a course</a>
                </div>
            </div>
        <?php
        }
        ?>
        </li>  
        <li class="menu-item show">
            <a href="#">Others</a>
            <div class="sub-menu">
                <div>
                    <a href="apply-or-search.php">Apply</a>
                </div>
                <div>
                    <a href="competitions-entry.php">Competitions</a>
                </div>
                <div>
                    <a href="#">Activities</a>
                </div>
            </div>
        </li>

        <li class="menu-item hidden">
        <?php
        if (isset($_SESSION['user']['id'])) {
            if ($_SESSION ['user']['chef'] == 1) {
        ?>
        <a href="add-a-recipe.php">Add a new recipe</a>
        <?php
            } else{ 
        ?>
        <a href="share-your-experience.php">Share your experience</a>
        <?php 
            }
        ?>
        <?php
        } else {
        ?>
            <a href="#">Activities</a>
            <div class="sub-menu">
                <div>
                    <a href="add-a-recipe.php">Add a new recipe</a>
                </div>
                <div>
                    <a href="share-your-experience.php">Share your experience</a>
                </div>
            </div>
        <?php
        }
        ?>  
        </li>
        <li class="main-li"><a href="recipes.php">Recipes</a></li>
        <li class="main-li"><a class="hidden" href="quiz.php">Competitions</a></li>
        <li class="main-li"><a class="hidden" href="our-cheifs.php">Our chefs</a></li>
        <li class="main-li"><a class="hidden" href="winner.php">Winners</a></li>
    </ul>
</nav>
</div>
