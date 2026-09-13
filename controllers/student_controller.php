<?php


require_once "models/event_model.php";

require_once "models/registration_model.php";

require_once "models/payment_model.php";

require_once "models/attendance_model.php";

require_once "models/ticket_model.php";

require_once "models/log_model.php";




// =====================================
// STUDENT CONTROLLER
// =====================================


function student_controller($action)
{


    global $conn;


    $student_id = $_SESSION['user']['id'];






    // =====================================
    // DASHBOARD
    // =====================================


    if($action=="dashboard")
    {


        $events = get_available_events($conn);


        $my_events = get_student_events(

            $conn,

            $student_id

        );



        $payments = get_student_payments(

            $conn,

            $student_id

        );



        $attendance = get_student_attendance(

            $conn,

            $student_id

        );



        require "views/student/dashboard.php";


    }






    // =====================================
    // AVAILABLE EVENTS
    // =====================================


    elseif($action=="events")
    {


        $events = get_available_events($conn);


        require "views/student/events.php";


    }






    // =====================================
    // REGISTER EVENT
    // =====================================


    elseif($action=="register" || $action=="register_event")
    {


        $event_id=$_GET['id'];



        if(check_registration(

            $conn,

            $event_id,

            $student_id

        ))
        {


            echo "

            <script>

            alert('You are already registered. Please go to My Events and complete payment.');

            window.location='index.php?page=student&action=my_events';

            </script>

            ";

            exit;


        }



        register_event(

            $conn,

            $event_id,

            $student_id

        );





        create_log(

            $conn,

            $student_id,

            "student",

            "Registered event ID ".$event_id,

            $_SERVER['REMOTE_ADDR']

        );





        echo "

        <script>

        alert('Registration successful! Please go to My Events and complete payment.');

        window.location='index.php?page=student&action=my_events';

        </script>

        ";


        exit;


    }








    // =====================================
    // MY EVENTS
    // =====================================


    elseif($action=="my_events")
    {


        $my_events=get_student_events(

            $conn,

            $student_id

        );



        require "views/student/my_events.php";


    }








    // =====================================
    // CANCEL REGISTRATION
    // =====================================


    elseif($action=="cancel")
    {


        $registration_id=$_GET['id'];



        cancel_registration(

            $conn,

            $registration_id

        );




        create_log(

            $conn,

            $student_id,

            "student",

            "Cancelled registration ID ".$registration_id,

            $_SERVER['REMOTE_ADDR']

        );





        echo "

        <script>

        alert('Registration cancelled successfully.');

        window.location='index.php?page=student&action=my_events';

        </script>

        ";


        exit;


    }








    // =====================================
    // PAYMENT
    // =====================================


    elseif($action=="payment")
    {


        if($_SERVER['REQUEST_METHOD']=="POST")
        {


            $event_id=$_POST['event_id'];



            $registration_id=0;



            $query=mysqli_query(

                $conn,

                "

                SELECT id

                FROM registrations

                WHERE student_id='$student_id'

                AND event_id='$event_id'

                LIMIT 1

                "

            );





            if(mysqli_num_rows($query)>0)
            {


                $row=mysqli_fetch_assoc($query);


                $registration_id=$row['id'];


            }

            else
            {


                register_event(

                    $conn,

                    $event_id,

                    $student_id

                );


                $registration_id=mysqli_insert_id($conn);


            }







            // CREATE PAYMENT

            create_payment(

                $conn,

                $registration_id,

                $student_id,

                $event_id,

                $_POST['amount'],

                $_POST['payment_method'],

                $_POST['transaction_id']

            );






            // =====================================
            // CREATE TICKET
            // =====================================


            $check_ticket=mysqli_query(

                $conn,

                "

                SELECT id

                FROM tickets

                WHERE registration_id='$registration_id'

                LIMIT 1

                "

            );




            if(mysqli_num_rows($check_ticket)==0)
            {


                $ticket_code="TICKET-".strtoupper(uniqid());


                $qr_code=$ticket_code;



                create_ticket(

                    $conn,

                    $registration_id,

                    $ticket_code,

                    $qr_code

                );


            }








            create_log(

                $conn,

                $student_id,

                "student",

                "Payment completed and ticket generated for event ".$event_id,

                $_SERVER['REMOTE_ADDR']

            );








            set_message(

                "success",

                "Payment completed successfully"

            );





            redirect(

                "index.php?page=student&action=my_events"

            );


        }







        $events=get_available_events($conn);



        require "views/student/payment.php";


    }








    // =====================================
    // TICKET
    // =====================================


    elseif($action=="ticket")
    {


        $registration_id=$_GET['id'];



        $ticket=get_student_ticket(

            $conn,

            $registration_id

        );



        require "views/student/ticket.php";


    }








    // =====================================
    // ATTENDANCE
    // =====================================


    elseif($action=="attendance")
    {


        $attendance=get_student_attendance(

            $conn,

            $student_id

        );



        require "views/student/attendance.php";


    }








    // =====================================
    // SEARCH
    // =====================================


    elseif($action=="search")
    {


        $keyword=$_GET['search'];



        $events=search_events(

            $conn,

            $keyword

        );



        require "views/student/events.php";


    }








    // =====================================
    // RECOMMENDED EVENTS
    // =====================================


    elseif($action=="recommend")
    {


        $events=get_available_events($conn);



        require "views/student/recommend.php";


    }





}

?>