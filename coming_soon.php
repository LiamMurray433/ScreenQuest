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

include('includes/nav.php');
include('includes/filter.php');
# Open database connection.
require('connect_db.php');
# Retrieve movies from 'movie_listing' database table.
$q = "SELECT * FROM coming_soon";
$r = mysqli_query($link, $q);
echo '
<div class="movie-wrapper">
<h2>Coming Soon</h2>
    <div class="row justify-content-center custom-movie-listings" style="background-color:#000F08;">';
    if (mysqli_num_rows($r) > 0) {
        # Display body section.        
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '
                    <div class="card movie-card" style="width: 22rem ;margin: 10px ">
                        <img src=' . $row['img'] . ' class="card-img-top" alt="Movie">
                        <div class="card-body" style="color: #000F08;">
                            <h5 class="card-title text-center">' . $row['movie_title'] . '</h5>
                            <h5 class="card-title text-center"> Release:' . $row['date'] . '</h5>
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
