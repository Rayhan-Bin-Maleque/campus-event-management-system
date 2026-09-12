<?php


// =====================================
// SESSION START
// =====================================


if(session_status() === PHP_SESSION_NONE)
{

    session_start();

}







// =====================================
// CLEAN INPUT
// SECURITY
// =====================================


function clean($data)
{


    global $conn;



    $data = trim($data);



    $data = mysqli_real_escape_string(

        $conn,

        $data

    );



    return $data;


}









// =====================================
// HTML ESCAPE
// XSS PROTECTION
// =====================================


function e($data)
{


    return htmlspecialchars(

        $data ?? '',

        ENT_QUOTES,

        'UTF-8'

    );


}









// =====================================
// REDIRECT
// =====================================


function redirect($url)
{


    header(

        "Location: ".$url

    );


    exit();


}









// =====================================
// SESSION MESSAGE
// =====================================


function set_message(
    $type,
    $message
)
{


    $_SESSION['message']=[

        "type"=>$type,

        "text"=>$message

    ];


}









// =====================================
// DISPLAY MESSAGE
// =====================================


function show_message()
{


    if(isset($_SESSION['message']))
    {


        $type =
        $_SESSION['message']['type'];



        $text =
        $_SESSION['message']['text'];



        echo "

        <div class='alert $type'>

        ".e($text)."

        </div>

        ";



        unset(

            $_SESSION['message']

        );


    }


}









// =====================================
// LOGIN CHECK
// =====================================


function require_login()
{


    if(!isset($_SESSION['user']))
    {


        redirect(

            "index.php?page=auth&action=login"

        );


    }


}









// =====================================
// ROLE CHECK
// =====================================


function require_role($role)
{


    require_login();



    if(

        $_SESSION['user']['role']

        !=

        $role

    )
    {


        redirect(

            "index.php"

        );


    }


}









// =====================================
// CHECK ADMIN
// =====================================


function is_admin()
{


    return isset($_SESSION['user'])

    &&

    $_SESSION['user']['role']=="admin";


}









// =====================================
// CHECK ORGANIZER
// =====================================


function is_organizer()
{


    return isset($_SESSION['user'])

    &&

    $_SESSION['user']['role']=="organizer";


}









// =====================================
// CHECK STUDENT
// =====================================


function is_student()
{


    return isset($_SESSION['user'])

    &&

    $_SESSION['user']['role']=="student";


}









// =====================================
// CHECK STAFF
// =====================================


function is_staff()
{


    return isset($_SESSION['user'])

    &&

    $_SESSION['user']['role']=="staff";


}









// =====================================
// GENERATE TICKET CODE
// DIGITAL TICKET
// =====================================


function generate_ticket_code()
{


    return "EVT-"

    .

    strtoupper(

        substr(

            md5(

                uniqid()

            ),

            0,

            8

        )

    );


}









// =====================================
// CONFIRM DELETE SCRIPT
// =====================================


function confirm_delete()
{


    return "return confirm('Are you sure you want to delete?');";


}









// =====================================
// CURRENT USER ID
// =====================================


function user_id()
{


    return $_SESSION['user']['id'] ?? null;


}









// =====================================
// CURRENT USER ROLE
// =====================================


function user_role()
{


    return $_SESSION['user']['role'] ?? null;


}



?>