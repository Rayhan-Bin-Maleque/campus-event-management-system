<?php


// =====================================
// GET USER BY EMAIL
// LOGIN
// =====================================


function get_user_by_email(
    $conn,
    $email
)
{


    $sql = "

    SELECT *

    FROM users

    WHERE email=?

    LIMIT 1

    ";



    $stmt=mysqli_prepare(
        $conn,
        $sql
    );



    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $email
    );



    mysqli_stmt_execute($stmt);



    $result=mysqli_stmt_get_result($stmt);



    return mysqli_fetch_assoc($result);



}








// =====================================
// CHECK EMAIL EXISTS
// =====================================


function email_exists(
    $conn,
    $email
)
{


    $sql="

    SELECT id

    FROM users

    WHERE email=?

    ";



    $stmt=mysqli_prepare(
        $conn,
        $sql
    );



    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $email
    );



    mysqli_stmt_execute($stmt);



    $result=mysqli_stmt_get_result($stmt);



    return mysqli_num_rows($result)>0;



}









// =====================================
// CREATE USER
// REGISTER
// =====================================


function create_user(
    $conn,
    $name,
    $email,
    $phone,
    $password_hash,
    $role
)
{


    $sql="

    INSERT INTO users

    (

        full_name,

        email,

        phone,

        password_hash,

        role

    )


    VALUES

    (?,?,?,?,?)

    ";



    $stmt=mysqli_prepare(
        $conn,
        $sql
    );



    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $name,
        $email,
        $phone,
        $password_hash,
        $role
    );



    return mysqli_stmt_execute($stmt);



}








// =====================================
// GET ALL USERS
// ADMIN
// =====================================


function get_all_users(
    $conn
)
{


    $sql="

    SELECT *

    FROM users

    ORDER BY id DESC

    ";



    $result=mysqli_query(
        $conn,
        $sql
    );



    return $result;



}









// =====================================
// SEARCH USERS
// AJAX SEARCH
// NAME / EMAIL
// =====================================


function search_users(
    $conn,
    $keyword
)
{


    $sql="

    SELECT

    id,

    full_name,

    email,

    phone,

    role,

    status


    FROM users


    WHERE

    full_name LIKE ?

    OR

    email LIKE ?


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
// UPDATE USER
// ADMIN
// =====================================


function update_user(
    $conn,
    $id,
    $name,
    $email,
    $phone,
    $role,
    $status
)
{


    $sql="

    UPDATE users


    SET

    full_name=?,

    email=?,

    phone=?,

    role=?,

    status=?


    WHERE id=?


    ";



    $stmt=mysqli_prepare(
        $conn,
        $sql
    );



    mysqli_stmt_bind_param(
        $stmt,
        "sssssi",
        $name,
        $email,
        $phone,
        $role,
        $status,
        $id
    );



    return mysqli_stmt_execute($stmt);



}









// =====================================
// DELETE USER
// ADMIN
// =====================================


function delete_user(
    $conn,
    $id
)
{


    $sql="

    DELETE FROM users

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
// UPDATE PROFILE
// STUDENT
// =====================================


function update_profile(
    $conn,
    $id,
    $name,
    $phone,
    $image
)
{


    $sql="

    UPDATE users

    SET

    full_name=?,

    phone=?,

    profile_image=?


    WHERE id=?


    ";



    $stmt=mysqli_prepare(
        $conn,
        $sql
    );



    mysqli_stmt_bind_param(
        $stmt,
        "sssi",
        $name,
        $phone,
        $image,
        $id
    );



    return mysqli_stmt_execute($stmt);



}



?>