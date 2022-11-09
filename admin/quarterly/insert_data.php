<?php
include '../../config/connect.php';

if (isset($_POST["branch_name"])) {
    $error = '';
    $success = '';
    
    // need
    $branch_name = '';
    $branch_desc = '';

    // name
    if (empty($_POST["year"])) {
        $error .= '<p>Year is Required</p>';
    } else {
        $year = $_POST["year"];
    }
    // description
    if (empty($_POST["branch_desc"])) {
        $error .= '<p>Branch Description is Required</p>';
    } else {
        $branch_desc = $_POST["branch_desc"];
    }

    // $total = ($noofgrad - $emplyed) * ;
    // $untracked = (graduates - employed) - unmployed;

    if ($error == '') {
        $data = array(
            // need
            ':branch_name' => $branch_name,
            ':branch_desc' => $branch_desc,
            ':year' => $year,
            // ':unracker' => $untracked,
        );

        // need
        $query = "INSERT INTO branches (branch_name, branch_desc) VALUES (:branch_name, :branch_desc)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $success = 'Branch Data Inserted';

        // total records
        // $query2 = "INSERT INTO branches (branch_name, branch_desc) VALUES (:branch_name, :branch_desc)";
    }
    $output = array(
        'success'  => $success,
        'error'   => $error
    );
    echo json_encode($output);
}
