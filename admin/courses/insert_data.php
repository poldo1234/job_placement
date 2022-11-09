<?php
include '../../config/connect.php';

if (isset($_POST["course_name"])) {
    $error = '';
    $success = '';
    $branch_id = '';
    $course_name = '';
    $course_desc = '';

    // branch_id
    if (empty($_POST["branch_id"])) {
        $error .= '<p>Branch is Required</p>';
    } else {
        $branch_id = $_POST["branch_id"];
    } // name
    if (empty($_POST["course_name"])) {
        $error .= '<p>Course Name is Required</p>';
    } else {
        $course_name = $_POST["course_name"];
    }
    // description
    if (empty($_POST["course_desc"])) {
        $error .= '<p>Course Description is Required</p>';
    } else {
        $course_desc = $_POST["course_desc"];
    }

    if ($error == '') {
        $data = array(
            ':branch_id' => $branch_id,
            ':course_name' => $course_name,
            ':course_desc' => $course_desc,
        );

        $query = "INSERT INTO courses (branch_id, course_name, course_desc) VALUES (:branch_id, :course_name, :course_desc)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $success = 'Course Inserted';
    }
    $output = array(
        'success'  => $success,
        'error'   => $error
    );
    echo json_encode($output);
}
