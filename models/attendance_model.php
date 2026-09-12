<?php


// =====================================
// CREATE ATTENDANCE RECORDS
// PREVENT DUPLICATE
// =====================================


function create_attendance(
    $conn,
    $event_id,
    $student_id
)
{


    $check_sql="

    SELECT id

    FROM attendance

    WHERE event_id=?

    AND student_id=?

    ";


    $check_stmt=mysqli_prepare(
        $conn,
        $check_sql
    );


    mysqli_stmt_bind_param(
        $check_stmt,
        "ii",
        $event_id,
        $student_id
    );


    mysqli_stmt_execute($check_stmt);


    $result=mysqli_stmt_get_result(
        $check_stmt
    );


    if(mysqli_num_rows($result)>0)
    {

        return false;

    }





    $sql="

    INSERT INTO attendance

    (

    event_id,

    student_id,

    attendance_status

    )


    VALUES

    (?,?,?)

    ";



    $status="Absent";



    $stmt=mysqli_prepare(
        $conn,
        $sql
    );


    mysqli_stmt_bind_param(
        $stmt,
        "iis",
        $event_id,
        $student_id,
        $status
    );


    return mysqli_stmt_execute($stmt);


}









// =====================================
// GET EVENT STUDENTS
// =====================================


function get_event_students(
$conn,
$event_id
)
{


$sql="

SELECT


attendance.id AS attendance_id,


users.id AS student_id,


users.full_name,


users.email,


attendance.attendance_status



FROM attendance



JOIN users

ON attendance.student_id=users.id



WHERE attendance.event_id=?



ORDER BY users.full_name ASC


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



return mysqli_stmt_get_result($stmt);



}









// =====================================
// MARK ATTENDED
// ONE CLICK ATTENDANCE
// =====================================


function mark_attended(
$conn,
$attendance_id
)
{


$sql="

UPDATE attendance

SET

attendance_status='Present',

attendance_date=CURDATE()


WHERE id=?


";



$stmt=mysqli_prepare(
$conn,
$sql
);



mysqli_stmt_bind_param(
$stmt,
"i",
$attendance_id
);



return mysqli_stmt_execute($stmt);



}









// =====================================
// MARK ATTENDANCE BY QR TICKET
// =====================================


function mark_attended_by_student(

$conn,

$event_id,

$student_id

)
{


$sql="

UPDATE attendance

SET

attendance_status='Present',

attendance_date=CURDATE()


WHERE event_id=?

AND student_id=?


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



return mysqli_stmt_execute($stmt);



}









// =====================================
// UPDATE ATTENDANCE
// =====================================


function update_attendance(
$conn,
$id,
$status
)
{


$sql="

UPDATE attendance

SET

attendance_status=?,

attendance_date=CURDATE()


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
// SEARCH STUDENTS
// =====================================


function search_attendance_students(
$conn,
$event_id,
$keyword
)
{


$sql="

SELECT


attendance.id AS attendance_id,


users.full_name,


users.email,


attendance.attendance_status



FROM attendance



JOIN users

ON attendance.student_id=users.id



WHERE attendance.event_id=?



AND

(

users.full_name LIKE ?

OR

users.email LIKE ?

)



ORDER BY users.full_name ASC


";



$stmt=mysqli_prepare(
$conn,
$sql
);



$search="%".$keyword."%";



mysqli_stmt_bind_param(
$stmt,
"iss",
$event_id,
$search,
$search
);



mysqli_stmt_execute($stmt);



return mysqli_stmt_get_result($stmt);



}









// =====================================
// STUDENT ATTENDANCE HISTORY
// =====================================


function get_student_attendance(
$conn,
$student_id
)
{


$sql="

SELECT


events.event_name,


events.event_date,


events.venue,


attendance.attendance_status,


attendance.attendance_date



FROM attendance



JOIN events

ON attendance.event_id=events.id



WHERE attendance.student_id=?



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
// ATTENDANCE SUMMARY
// =====================================


function attendance_summary(
$conn,
$event_id
)
{


$sql="

SELECT


COUNT(id) AS total_students,


SUM(attendance_status='Present') AS present_students



FROM attendance



WHERE event_id=?


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
// STAFF ATTENDANCE HISTORY
// =====================================


function attendance_history(
$conn,
$event_id
)
{


$sql="

SELECT


users.full_name,


users.email,


events.event_name,


attendance.attendance_status,


attendance.attendance_date



FROM attendance



JOIN users

ON attendance.student_id=users.id



JOIN events

ON attendance.event_id=events.id



WHERE attendance.event_id=?



ORDER BY attendance.id DESC


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



return mysqli_stmt_get_result($stmt);



}



?>