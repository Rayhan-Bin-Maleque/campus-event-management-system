<?php


// =====================================
// CREATE PAYMENT
// STUDENT
// =====================================


function create_payment(

    $conn,

    $registration_id,

    $student_id,

    $event_id,

    $amount,

    $method,

    $transaction_id

)
{


    // ONLINE PAYMENT AUTO PAID
    // OFFLINE PAYMENT PENDING

    if($method=="online")
    {

        $status="paid";

    }
    else
    {

        $status="pending";

    }





    $sql = "

    INSERT INTO payments

    (

        registration_id,

        student_id,

        event_id,

        amount,

        payment_method,

        transaction_id,

        payment_status,

        payment_date

    )


    VALUES

    (?,?,?,?,?,?,?,NOW())


    ";




    $stmt = mysqli_prepare(

        $conn,

        $sql

    );




    mysqli_stmt_bind_param(

        $stmt,

        "iiidsss",

        $registration_id,

        $student_id,

        $event_id,

        $amount,

        $method,

        $transaction_id,

        $status

    );




    return mysqli_stmt_execute($stmt);



}









// =====================================
// GET STUDENT PAYMENT HISTORY
// =====================================


function get_student_payments(

    $conn,

    $student_id

)

{


    $sql = "

    SELECT


    payments.*,


    events.event_name,


    events.event_date



    FROM payments



    JOIN events


    ON payments.event_id = events.id



    WHERE payments.student_id = ?



    ORDER BY payments.id DESC



    ";




    $stmt = mysqli_prepare(

        $conn,

        $sql

    );




    mysqli_stmt_bind_param(

        $stmt,

        "i",

        $student_id

    );




    mysqli_stmt_execute($stmt);




    return mysqli_stmt_get_result($stmt);



}









// =====================================
// GET ALL PAYMENTS
// ADMIN + STAFF
// =====================================


function get_all_payments(

    $conn

)

{


    $sql = "

    SELECT


    payments.*,


    users.full_name,


    users.email,


    events.event_name



    FROM payments



    JOIN users


    ON payments.student_id = users.id



    JOIN events


    ON payments.event_id = events.id



    ORDER BY payments.id DESC



    ";




    return mysqli_query(

        $conn,

        $sql

    );


}









// =====================================
// UPDATE PAYMENT STATUS
// ADMIN + STAFF
// =====================================


function update_payment_status(

    $conn,

    $id,

    $status

)

{


    $sql = "

    UPDATE payments


    SET


    payment_status=?,


    payment_date=NOW()


    WHERE id=?


    ";




    $stmt=mysqli_prepare(

        $conn,

        $sql

    );




    mysqli_stmt_bind_param(

        $stmt,

        "si",

        $status,

        $id

    );




    return mysqli_stmt_execute($stmt);



}









// =====================================
// SEARCH PAYMENTS
// =====================================


function search_payments(

    $conn,

    $keyword

)

{


    $sql = "

    SELECT


    payments.*,


    users.full_name,


    users.email,


    events.event_name



    FROM payments



    JOIN users


    ON payments.student_id=users.id



    JOIN events


    ON payments.event_id=events.id



    WHERE


    users.full_name LIKE ?


    OR users.email LIKE ?


    OR events.event_name LIKE ?



    ORDER BY payments.id DESC



    ";




    $stmt=mysqli_prepare(

        $conn,

        $sql

    );




    $search="%".$keyword."%";




    mysqli_stmt_bind_param(

        $stmt,

        "sss",

        $search,

        $search,

        $search

    );




    mysqli_stmt_execute($stmt);




    return mysqli_stmt_get_result($stmt);



}









// =====================================
// TOTAL REVENUE
// =====================================


function total_revenue(

    $conn

)

{


    $sql = "

    SELECT

    SUM(amount) AS revenue


    FROM payments


    WHERE payment_status='paid'


    ";




    $result=mysqli_query(

        $conn,

        $sql

    );




    return mysqli_fetch_assoc($result);



}









// =====================================
// EVENT REVENUE
// =====================================


function event_revenue(

    $conn,

    $event_id

)

{


    $sql = "

    SELECT


    SUM(amount) AS revenue



    FROM payments



    WHERE event_id=? 



    AND payment_status='paid'



    ";




    $stmt=mysqli_prepare(

        $conn,

        $sql

    );




    mysqli_stmt_bind_param(

        $stmt,

        "i",

        $event_id

    );




    mysqli_stmt_execute($stmt);




    return mysqli_fetch_assoc(

        mysqli_stmt_get_result($stmt)

    );



}









// =====================================
// REVENUE REPORT CSV
// ADMIN
// =====================================


function revenue_report(

    $conn

)

{


    $sql = "

    SELECT


    users.full_name AS student,


    users.email,


    events.event_name,


    payments.amount,


    payments.payment_method,


    payments.payment_status,


    payments.payment_date



    FROM payments



    JOIN users


    ON payments.student_id=users.id



    JOIN events


    ON payments.event_id=events.id



    ORDER BY payments.id DESC



    ";




    return mysqli_query(

        $conn,

        $sql

    );


}









// =====================================
// PAYMENT EXPORT CSV
// STAFF
// =====================================


function payment_report_csv(

    $conn

)

{


    $sql="


    SELECT


    users.full_name,


    users.email,


    events.event_name,


    payments.amount,


    payments.payment_method,


    payments.transaction_id,


    payments.payment_status,


    payments.payment_date



    FROM payments



    JOIN users


    ON payments.student_id = users.id



    JOIN events


    ON payments.event_id = events.id



    ORDER BY payments.id DESC



    ";



    return mysqli_query(

        $conn,

        $sql

    );



}



?>