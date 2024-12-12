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


<?php # DISPLAY COMPLETE REGISTRATION PAGE.
# Check form submitted.

include('includes/nav.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # Connect to the database.
    require('connect_db.php');

    # Initialize an error array.
    $errors = array();

    # Check for a first name.
    if (empty($_POST['username'])) {
        $errors[] = 'Enter your name.';
    } else {
        $un = mysqli_real_escape_string($link, trim($_POST['username']));
    }


    # Check for an email address:
    if (empty($_POST['email'])) {
        $errors[] = 'Enter your email address.';
    } else {
        $e = mysqli_real_escape_string($link, trim($_POST['email']));
    }

    # Check for an email address:
    if (empty($_POST['firstname'])) {
        $errors[] = 'Enter your first name';
    } else {
        $fn = mysqli_real_escape_string($link, trim($_POST['firstname']));
    }

    # Check for an email address:
    if (empty($_POST['surname'])) {
        $errors[] = 'Enter your surname';
    } else {
        $sn = mysqli_real_escape_string($link, trim($_POST['surname']));
    }



    # Check for a password and matching input passwords.
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Passwords do not match.';
        } else {
            $p = mysqli_real_escape_string($link, trim($_POST['pass1']));
        }
    } else {
        $errors[] = 'Enter your password.';
    }

    # Check if email address already registered.
    if (empty($errors)) {
        $q = "SELECT id FROM new_users WHERE email='$e'";
        $r = @mysqli_query($link, $q);
        if (mysqli_num_rows($r) != 0) $errors[] =
            'Email address already registered. 
	<a class="alert-link" href="login.php">Sign In Now</a>';
    }



    # On success register user inserting into 'users' database table.
    if (empty($errors)) {
        $q = "INSERT INTO new_users (username, email, password, first_name, last_name) 
	VALUES ('$un', '$e', SHA2('$p',256), '$fn', '$sn')";
        $r = mysqli_query($link, $q);
        if ($r) {
            echo '
	<p>You are now registered.</p>
	<a class="alert-link" href="login.php">Login</a>
		   ';
        }

        # Close database connection.
        mysqli_close($link);

        exit();
    }
    # Or report errors.
    else {
        echo '
	<h4>The following error(s) occurred:</h4>';
        foreach ($errors as $msg) {
            echo " - $msg<br>";
        }
        echo '<p>or please try again.</p><br>';
        # Close database connection.
        mysqli_close($link);
    }
}
?>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" class="was-validated" method="post">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input name="firstname"
                            placeholder="firstname"
                            class="form-control"
                            value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>"
                            required>
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input name="surname"
                            placeholder="surname"
                            class="form-control"
                            value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>"
                            required>
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input name="username"
                            placeholder="username"
                            class="form-control"
                            value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"
                            required>
                    </div>
                </div>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email"
                    name="email"
                    class="form-control"
                    placeholder="Email"
                    value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"
                    required><br>
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password"
                    name="pass1"
                    class="form-control"
                    placeholder="Create New Password"
                    value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"
                    required>
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password"
                    name="pass2"
                    class="form-control"
                    placeholder="Confirm Password"
                    value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"
                    required>
            </div>

            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4" style="background-color: #648381">Sign up</button>

        </form>
    </div>
    <?php
    include('includes/footer.php');
