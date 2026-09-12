<?php


require_once "models/user_model.php";

require_once "models/event_model.php";

require_once "models/payment_model.php";

require_once "models/attendance_model.php";

require_once "models/log_model.php";




// =====================================
// AJAX CONTROLLER
//
// JSON RESPONSE
//
// Search Features
// =====================================


function ajax_controller($action)
{


    global $conn;



    header(
        "Content-Type: application/json"
    );





    // =====================================
    // USER SEARCH
    // ADMIN
    // NAME / EMAIL
    // =====================================


    if($action=="search_users")
    {


        $keyword =
        $_GET['search'] ?? "";



        $result =
        search_users(

            $conn,

            $keyword

        );



        $data=[];



        while(
            $row=mysqli_fetch_assoc($result)
        )
        {


            $data[]=$row;


        }



        echo json_encode($data);



    }









    // =====================================
    // EVENT SEARCH
    // ADMIN / ORGANIZER / STUDENT
    // =====================================


    elseif($action=="search_events")
    {


        $keyword =
        $_GET['search'] ?? "";



        $result =
        search_events(

            $conn,

            $keyword

        );



        $data=[];



        while(
            $row=mysqli_fetch_assoc($result)
        )
        {


            $data[]=$row;


        }



        echo json_encode($data);



    }









    // =====================================
    // PAYMENT SEARCH
    // ADMIN
    // =====================================


    elseif($action=="search_payments")
    {


        $keyword =
        $_GET['search'] ?? "";



        $result =
        search_payments(

            $conn,

            $keyword

        );



        $data=[];



        while(
            $row=mysqli_fetch_assoc($result)
        )
        {


            $data[]=$row;


        }



        echo json_encode($data);



    }









    // =====================================
    // STUDENT MY EVENT SEARCH
    // =====================================


    elseif($action=="search_student_events")
    {


        $keyword =
        $_GET['search'] ?? "";



        $student_id =
        $_SESSION['user']['id'];



        $result =
        search_student_events(

            $conn,

            $student_id,

            $keyword

        );



        $data=[];



        while(
            $row=mysqli_fetch_assoc($result)
        )
        {


            $data[]=$row;


        }



        echo json_encode($data);



    }









    // =====================================
    // STAFF STUDENT SEARCH
    // =====================================


    elseif($action=="search_students")
    {


        $keyword =
        $_GET['search'] ?? "";



        $event_id =
        $_GET['event_id'];



        $result =
        search_attendance_students(

            $conn,

            $event_id,

            $keyword

        );



        $data=[];



        while(
            $row=mysqli_fetch_assoc($result)
        )
        {


            $data[]=$row;


        }



        echo json_encode($data);



    }









    // =====================================
    // ACTIVITY LOG SEARCH
    // ADMIN
    // =====================================


    elseif($action=="search_logs")
    {


        $keyword =
        $_GET['search'] ?? "";



        $result =
        search_logs(

            $conn,

            $keyword

        );



        $data=[];



        while(
            $row=mysqli_fetch_assoc($result)
        )
        {


            $data[]=$row;


        }



        echo json_encode($data);



    }









    else

    {


        echo json_encode([

            "status"=>"error",

            "message"=>"Invalid AJAX request"

        ]);

    }



}



?>