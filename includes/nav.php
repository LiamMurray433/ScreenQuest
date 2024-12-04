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

<body>
    <div class="nav-container">
        <nav class="navbar navbar-expand-lg custom-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Screen Quest</a>
                <button class="navbar-toggler" type="button"
                    data-toggle="collapse"
                    data-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="movie_listing.php">What's On</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="movie_listing.php">Coming Soon</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ml-auto d-flex">
                <div class="nav-item">
                    <a class="nav-link bi bi-person-fill custom-icon" href="user_account.php"></a>
                </div>
                <div class="nav-item">
                    <a class="nav-link bi bi-cart-fill custom-icon" href="show1.php"></a>
                </div>
                <div class="nav-item">
                    <a class="nav-link bi bi-box-arrow-right custom-icon" href="logout.php"></a>
                </div>
            </div>
        </nav>
    </div>
</body>