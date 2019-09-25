<?php
/**
 * error-log-reader.php
 *
 * Displays row data in the error table from the MySQL database.
 *
 * @author Ryan Haytree
 * @copyright 2019 Ryan Haytree
 */

/**
 * showTable()
 * -------------------------------------
 * Display error table rows in a HTML table.
 */
function showTable()
{
    # get database connection
    require "db-helper.php";

    # sql query to collect all entries in tabl_errors
    $sql = "SELECT * FROM `tbl_errors`";

    # store result as boolean
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result))
    {
        echo '<tr scope="row">';
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['event'] . "</td>";
        echo "<td>" . $row['full_error'] . "</td>";
        echo "<td>" . $row['datetime'] . "</td>";
        echo "</tr>";
    }
}