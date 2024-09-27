<?php
session_start();
$user_type = $_SESSION["user_type"];
session_destroy();
if ($user_type == "admin") {
    echo "<script>window.location.assign('admin_login.php?msg=Logout successfully!!')</script>";
} else {
    echo "<script>window.location.assign('index.php?msg=Logout successfully!!')</script>";
}
