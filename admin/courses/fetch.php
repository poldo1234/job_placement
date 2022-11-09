<?php
include('../../config/connect.php');

$query = '';
$output = array();

$query = "SELECT * FROM courses ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE branch_id LIKE "%' . $_POST["search"]["value"] . '%" OR course_name LIKE "%' . $_POST["search"]["value"] . '%" OR course_desc LIKE "%' . $_POST["search"]["value"] . '%"';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id DESC ';
}

if ($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach ($result as $row) {
    $sub_array = array();

    $sub_array[] = $row["branch_id"];
    $sub_array[] = $row["course_name"];
    $sub_array[] = $row["course_desc"];
    $sub_array[] = '<button type="button" name="update" id="' . $row["id"] . '" class="btn btn-warning btn-sm update">Update</button>';
    $sub_array[] = '<button type="button" name="delete" id="' . $row["id"] . '" class="btn btn-danger btn-sm delete">Delete</button>';

    $data[] = $sub_array;
}

function get_total_all_records($connect)
{
    $statement = $connect->prepare("SELECT * FROM cources");
    $statement->execute();
    $result = $statement->fetchAll();
    return $statement->rowCount();
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  $filtered_rows,
    "recordsFiltered" => get_total_all_records($connect),
    "data"    => $data
);
echo json_encode($output);
