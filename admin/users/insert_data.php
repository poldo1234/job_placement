<?php
include '../../config/connect.php';

if (isset($_POST["fname"])) {
    $error = '';
    $success = '';
    $fname = '';
    $lname = '';
    $email = '';
    $phone_number = '';
    $password = '';
    $branch_id = $_POST["branch_id"];
    $role_id = $_POST["role_id"];

    // fname
    if (empty($_POST["fname"])) {
        $error .= '<p>First Name is Required</p>';
    } else {
        $fname = $_POST["fname"];
    }
    // lname
    if (empty($_POST["lname"])) {
        $error .= '<p>Last Name is Required</p>';
    } else {
        $lname = $_POST["lname"];
    }
    // email
    if (empty($_POST["email"])) {
        $error .= '<p>Email is Required</p>';
    } else {
        $email = $_POST["email"];
    }
    // email
    if (empty($_POST["phone_number"])) {
        $error .= '<p>Phone Number is Required</p>';
    } else {
        $phone_number = $_POST["phone_number"];
    }
    // password
    if (empty($_POST["password"])) {
        $error .= '<p>Password is Required</p>';
    } else {
        $password = $_POST["password"];
    }
    // branch
    if (empty($_POST["branch_id"])) {
        $error .= '<p>Branch is Required</p>';
    } else {
        $branch_id = $_POST["branch_id"];
    }
    // role
    if (empty($_POST["role_id"])) {
        $error .= '<p>Role is Required</p>';
    } else {
        $role_id = $_POST["role_id"];
    }

    if ($error == '') {
        $data = array(
            ':fname'   => $fname,
            ':lname'  => $lname,
            ':email'  => $email,
            ':branch_id'  => $branch_id,
            ':role_id'  => $role_id,
            ':phone_number' => $phone_number,
            ':password'   => $password,
        );

        $query = "INSERT INTO users (fname, lname, branch_id, role_id, email, phone_number, password) VALUES (:fname, :lname, :branch_id, :role_id, :email, :phone_number, :password)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $success = 'User Data Inserted';
    }
    $output = array(
        'success'  => $success,
        'error'   => $error
    );
    echo json_encode($output);
}
