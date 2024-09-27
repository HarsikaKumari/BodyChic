<?php
session_start();
?>

<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BodyChic - Your Own Designer</title>
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

                            <!--//search-right-->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fa fa-bars"> </span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="category.php">Category</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="styles.php">Styles</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="color.php">Colors</a>
                                    </li>
                                    <?php if (isset($_SESSION['email'])) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="profile.php">Profile</a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                    <!-- <ul class="top-hnt-right-content col-lg-6"> -->

                                    <li class="nav-item button-log ">
                                        <!-- <a class="" href="#"> -->

                                        <?php if (isset($_SESSION['email'])) { ?>
                                            <a class="nav-link btn-open2" href="logout.php">
                                                <span class="fa fa-user" aria-hidden="true"></span>Logout
                                            </a>
                                        <?php } else { ?>
                                            <a class="nav-link btn-open2" href="#">
                                                <span class="fa fa-user" aria-hidden="true"></span>Login
                                            </a>
                                        <?php } ?>

                                        <!-- </a> -->
                                    </li>
                                    <!-- </ul> -->
                                </ul>

                            </div>
                        </div>
                    </nav>
                    <!--//nav-->
                </header>