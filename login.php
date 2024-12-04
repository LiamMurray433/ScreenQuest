<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRUD Practice!</title>
    <link rel="stylesheet" href="main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
        crossorigin="anonymous">
</head>

<?php
include('includes/nav.php');
include('includes/filter.php');
?>

<body>
    <div class="login-wrapper">
        <div class="login-container">
            <h1 class="login-title">Login</h1>
            <form action="login_action.php" method="post">
                <div class="mb-3 form-input">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
                <div class="mb-3 form-input">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <br><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</body>

</html>