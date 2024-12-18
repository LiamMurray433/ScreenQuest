
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

<?php # DISPLAY COMPLETE REGISTRATION PAGE.
# Access session.
session_start();

include('includes/nav.php');
# Redirect if not logged in.
if (!isset($_SESSION['id'])) {
    require('login_tools.php');
    load();
}


# Check for passed total and cart.
if (isset($_GET['total']) && ($_GET['total'] > 0) && (!empty($_SESSION['cart']))) {
    # Open database connection.
    require('connect_db.php');

    # Ticket reservation and total in 'bookings' database table.
    $q = "INSERT INTO movie_booking ( id, total, booking_date ) VALUES (" . $_SESSION['id'] . "," . $_GET['total'] . ", NOW() ) ";
    $r = mysqli_query($link, $q);

    # Retrieve current booking number.
    $booking_id = mysqli_insert_id($link);

    # Retrieve cart items from 'movie' database table.
    $q = "SELECT * FROM movie_listings WHERE movie_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) {
        $q .= $id . ',';
    }
    $q = substr($q, 0, -1) . ') ORDER BY movie_id ASC';
    $r = mysqli_query($link, $q);

    # Store order contents in 'booking_contents' database table.
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $query = "INSERT INTO booking_content
	( booking_id, movie_id, quantity, price )
    VALUES ( $booking_id, " . $row['movie_id'] . "," . $_SESSION['cart'][$row['movie_id']]['quantity'] . "," . $_SESSION['cart'][$row['movie_id']]['price'] . ")";
        $result = mysqli_query($link, $query);
    }

    # Close database connection.
    #mysqli_close($link);



    # Display order number.
    echo '
<div class="container justify-content-center">
	
	';
    # Remove cart items.  
    $_SESSION['cart'] = NULL;
}
# Or display a message.
else {
    echo '<p></p>';
}


# Open database connection.
#require ( 'includes/connect_db.php' ) ;

# Retrieve items from 'bookings' database table.
$q = "SELECT * FROM movie_booking WHERE id={$_SESSION['id']}
ORDER BY booking_date DESC
LIMIT 1";


$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {

    echo '<div class="container justify-content-center" style="margin: 20px;">
    
    <img width="256" class="img-fluid" alt="QR Code " src="img\qrcode.jpeg">';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $date = $row["booking_date"];
        $day = substr($date, 8, 2);
        $month = substr($date, 5, 2);
        $year = substr($date, 0, 4);
        echo '
        <div class="container column justify-content-center">
		<p>Booking Reference:  #EC1000' . $row['booking_id'] . '</p> 
		<p>Total Paid:   &pound ' . $row['total'] . ' </p>
		<p>' . $day . '/' . $month . '/' . $year . '.  <p>
        </div>
				
        </div>';
    }

    # Close database connection.
    mysqli_close($link);
}
