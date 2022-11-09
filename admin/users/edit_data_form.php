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
        <?php
        foreach ($result as $row) {
        ?>
            <option value=" <?php echo $row['id']; ?> ">
                <?php echo $row['role_name']; ?>
            </option>
        <?php
        }
        ?>
    </select>
</div>

<script>
    $(document).ready(function() {

        var fname = localStorage.getItem('fname');
        var lname = localStorage.getItem('lname');
        var email = localStorage.getItem('email');
        var phone_number = localStorage.getItem('phone_number');
        var password = localStorage.getItem('password');
        var branch_id = localStorage.getItem('branch_id');
        var role_id = localStorage.getItem('role_id');

        $('#fname').val(fname);
        $('#lname').val(lname);
        $('#email').val(email);
        $('#phone_number').val(phone_number);
        $('#password').val(password);
        $('#branch_id').val(branch_id);
        $('#role_id').val(role_id);

    });
</script>