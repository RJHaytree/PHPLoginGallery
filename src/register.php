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
    <div class="full" id="particles-js"></div>
    <?php
        require "header.php";
    ?>
    <div class="loginPage">

        <!-- login form divider -->
        <div class="form">
            <form class="loginForm" method="POST" name="login" action="includes/signup.php">

                <!-- logo which links to index.php when clicked -->
                <a href="index.php">
                    <h1>Admin Gallery</h1>
                </a>

                <!-- title -->
                <h2>Register</h2>

                <!-- error messages -->
                <div class="errors">
                <?php 
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            echo '<p>You cannot have empty fields!</p>';
                        }
                        else if ($_GET['error'] == "invalidemails") {
                            echo '<p>Your emails must be in the correct format! example@example.com. Error has been logged.</p>';
                        }
                        else if ($_GET['error'] == "invalidusername") {
                            echo '<p>Your username cannot include special characters! Error has been logged.</p>';
                        }
                        else if ($_GET['error'] == "emailmatch") {
                            echo '<p>Your emails do not match! Try again. Error has been logged.</p>';
                        }
                        else if ($_GET['error'] == "passmatch") {
                            echo '<p>Your passwords do not match! Try again. Error has been logged.</p>';
                        }
                        else if ($_GET['error'] == "dberror") {
                            echo '<p>An error occurred with the database. Please email support. Error has been logged.</p>';
                        }
                        else if ($_GET['error'] == "usertaken") {
                            echo '<p>This username already exists. Try another username! Error has been logged.</p>';
                        }
                    }
                ?>
                </div>

                <!-- email and password inputs -->
                <input type="text" name="username" placeholder="Email address or uid" required/>
                <input type="email" name="email" placeholder="Email address" required autocomplete="off" />
                <input type="password" name="password" placeholder="Password" required autocomplete="off" />
                <input type="password" name="password-repeat" placeholder="Repeat Password" required autocomplete="off" />
                <button type="submit" name="register-submit">register</button>
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