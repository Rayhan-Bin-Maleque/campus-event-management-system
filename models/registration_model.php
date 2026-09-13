<?php


// =====================================
// REGISTER EVENT
// STUDENT
// =====================================


function register_event(
    $conn,
    $event_id,
    $student_id
)
{


    // Check previous registration

    $check = mysqli_query(

        $conn,

        "
        SELECT id, registration_status

        FROM registrations

        WHERE event_id='$event_id'

        AND student_id='$student_id'

        LIMIT 1
        "

    );




    if(mysqli_num_rows($check)>0)
    {


        $old = mysqli_fetch_assoc($check);



        // Restore cancelled registration

        if($old['registration_status']=="cancelled")
        {


            mysqli_query(

                $conn,

                "
                UPDATE registrations

                SET

                registration_status='registered',

                registration_date=NOW()

                WHERE id='".$old['id']."'

                "

            );



            return $old['id'];


        }


    }







    // Create new registration


    $sql="

    INSERT INTO registrations

    (

        event_id,

        student_id,

        registration_status

    )

    VALUES

    (?,?, 'registered')


    ";



    $stmt=mysqli_prepare(

        $conn,

        $sql

    );




    mysqli_stmt_bind_param(

        $stmt,

        "ii",

        $event_id,

        $student_id

    );




    mysqli_stmt_execute($stmt);



    return mysqli_insert_id($conn);


}









// =====================================
// CHECK REGISTRATION
// =====================================


function check_registration(
    $conn,
    $event_id,
    $student_id
)
{


    $sql="

    SELECT id

    FROM registrations

    WHERE

    event_id=?

    AND

    student_id=?

    AND

    registration_status='registered'

    ";




    $stmt=mysqli_prepare(

        $conn,

        $sql

    );




    mysqli_stmt_bind_param(

        $stmt,

        "ii",

        $event_id,

        $student_id

    );




    mysqli_stmt_execute($stmt);



    $result=mysqli_stmt_get_result($stmt);



    return mysqli_num_rows($result)>0;



}









// =====================================
// GET STUDENT EVENTS
// =====================================


function get_student_events(
    $conn,
    $student_id
)
{


    $sql="

    SELECT


    events.*,


    registrations.id AS registration_id,


    registrations.registration_date,


    registrations.registration_status



    FROM registrations



    JOIN events

    ON registrations.event_id=events.id



    WHERE registrations.student_id=?



    AND registrations.registration_status='registered'



    ORDER BY events.event_date DESC



    ";




    $stmt=mysqli_prepare(

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
// CANCEL REGISTRATION
// =====================================


function cancel_registration(
    $conn,
    $registration_id
)
{


    $sql="

    UPDATE registrations

    SET

    registration_status='cancelled'

    WHERE id=?


    ";




    $stmt=mysqli_prepare(

        $conn,

        $sql

    );




    mysqli_stmt_bind_param(

        $stmt,

        "i",

        $registration_id

    );




    return mysqli_stmt_execute($stmt);



}









// =====================================
// GET REGISTRATION DETAILS
// =====================================


function get_registration_details(
    $conn,
    $registration_id
)
{


    $sql="

    SELECT


    registrations.*,


    users.full_name,


    users.email,


    events.event_name,


    events.event_date,


    events.venue



    FROM registrations



    JOIN users

    ON registrations.student_id=users.id



    JOIN events

    ON registrations.event_id=events.id



    WHERE registrations.id=?


    ";




    $stmt=mysqli_prepare(

        $conn,

        $sql

    );




    mysqli_stmt_bind_param(

        $stmt,

        "i",

        $registration_id

    );




    mysqli_stmt_execute($stmt);



    return mysqli_fetch_assoc(

        mysqli_stmt_get_result($stmt)

    );


}









// =====================================
// COUNT EVENT PARTICIPANTS
// =====================================


function count_event_participants(
    $conn,
    $event_id
)
{


    $sql="

    SELECT COUNT(id) AS total

    FROM registrations


    WHERE event_id=?


    AND registration_status='registered'


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



?>