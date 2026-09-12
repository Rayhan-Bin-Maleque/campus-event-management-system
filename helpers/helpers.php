<?php


// =====================================
// REDIRECT FUNCTION
// =====================================

function redirect($url)
{

    header("Location: ".$url);

    exit();

}



// =====================================
// ESCAPE OUTPUT
// SECURITY FUNCTION
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
// CHECK LOGIN
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
        !isset($_SESSION['user']['role'])
        ||
        $_SESSION['user']['role'] != $role
    )
    {

        redirect(
            "index.php?page=auth&action=login"
        );

    }

}



// =====================================
// GET CURRENT USER
// =====================================

function current_user()
{

    return $_SESSION['user'] ?? null;

}



// =====================================
// CHECK POST REQUEST
// =====================================

function is_post()
{

    return $_SERVER['REQUEST_METHOD'] === 'POST';

}



// =====================================
// INPUT CLEANING
// =====================================

function clean($data)
{

    return trim(
        htmlspecialchars(
            $data,
            ENT_QUOTES,
            'UTF-8'
        )
    );

}



// =====================================
// FLASH MESSAGE
// =====================================

function set_message(
    $type,
    $message
)
{

    $_SESSION['message'] = [

        "type"=>$type,

        "text"=>$message

    ];

}



// =====================================
// SHOW FLASH MESSAGE
// =====================================

function show_message()
{

    if(isset($_SESSION['message']))
    {

        $msg=$_SESSION['message'];


        echo "

        <div class='alert {$msg['type']}'>

        {$msg['text']}

        </div>

        ";


        unset($_SESSION['message']);

    }

}



// =====================================
// GENERATE TICKET CODE
// =====================================

function generate_ticket_code()
{

    return "EVT-"
    .date("Y")
    ."-"
    .strtoupper(
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
// GENERATE RANDOM STRING
// =====================================

function random_string($length=10)
{

    return substr(
        str_shuffle(
            "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
        ),
        0,
        $length
    );

}


?>