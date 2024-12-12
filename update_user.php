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
    <!-- Hotjar Tracking Code for https://webdev.edinburghcollege.ac.uk/~HNDCSSA13/ScreenQuest/index.php -->
        <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:5225364,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</head>

<?php
session_start();
include('includes/nav.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('connect_db.php');

    # Initialize an error array.
    $errors = array();

    # Check for a item name.
    if (empty($_POST['username'])) {
        $errors[] = 'Update your username name.';
    } else {
        $u = mysqli_real_escape_string($link, trim($_POST['username']));
    }

    # Check for a item description.
    if (empty($_POST['email'])) {
        $errors[] = 'Update email address.';
    } else {
        $e = mysqli_real_escape_string($link, trim($_POST['email']));
    }

    # Check for a item price.
    if (empty($_POST['first_name'])) {
        $errors[] = 'Update first name';
    } else {
        $fn = mysqli_real_escape_string($link, trim($_POST['first_name']));
    }

    # Check for a item price.
    if (empty($_POST['last_name'])) {
        $errors[] = 'Update last name.';
    } else {
        $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));
    }

    if (empty($errors)) {
        $q = "UPDATE new_users SET 
        username='$u',
        email='$e', 
        first_name='$fn', 
        last_name='$ln'  
        WHERE id={$_SESSION['id']}";
        $r = @mysqli_query($link, $q);
        if ($r) {
            header("Location: user_account.php");
        } else {
            echo "Error updating record: " . $link->error;
            mysqli_close($link);
        }
    }
}
?> 
<html>
<form action="update_user.php" method="post">
    <!-- input box for usernam -->
    <label for="name">Username:</label>
    <input type="text"
        name="username"
        class="form-control"
        value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">

    <!-- input box for email -->
    <label for="description">Email:</label>
    <textarea id="email"
        class="form-control"
        name="email"
        value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
	  </textarea>

    <!-- input box for first name -->
    <label for="image">First Name:</label>
    <input type="text"
        id="first_name"
        class="form-control"
        name="first_name"
        value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">

    <!-- input box for  -->
    <label for="price">Last Name:</label>
    <input type="text"
        id="last_name"
        class="form-control"
        name="last_name"
        value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
        <br>
    <!-- submit button -->
    <input type="submit" class="btn btn-dark" value="Submit">
</form>
</html>

<?php
include('includes/footer.php');