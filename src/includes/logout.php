<?php

/**
 * logout.php
 *
 * Unsets and destroys the user session to perform a logout.
 *
 * @author Ryan Haytree
 * @copyright 2019 Ryan Haytree
 */

# start session
session_start();
# unset session
session_unset();
# delete session
session_destroy();

header('Location: ../index.php');