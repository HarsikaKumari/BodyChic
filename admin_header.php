<?php
session_start()
?>

<!doctype html>
<html lang="zxx">

<head>
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

</head>

<body>
    <section class="w3l-banner-slider-main inner-pagehny">
        <div class="breadcrumb-infhny">

            <div class="top-header-content">

                <header class="tophny-header">
                    <div class="container-fluid">
                        <div class="top-right-strip row">

                            <div class="overlay-login text-left">
                                <button type="button" class="overlay-close1">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                                <?php
                                include("login.php");
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--/nav-->
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid serarc-fluid">
                            <a class="navbar-brand" href="index.php">
                                Body<span class="lohny">C</span>hic</a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fa fa-bars"> </span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin_index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="dropdown nav-link">
                                            <span class="text-white dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Category
                                            </span>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="./add_category.php">Add Category</a>
                                                <a class="dropdown-item" href="./manage_category.php">Manage Category</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div class="dropdown nav-link">
                                            <span class="text-white dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Style
                                            </span>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="./add_style.php">Add Style</a>
                                                <a class="dropdown-item" href="./manage_style.php">Manage Style</a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="nav-item">
                                        <div class="dropdown nav-link">
                                            <span class="text-white dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Color
                                            </span>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="./add_color.php">Add Color</a>
                                                <a class="dropdown-item" href="./manage_color.php">Manage Color</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="user_list.php">Users</a>
                                    </li>
                                    <!-- <ul class="top-hnt-right-content col-lg-6"> -->

                                    <li class="nav-item  ">
                                        <a class="nav-link  d-flex justify-content-center pe-4" href="logout.php">
                                            <span class="fa fa-user pt-1" aria-hidden="true"></span>Logout
                                        </a>
                                    </li>
                                    <!-- </ul> -->

                                </ul>

                            </div>
                        </div>
                    </nav>
                    <!--//nav-->
                </header>