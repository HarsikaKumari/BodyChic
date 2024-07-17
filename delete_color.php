<!-- Deleting data  -->
<?php

$id = $_GET["id"];
include("config.php");

$query = "DELETE FROM `colors` WHERE `id` = '$id'";
$result = mysqli_query($connect, $query);

if ($result) {
    echo "<script>window.location.assign('manage_color.php?msg=Color deleted successfully')</script>";
} else {
    echo "<script>window.location.assign('manage_color.php?msg=Try again later')</script>";
}
