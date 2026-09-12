<?php

// =====================================
// DATABASE CONFIGURATION
// =====================================


$host = "localhost";

$username = "root";

$password = "";

$database = "campus_event_managementt";



// =====================================
// DATABASE CONNECTION
// =====================================


$conn = mysqli_connect(
    $host,
    $username,
    $password,
    $database
);



if(!$conn){

    die(
        "Database Connection Failed: "
        . mysqli_connect_error()
    );

}



// UTF-8 SUPPORT

mysqli_set_charset(
    $conn,
    "utf8mb4"
);



// =====================================
// SESSION START
// =====================================

if(session_status() === PHP_SESSION_NONE){

    session_start();

}


?>