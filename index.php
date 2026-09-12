<?php

error_reporting(E_ALL);
ini_set('display_errors',1);


// =====================================
// MAIN ROUTER
// CAMPUS EVENT MANAGEMENT SYSTEM
// =====================================



require_once "config/database.php";

require_once "config/functions.php";







// =====================================
// GET PAGE AND ACTION
// =====================================


$page = $_GET['page'] ?? "auth";


$action = $_GET['action'] ?? "login";









// =====================================
// CONTROLLER ROUTING
// =====================================



switch($page)

{



    // =====================================
    // AUTH
    // =====================================


    case "auth":


        require_once "controllers/auth_controller.php";


        auth_controller($action);


        break;









    // =====================================
    // ADMIN
    // =====================================


    case "admin":


        require_login();


        require_role("admin");



        require_once "controllers/admin_controller.php";


        admin_controller($action);


        break;









    // =====================================
    // ORGANIZER
    // =====================================


    case "organizer":


        require_login();


        require_role("organizer");



        require_once "controllers/organizer_controller.php";


        organizer_controller($action);


        break;









    // =====================================
    // STUDENT
    // =====================================


    case "student":


        require_login();


        require_role("student");



        require_once "controllers/student_controller.php";


        student_controller($action);


        break;









    // =====================================
    // STAFF
    // =====================================


    case "staff":


        require_login();


        require_role("staff");



        require_once "controllers/staff_controller.php";


        staff_controller($action);


        break;









    // =====================================
    // AJAX
    // =====================================


    case "ajax":


        require_once "controllers/ajax_controller.php";


        ajax_controller($action);


        break;









    // =====================================
    // DEFAULT
    // =====================================


    default:


        redirect(

            "index.php?page=auth&action=login"

        );


        break;



}




?>