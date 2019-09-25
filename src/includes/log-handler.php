<?php

/**
 * log-handler.php
 * ---------------------------------
 * Upload log to MySQL database
 *
 * @author Ryan Haytree
 * @copyright 2019 Ryan Haytree
 */

/**
 * uploadError
 * ----------------------------
 * Upload login log to MySQL database
 * 
 * @param mysqli_connect $conn MySQLi connection
 * @param string $uid The uid of user attempting login
 * @param string $event The event that took place (SUCCESS or FAILURE)
 * @param string $add_info The full error 
 * @param string $browser Client browser
 * @param string $os Client operating system
 * @param string $ip Client IP-Address
 */
function uploadLog($conn, $uid, $event, $add_info, $browser, $os, $ip)
{
    # mysqli query
    $sql = "INSERT INTO `tbl_login_log` VALUES (NULL, '{$uid}', '{$event}', '{$add_info}', '{$browser}', '{$os}', '{$ip}', NOW())";
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