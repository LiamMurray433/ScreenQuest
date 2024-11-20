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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome: <?php echo htmlspecialchars($_SESSION['username']); ?></title>
</head>
<body>
    <h1>Hello <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
</body>
</html>
<?php
# Include footer file.
include('includes/footer.php');
?>
