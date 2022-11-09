<?php
session_start();
include '../../config/connect.php';

if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header('../index.php');
    exit();
}

$query = "SELECT * FROM users WHERE id='" . $_SESSION['id'] . "'";
$statement = $connect->prepare($query);
$statement->execute();
$row = $statement->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Courses</title>

    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Cavite State University</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../dashboard.php">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../quarterly/quarterly.php">Quarterly Report</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../branches/branches.php">Branches</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3 active" href="courses.php">Courses</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../users/users.php">User Management</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="btn btn-primary" id="sidebarToggle"><i class="fa fa-bars"></i></button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-caret-down"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $row['fname'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../auth/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Page content-->
            <div class="container my-4">
                <div class="panel panel-default">
                    <div class="panel-heading my-1">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="panel-title">Courses</h3>
                            </div>
                            <div class="col-md-6" align="right">
                                <button type="button" name="add_data" id="add_data" class="btn btn-success btn-xs">Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <span id="form_response"></span>
                            <table id="course_data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>Branch ID</td>
                                        <td>Course Name</td>
                                        <td>Course Description</td>
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
    <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
    <script type="text/javascript" src="../js/sidebar.js"></script>
    <script type="text/javascript" language="javascript" src="courses.js"> </script>

</body>

</html>