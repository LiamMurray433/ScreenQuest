<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ScreenQuest</title>
    <link rel="stylesheet" href="main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
        crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('includes/nav.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('connect_db.php');
    
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    # Initialize an error array.
    $errors = array();

    # Check for a item name.
    if (empty($_POST['name_on_card'])) {
        $errors[] = 'Update the name on card.';
    } else {
        $name = mysqli_real_escape_string($link, trim($_POST['name_on_card']));
    }

    # Check for a item description.
    if (empty($_POST['card_number'])) {
        $errors[] = 'Update card number.';
    } else {
        $cardNo = mysqli_real_escape_string($link, trim($_POST['card_number']));
    }

    # Check for a item price.
    if (empty($_POST['csv'])) {
        $errors[] = 'Update csv';
    } else {
        $csv = mysqli_real_escape_string($link, trim($_POST['csv']));
    }

    # Check for a item price.
    if (empty($_POST['expiry_date'])) {
        $errors[] = 'Update expiry';
    } else {
        $date = mysqli_real_escape_string($link, trim($_POST['expiry_date']));
    }

    if (empty($errors)) {
        $q = "UPDATE payment_details SET 
        name_on_card='$name',
        card_number='$cardNo', 
        csv='$csv', 
        expiry_date='$date'  
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
<div class="container-md update-form">
    <form class="update-form-items" action="update_card.php" method="post">
        <!-- input box for usernam -->
        <label for="name">Name on Card:</label>
        <input type="text"
            name="name_on_card"
            class="form-control"
            value="<?php if (isset($_POST['name_on_card'])) echo $_POST['name_on_card']; ?>">

        <!-- input box for email -->
        <label for="card_number">Card Number:</label>
        <input type="text"
            id="card_number"
            class="form-control"
            name="card_number"
            value="<?php if (isset($_POST['card_number'])) echo $_POST['card_number']; ?>">

        <!-- input box for first name -->
        <label for="csv">CSV:</label>
        <input type="text"
            id="csv"
            class="form-control"
            name="csv"
            value="<?php if (isset($_POST['csv'])) echo $_POST['csv']; ?>">

        <!-- input box for  -->
        <label for="expiry date">Expiry Date</label>
        <input type="date"
            id="expiry_date"
            class="form-control"
            name="expiry_date"
            value="<?php if (isset($_POST['expiry_date'])) echo $_POST['expiry_date']; ?>">
            <br>
        <!-- submit button -->
        <input type="submit" class="btn btn-dark" style="background-color: #8A3033; margin-top: 10px; width: 30%;" value="Submit">
    </form>
</div>
</html>

<?php
include('includes/footer.php');