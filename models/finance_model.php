<?php



// =====================================
// GET ORGANIZER FINANCE REPORT
// =====================================


function get_organizer_finance(

    $conn,

    $organizer_id

)
{


    $sql="


    SELECT


    events.id AS event_id,


    events.event_name,


    IFNULL(event_finance.estimated_budget,0)
    AS estimated_budget,


    IFNULL(event_finance.total_expense,0)
    AS total_expense



    FROM events



    LEFT JOIN event_finance


    ON events.id = event_finance.event_id



    WHERE events.organizer_id=?



    ORDER BY events.id DESC



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
// INSERT / UPDATE EXPENSE
// =====================================


function update_expense(

    $conn,

    $event_id,

    $budget,

    $expense,

    $details

)
{


    $check=mysqli_prepare(

        $conn,

        "

        SELECT id

        FROM event_finance

        WHERE event_id=?

        "

    );



    mysqli_stmt_bind_param(

        $check,

        "i",

        $event_id

    );



    mysqli_stmt_execute($check);



    $result=mysqli_stmt_get_result($check);







    if(mysqli_num_rows($result)>0)

    {


        $sql="


        UPDATE event_finance


        SET


        estimated_budget=?,


        total_expense=?,


        expense_details=?



        WHERE event_id=?



        ";



        $stmt=mysqli_prepare(

            $conn,

            $sql

        );



        mysqli_stmt_bind_param(

            $stmt,

            "ddsi",

            $budget,

            $expense,

            $details,

            $event_id

        );



    }

    else

    {


        $sql="


        INSERT INTO event_finance


        (

        event_id,

        estimated_budget,

        total_expense,

        expense_details

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

            "idds",

            $event_id,

            $budget,

            $expense,

            $details

        );



    }






    return mysqli_stmt_execute($stmt);



}



?>