<?php
include 'includes/nav.php';
?>

<html>
<h1>Add movie to listing</h1>
<form action="create.php" method="post">
    <!-- input box for item name  -->
    <label for="name">Movie Name:</label>
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
    <textarea type="text"
        id="further_info"
        class="further_info"
        name="further_info"
        required
        value="<?php if (isset($_POST['further_info'])) echo $_POST['further_info']; ?>">
    </textarea>

    <!-- input for release -->
    <label for="release">release:</label>
    <input type="text"
        id="release"
        class="release"
        name="release"
        required
        value="<?php if (isset($_POST['release'])) echo $_POST['release']; ?>">

    <!-- input box for image path -->
    <label for="img">Image:</label>
    <input type="text"
        id="img"
        class="form-control"
        name="img"
        required
        value="<?php if (isset($_POST['img'])) echo $_POST['img']; ?>">

    <!-- input for preview -->
    <label for="release">preview:</label>
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

    # Initialize an error array.
    $errors = array();

    # Check for item name .
    if (empty($_POST['movie_title'])) {
        $errors[] = 'Enter the movie title.';
    } else {
        $n = mysqli_real_escape_string($link, trim($_POST['movie_title']));
    }

    # Check for a item decription.
    if (empty($_POST['genre'])) {
        $errors[] = 'Enter the movie genre.';
    } else {
        $d = mysqli_real_escape_string($link, trim($_POST['genre']));
    }

    # Check for a item image.
    if (empty($_POST['age_rating'])) {
        $errors[] = 'Enter the age rating.';
    } else {
        $img = mysqli_real_escape_string($link, trim($_POST['age_rating']));
    }

    # Check for a item price.
    if (empty($_POST['show1'])) {
        $errors[] = 'Enter the 1st showing.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['show1']));
    }

    # Check for a item price.
    if (empty($_POST['show2'])) {
        $errors[] = 'Enter the 2nd showing.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['show2']));
    }
    # Check for a item price.
    if (empty($_POST['show3'])) {
        $errors[] = 'Enter the 3rd showing.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['show3']));
    }

    # Check for a item price.
    if (empty($_POST['theatre'])) {
        $errors[] = 'Enter the theatre.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['theatre']));
    }
    # Check for a item price.
    if (empty($_POST['further_info'])) {
        $errors[] = 'Enter some info.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['further_info']));
    }
    if (empty($_POST['release'])) {
        $errors[] = 'Enter some release.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['release']));
    }
    if (empty($_POST['img'])) {
        $errors[] = 'Enter an img.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['img']));
    }
    if (empty($_POST['preview'])) {
        $errors[] = 'Enter a preview.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['preview']));
    }
    if (empty($_POST['mov_price'])) {
        $errors[] = 'Enter a price.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['mov_price']));
    }



    # On success data into my_table on database.
    if (empty($errors)) {
        $q = "INSERT INTO products (item_name, item_desc, item_img, item_price) 
	VALUES ('$n','$d', '$img', '$p' )";
        $r = @mysqli_query($link, $q);
        if ($r) {
            echo '<p>New record created successfully</p>';
        }

        # Close database connection.
        mysqli_close($link);

        exit();
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