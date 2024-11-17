<?php
# Access session.
session_start();

# Redirect if not logged in.
if (!isset($_SESSION['id'])) {
    require('login_tools.php');
    load();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome: </title>
</head>

<body>
    <h1>Hello <?php echo " {$_SESSION['username']} " ?></h1>
</body>

</html>