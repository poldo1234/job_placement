<?php
// // db settings
// $hostname = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'job_placement';

// // db connection
// $conn = mysqli_connect($hostname, $username, $password, $database) or die("Error " . mysqli_error($conn));


$username = 'root';
$password = '';
$connect = new PDO('mysql:host=localhost;dbname=job_placement', $username, $password);
