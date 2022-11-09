<?php
include '../../config/connect.php';

if (isset($_POST["branch_name"])) {
    $error = '';
    $success = '';
    $branch_name = '';
    $branch_desc = '';

    // branch_name
    if (empty($_POST["branch_name"])) {
        $error .= '<p>Branch Name is Required</p>';
    } else {
        $branch_name = $_POST["branch_name"];
    }
    // branch_desc
    if (empty($_POST["branch_desc"])) {
        $error .= '<p>Branch Description is Required</p>';
    } else {
        $branch_desc = $_POST["branch_desc"];
    }

    if ($error == '') {
        $data = array(
            ':branch_name' => $branch_name,
            ':branch_desc' => $branch_desc,
            ':id' => $_POST['id'],
        );

        $query = " UPDATE branches SET 
            branch_name = :branch_name, 
            branch_desc = :branch_desc
            WHERE id = :id";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $success = 'Branch Updated';
    }
    $output = array(
        'success'  => $success,
        'error'   => $error
    );
    echo json_encode($output);
}
