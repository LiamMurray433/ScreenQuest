<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
# Access session.
include('includes/nav.php');

# Redirect if not logged in.
if (!isset($_SESSION['id'])) {
    require('login_tools.php');
    load();
}
?>


<?php
# Open database connection.
require('connect_db.php');

# Retrieve items from 'users' database table.
$q = "SELECT * FROM new_users WHERE id={$_SESSION['id']}";
$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {

    echo '
	<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    </head>
    <body style="background-color: #000F08;">
  ';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $date = $row["created_at"];
        $day = substr($date, 8, 2);
        $month = substr($date, 5, 2);
        $year = substr($date, 0, 4);

        echo '	
        <section>
            <div class="container py-5 account-container" style="background-color: #8A3033;">
             <h1 style="color: #EEF0F2">'  . $row['username'] . ' </h1>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">First Name</p>
                            </div>
                            <div class="col-sm-9">
                            <p class="text-muted mb-0">' . $row['first_name'] . '</div></p>
                        </div>
                        <hr>
                         <div class="row">
                            <div class="col-sm-3">
                            <p class="mb-0">Surname</p>
                            </div>
                        <div class="col-sm-9">
                        <p class="text-muted mb-0">' . $row['last_name'] . '</p>
                        </div>
                        </div>
                        <hr>
                         <div class="row">
                            <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                            </div>
                        <div class="col-sm-9">
                        <p class="text-muted mb-0">' . $row['email'] . '</p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <p class="mb-0">Member Since</p>
                            </div>
                        <div class="col-sm-9">
                        <p class="text-muted mb-0"> ' . $day . '/' . $month . '/' . $year . '</p>
                        </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </section>';
    }
    # Close database connection.
    mysqli_close($link);
} else {
    echo '<h3>No user details.</h3>';
}

require('connect_db.php');

# Retrieve items from 'users' database table.
$q = "SELECT * FROM movie_booking WHERE id={$_SESSION['id']}
ORDER BY booking_date DESC";
$r = mysqli_query($link, $q);

echo '<div class="container py-5 booking-container">';

if (mysqli_num_rows($r) > 0) {
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
            <div class="card" style="width: 18rem;">
             <h1 style="color: #EEF0F2">'  . $row['booking_id'] . ' </h1>
                <ul class="list-group list-group-light">
                    <li class="list-group-item px-3">' . $row['total'] . ' </li>
                    <li class="list-group-item px-3">' . $row['booking_date'] . '</li>
                </ul>
            </div>';
    }
    # Close database connection.
    mysqli_close($link);
} else {
    echo '<h3>No booking history available</h3>';
}
echo '
</div>';
include('includes/footer.php');
