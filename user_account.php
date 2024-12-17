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

    <body style="background-color: #000F08;">
  ';

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $date = $row["created_at"];
        $day = substr($date, 8, 2);
        $month = substr($date, 5, 2);
        $year = substr($date, 0, 4);

        echo '	
        <section>
            <div class="container account-container">
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
            <div>
            <a href="update_user.php?id='.$row['id'].'"class="btn btn-secondary btn-block" role="button">Update Details</a>
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
$q = "SELECT new_users.id, 
movie_booking.booking_id, 
movie_booking.total, 
movie_booking.booking_date, 
booking_content.content_id, 
booking_content.movie_id, 
booking_content.quantity, 
movie_listings.movie_title  
FROM new_users
INNER JOIN movie_booking ON new_users.id = movie_booking.id
INNER JOIN booking_content ON movie_booking.booking_id = booking_content.booking_id
INNER JOIN movie_listings ON booking_content.movie_id = movie_listings.movie_id
WHERE new_users.id = {$_SESSION['id']}
ORDER BY booking_date DESC";
$r = mysqli_query($link, $q);

echo '<div class="container history-container">
        <h3>Booking History</h3>
        </div>';
echo '<div class="container py-5 booking-container">';




if (mysqli_num_rows($r) > 0) {
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
            <div class="card text-center booking-card">
                    <a style="color: #000F08;"  href="movie.php?movie_id=' . $row['movie_id'] . '">'  . $row['movie_title'] . ' </a> 
                    <ul class="list-group list-group-light" booking-list>
                        <li class="list-group-item px-3">' . 'Total: '. $row['total'] . ' </li>
                         <li class="list-group-item px-3">' . 'Qty: ' . $row['quantity'] . ' </li>
                         <li class="list-group-item px-3">' . 'Date: ' .  $row['booking_date'] . '</li>
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
