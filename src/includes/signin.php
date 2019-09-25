<?php

/**
 * singin.php
 *
 * File for all sig in processes.
 *
 * @author Ryan Haytree
 * @copyright 2019 Ryan Haytree
 */

if (isset($_POST['login-submit'])) 
{
    # access db connection
    require "db-helper.php";
    # access error handler
    require "error-handler.php";
    # access log handler
    require "log-handler.php";
    # access user data
    require "user-data.php";

    # user input from login.php
    $emailuid = $_POST['emailuid'];
    $pass = $_POST['password'];

    # check if input fields are empty
    if (empty($emailuid) || empty($pass)) 
    {
        #fields are empty. Send error with client back to page
        #no upload to database simply due to the number of rows that may be created
        header('Location: ../login.php?error=emptyfields');
        exit;
    }
    else 
    {
        # prepared statements
        $sql = "SELECT * FROM `tbl_users` WHERE username=? OR email=?;";
        $statement = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statement, $sql)) 
        {
            # send error to database
            uploadError($conn, "DB_ERROR", mysqli_error($conn));

            # echo mysqli_error($conn);
            # statement not initiated, send dberror
            header('Location: ../login.php?error=dberror');
            exit;
        }
        else 
        {
            # bind variables to prepared statement (ss indicates both variables are strings)
            mysqli_stmt_bind_param($statement, "ss", $emailuid, $emailuid);
            mysqli_stmt_execute($statement);

            # store result of statement
            $result = mysqli_stmt_get_result($statement);

            if ($row = mysqli_fetch_assoc($result)) 
            {
                # compare password from form and password (unhashed)
                $passCheck = password_verify($pass, $row['password']);

                if (!$passCheck) 
                {
                    # failed login
                    uploadError($conn, "LOGIN_ERROR", "Incorrect password.");
                    # unhashed password is incorrect, furthermore, password is incorrect
                    header('Location: ../login.php?error=wrongpass');
                    exit;
                }
                else if ($passCheck) 
                {
                    # start session and add user info to session
                    session_start();
                    $_SESSION['user_data']['id'] = $row['id'];
                    $_SESSION['user_data']['username'] = $row['username'];
                    $_SESSION['user_data']['email'] = $row['email'];
                    $_SESSION['user_data']['browser'] = getBrowser();
                    $_SESSION['user_data']['os'] = getOperatingSystem();
                    $_SESSION['user_data']['ip'] = getClientIPAddress();

                    # user login successful
                    uploadLog($conn, $emailuid, "SUCCESS", "Login successful", getBrowser(), getOperatingSystem(), getClientIPAddress());
                    # login is successful, send client to home page
                    header('Location: ../admin/index.php?login=success');
                    exit;
                }
            }
            else 
            {
                # login failed, incorrect username
                uploadError($conn, "LOGIN_ERROR", "Incorrect username.");
                # username is not in database, therefore user is not known in system
                header('Location: ../login.php?error=userunknown');
                exit;
            }
        }
    }
    # close mysqli connection -> saves resources
    mysqli_stmt_close($statement);
    mysqli_close($conn);
}
else 
{
    # send user back to the home page
    header('Location: ../admin/index.php');
}