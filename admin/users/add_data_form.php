<?php
include '../../config/connect.php';
?>

<div class="form-group">
    <label>First Name</label>
    <input type="text" name="fname" id="fname" class="form-control" />
</div>
<div class="form-group">
    <label>Last Name</label>
    <input type="text" name="lname" id="lname" class="form-control" />
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" name="email" id="email" class="form-control" />
</div>
<div class="form-group">
    <label>Phone Number</label>
    <input type="text" name="phone_number" id="phone_number" class="form-control" />
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" name="password" id="password" class="form-control" />
</div>
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

<?php
$query = "SELECT * FROM roles";

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
?>
<!-- Role -->
<div class="form-group">
    <label>Role</label>
    <select name="role_id" id="role_id" class="form-control">
        <option value="" selected disabled>--Select role--</option>
        <?php

        foreach ($result as $row) {
        ?>
            <option value=" <?= $row['id']; ?> ">
                <?= $row['role_name']; ?>
            </option>
        <?php
        }
        ?>
    </select>
</div>