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
    <!-- Hotjar Tracking Code for https://webdev.edinburghcollege.ac.uk/~HNDCSSA13/ScreenQuest/index.php -->
        <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:5225364,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</head>

<?php
include('includes/nav.php');

?>
<section class="vh-100" style="background-color: #EEF0F2;">
    <div class="container py-5 h-100">
        <form action="login_action.php" method="post">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Sign in</h3>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" required>
                                <label class="form-label" for="typeEmailX-2">Email</label>
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" class="form-control form-control-lg" placeholder="password" name="password" required>
                                <label class="form-label" for="typePasswordX-2">Password</label>
                            </div>
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" style="background-color: #648381;" type="submit">Login</button>
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