<?php
include('../../config/connect.php');

if(isset($_POST["id"]))
{
 $query = "
 SELECT * FROM users WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

?>