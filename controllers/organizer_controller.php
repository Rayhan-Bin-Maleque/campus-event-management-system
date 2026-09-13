<?php


require_once "models/event_model.php";

require_once "models/finance_model.php";

require_once "models/payment_model.php";

require_once "models/registration_model.php";

require_once "models/attendance_model.php";

require_once "models/log_model.php";






// =====================================
// ORGANIZER CONTROLLER
//
// Event CRUD
// Event Edit
// Event Statistics
// Performance Report
// Budget & Expense Tracking
// =====================================


function organizer_controller($action)
{


    global $conn;



    $organizer_id=$_SESSION['user']['id'];







// =====================================
// DASHBOARD
// =====================================


if($action=="dashboard")
{


    $events=get_organizer_events(

        $conn,

        $organizer_id

    );



    $finance=get_organizer_finance(

        $conn,

        $organizer_id

    );



    require "views/organizer/dashboard.php";


}









// =====================================
// CREATE EVENT
// =====================================


elseif($action=="add_event")
{


    if($_SERVER['REQUEST_METHOD']=="POST")
    {


        create_event(

            $conn,

            $organizer_id,

            clean($_POST['event_name']),

            clean($_POST['event_category']),

            clean($_POST['description']),

            $_POST['event_date'],

            clean($_POST['venue']),

            $_POST['capacity'],

            $_POST['registration_fee']

        );





        create_log(

            $conn,

            $organizer_id,

            "organizer",

            "Created event",

            $_SERVER['REMOTE_ADDR']

        );





        set_message(

            "success",

            "Event created successfully"

        );





        redirect(

            "index.php?page=organizer&action=dashboard"

        );


    }
    else
    {


        require "views/organizer/add_event.php";


    }


}









// =====================================
// EDIT EVENT
// =====================================


elseif($action=="edit_event")
{


    $id=$_GET['id'];



    if($_SERVER['REQUEST_METHOD']=="POST")
    {


        update_event(

            $conn,

            $id,

            clean($_POST['event_name']),

            clean($_POST['event_category']),

            clean($_POST['description']),

            $_POST['event_date'],

            clean($_POST['venue']),

            $_POST['capacity'],

            $_POST['registration_fee']

        );





        create_log(

            $conn,

            $organizer_id,

            "organizer",

            "Updated event ID ".$id,

            $_SERVER['REMOTE_ADDR']

        );





        set_message(

            "success",

            "Event updated successfully"

        );





        redirect(

            "index.php?page=organizer&action=dashboard"

        );


    }
    else
    {


        $event=get_event_by_id(

            $conn,

            $id

        );



        require "views/organizer/edit_event.php";


    }


}









// =====================================
// DELETE EVENT
// =====================================


elseif($action=="delete_event")
{


    delete_event(

        $conn,

        $_GET['id']

    );



    create_log(

        $conn,

        $organizer_id,

        "organizer",

        "Deleted event",

        $_SERVER['REMOTE_ADDR']

    );



    redirect(

        "index.php?page=organizer&action=dashboard"

    );


}
// =====================================
// STATISTICS
// =====================================


elseif($action=="statistics")
{


    $event_id=$_GET['id'];



    $registration=count_event_participants(

        $conn,

        $event_id

    );



    $revenue=event_revenue(

        $conn,

        $event_id

    );



    $attendance=attendance_summary(

        $conn,

        $event_id

    );



    require "views/organizer/statistics.php";


}









// =====================================
// PERFORMANCE REPORT
// =====================================


elseif($action=="performance")
{


    $events=get_organizer_events(

        $conn,

        $organizer_id

    );



    require "views/organizer/performance.php";


}









// =====================================
// FINANCE
// =====================================


elseif($action=="finance")
{


    if($_SERVER['REQUEST_METHOD']=="POST")
    {


        update_expense(

            $conn,

            $_POST['event_id'],

            $_POST['estimated_budget'],

            $_POST['expense'],

            $_POST['expense_details']

        );




        create_log(

            $conn,

            $organizer_id,

            "organizer",

            "Updated event finance",

            $_SERVER['REMOTE_ADDR']

        );




        set_message(

            "success",

            "Finance updated successfully"

        );




        redirect(

            "index.php?page=organizer&action=finance"

        );


    }






    $events=get_organizer_events(

        $conn,

        $organizer_id

    );





    $finance=get_organizer_finance(

        $conn,

        $organizer_id

    );





    require "views/organizer/finance.php";


}





}

?>