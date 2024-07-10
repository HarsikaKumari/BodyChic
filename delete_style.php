<!-- Deleting data  -->
<?php

$id = $_GET["id"];
include("config.php");

$query = "DELETE FROM `styles` WHERE `id` = '$id'";
$result = mysqli_query($connect, $query);

if ($result) {
    echo "<script>window.location.assign('manage_style.php?msg=Style deleted successfully')</script>";
} else {
    echo "<script>window.location.assign('manage_style.php?msg=Try again later')</script>";
}
