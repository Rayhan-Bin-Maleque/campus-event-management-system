<?php


// =====================================
// CREATE DIGITAL TICKET
// =====================================

function create_ticket(
    $conn,
    $registration_id,
    $ticket_code,
    $qr_code
)
{


    $sql = "

    INSERT INTO tickets

    (
        registration_id,
        ticket_code,
        qr_code,
        ticket_status
    )

    VALUES

    (?,?,?,'valid')

    ";


    $stmt=mysqli_prepare(
        $conn,
        $sql
    );


    mysqli_stmt_bind_param(
        $stmt,
        "iss",
        $registration_id,
        $ticket_code,
        $qr_code
    );


    return mysqli_stmt_execute($stmt);

}





// =====================================
// GET STUDENT TICKET
// =====================================

function get_student_ticket(
    $conn,
    $registration_id
)
{


    $sql="

    SELECT

    tickets.*,

    users.full_name,

    users.email,

    events.event_name,

    events.event_date,

    events.venue


    FROM tickets


    JOIN registrations

    ON tickets.registration_id = registrations.id


    JOIN users

    ON registrations.student_id = users.id


    JOIN events

    ON registrations.event_id = events.id


    WHERE tickets.registration_id=?


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


    $result=mysqli_stmt_get_result($stmt);


    return mysqli_fetch_assoc($result);


}





// =====================================
// GET TICKET BY CODE
// =====================================


function get_ticket_by_code(
    $conn,
    $ticket_code
)
{


    $sql="

    SELECT

    tickets.*,

    users.id AS student_id,

    users.full_name,

    users.email,

    events.id AS event_id,

    events.event_name,

    events.event_date,

    events.venue


    FROM tickets


    JOIN registrations

    ON tickets.registration_id=registrations.id


    JOIN users

    ON registrations.student_id=users.id


    JOIN events

    ON registrations.event_id=events.id


    WHERE tickets.ticket_code=?


    ";


    $stmt=mysqli_prepare(
        $conn,
        $sql
    );


    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $ticket_code
    );


    mysqli_stmt_execute($stmt);


    return mysqli_fetch_assoc(
        mysqli_stmt_get_result($stmt)
    );


}





// =====================================
// UPDATE TICKET STATUS
// =====================================


function update_ticket_status(
    $conn,
    $ticket_id
)
{


    $sql="

    UPDATE tickets

    SET ticket_status='used'

    WHERE id=?

    ";


    $stmt=mysqli_prepare(
        $conn,
        $sql
    );


    mysqli_stmt_bind_param(
        $stmt,
        "i",
        $ticket_id
    );


    return mysqli_stmt_execute($stmt);


}





// =====================================
// CHECK TICKET VALID
// =====================================


function check_ticket_valid(
    $conn,
    $ticket_code
)
{


    $sql="

    SELECT id

    FROM tickets

    WHERE ticket_code=?

    AND ticket_status='valid'

    ";


    $stmt=mysqli_prepare(
        $conn,
        $sql
    );


    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $ticket_code
    );


    mysqli_stmt_execute($stmt);


    $result=mysqli_stmt_get_result($stmt);


    return mysqli_num_rows($result)>0;


}


?>