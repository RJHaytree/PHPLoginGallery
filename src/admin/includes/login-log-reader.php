<?php

/**
 * login-log-reader.php
 *
 * Displays row data in the login_log table from the MySQL database.
 *
 * @author Ryan Haytree
 * @copyright 2019 Ryan Haytree
 */

/**
 * showTable
 * ----------------------------------
 * Display login log rows in a table format.
 */
function showTable()
{
    require "db-helper.php";
    $sql = "SELECT * FROM `tbl_login_log`";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result))
    {
        echo '<tr scope="row">';
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['event'] . "</td>";
        echo "<td>" . $row['add_info'] . "</td>";
        echo "<td>" . $row['c_browser'] . "</td>";
        echo "<td>" . $row['c_os'] . "</td>";
        echo "<td>" . $row['c_ip'] . "</td>";
        echo "<td>" . $row['datetime'] . "</td>";
        echo "</tr>";
    }
}