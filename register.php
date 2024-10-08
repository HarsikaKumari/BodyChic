<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BodyChic Your Own Designer</title>
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <!-- Template CSS -->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet">
    <!-- Template CSS -->

    <style>
        .register-container {
            background-size: cover;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
            margin: 200px 0px;
        }

        .register-container h5 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #2575fc;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-control {
            border-radius: 50px;
            padding: 20px;
            border: 2px solid #2575fc;
        }

        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 5px rgba(106, 17, 203, 0.5);
        }

        .btn-style {
            border-radius: 50px;
            padding: 10px 30px;
            font-size: 16px;
            background-color: #2575fc;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-style:hover {
            background-color: #6a11cb;
            color: white;
        }

        .breadcrumb-contentnhy {
            padding: 20px 0;
            background: rgba(0, 0, 0, 0.1);
            color: white;
        }

        .breadcrumb-contentnhy nav h2 {
            color: white;
            font-size: 36px;
        }

        .breadcrumb-contentnhy nav a {
            color: #6a11cb;
        }

        .breadcrumb-contentnhy nav .fa-angle-double-right {
            color: white;
        }

        .alert {
            border-radius: 10px;
            padding: 15px;
            font-size: 14px;
        }

        .form_back {
            background: url('./assets/images/registerBgImage.avif') no-repeat center center;
            background-size: cover;
        }

        #name_error,
        #contact_error {
            color: red;
        }
    </style>

</head>

<body>

    <section class="w3l-banner-slider-main inner-pagehny">
        <div class="breadcrumb-infhny">

            <div class="top-header-content">

                <!-- breadcrumb section -->
                <div class="breadcrumb-contentnhy">
                    <div class="container">
                        <nav aria-label="breadcrumb">
                            <h2 class="hny-title text-center">User</h2>
                            <ol class="breadcrumb mb-0">
                                <li><a href="index.php">Register</a>
                                    <span class="fa fa-angle-double-right"></span>
                                </li>
                                <li class="active">Explore</li>
                            </ol>
                        </nav>
                    </div>
                </div>
    </section>

    <div class="form_back">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="register-container">
                    <?php
                    if (isset($_GET["msg"])) {
                        echo '<div class="alert alert-info" role="alert">' . htmlspecialchars($_GET["msg"]) . '</div>';
                    }
                    ?>
                    <h5 class="text-center mb-4">User Registration</h5>
                    <form method="post" onsubmit="return checkForm()">

                        <div class="form-group">
                            <input type="text" id="name" class="form-control" name="name" placeholder="Full Name" required="">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="">
                        </div>
                        <div class="form-group">
                            <input type="tel" id="contact" class="form-control" name="contact" placeholder="contact" required="">
                        </div>
                        <div class="form-group border border-primary ps-sm-3 rounded-pill" style="background-color: white;">
                            <label for="gender" class="col-2 col-form-label">Gender</label>
                            <input type="radio" id="gender" name="gender" value="Male" placeholder="Eg: Female">Male
                            <input type="radio" id="gender" name="gender" placeholder="Eg: Female" value="Female">Female
                        </div>

                        <div class="text-center">
                            <button name="submit" type="submit" class="btn btn-primary btn-style mt-4">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- inserting data in database -->
    <?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $contact = $_POST["contact"];
        $gender = $_POST["gender"];
        include("config.php");
        $que = "SELECT * from `users` where `email`='$email'";
        $res = mysqli_query($connect, $que);
        if (mysqli_num_rows($res) <= 0) {
            $query = "INSERT INTO `users`(`name`, `email`, `password`, `contact`,`gender`) VALUES('$name', '$email', '$password', '$contact','$gender')";
            $result = mysqli_query($connect, $query);
            if ($result > 0) {
                $query1 = "SELECT * FROM `users` where `email`='$email'";
                $result1 = mysqli_query($connect, $query1);
                $data = mysqli_fetch_assoc($result1);
                //session create
                $_SESSION["email"] = $email;
                $_SESSION["user_type"] = "user";
                $_SESSION["name"] = $data["name"];
                $_SESSION["gender"] = $data["gender"];
                echo "<script>window.location.assign('body_info.php?msg=Registered Successfully! Fill out this information for more clarifications&email=$data[email]')</script>";
            } else {
                echo "<script>window.location.assign('register.php?msg=Not Registered, try again after few times!')</script>";
            }
        } else {
            echo "<script>window.location.assign('register.php?msg=Email already in use!')</script>";
        }
    }
    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    <?php
    include("footer.php")
    ?>