<?php

/**
 * error-handler.php
 *
 * Upload error to MySQL database
 *
 * @author Ryan Haytree
 * @copyright 2019 Ryan Haytree
 */


/**
 * uploadError
 * ----------------------------
 * Upload error to MySQL database
 * 
 * @param mysqli_connect $conn MySQLi connection
 * @param string $event The event that took place (DB_ERROR or SCRIPT_ERROR)
 * @param string $full_error The full error 
 */
function uploadError($conn, $event, $full_error)
{
    # mysqli query
    $sql = "INSERT INTO `tbl_errors` VALUES (NULL, '{$event}', '{$full_error}', NOW())";
    # store result (success) in variable
    $result = mysqli_query($conn, $sql);

    # check if process was successful
    if ($result)
    {
        echo "Error successfully uploaded to database.";
    }
    else 
    {
        echo "An error has occurred when submitting the error to the database.";
    }
}