<?php


require_once "models/event_model.php";

require_once "models/attendance_model.php";

require_once "models/ticket_model.php";

require_once "models/payment_model.php";

require_once "models/log_model.php";




// =====================================
// STAFF CONTROLLER
//
// Payment Management
// Attendance Management
// QR Verification
// Attendance Summary
// Student List
// Attendance History
// Export CSV
// Payment Export CSV
// =====================================


function staff_controller($action)
{


    global $conn;



    $staff_id = $_SESSION['user']['id'];






// =====================================
// DASHBOARD
// =====================================


if($action=="dashboard")
{


    $events=get_available_events($conn);


    require "views/staff/dashboard.php";


}








// =====================================
// APPROVED EVENTS
// =====================================


elseif($action=="events")
{


    $events=get_available_events($conn);


    require "views/staff/events.php";


}








// =====================================
// STUDENT LIST
// =====================================


elseif($action=="students")
{


    $event_id=$_GET['id'];



    $students=get_event_students(

        $conn,

        $event_id

    );



    require "views/staff/students.php";


}








// =====================================
// CREATE ATTENDANCE LIST
// =====================================


elseif($action=="create_attendance")
{


    $event_id=$_GET['id'];



    $registrations=mysqli_query(

        $conn,

        "

        SELECT *

        FROM registrations

        WHERE event_id='$event_id'

        AND registration_status='registered'

        "

    );



    while($row=mysqli_fetch_assoc($registrations))
    {


        create_attendance(

            $conn,

            $event_id,

            $row['student_id']

        );


    }



    create_log(

        $conn,

        $staff_id,

        "staff",

        "Created attendance list for event ".$event_id,

        $_SERVER['REMOTE_ADDR']

    );



    redirect(

        "index.php?page=staff&action=students&id=".$event_id

    );


}








// =====================================
// MARK ATTENDANCE
// =====================================


elseif($action=="mark_attended")
{


    $id=$_GET['id'];



    mark_attended(

        $conn,

        $id

    );



    create_log(

        $conn,

        $staff_id,

        "staff",

        "Marked attendance ".$id,

        $_SERVER['REMOTE_ADDR']

    );



    redirect(

        $_SERVER['HTTP_REFERER']

    );


}








// =====================================
// UPDATE ATTENDANCE
// =====================================


elseif($action=="update_attendance")
{


    $id=$_POST['id'];


    $status=$_POST['status'];



    update_attendance(

        $conn,

        $id,

        $status

    );



    redirect(

        $_SERVER['HTTP_REFERER']

    );


}








// =====================================
// SEARCH STUDENTS
// =====================================


elseif($action=="search_students")
{


    $event_id=$_GET['event_id'];


    $keyword=$_GET['search'];



    $students=search_attendance_students(

        $conn,

        $event_id,

        $keyword

    );



    require "views/staff/students.php";


}








// =====================================
// ATTENDANCE SUMMARY
// =====================================


elseif($action=="summary")
{


    $event_id=$_GET['id'];



    $summary=attendance_summary(

        $conn,

        $event_id

    );



    require "views/staff/summary.php";


}
// =====================================
// QR VERIFICATION
// =====================================


elseif($action=="verify_ticket")
{


    if($_SERVER['REQUEST_METHOD']=="POST")
    {


        $ticket_code=clean($_POST['ticket_code']);



        $ticket=get_ticket_by_code(

            $conn,

            $ticket_code

        );



        if($ticket)
        {


            // =====================================
            // CHECK ALREADY VERIFIED ATTENDANCE
            // =====================================


            $check_attendance=mysqli_query(

                $conn,

                "

                SELECT *

                FROM attendance

                WHERE event_id='".$ticket['event_id']."'

                AND student_id='".$ticket['student_id']."'

                AND attendance_status='present'

                "

            );





            if(mysqli_num_rows($check_attendance)>0)
            {


                set_message(

                    "error",

                    "Attendance already verified"

                );


            }


            else

            {


                // =====================================
                // MARK ATTENDANCE
                // =====================================


                mark_attended_by_student(

                    $conn,

                    $ticket['event_id'],

                    $ticket['student_id']

                );





                // =====================================
                // CREATE LOG
                // =====================================


                create_log(

                    $conn,

                    $staff_id,

                    "staff",

                    "Verified ticket ".$ticket_code,

                    $_SERVER['REMOTE_ADDR']

                );





                set_message(

                    "success",

                    "Attendance verified successfully"

                );


            }



        }


        else

        {


            set_message(

                "error",

                "Invalid ticket"

            );


        }





        redirect(

            "index.php?page=staff&action=verify_ticket"

        );


        exit();


    }



    require "views/staff/verify_ticket.php";


}








// =====================================
// ATTENDANCE HISTORY
// =====================================


elseif($action=="history")
{


    $event_id=$_GET['id'];



    $history=attendance_history(

        $conn,

        $event_id

    );



    require "views/staff/history.php";


}









// =====================================
// PAYMENT MANAGEMENT
// =====================================


elseif($action=="payments")
{


    $payments=get_all_payments($conn);



    require "views/staff/payments.php";


}









// =====================================
// UPDATE PAYMENT STATUS
// =====================================


elseif($action=="payment_status")
{


    $id=$_GET['id'];


    $status=$_GET['status'];



    update_payment_status(

        $conn,

        $id,

        $status

    );



    create_log(

        $conn,

        $staff_id,

        "staff",

        "Updated payment ID ".$id." to ".$status,

        $_SERVER['REMOTE_ADDR']

    );



    set_message(

        "success",

        "Payment status updated"

    );



    redirect(

        "index.php?page=staff&action=payments"

    );


}









// =====================================
// EXPORT ATTENDANCE CSV
// =====================================


elseif($action=="export_csv")
{


    $event_id=$_GET['id'];



    $data=mysqli_query(

        $conn,

        "

        SELECT


        users.full_name AS Student_Name,


        users.email AS Email,


        events.event_name AS Event,


        attendance.attendance_status AS Status,


        attendance.attendance_date AS Attendance_Date



        FROM attendance



        JOIN users

        ON attendance.student_id=users.id



        JOIN events

        ON attendance.event_id=events.id



        WHERE attendance.event_id='$event_id'



        ORDER BY users.full_name ASC


        "

    );





    header(

        "Content-Type:text/csv"

    );



    header(

        "Content-Disposition:attachment; filename=attendance_report.csv"

    );





    $output=fopen(

        "php://output",

        "w"

    );





    fputcsv(

        $output,

        [

            "Student Name",

            "Email",

            "Event",

            "Status",

            "Attendance Date"

        ]

    );





    while($row=mysqli_fetch_assoc($data))
    {


        fputcsv(

            $output,

            $row

        );


    }





    fclose($output);


    exit();


}









// =====================================
// EXPORT PAYMENT CSV
// STAFF
// =====================================


elseif($action=="export_payment_csv")
{


    $data=payment_report_csv($conn);



    header(

        "Content-Type:text/csv"

    );



    header(

        "Content-Disposition:attachment; filename=student_payment_report.csv"

    );



    $output=fopen(

        "php://output",

        "w"

    );



    fputcsv(

        $output,

        [

            "Student Name",

            "Email",

            "Event Name",

            "Amount",

            "Payment Method",

            "Transaction ID",

            "Payment Status",

            "Payment Date"

        ]

    );





    while($row=mysqli_fetch_assoc($data))
    {


        fputcsv(

            $output,

            [

                $row['full_name'],

                $row['email'],

                $row['event_name'],

                $row['amount'],

                $row['payment_method'],

                $row['transaction_id'],

                $row['payment_status'],

                $row['payment_date']

            ]

        );


    }





    fclose($output);


    exit();


}





}


?>