<?php


require_once "models/user_model.php";

require_once "models/event_model.php";

require_once "models/payment_model.php";

require_once "models/attendance_model.php";

require_once "models/log_model.php";




// =====================================
// AJAX CONTROLLER
// =====================================


function ajax_controller($action)
{


    global $conn;



    header(
        "Content-Type: application/json"
    );





// =====================================
// USER SEARCH
// =====================================


if($action=="search_users")
{


    $keyword=$_GET['keyword'] ?? "";


    $result=search_users(

        $conn,

        $keyword

    );


    $data=[];


    while($row=mysqli_fetch_assoc($result))
    {

        $data[]=$row;

    }


    echo json_encode($data);


}









// =====================================
// STAFF EVENT SEARCH
// =====================================


elseif($action=="search_events")
{


    $keyword=$_GET['keyword'] ?? "";


    $result=search_events(

        $conn,

        $keyword

    );


    $html="";



    while($event=mysqli_fetch_assoc($result))

    {


        $html.="

        <tr>


        <td>
        ".e($event['event_name'])."
        </td>


        <td>
        ".e($event['event_category'])."
        </td>


        <td>
        ".e($event['event_date'])."
        </td>


        <td>
        ".e($event['venue'])."
        </td>


        <td>
        ".e($event['capacity'])."
        </td>


        <td>


        <a class='small-btn btn-primary'

        href='index.php?page=staff&action=create_attendance&id=".$event['id']."'>


        Load Students


        </a>



        <a class='small-btn btn-success'

        href='index.php?page=staff&action=summary&id=".$event['id']."'>


        Summary


        </a>



        <a class='small-btn btn-primary'

        href='index.php?page=staff&action=students&id=".$event['id']."'>


        Student List


        </a>



        <a class='small-btn btn-secondary'

        href='index.php?page=staff&action=history&id=".$event['id']."'>


        History


        </a>



        <a class='small-btn btn-success'

        href='index.php?page=staff&action=export_csv&id=".$event['id']."'>


        Export CSV


        </a>



        </td>


        </tr>

        ";


    }



    if($html=="")

    {


        $html="

        <tr>

        <td colspan='6'>

        No events found

        </td>

        </tr>

        ";

    }



    echo json_encode([

        "html"=>$html

    ]);



}









// =====================================
// ORGANIZER EVENT SEARCH
// =====================================


elseif($action=="search_organizer_events")
{


    $keyword=$_GET['keyword'] ?? "";


    $organizer_id=$_SESSION['user']['id'];



    $sql="

    SELECT *

    FROM events

    WHERE organizer_id=?

    AND

    (

        event_name LIKE ?

        OR

        event_category LIKE ?

    )

    ORDER BY id DESC

    ";



    $stmt=mysqli_prepare(

        $conn,

        $sql

    );



    $search="%".$keyword."%";



    mysqli_stmt_bind_param(

        $stmt,

        "iss",

        $organizer_id,

        $search,

        $search

    );



    mysqli_stmt_execute($stmt);



    $result=mysqli_stmt_get_result($stmt);



    $html="";



    while($event=mysqli_fetch_assoc($result))

    {


        $html.="

        <tr>


        <td>

        ".e($event['event_name'])."

        </td>



        <td>

        ".e($event['event_category'])."

        </td>



        <td>

        ".e($event['event_date'])."

        </td>



        <td>

        ".e($event['venue'])."

        </td>



        <td>

        ".e($event['capacity'])."

        </td>



        <td>

        ".e($event['registration_fee'])."

        </td>



        <td>

        <span class='status ".$event['status']."'>


        ".e($event['status'])."


        </span>

        </td>



        <td>



        <a class='small-btn btn-success'

        href='index.php?page=organizer&action=statistics&id=".$event['id']."'>


        Stats


        </a>




        <a class='small-btn btn-warning'

        href='index.php?page=organizer&action=finance&id=".$event['id']."'>


        Finance


        </a>




        <a class='small-btn btn-primary'

        href='index.php?page=organizer&action=edit_event&id=".$event['id']."'>


        Edit


        </a>




        <a class='small-btn btn-danger'

        href='index.php?page=organizer&action=delete_event&id=".$event['id']."'

        onclick='return confirmDelete();'>


        Delete


        </a>



        </td>



        </tr>


        ";

    }



    if($html=="")

    {


        $html="

        <tr>

        <td colspan='8'>

        No events found

        </td>

        </tr>

        ";

    }



    echo json_encode([

        "html"=>$html

    ]);



}









// =====================================
// STUDENT EVENT SEARCH
// =====================================


elseif($action=="search_student_events")
{


    $keyword=$_GET['keyword'] ?? "";


    $result=search_events(

        $conn,

        $keyword

    );



    $html="";



    while($event=mysqli_fetch_assoc($result))

    {


        $html.="

        <tr>


        <td>

        ".e($event['event_name'])."

        </td>



        <td>

        ".e($event['event_category'])."

        </td>



        <td>

        ".e($event['event_date'])."

        </td>



        <td>

        ".e($event['venue'])."

        </td>



        <td>

        ৳ ".e($event['registration_fee'])."

        </td>



        <td>


        <a class='small-btn btn-primary'

        href='index.php?page=student&action=register&id=".$event['id']."'>


        Register


        </a>


        </td>


        </tr>


        ";


    }



    echo json_encode([

        "html"=>$html

    ]);



}









// =====================================
// STUDENT ATTENDANCE SEARCH
// =====================================


elseif($action=="search_attendance")
{


    $keyword=$_GET['keyword'] ?? "";


    $student_id=$_SESSION['user']['id'];



    $attendance=get_student_attendance(

        $conn,

        $student_id

    );



    $html="";



    while($row=mysqli_fetch_assoc($attendance))

    {


        if(

            $keyword==""

            ||

            stripos(

                $row['event_name'],

                $keyword

            )!==false

        )

        {


            $html.="

            <tr>


            <td>

            ".e($row['event_name'])."

            </td>



            <td>

            ".e($row['event_date'])."

            </td>



            <td>

            ".e($row['venue'])."

            </td>



            <td>

            ".e($row['attendance_status'])."

            </td>



            <td>

            ".e($row['attendance_date'])."

            </td>



            </tr>

            ";

        }

    }



    echo json_encode([

        "html"=>$html

    ]);



}









// =====================================
// ACTIVITY LOG SEARCH
// =====================================


elseif($action=="search_logs")
{


    $keyword=$_GET['keyword'] ?? "";


    $result=search_logs(

        $conn,

        $keyword

    );



    $html="";



    while($log=mysqli_fetch_assoc($result))

    {


        $html.="

        <tr>


        <td>
        ".e($log['full_name'])."
        </td>


        <td>
        ".e($log['email'])."
        </td>


        <td>

        <span class='status approved'>

        ".e($log['role'])."

        </span>

        </td>


        <td>
        ".e($log['action'])."
        </td>


        <td>
        ".e($log['ip_address'])."
        </td>


        <td>
        ".e($log['created_at'])."
        </td>


        </tr>

        ";

    }



    echo json_encode([

        "html"=>$html

    ]);



}









else

{


    echo json_encode([

        "status"=>"error",

        "message"=>"Invalid AJAX request"

    ]);

}


}


?>