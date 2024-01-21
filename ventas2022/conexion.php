<?php
    $servername = "localhost";
    $database = "northwind";
    $username = "root";
    $password = "";
 
    $mysqli = new mysqli("localhost", $username, $password, $database);

    // Check connection
    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    //mysqli_close($mysqli);
    ?>