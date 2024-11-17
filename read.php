<?php
include('includes/nav.php');
require('connect_db.php');

# Retrieve items from 'products' database table.
$q = "SELECT * FROM products";
$r = mysqli_query($link, $q);
echo '<div class="row justify-content-center">';
if (mysqli_num_rows($r) > 0) {
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '
    <div class="card" style="width: 15rem;margin: 10px ">
	 	<img src=' . $row['item_img'] . ' class="card-img-top" alt="T-Shirt">
	  <div class="card-body">
	   <h5 class="card-title text-center">' . $row['item_name'] . '</h5>
	   <p class="card-text text-center">' . $row['item_desc'] . '</p>
     </div>
	  <ul class="list-group list-group-flush">
	   <li class="list-group-item"><p class="text-center">&pound' . $row['item_price'] . '</p></li>
	   <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="update.php?id=' . $row['item_id'] . '">
	   Update</a></li>
	   <li class="list-group-item"><a class="btn btn-dark btn-lg btn-block" href="delete.php?item_id=' . $row['item_id'] . '">
	   Delete Item</a></li>
	  </ul>
	</div>';
	}
	mysqli_close($link);
} else {
	echo '<p>There are currently no items in the table to display.</p>';
}
echo '</div>';

include('includes/footer.php');
