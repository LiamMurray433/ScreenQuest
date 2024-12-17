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

?>
<section class="vh-100" style="background-color: #000F08">
    <div class="container py-5 h-100">
        <form action="login_action.php" method="post">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Sign in</h3>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="typeEmailX-2">Email</label>
                                <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" required>
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="typePasswordX-2">Password</label>
                                <input type="password" class="form-control form-control-lg" placeholder="password" name="password" required>
                            </div>
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" style="background-color: #8A3033;" type="submit">Login</button>
                            <hr class="my-4">
                            <a href="register.php">Not a member? Sign up!!</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

</html>