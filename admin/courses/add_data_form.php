<?php
include '../../config/connect.php';
?>
<!-- Branches -->
<?php
$query = "SELECT * FROM branches";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
?>

<div class="form-group">
    <label>Branch</label>
    <select name="branch_id" id="branch_id" class="form-control">
        <option value="" selected disabled>--Select branch/college--</option>
        <?php

        foreach ($result as $row) {
        ?>
            <option value=" <?= $row['id']; ?> ">
                <?= $row['branch_name']; ?>
            </option>
        <?php
        }
        ?>
    </select>
</div>

<div class="form-group">
    <label>Branch Name</label>
    <input type="text" name="course_name" id="course_name" class="form-control" />
</div>
<div class="form-group">
    <label>Branch Description</label>
    <input type="text" name="course_desc" id="course_desc" class="form-control" />
</div>