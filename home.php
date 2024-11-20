<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
# Access session.
session_start();
# Include navigation file.
include('includes/nav.php');
# Redirect if not logged in.
if (!isset($_SESSION['id'])) {
    require_once('login_tools.php');
}
# Include footer file.
include('includes/footer.php');
