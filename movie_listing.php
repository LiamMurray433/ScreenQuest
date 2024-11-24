<?php
# Open database connection.
require('connect_db.php');
# Retrieve movies from 'movie_listing' database table.
$q = "SELECT * FROM movie_listings";
$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) > 0) {
    # Display body section.

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
                <div class="card" style="width: 15rem;margin: 10px ">
	 	<img src=' . $row['img'] . ' class="card-img-top" alt="T-Shirt">
	  <div class="card-body">
	   <h5 class="card-title text-center">' . $row['movie_title'] . '</h5>
	   <p class="card-text text-center">' . $row['further_info'] . '</p>
     </div>
	  <ul class="list-group list-group-flush">
	  </ul>
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
