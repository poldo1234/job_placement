<?php
include '../../config/connect.php';

if (isset($_POST["id"])) {
    $query = "DELETE FROM courses WHERE id = '" . $_POST["id"] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();  
}
