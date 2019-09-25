<?php

session_start();

if(!isset($_SESSION['user_data']['id']))
{
    header("Location: ../index.php");
}

?>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Admin Gallery</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav navbar-left">
            <?php
                if (isset($_SESSION['user_data']['id'])) {
                    echo '<li><a href="error-log.php"><span class="glyphicon glyphicon-console"></span> Error Log</a></li>';
                    echo '<li><a href="login-log.php"><span class="glyphicon glyphicon-log-in"></span> Login Log</a></li>';
                    echo '<li><a href="image_upload.php"><span class="glyphicon glyphicon-upload"></span> Upload Image</a></li>';
                }        
            ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            
                if (isset($_SESSION['user_data']['id'])) {
                    echo '<li><a href=""><span class="glyphicon glyphicon-user"></span> ' . $_SESSION['user_data']['email'] . '</a></li>';
                    echo '<li><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Gallery Home</a></li>';
                    echo '<li><a href="../includes/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                }
                else {
                    echo '<li><a href="../register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                    echo '<li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                }
            ?>
        </ul>
    </div>
</div>
</nav>