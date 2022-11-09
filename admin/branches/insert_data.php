<?php
include '../../config/connect.php';

if (isset($_POST["branch_name"])) {
    $error = '';
    $success = '';
    $branch_name = '';
    $branch_desc = '';

    // name
    if (empty($_POST["branch_name"])) {
        $error .= '<p>Branch Name is Required</p>';
    } else {
        $branch_name = $_POST["branch_name"];
    }
    // description
    if (empty($_POST["branch_desc"])) {
        $error .= '<p>Branch Description is Required</p>';
    } else {
        $branch_desc = $_POST["branch_desc"];
    }

    if ($error == '') {
        $data = array(
            ':branch_name' => $branch_name,
            ':branch_desc' => $branch_desc,
        );

        $query = "INSERT INTO branches (branch_name, branch_desc) VALUES (:branch_name, :branch_desc)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $success = 'Branch Data Inserted';
    }
    $output = array(
        'success'  => $success,
        'error'   => $error
    );
    echo json_encode($output);
}
