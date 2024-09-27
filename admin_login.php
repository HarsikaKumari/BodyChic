<?php
include("header.php")
?>

<!-- breadcrumb section -->
<div class="breadcrumb-contentnhy">
    <div class="container">
        <nav aria-label="breadcrumb">
            <h2 class="hny-title text-center">Admin</h2>
            <ol class="breadcrumb mb-0">
                <li><a href="index.php">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                </li>
                <li class="active">Login</li>
            </ol>
        </nav>
    </div>
</div>
</div>
</section>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .login-container {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h5 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 50px;
            padding: 20px;
        }

        .btn-style {
            border-radius: 50px;
            padding: 10px 30px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <?php
                    if (isset($_GET["msg"])) {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?php echo $_GET['msg'] ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    }
                    ?>
                    <h5 class="text-center mb-4">Admin Login</h5>
                    <form method="post">

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="">
                        </div>

                        <div class="text-center">
                            <button name="submit" type="submit" class="btn btn-primary btn-style mt-4">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
if (isset($_REQUEST["submit"])) {
    $email = $_REQUEST["email"];
    $password = md5($_REQUEST["password"]);

    include("config.php");
    //query
    $query = "SELECT * from `admin` where `email`='$email' and `password`='$password'";

    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION["email"] = $email;
        $_SESSION["user_type"] = "admin";
        $_SESSION["name"] = $data["name"];
        $_SESSION["user_id"] = $data["id"];
        echo "<script>window.location.assign('admin_index.php?msg=Login successfully!!')</script>";
    } else {
        echo "<script>window.location.assign('admin_login.php?msg=Invalid credentials')</script>";
    }
}
?>
<?php
include("footer.php");
?>