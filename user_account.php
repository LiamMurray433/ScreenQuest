<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['id'])) {
    require('login_tools.php');
    load();
}

// Open database connection
require('connect_db.php');

// Prepare the SQL query safely using prepared statements
if ($stmt = mysqli_prepare($link, "SELECT * FROM new_users WHERE id = ?")) {
    // Bind the session id to the prepared statement
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['id']);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $r = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($r) > 0) {
        // Output HTML structure
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Registration</title>
        </head>
        <body>
        ';

        // Fetch and display user data
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            $date = $row["created_at"];
            $day = substr($date, 8, 2);
            $month = substr($date, 5, 2);
            $year = substr($date, 0, 4);

            echo '
            <h1>' . $row['username'] . '</h1>
            <hr>
            User ID: EC2024/' . $row['id'] . '
            <hr>
            Email: ' . $row['email'] . '
            <hr>
            Registration Date: ' . $day . '/' . $month . '/' . $year . '
            <hr>
            ';
        }

        echo '</body></html>';
    } else {
        echo '<h3>No user details.</h3>';
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    echo '<h3>Error preparing query.</h3>';
}
?>
