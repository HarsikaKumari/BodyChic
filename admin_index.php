<?php
include("admin_header.php");
//session check
include("session_check.php");

?>


<div class="breadcrumb-contentnhy">
    <div class="container">
        <nav aria-label="breadcrumb">
            <h2 class="hny-title text-center">Admin</h2>
            <ol class="breadcrumb mb-0">
                <li><a href="index.php">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                </li>
                <li class="active">Admin</li>
            </ol>
        </nav>
    </div>
</div>
</div>
</section>
<center>
    <h1>Welcome admin</h1>
    <p><?php echo $_SESSION["email"] ?></p>
    <p><?php echo $_SESSION["name"] ?></p>
</center>


<?php

include('config.php');

// Fetch total styles
$totalStyles = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS count FROM styles"))['count'];

// Fetch total categories
$totalCategories = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS count FROM category"))['count'];

// Fetch total colors
$totalColors = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS count FROM colors"))['count'];

// Fetch total users
$totalUsers = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(*) AS count FROM users"))['count'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        /* Add this CSS to your existing stylesheet */

        /* Dashboard Container */
        .dashboard-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
            padding: 20px;
        }

        /* Card Styles */
        .card {
            background-color: #dc3545;
            /* Red background */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 250px;
            height: 150px;
            margin: 10px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Card Titles */
        .card-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* Card Values */
        .card-text {
            font-size: 36px;
            font-weight: 700;
        }

        /* General Page Styling */

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row mt-5 dashboard-container">
            <div class="card">
                <div class="card-title">Total Styles</div>
                <div class="card-text"><?php echo $totalStyles; ?></div>
            </div>
            <div class="card">
                <div class="card-title">Total Categories</div>
                <div class="card-text"><?php echo $totalCategories; ?></div>
            </div>
            <div class="card">
                <div class="card-title">Total Colors</div>
                <div class="card-text"><?php echo $totalColors; ?></div>
            </div>
            <div class="card">
                <div class="card-title">Total Users</div>
                <div class="card-text"><?php echo $totalUsers; ?></div>
            </div>
        </div>
    </div>

</body>

</html>


<?php
include("footer.php");
?>