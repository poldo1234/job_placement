<?php
include '../../config/connect.php';

if (isset($_POST["course_name"])) {
    $error = '';
    $success = '';
    $branch_id = $_POST['branch_id'];
    $course_name = '';
    $course_desc = '';

    // course_name
    if (empty($_POST["course_name"])) {
        $error .= '<p>Branch Name is Required</p>';
    } else {
        $course_name = $_POST["course_name"];
    }
    // course_desc
    if (empty($_POST["course_desc"])) {
        $error .= '<p>Branch Description is Required</p>';
    } else {
        $course_desc = $_POST["course_desc"];
    }

    if ($error == '') {
        $data = array(
            ':branch_id' => $branch_id,
            ':course_name' => $course_name,
            ':course_desc' => $course_desc,
            ':id' => $_POST['id'],
        );

        $query = " UPDATE courses SET
            branch_id = :branch_id,
            course_name = :course_name, 
            course_desc = :course_desc
            WHERE id = :id";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $success = 'Course Updated';
    }
    $output = array(
        'success'  => $success,
        'error'   => $error
    );
    echo json_encode($output);
}
