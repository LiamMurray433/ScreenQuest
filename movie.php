<?php
# Access session.
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/nav.php');
# DISPLAY COMPLETE LOGGED IN PAGE.

?>
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

<?php
# Redirect if not logged in.
if (!isset($_SESSION['id'])) {
	require('login_tools.php');
	load();
}

# Get passed product id and assign it to a variable.
if (isset($_GET['movie_id'])) $movie_id = $_GET['movie_id'];

# Open database connection.
require('connect_db.php');
# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM movie_listings WHERE movie_id = $movie_id";
$r = mysqli_query($link, $q);

if (mysqli_num_rows($r) == 1) {
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

	# Check if cart already contains one movie id.
	if (isset($_SESSION['cart'][$movie_id])) {
		# Add one more of this product.
		$_SESSION['cart'][$movie_id]['quantity']++;
		echo '
      <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
			  <iframe class="embed-responsive-item" 
				src=' . $row['preview'] . ' 
				frameborder="0" 
				allow="accelerometer; 
				autoplay; 
				encrypted-media; 
				gyroscope; 
				picture-in-picture" 
				allowfullscreen>
			  </iframe>
			</div>

		<div class="col-md-8">
          <h1 class="display-4">' . $row['movie_title'] . '</h1>
		  <p class="lead">Release Date:  ' . $row['d'] . '</p>
		  <p>Genre: ' . $row['genre'] . '</p>
		</div>

		<div class="col-sm-12 col-md-4">
		 <img src=' . $row['age_rating'] . ' alt="Movie" width="50px">
		 <p>' . $row['further_info'] . '</p>
		</div>
			
		<div class="col-sm-12 col-md-6">
		  <h4>Show Times</h4>
		  <hr>
           <div class="card">
            <div class="card-body">
             <h5 class="card-title">' . $row['theatre'] . '</h5>
			    <a href="show1.php">
			      <button type="button"
					class="btn btn-secondary" 
					role="button"> Book >  ' . $row['show1'] . ' 
				  </button>
				</a>
			    <a href="show2.php"> 
				  <button type="button" 
				    class="btn btn-secondary" 
					role="button"> Book >  ' . $row['show2'] . ' 
				  </button>
				</a>
				<a href="show3.php"> 
				  <button type="button" 
				    class="btn btn-secondary" 
					role="button"> Book >  ' . $row['show3'] . ' 
				  </button>
				</a>
		    </div>
		   </div>
		    <hr>
		</div>
		</div>
		';
	} else {
		# Or add one of this product to the cart.
		$_SESSION['cart'][$movie_id] = array('quantity' => 1, 'price' => $row['mov_price']);

		echo '
      <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
			  <iframe class="embed-responsive-item" 
				src=' . $row['preview'] . ' 
				frameborder="0" 
				allow="accelerometer; 
				autoplay; 
				encrypted-media; 
				gyroscope; 
				picture-in-picture" 
				allowfullscreen>
			  </iframe>
			</div>
			 
		<div class="col-md-8">
          <h1 class="display-4">' . $row['movie_title'] . '</h1>
		  <p class="lead">Release Date:  ' . $row['d'] . '</p>
		  <p>Genre: ' . $row['genre'] . '</p>
		</div>
		
		<div class="col-sm-12 col-md-4">
		 <img src=' . $row['age_rating'] . ' alt="Movie" width="50px">
		 <p>' . $row['further_info'] . '</p>
		</div>
			
		<div class="col-sm-12 col-md-6">
		  <h4>Show Times</h4>
		  <hr>
           <div class="card">
            <div class="card-body">
             <h5 class="card-title">' . $row['theatre'] . '</h5>
			    <a href="show1.php">
			      <button type="button"
					class="btn btn-secondary" 
					role="button"> Book >  ' . $row['show1'] . ' 
				  </button>
				</a>
			    <a href="show2.php"> 
				  <button type="button" 
				    class="btn btn-secondary" 
					role="button"> Book >  ' . $row['show2'] . ' 
				  </button>
				</a>
				<a href="show3.php"> 
				  <button type="button" 
				    class="btn btn-secondary" 
					role="button"> Book >  ' . $row['show3'] . ' 
				  </button>
				</a>
		    </div>
		   </div>
		    <hr>
		</div>
		</div>
		';
	}
}
# Close database connection.
mysqli_close($link);
include('includes/footer.php');
?>