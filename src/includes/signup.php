<?php

/**
 * siginup.php
 *
 * All sign up processes and methods.
 *
 * @author Ryan Haytree
 * @copyright 2019 Ryan Haytree
 */

if (isset($_POST['register-submit'])) 
{
    # access db connection
    require "db-helper.php";
    #access error-handler
    require "error-handler.php";

    # get all input from the signup form on register.php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $passRepeat = $_POST['password-repeat'];

    # check if any fields are empty
    if (empty($username) || empty($email) || empty($pass) || empty($passRepeat)) 
    {
        # send user back to the signup form and send additional info to the page.
        header('Location: ../register.php?error=emptyfields');
        exit;
    }
    # check if email and email-repeat are the correct format
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        # send user back to the signup form and send additional info to the page.
        header('Location: ../register.php?error=invalidemails');
        exit;
    }
    # check if username contains any restricted characters
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) 
    {
        header('Location: ../register.php?error=invalideusername');
        exit;
    }
    # check if password and password-repeat match
    else if ($pass !== $passRepeat) 
    {
        header('Location: ../register.php?error=passmatch');
        exit;
    }
    else 
    {
        checkUsernameDuplicate($username, $email, $pass, $conn);
    }
}
else 
{
    # send user back to the home page
    header('Location: ../index.php');
}

/**
 * Checks for duplicate usernames in the database
 *
 * @param string $username Username to check database records against
 * @param string $email Email for the new account
 * @param string $pass Password for the new account
 * @param mysqli $conn MySQLi connection for database operations
 */
function checkUsernameDuplicate($username, $email, $pass, $conn) 
{
    # prepared statements for maximum security 
    $sql = "SELECT username FROM tbl_users WHERE username=?;";
    $statement = mysqli_stmt_init($conn);

    # check if statement is successfully sent to the database
    if (!mysqli_stmt_prepare($statement, $sql)) 
    {
        header('Location: ../register.php?error=dberror');
        exit;
    }
    else 
    {
        # bind variable to the statement as a STRING
        mysqli_stmt_bind_param($statement, "s", $username);

        # run the statement in the database
        mysqli_stmt_execute($statement);

        # store results from query
        mysqli_stmt_store_result($statement);

        # check number of rows returned from the database
        if (mysqli_stmt_num_rows($statement) > 0) 
        {
            # username is already taken, give error
            uploadError($conn, "SIGNUP_ERROR", "User already taken: {$username}.");
            header('Location: ../register.php?error=usertaken');
            exit;
        }
        else 
        {
            # execute performRegister function using input values
            performRegister($username, $email, $pass, $conn);
        }
    }

    # close mysqli connection -> saves resources
    mysqli_stmt_close($statement);
    mysqli_close($conn);
}

/**
 * Upload new user account to the database using given credentials
 *
 * @param string $username The username for the new account
 * @param string $email The email for the new account
 * @param string $pass The password for the new account
 * @param MySQLi $conn The MySQLi connection for database operations
 */
function performRegister($username, $email, $pass, $conn) 
{
    $sql = "INSERT INTO tbl_users (`username`, `email`, `password`) VALUES (?, ?, ?);";
    $statement = mysqli_stmt_init($conn);

    # check if statement is successfully sent to the database
    if (!mysqli_stmt_prepare($statement, $sql)) 
    {
        # if unsuccessful, dberror has occurred
        header('Location: ../register.php?error=dberror');
        exit;
    }
    else 
    {
        # hash password for storage
        $hashed = password_hash($pass, PASSWORD_DEFAULT);

        # bind variables to statement as strings
        mysqli_stmt_bind_param($statement, "sss", $username, $email, $hashed);

        # execute statement in database
        mysqli_stmt_execute($statement);
        # register is successful, send to login page
        header('Location: ../login.php?register=success');
        exit;
    }

    # close mysqli connection -> saves resources
    mysqli_stmt_close($statement);
    mysqli_close($conn);
}