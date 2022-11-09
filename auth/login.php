<?php
include('../config/connect.php');
session_start();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "';";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    foreach ($result as $row) {
        if ($row) {
            // If user type is admin
            if ($row['role_id'] == 1) {
                echo ('<script>alert("You are logged in!")</script>');
                $_SESSION['id'] = $row['id'];
                header("location: ../admin/dashboard.php");
            }
            // If user type is coordinator
            elseif ($row['role_id'] == 2) {
                echo ('<script>alert("You are logged in!	")</script>');
                $_SESSION['id'] = $row['id'];
                header("location: ../coordinator/dashboard.php");
            }
        } else {
            $message = "Login Failed!";
            header("location: ../index.php?message=" . $message);
        }
    }
}
