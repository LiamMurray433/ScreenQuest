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
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<?php
include('includes/nav.php');
include('includes/filter.php')

?>

<body>
    <div id="form-container">
        <div class="contact-form">
            <form>
                <label for="fname">First name:</label>
                <input type="text" id="fname" name="fname">

                <label for="lname"> Last name:</label>
                <input type="text" id="lname" name="lname">

                <label for="location">Location: </label>
                <select name="location" id="location">
                    <option value="Europe">Europe</option>
                    <option value="Americas">Americas</option>
                    <option value="Asia">Asia</option>
                </select>

                <label for="subject">Subject</label>
                <textarea name="subject" id="subject" cols="30" rows="10" placeholder="Write something..."></textarea>
                <input type="submit" value="Submit" id="submit">
            </form>
        </div>
    </div>
    <div class="social-media-container">
        <h3>Stay Connected</h3>
        <br>
        <div class="social-icons">
                <a href="https://www.facebook.com/" class="bi bi-facebook custom-icon"></a>
                <a href="https://twitter.com/" class="bi bi-twitter custom-icon"></a>
                <a href="https://www.instagram.com/" class="bi bi-instagram custom-icon"></a>
        </div>
    </div>
</body>
</html>

<?php
include('includes/footer.php');