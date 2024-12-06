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
echo '<div class="row justify-content-center" style="background-color:#000F08;">';
if (mysqli_num_rows($r) > 0) {
    # Display body section.        
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
                <div class="card" style="width: 15rem;margin: 10px ">
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
echo '</div>';
include('includes/footer.php');
