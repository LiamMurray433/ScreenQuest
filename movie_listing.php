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

include('includes/nav.php');
include('includes/filter.php');
# Open database connection.
require('connect_db.php');
# Retrieve movies from 'movie_listing' database table.
$q = "SELECT * FROM movie_listings";
$r = mysqli_query($link, $q);
echo '
<div class="movie-wrapper">
    <div class="row justify-content-center custom-movie-listings" style="background-color:#000F08;">';
    if (mysqli_num_rows($r) > 0) {
        # Display body section.        
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '
                    <div class="card movie-card" style="width: 15rem;margin: 10px ">
                        <img src=' . $row['img'] . ' class="card-img-top" alt="T-Shirt">
                        <div class="card-body">
                            <h5 class="card-title text-center">' . $row['movie_title'] . '</h5>
                            <a href="movie.php?movie_id=' . $row['movie_id'] . '" class="btn btn-secondary btn-block" role="button">Book Now</a>
                        </div>
                    </div>       
        ';
        }
        # Close database connection.
        mysqli_close($link);
    }
    # Or display message.
    else {
        echo '<p>There are currently no movies showing.</p>
        ';
    }
    echo '</div>
     </div>';
include('includes/footer.php');
