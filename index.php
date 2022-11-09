<?php
session_start();
include('config/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Home</title>
</head>

<body>
    <!-- Form -->
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <!-- <img src="https://1000logos.net/wp-content/uploads/2017/05/Pepsi-Logo.png" class="img-fluid" alt="CvSU image"> -->
                    <img src="https://drive.google.com/uc?id=1eXYuH_JePPGJCUg5XLNTuU0DeNoy5QKS" class="img-fluid" alt="CvSU image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="auth/login.php" method="post" name="loginform" onsubmit="return validateForm()">
                        <div class="form-outline mb-4">
                            <?php if (isset($_GET['message'])) {
                                echo "<h6>" . $_GET['message'] . "</h6>";
                            } ?>
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" name="email" class="form-control form-control-lg" />
                            <label class="form-label" for="email">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function validateForm() {
            var x = document.forms["loginform"]["email"].value;
            var y = document.forms["loginform"]["password"].value;
            if (x == "" || y == "") {
                window.alert("Username and Password is required!");
                return false;
            }
        }
    </script>
</body>

</html>