<?php

/**
 * db-helper.php
 *
 * Create a MySQLi connection for all database operations
 *
 * @author Ryan Haytree
 * @copyright 2019 Ryan Haytree
 */

# get config ini and parse
$config = parse_ini_file('../configuration/config.ini');

# database credentials
define("DB_HOST", $config['db_host']);
define("DB_UID", $config['db_uid']);
define("DB_PASS", $config['db_pass']);
define("DB_NAME", $config['db_name']);

# mysqli connection -> must be used for all database operations
$conn = mysqli_connect(DB_HOST, DB_UID, DB_PASS, DB_NAME);

checkConnection($conn);

/**
 * Checks database connection
 *
 * @param mysqli $conn the mysqli connection
 */
function checkConnection ($conn) 
{
    if (!$conn) 
    {
        die("Failed: " . mysqli_connect_error());
    }
}