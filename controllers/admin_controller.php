<?php


require_once "models/user_model.php";

require_once "models/event_model.php";

require_once "models/log_model.php";



// =====================================
// ADMIN CONTROLLER
//
// User Management
// Event Approval
// Revenue Report
// Activity Log
// =====================================


function admin_controller($action)
{


    global $conn;



    $admin_id=$_SESSION['user']['id'];





    // =====================================
    // DASHBOARD
    // =====================================


    if($action=="dashboard")
    {


        $users=get_all_users($conn);


        $events=get_all_events($conn);



        require "views/admin/dashboard.php";


    }








    // =====================================
    // USER MANAGEMENT
    // =====================================


    elseif($action=="users")
    {


        $users=get_all_users($conn);



        require "views/admin/users.php";


    }








    // =====================================
    // ADD USER
    // =====================================


    elseif($action=="add_user")
    {


        if($_SERVER['REQUEST_METHOD']=="POST")
        {


            $name=clean($_POST['full_name']);


            $email=clean($_POST['email']);


            $phone=clean($_POST['phone']);


            $role=clean($_POST['role']);



            $password=password_hash(

                $_POST['password'],

                PASSWORD_DEFAULT

            );





            if(email_exists($conn,$email))
            {


                set_message(

                    "error",

                    "Email already exists"

                );



                redirect(

                    "index.php?page=admin&action=add_user"

                );


            }






            create_user(

                $conn,

                $name,

                $email,

                $phone,

                $password,

                $role

            );






            create_log(

                $conn,

                $admin_id,

                "admin",

                "Created new user ".$name,

                $_SERVER['REMOTE_ADDR']

            );





            set_message(

                "success",

                "User created successfully"

            );





            redirect(

                "index.php?page=admin&action=users"

            );



        }
        else
        {


            require "views/admin/add_user.php";


        }



    }








    // =====================================
    // DELETE USER
    // =====================================


    elseif($action=="delete_user")
    {


        $id=$_GET['id'];



        delete_user(

            $conn,

            $id

        );





        create_log(

            $conn,

            $admin_id,

            "admin",

            "Deleted user ID ".$id,

            $_SERVER['REMOTE_ADDR']

        );





        redirect(

            "index.php?page=admin&action=users"

        );


    }








    // =====================================
    // EVENT APPROVAL
    // =====================================


    elseif($action=="events")
    {


        $events=get_pending_events($conn);



        require "views/admin/events.php";


    }








    // =====================================
    // APPROVE / REJECT EVENT
    // =====================================


    elseif($action=="event_status")
    {


        $id=$_GET['id'];


        $status=$_GET['status'];




        update_event_status(

            $conn,

            $id,

            $status

        );





        create_log(

            $conn,

            $admin_id,

            "admin",

            "Changed event ".$id." status to ".$status,

            $_SERVER['REMOTE_ADDR']

        );





        redirect(

            "index.php?page=admin&action=events"

        );


    }








    // =====================================
    // REVENUE CSV REPORT
    // =====================================


    elseif($action=="revenue_csv")
    {


        require_once "models/payment_model.php";



        $data=revenue_report($conn);




        header(

            "Content-Type:text/csv"

        );



        header(

            "Content-Disposition:attachment; filename=revenue_report.csv"

        );





        $output=fopen(

            "php://output",

            "w"

        );





        fputcsv(

            $output,

            [

                "Student",

                "Email",

                "Event",

                "Amount",

                "Method",

                "Status",

                "Date"

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
    // ACTIVITY LOG
    // =====================================


    elseif($action=="logs")
    {


        $logs=get_all_logs($conn);



        require "views/admin/logs.php";


    }





}


?>