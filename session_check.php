<?php
if (!isset($_SESSION["email"])) {
    echo "<script>window.location.assign('index.php?msg=Please Login to access.')</script>";
}
