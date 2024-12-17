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


<?php # Check details and submit card details
# Check form submitted.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include('includes/nav.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('connect_db.php');

 # Check for an name on card:
    if (empty($_POST['name_on_card'])) {
    $errors[] = 'Enter name on card';
    } else {
    $cardName = mysqli_real_escape_string($link, trim($_POST['name_on_card']));
    }

    # Check for an card number:
    if (empty($_POST['card_number'])) {
        $errors[] = 'Enter your card number';
    } else {
        $cardNo = mysqli_real_escape_string($link, trim($_POST['card_number']));
    }
    # Check for an csv number:
    if (empty($_POST['csv'])) {
        $errors[] = 'Enter your csv number';
    } else {
        $csv = mysqli_real_escape_string($link, trim($_POST['csv']));
    }
    # Check for an expiry date number:
    if (empty($_POST['expiry_date'])) {
        $errors[] = 'Enter your expiry date';
    } else {
        $date = mysqli_real_escape_string($link, trim($_POST['expiry_date']));
    }


    # Check if email address already registered.
    if (empty($errors)) {
        $q = "SELECT card_number FROM payment_details WHERE card_number='$cardNo'";
        $r = @mysqli_query($link, $q);
        if (mysqli_num_rows($r) != 0) $errors[] =
            'Card details already registered.';
    }



    # On success register user inserting into 'users' database table.
    if (empty($errors)) {
        $q = "INSERT INTO payment_details (id, name_on_card, card_number, csv, expiry_date) 
	    VALUES ('{$_SESSION['id']}', '$cardName', '$cardNo', '$csv', '$date')";
        $r = mysqli_query($link, $q);
        if ($r) {
            echo '
            <p>Your payment details have be succesfully added.</p>
                ';
        }

        # Close database connection.
        mysqli_close($link);

        exit();
    }
    # Or report errors.
    else {
        echo '
	<h4>The following error(s) occurred:</h4>';
        foreach ($errors as $msg) {
            echo " - $msg<br>";
        }
        echo '<p>or please try again.</p><br>';
        # Close database connection.
        mysqli_close($link);
    }
}
?>

<body>
    <div class="container">
        <h2>Enter Payments Details</h2>
        <form action="card_details.php" class="was-validated" method="post">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input name="name_on_card"
                            placeholder="Enter name on Card"
                            class="form-control"
                            value="<?php if (isset($_POST['name_on_card'])) echo $_POST['name_on_card']; ?>"
                            required>
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input name="card_number"
                            placeholder="card_number"
                            class="form-control"
                            value="<?php if (isset($_POST['card_number'])) echo $_POST['card_number']; ?>"
                            required>
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input name="csv"
                            placeholder="csv"
                            class="form-control"
                            value="<?php if (isset($_POST['csv'])) echo $_POST['csv']; ?>"
                            required>
                    </div>
                </div>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="date"
                    name="expiry_date"
                    class="form-control"
                    placeholder="Expiry Date"
                    value="<?php if (isset($_POST['expiry_date'])) echo $_POST['expiry_date']; ?>"
                    required><br>
            </div>

            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4" style="background-color: #648381">Add Card</button>

        </form>
    </div>
    <?php
    include('includes/footer.php');



