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
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'includes/nav.php';
?>

<html>
<h1>Add movie to listing</h1>
<form action="create.php" method="post">
    <!-- input box for item name  -->
    <label for="movie_title">Movie title:</label>
    <input type="text"
        id="movie_title"
        class="form-control"
        name="movie_title"
        required
        value="<?php if (isset($_POST['movie_title'])) echo $_POST['movie_title']; ?> ">

    <!-- input box for item description -->
    <label for="genre">Genre:</label>
    <input type="text"
        id="genre"
        class="genre"
        name="genre"
        required
        value="<?php if (isset($_POST['genre'])) echo $_POST['genre']; ?>">

    <!-- input box for age rating description -->
    <label for="age_rating">Age Rating:</label>
    <input type="age_rating"
        id="age_rating"
        class="age_rating"
        name="age_rating"
        required
        value="<?php if (isset($_POST['age_rating'])) echo $_POST['age_rating']; ?>">

    <!-- input for show time 1 -->
    <label for="show1">Show1:</label>
    <input type="text"
        id="show1"
        class="show1"
        name="show1"
        required
        value="<?php if (isset($_POST['show1'])) echo $_POST['show1']; ?>">

    <!-- input for show time 3 -->
    <label for="show2">Show2:</label>
    <input type="text"
        id="show2"
        class="show2"
        name="show2"
        required
        value="<?php if (isset($_POST['show2'])) echo $_POST['show2']; ?>">

    <!-- input for show time 3 -->
    <label for="show3">Show3:</label>
    <input type="text"
        id="show3"
        class="show3"
        name="show3"
        required
        value="<?php if (isset($_POST['show3'])) echo $_POST['show3']; ?>">

    <!-- input for theatre -->
    <label for="theatre">Theatre:</label>
    <input type="text"
        id="theatre"
        class="theatre"
        name="theatre"
        required
        value="<?php if (isset($_POST['theatre'])) echo $_POST['theatre']; ?>">

    <!-- input for further info -->
    <label for="further_info">Further Info:</label>
    <textarea id="further_info"
        class="further_info"
        name="further_info"
        required><?php if (isset($_POST['further_info'])) echo $_POST['further_info']; ?>
    </textarea>

    <!-- input for release -->
    <label for="d">release:</label>
    <input type="text"
        id="d"
        class="d"
        name="d"
        required
        value="<?php if (isset($_POST['d'])) echo $_POST['d']; ?>">

    <!-- input box for image path -->
    <label for="img">Image:</label>
    <input type="text"
        id="img"
        class="form-control"
        name="img"
        required
        value="<?php if (isset($_POST['img'])) echo $_POST['img']; ?>">

    <!-- input for preview -->
    <label for="preview">preview:</label>
    <input type="text"
        id="preview"
        class="preview"
        name="preview"
        required
        value="<?php if (isset($_POST['preview'])) echo $_POST['preview']; ?>">


    <!-- input box for item price -->
    <label for="mov_price">Price:</label>
    <input
        type="number"
        id="mov_price"
        class="form-control"
        name="mov_price"
        min="0" step="0.01"
        required
        value="<?php if (isset($_POST['mov_price'])) echo $_POST['mov_price']; ?>"><br>


    <!-- submit button -->
    <input type="submit" class="btn btn-dark" value="Submit">
</form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('connect_db.php');

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    $result = mysqli_query($link, "SHOW TABLES");
    if ($result) {
        while ($row = mysqli_fetch_row($result)) {
            echo $row[0] . '<br>';
        }
    } else {
        echo '<p>Database error: ' . mysqli_error($link) . '</p>';
    }



    # Initialize an error array.
    $errors = array();

    # Check for movie title .
    if (empty($_POST['movie_title'])) {
        $errors[] = 'Enter the movie title.';
    } else {
        $title = mysqli_real_escape_string($link, trim($_POST['movie_title']));
    }

    # Check for genre.
    if (empty($_POST['genre'])) {
        $errors[] = 'Enter the movie genre.';
    } else {
        $genre = mysqli_real_escape_string($link, trim($_POST['genre']));
    }

    # Check for ager ating.
    if (empty($_POST['age_rating'])) {
        $errors[] = 'Enter the age rating.';
    } else {
        $age = mysqli_real_escape_string($link, trim($_POST['age_rating']));
    }

    # Check for showtime1.
    if (empty($_POST['show1'])) {
        $errors[] = 'Enter the 1st showing.';
    } else {
        $s1 = mysqli_real_escape_string($link, trim($_POST['show1']));
    }

    # Check for showtime2.
    if (empty($_POST['show2'])) {
        $errors[] = 'Enter the 2nd showing.';
    } else {
        $s2 = mysqli_real_escape_string($link, trim($_POST['show2']));
    }
    # Check for a showtime3.
    if (empty($_POST['show3'])) {
        $errors[] = 'Enter the 3rd showing.';
    } else {
        $s3 = mysqli_real_escape_string($link, trim($_POST['show3']));
    }

    # Check for a theatre.
    if (empty($_POST['theatre'])) {
        $errors[] = 'Enter the theatre.';
    } else {
        $theatre = mysqli_real_escape_string($link, trim($_POST['theatre']));
    }
    # Check for a info.
    if (empty($_POST['further_info'])) {
        $errors[] = 'Enter some info.';
    } else {
        $info = mysqli_real_escape_string($link, trim($_POST['further_info']));
    }
    if (empty($_POST['d'])) {
        $errors[] = 'Enter a date.';
    } else {
        $d = mysqli_real_escape_string($link, trim($_POST['d']));
    }
    if (empty($_POST['img'])) {
        $errors[] = 'Enter an img.';
    } else {
        $img = mysqli_real_escape_string($link, trim($_POST['img']));
    }
    if (empty($_POST['preview'])) {
        $errors[] = 'Enter a preview.';
    } else {
        $preview = mysqli_real_escape_string($link, trim($_POST['preview']));
    }
    if (empty($_POST['mov_price'])) {
        $errors[] = 'Enter a price.';
    } else {
        $price = mysqli_real_escape_string($link, trim($_POST['mov_price']));
    }

    # On success data into my_table on database.
    if (empty($errors)) {
        $q = "INSERT INTO movie_listings (movie_title, genre, age_rating, show1, show2, show3, theatre, further_info, d, img, preview, mov_price) 
        VALUES ('$title', '$genre', '$age', '$s1', '$s2', '$s3', '$theatre', '$info', '$d', '$img', '$preview', '$price')";

        $r = mysqli_query($link, $q);
        // Check if the query was successful
        if ($r) {
            echo '<p>New record created successfully</p>';
        } else {
            // Display the error message if the query fails
            echo '<p>Error inserting record: ' . mysqli_error($link) . '</p>';
        }
    }

    # Or report errors.
    else {
        echo '<p>The following error(s) occurred:</p>';
        foreach ($errors as $msg) {
            echo "$msg<br>";
        }
        echo '<p>Please try again.</p></div>';
        # Close database connection.
        mysqli_close($link);
    }
}

include 'includes/footer.php';
?>