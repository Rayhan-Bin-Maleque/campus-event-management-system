<?php


// =====================================
// CREATE EVENT
// ORGANIZER
// =====================================


function create_event(
    $conn,
    $organizer_id,
    $event_name,
    $category,
    $description,
    $date,
    $venue,
    $capacity,
    $fee
)
{


$sql="

INSERT INTO events

(
organizer_id,
event_name,
event_category,
description,
event_date,
venue,
capacity,
registration_fee
)

VALUES

(?,?,?,?,?,?,?,?)

";



$stmt=mysqli_prepare(
$conn,
$sql
);



mysqli_stmt_bind_param(
$stmt,
"isssssdi",
$organizer_id,
$event_name,
$category,
$description,
$date,
$venue,
$capacity,
$fee
);



return mysqli_stmt_execute($stmt);


}









// =====================================
// GET ALL EVENTS
// =====================================


function get_all_events($conn)
{


$sql="

SELECT

events.*,

users.full_name AS organizer_name


FROM events


JOIN users

ON events.organizer_id=users.id


ORDER BY events.id DESC


";



return mysqli_query(
$conn,
$sql
);


}









// =====================================
// GET PENDING EVENTS
// =====================================


function get_pending_events($conn)
{


$sql="

SELECT

events.*,

users.full_name AS organizer_name


FROM events


JOIN users

ON events.organizer_id=users.id


WHERE events.status='pending'


ORDER BY events.id DESC


";



return mysqli_query(
$conn,
$sql
);


}









// =====================================
// UPDATE EVENT STATUS
// =====================================


function update_event_status(
$conn,
$id,
$status
)
{


$sql="

UPDATE events

SET status=?

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
// GET ORGANIZER EVENTS
// =====================================


function get_organizer_events(
$conn,
$organizer_id
)
{


$sql="

SELECT *

FROM events

WHERE organizer_id=?

ORDER BY id DESC


";



$stmt=mysqli_prepare(
$conn,
$sql
);



mysqli_stmt_bind_param(
$stmt,
"i",
$organizer_id
);



mysqli_stmt_execute($stmt);



return mysqli_stmt_get_result($stmt);


}









// =====================================
// GET SINGLE EVENT
// ORGANIZER EDIT
// =====================================


function get_event_by_id(
$conn,
$id
)
{


$sql="

SELECT *

FROM events

WHERE id=?

";



$stmt=mysqli_prepare(
$conn,
$sql
);



mysqli_stmt_bind_param(
$stmt,
"i",
$id
);



mysqli_stmt_execute($stmt);



return mysqli_fetch_assoc(

mysqli_stmt_get_result($stmt)

);


}









// =====================================
// UPDATE EVENT DETAILS
// ORGANIZER
// =====================================


function update_event(
$conn,
$id,
$name,
$category,
$description,
$date,
$venue,
$capacity,
$fee
)
{


$sql="

UPDATE events

SET

event_name=?,

event_category=?,

description=?,

event_date=?,

venue=?,

capacity=?,

registration_fee=?

WHERE id=?


";



$stmt=mysqli_prepare(
$conn,
$sql
);



mysqli_stmt_bind_param(
$stmt,
"sssssidi",
$name,
$category,
$description,
$date,
$venue,
$capacity,
$fee,
$id
);



return mysqli_stmt_execute($stmt);


}
// =====================================
// GET APPROVED EVENTS
// STUDENT
// =====================================


function get_available_events($conn)
{


$sql="

SELECT

events.*,

users.full_name AS organizer_name


FROM events


JOIN users

ON events.organizer_id=users.id


WHERE events.status='approved'


ORDER BY event_date ASC


";



return mysqli_query(

$conn,

$sql

);


}









// =====================================
// SEARCH EVENTS
// =====================================


function search_events(
$conn,
$keyword
)
{


$sql="

SELECT

events.*,

users.full_name AS organizer_name


FROM events


JOIN users

ON events.organizer_id=users.id



WHERE


event_name LIKE ?


OR


event_category LIKE ?



ORDER BY id DESC


";



$stmt=mysqli_prepare(

$conn,

$sql

);



$search="%".$keyword."%";



mysqli_stmt_bind_param(

$stmt,

"ss",

$search,

$search

);



mysqli_stmt_execute($stmt);



return mysqli_stmt_get_result($stmt);


}









// =====================================
// DELETE EVENT
// =====================================


function delete_event(
$conn,
$id
)
{


$sql="

DELETE FROM events

WHERE id=?

";



$stmt=mysqli_prepare(

$conn,

$sql

);



mysqli_stmt_bind_param(

$stmt,

"i",

$id

);



return mysqli_stmt_execute($stmt);


}









// =====================================
// EVENT STATISTICS
// =====================================


function event_statistics(
$conn,
$event_id
)
{


$sql="

SELECT


COUNT(registrations.id)

AS total_registration,



SUM(payments.amount)

AS total_revenue



FROM registrations



LEFT JOIN payments


ON registrations.id=payments.registration_id



WHERE registrations.event_id=?


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