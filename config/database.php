<?php


// =====================================
// DATABASE CONNECTION
// CAMPUS EVENT MANAGEMENT SYSTEM
// =====================================



$host = "localhost";

$username = "root";

$password = "";

$database = "campus_event_managementt";




// CREATE CONNECTION


$conn = mysqli_connect(

    $host,

    $username,

    $password,

    $database

);




// CHECK CONNECTION


if(!$conn)
{


    die(

        "Database Connection Failed: "

        . mysqli_connect_error()

    );


}



// SET CHARSET


mysqli_set_charset(

    $conn,

    "utf8"

);



?>