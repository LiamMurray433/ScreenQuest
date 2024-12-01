<?php
# Access session.
session_start();
# Include navigation file.
include('includes/nav.php');
# Redirect if not logged in.
if (!isset($_SESSION['id'])) {
    require('login_tools.php');
}

include('includes/footer.php');

# Include footer file.