<!-- Deleting data  -->
<?php

$id = $_GET["id"];
include("config.php");

$query = "DELETE FROM `category` WHERE `id` = '$id'";
$result = mysqli_query($connect, $query);

if ($result) {
    echo "<script>window.location.assign('manage_category.php?msg=Category deleted successfully')</script>";
} else {
    echo "<script>window.location.assign('manage_category.php?msg=Try again later')</script>";
}
