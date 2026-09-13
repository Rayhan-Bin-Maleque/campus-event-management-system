<?php


// =====================================
// CREATE ACTIVITY LOG
// ALL USERS
// =====================================


function create_log(
    $conn,
    $user_id,
    $role,
    $action,
    $ip_address
)
{


    $sql="

    INSERT INTO activity_logs

    (

        user_id,

        role,

        action,

        ip_address

    )


    VALUES

    (?,?,?,?)

    ";



    $stmt=mysqli_prepare(

        $conn,

        $sql

    );



    mysqli_stmt_bind_param(

        $stmt,

        "isss",

        $user_id,

        $role,

        $action,

        $ip_address

    );



    return mysqli_stmt_execute($stmt);


}









// =====================================
// GET ALL ACTIVITY LOGS
// ADMIN
// =====================================


function get_all_logs(

    $conn

)

{


    $sql="

    SELECT


    activity_logs.*,


    users.full_name,


    users.email



    FROM activity_logs



    JOIN users


    ON activity_logs.user_id=users.id



    ORDER BY activity_logs.id DESC



    ";



    return mysqli_query(

        $conn,

        $sql

    );


}









// =====================================
// FILTER LOG BY ROLE
// ADMIN
// =====================================


function get_logs_by_role(

    $conn,

    $role

)

{


    $sql="

    SELECT


    activity_logs.*,


    users.full_name,


    users.email



    FROM activity_logs



    JOIN users


    ON activity_logs.user_id=users.id



    WHERE activity_logs.role=? 



    ORDER BY activity_logs.id DESC



    ";



    $stmt=mysqli_prepare(

        $conn,

        $sql

    );



    mysqli_stmt_bind_param(

        $stmt,

        "s",

        $role

    );



    mysqli_stmt_execute($stmt);



    return mysqli_stmt_get_result($stmt);


}









// =====================================
// GET USER ACTIVITY
// USER PROFILE HISTORY
// =====================================


function get_user_logs(

    $conn,

    $user_id

)

{


    $sql="

    SELECT *


    FROM activity_logs



    WHERE user_id=? 



    ORDER BY id DESC



    ";



    $stmt=mysqli_prepare(

        $conn,

        $sql

    );



    mysqli_stmt_bind_param(

        $stmt,

        "i",

        $user_id

    );



    mysqli_stmt_execute($stmt);



    return mysqli_stmt_get_result($stmt);


}









// =====================================
// SEARCH ACTIVITY LOG
// ADMIN AJAX
// =====================================


function search_logs(

    $conn,

    $keyword

)

{


    $sql="

    SELECT


    activity_logs.*,


    users.full_name,


    users.email



    FROM activity_logs



    JOIN users


    ON activity_logs.user_id=users.id



    WHERE


    users.full_name LIKE ?


    OR users.email LIKE ?


    OR activity_logs.role LIKE ?


    OR activity_logs.action LIKE ?


    OR activity_logs.ip_address LIKE ?



    ORDER BY activity_logs.id DESC



    ";





    $stmt=mysqli_prepare(

        $conn,

        $sql

    );





    $search="%".$keyword."%";





    mysqli_stmt_bind_param(

        $stmt,

        "sssss",

        $search,

        $search,

        $search,

        $search,

        $search

    );





    mysqli_stmt_execute($stmt);





    return mysqli_stmt_get_result($stmt);



}



?>