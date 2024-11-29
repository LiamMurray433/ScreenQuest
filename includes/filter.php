<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <title>Search Function</title>
    <script>
        //The code inside a JavaScript function will execute when "something" invokes it.
        function showUser(str) {
            //Condition if statement option is equal to comparison operator
            if (str == "") {
                //JavaScript HTML method ".getElementById" and changes the element content ".innerHTML"
                document.getElementById("txtHint").innerHTML = "";
                //The return statement stops the execution of a function and returns a value from that function.
                return;
            } else {
                //The XMLHttpRequest object can be used to exchange data with a web server behind the scenes. This means that it is possible to update parts of a web page, without reloading the whole page.
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                //The readyState property holds the status of the XMLHttpRequest.
                //The onreadystatechange property defines a function to be executed when the readyState changes.

                xmlhttp.onreadystatechange = function() {
                    //The status property and the status property holds the status of the XMLHttpRequest object.
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };

                //To send a request to a server, we use the open() and send() methods of the XMLHttpRequest object:
                xmlhttp.open("GET", "getmovie.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>
<!--  close head-->

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
        <a class="navbar-brand" href="#">Navbar with Filter Function</a>
        <form class="form-inline my-2 my-lg-0">
            <select class="form-control " id="exampleFormControlSelect2 name=" users" onchange="showUser(this.value)">
                <option value="">Select Movie:</option>
                <?php
                # Open database connection.
                require('connect_db.php');
                # Retrieve movies from 'movie' database table.
                $q = "SELECT * FROM movie_listings";
                $r = mysqli_query($link, $q);
                if (mysqli_num_rows($r) > 0) {
                    # Display body section.

                    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                        echo '
					
					<option value=' . $row['movie_id'] . '>' . $row['movie_title'] . '</option>
			 
		 ';
                    }
                    # Close database connection.
                    mysqli_close($link);
                }
                ?>
            </select>
        </form>
    </nav><!-- Close Navbar  -->
    <!--  =============================
	=====    Search Result  =======
	=================================== -->
    <div class="container">
        <div id="">


        </div>