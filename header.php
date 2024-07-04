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
                            <!--/right-->
                            <ul class="top-hnt-right-content col-lg-6">

                                <li class="button-log usernhy">
                                    <a class="btn-open" href="#">
                                        <span class="fa fa-user" aria-hidden="true"></span> 
                                    </a> 
                                </li>
                            </ul>
                            <!--//right-->
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
                            <div class="search-right">

                                <a href="#search" title="search"><span class="fa fa-search mr-2" aria-hidden="true"></span>
                                    <span class="search-text">Search here</span></a>
                                <!-- search popup -->


                                <div id="search" class="pop-overlay">
                                    <div class="popup">

                                        <form action="#" method="post" class="search-box">
                                            <input type="search" placeholder="Keyword" name="search" required="required" autofocus="">
                                            <button type="submit" class="btn">Search</button>
                                        </form>

                                    </div>

                                    <a class="close" href="#">×</a>
                                </div>
                                <!-- /search popup -->
                            </div>
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
                                        <a class="nav-link" href="about.php">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="about.php">What We Offer</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="contact.php">Contact</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </nav>
                    <!--//nav-->
                </header>