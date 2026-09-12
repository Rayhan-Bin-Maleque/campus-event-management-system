<?php


require_once "models/user_model.php";

require_once "models/log_model.php";




// =====================================
// AUTH CONTROLLER
// LOGIN
// REGISTER
// LOGOUT
// =====================================


function auth_controller($action)
{


    global $conn;



    // =====================================
    // LOGIN
    // =====================================


    if($action=="login")
    {


        if($_SERVER['REQUEST_METHOD']=="POST")
        {


            $email =
            clean($_POST['email']);


            $password =
            $_POST['password'];



            $user =
            get_user_by_email(
                $conn,
                $email
            );



            if(
                $user
                &&
                password_verify(
                    $password,
                    $user['password_hash']
                )
            )
            {


                if(
                    $user['status']=="inactive"
                )
                {

                    set_message(
                        "error",
                        "Account is inactive"
                    );


                    redirect(
                        "index.php?page=auth&action=login"
                    );

                }



                $_SESSION['user']=[

                    "id"=>$user['id'],

                    "name"=>$user['full_name'],

                    "email"=>$user['email'],

                    "role"=>$user['role']

                ];





                // =====================================
                // REMEMBER ME COOKIE
                // =====================================


                if(isset($_POST['remember']))
                {


                    setcookie(

                        "remember_email",

                        $user['email'],

                        time() + (86400 * 30),

                        "/"

                    );


                }

                else

                {


                    if(isset($_COOKIE['remember_email']))
                    {


                        setcookie(

                            "remember_email",

                            "",

                            time()-3600,

                            "/"

                        );


                    }


                }









                create_log(

                    $conn,

                    $user['id'],

                    $user['role'],

                    "User logged in",

                    $_SERVER['REMOTE_ADDR']

                );





                // ROLE REDIRECT


                switch($user['role'])
                {


                    case "admin":


                        redirect(
                            "index.php?page=admin&action=dashboard"
                        );


                        break;



                    case "organizer":


                        redirect(
                            "index.php?page=organizer&action=dashboard"
                        );


                        break;



                    case "student":


                        redirect(
                            "index.php?page=student&action=dashboard"
                        );


                        break;



                    case "staff":


                        redirect(
                            "index.php?page=staff&action=dashboard"
                        );


                        break;



                }



            }


            else

            {


                set_message(
                    "error",
                    "Invalid email or password"
                );


                redirect(
                    "index.php?page=auth&action=login"
                );


            }



        }



        else

        {


            require "views/auth/login.php";


        }


    }









    // =====================================
    // REGISTER
    // =====================================


    elseif($action=="register")
    {


        if($_SERVER['REQUEST_METHOD']=="POST")
        {


            $name =
            clean($_POST['full_name']);



            $email =
            clean($_POST['email']);



            $phone =
            clean($_POST['phone']);



            $password =
            $_POST['password'];



            $role =
            $_POST['role'];




            if(email_exists($conn,$email))
            {


                set_message(
                    "error",
                    "Email already exists"
                );


                redirect(
                    "index.php?page=auth&action=register"
                );


            }






            $hash =
            password_hash(
                $password,
                PASSWORD_DEFAULT
            );





            create_user(

                $conn,

                $name,

                $email,

                $phone,

                $hash,

                $role

            );






            set_message(

                "success",

                "Registration successful"

            );





            redirect(

                "index.php?page=auth&action=login"

            );



        }



        else

        {


            require "views/auth/register.php";


        }



    }









    // =====================================
    // LOGOUT
    // =====================================


    elseif($action=="logout")
    {


        if(isset($_SESSION['user']))
        {


            create_log(

                $conn,

                $_SESSION['user']['id'],

                $_SESSION['user']['role'],

                "User logged out",

                $_SERVER['REMOTE_ADDR']

            );


        }




        session_destroy();



        // REMOVE COOKIE ON LOGOUT


        if(isset($_COOKIE['remember_email']))
        {


            setcookie(

                "remember_email",

                "",

                time()-3600,

                "/"

            );


        }





        redirect(

            "index.php?page=auth&action=login"

        );



    }



}



?>