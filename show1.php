<?php
include('includes/nav.php');

?>

<!doctype html>
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

<body>
    <div class="container">
        <h1>Booking</h1>

        <!--<script src=\"script.js\"></script>-->

        <?php # DISPLAY SHOPPING CART ADDITIONS PAGE.
        # Access session.
        session_start();
        # Redirect if not logged in.
        if (!isset($_SESSION['id'])) {
            require('login_tools.php');
            load();
        }
        # Get passed product id and assign it to a variable.
        if (isset($_GET['id'])) $id = $_GET['id'];
        # Check if form has been submitted for update.
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # Update changed quantity field values.
            foreach ($_POST['qty'] as $id => $mov_qty) {
                # Ensure values are integers.
                $id = (int) $id;
                $qty = (int) $mov_qty;

                # Change quantity or delete if zero.
                if ($qty == 0) {
                    unset($_SESSION['cart'][$id]);
                } elseif ($qty > 0) {
                    $_SESSION['cart'][$id]['quantity'] = $qty;
                }
            }
        }

        # Initialize grand total variable.
        $total = 0;

        # Display the cart if not empty.
        if (!empty($_SESSION['cart'])) {
            # Open database connection.
            require('connect_db.php');

            # Retrieve all items in the cart from the 'movie' database table.
            $q = "SELECT * FROM movie_listings WHERE movie_id IN (";
            foreach ($_SESSION['cart'] as $id => $value) {
                $q .= $id . ',';
            }
            $q = substr($q, 0, -1) . ') ORDER BY movie_id ASC';
            $r = mysqli_query($link, $q);

            # Display body section with a form and a table. 
            echo '
	<div class="row">
	 <div class="col-sm">
	  <div class="card bg-light mb-3">
	    <div class="card-header"> 
		  <h5 class="card-title">Booking Summary</h5>
		</div>
      <div class="card-body">
	  <form action="show1.php" method="post">
	   ';
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                # Calculate sub-totals and grand total.
                $subtotal = $_SESSION['cart'][$row['movie_id']]['quantity'] * $_SESSION['cart'][$row['movie_id']]['price'];
                $total += $subtotal;

                # Display the row/s:
                echo " <ul class=\"list-group list-group-flush\">
			<li class=\"list-group-item\">
			  <div class=\"form-group row\">
			  <h4> {$row['theatre']} </h4>
               <label for=\"movie_title\" 
					class=\"col-sm-12 col-form-label\">Movie Title: {$row['movie_title']}</label> 
			</li>
			<li class=\"list-group-item\">
			  <div class=\"form-group row\">
			   <label for=\"show time\" 
					class=\"col-sm-12 col-form-label\">Starting @ {$row['show1']}</label> 			  
			</li>
		   </ul>
			<br>
		<div class=\"input-group mb-3\">
		  <button class=\"btn btn-dark\"  onclick=\"decrement()\">-</button>
			<input type=\"text\" 
			class=\"form-control\text-center\" 
			id=\"quantity\" 
			name=\" qty[{$row['movie_id']}]\" 
			value=\" {$_SESSION['cart'][$row['movie_id']]['quantity']}\" 
			aria-label=\"Recipient's username\" 
			aria-describedby=\"basic-addon2\" readonly>
				   <button class=\"btn btn-dark\"  onclick=\"increment()\">+</button>
				   <script src=\"script.js\"></script>
				</div>
	</form> ";
            }
            # Display the total.
            echo '<ul class="list-group list-group-flush">
			<li class="list-group-item">
			  <div class="form-group row">
				<label for="Total" class="col-sm-12 col-form-label">To Pay:  &pound ' . number_format($total, 2) . '</label> 			  
			  </div>
			</li>
		
		 
			<li class="list-group-item">
			  
				<a href="checkout.php?total=' . $total . '"><button type="button" class="btn btn-secondary btn-block" role="button">Book Now</button></a>
		      
			</li>
		</ul>
		
		</form>
		
		</div>
		</div>
		</div>
		</div>
		</div>
		';
        } else
        # Or display a message.
        {
            echo '<div class="container">
			<div class="alert alert-secondary" role="alert">
			<h2>No reservations have been made.</h2>
			<a href="movie_listing.php" class="alert-link">View What\'s On Now </a>
		</div>';
        }
        ?>

        <script>
            function updateQuantity(change) {
                let quantityInput = document.getElementById('quantity');
                let quantity = parseInt(quantityInput.value) + change;

                if (quantity < 1) return; // Prevent quantity from being less than 1

                quantityInput.value = quantity;
                updateTotal(quantity);
            }

            function updateTotal(quantity) {
                // AJAX request to update total
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "show1.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        document.getElementById('total').innerText = xhr.responseText;
                    }
                };
                xhr.send("quantity=" + quantity + "&price=" + price);
            }
        </script>
    </div>
</body>
</html>
<?php
    include('includes/footer.php');
?>