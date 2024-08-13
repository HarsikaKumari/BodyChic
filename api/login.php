<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="wrap">
        <h5 class="text-center mb-4">Login Now</h5>
        <div class="login-bghny p-md-5 p-4 mx-auto mw-100">
            <!-- Display any messages -->
            <?php if (isset($_SESSION['msg'])) : ?>
                <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    ?>
                </div>
            <?php endif; ?>
            <!--/login-form-->
            <form action="login.php" method="post">
                <div class="form-group">
                    <p class="login-texthny mb-2">Email address</p>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email" required="">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <p class="login-texthny mb-2">Password</p>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter your password" required="">
                </div>
                <div class="form-check mb-2">
                    <div class="userhny-check">
                        <label class="check-remember container">
                            <input type="checkbox" class="form-check"> <span class="checkmark"></span>
                            <p class="privacy-policy">Remember me</p>
                        </label>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-group">
                    <a class="login-texthny mb-2 text-light" href="./register.php">Don't have an account? Register</a>
                </div>
                <button type="submit" name="submit_login" class="submit-login btn mb-4">Sign In</button>
                <span class="text-light">Admin- <a class="text-primary" href="admin_login.php">Login Here</a></span>
            </form>
            <!--//login-form-->
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST["submit_login"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    // Include database configuration file
    include("config.php");

    // Ensure the database connection is established
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the query
    $query = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";

    // Execute the query
    $result = mysqli_query($connect, $query);

    // Check if the query returned any results
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION["email"] = $email;
        $_SESSION["user_type"] = "user";
        $_SESSION["name"] = $data["name"];
        $_SESSION["bodyType"] = $data["body_shape"];
        $_SESSION["gender"] = $data['gender'];
        $_SESSION["tone"] = $data["colortone"];
        // Redirect to index page with success message
        echo "<script>window.location.assign('index.php?msg=Login successfully!!')</script>";
    } else {
        echo "<script>window.location.assign('index.php?msg=Invalid credentials, Please try again!')</script>";
    }
}
?>