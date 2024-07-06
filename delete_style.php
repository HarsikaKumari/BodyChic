<!-- Deleting data  -->
<?php

$id = $_GET["id"];
include("config.php");

$query = "DELETE FROM `styles` WHERE `id` = '$id'";
$result = mysqli_query($connect, $query);

if ($result) {
    echo "<script>window.location.assign('styles.php?msg=Style deleted successfully')</script>";
} else {
    echo "<script>window.location.assign('styles.php?msg=Try again later')</script>";
}
