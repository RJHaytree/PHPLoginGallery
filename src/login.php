<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Gallery | Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="assets/css/login.css" rel="stylesheet" type="text/css">
    <link href="assets/css/background.css" rel="stylesheet" type="text/css">
    <link href="assets/css/footer.css" rel="stylesheet" type="text/css">
    <link href="assets/css/nav.css" rel="stylesheet" type="text/css">
</head>

<body class="login">
    <div id="particles-js"></div>
    <?php
        require "header.php";
    ?>
    <div class="loginPage login_page">

        <!-- login form divider -->
        <div class="form">
            <form class="loginForm" method="POST" name="login" action="includes/signin.php">

                <!-- logo which links to index.php when clicked -->
                <a href="index.php">
                    <h1>Admin Gallery</h1>
                </a>

                <!-- title -->
                <h2>Login</h2>

                <!-- error messages -->
                <div class="errors">
                    <?php 
                        if (isset($_GET['error'])) 
                        {
                            if ($_GET['error'] == "emptyfields") 
                            {
                                echo '<p>You cannot have empty fields! Error has been logged.</p>';
                            }
                            else if ($_GET['error'] == "userunknown") 
                            {
                                echo '<p>Username/Email is incorrect. Try again! Error has been logged.</p>';
                            }
                            else if ($_GET['error'] == "wrongpass") 
                            {
                                echo '<p>Password is incorrect. Try again! Error has been logged.</p>';
                            }
                            else if ($_GET['error'] == "dberror") 
                            {
                                echo '<p>An error occurred with the database. Please email support. Error has been logged.</p>';
                            }
                        }
                        else if (isset($_GET['register'])) 
                        {
                            if ($_GET['register'] == "success") 
                            {
                                echo '<p>Your account has been created. You can now login!</p>';
                            }
                        }
                    ?>
                </div>

                <!-- email and password inputs -->
                <input type="text" name="emailuid" placeholder="Email address or uid" required/>
                <input type="password" name="password" placeholder="Password" required autocomplete="off" />
                <button type="submit" name="login-submit">login</button>
            </form>
            
        </div>

    </div>

    <?php

        include_once('footer.php');

    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="assets/js/background.js"></script>
</body>

</html>