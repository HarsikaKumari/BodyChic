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

<section class="w3l-customers-sec-6">
    <div class="customers-sec-6-cintent py-5">
        <!-- /customers-->
        <div class="container py-lg-5">
            <h3 class="hny-title text-center mb-0 ">Welcome <span><?php echo $_SESSION["name"] ?></span></h3>

            <div class="row customerhny my-lg-5 my-4">
                <div class="col-md-12">
                    <div id="customerhnyCarousel" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#customerhnyCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#customerhnyCarousel" data-slide-to="1"></li>
                        </ol>
                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <?php
                                                include("config.php");
                                                $query = "SELECT count(*) as total_male from `users` where `gender`='Male'";
                                                $res = mysqli_query($connect, $query);
                                                $data = mysqli_fetch_assoc($res);
                                                ?>
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para"><?php echo $data['total_male'] ?></p>
                                            </div>
                                            <div class="feedback-review mt-4">

                                                <h5>Male Users</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <?php
                                                include("config.php");
                                                $query = "SELECT count(*) as total_female from `users` where `gender`='Female'";
                                                $res = mysqli_query($connect, $query);
                                                $data = mysqli_fetch_assoc($res);
                                                ?>
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para"><?php echo $data['total_female'] ?></p>
                                            </div>
                                            <div class="feedback-review mt-4">

                                                <h5>Female Users</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <?php
                                                include("config.php");
                                                $query = "SELECT count(*) as total_user from `users`";
                                                $res = mysqli_query($connect, $query);
                                                $data = mysqli_fetch_assoc($res);
                                                ?>
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para"><?php echo $data['total_user'] ?></p>
                                            </div>
                                            <div class="feedback-review mt-4">

                                                <h5>Total Users</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <?php
                                                include("config.php");
                                                $query = "SELECT count(*) as total_style from `styles`";
                                                $res = mysqli_query($connect, $query);
                                                $data = mysqli_fetch_assoc($res);
                                                ?>
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para"><?php echo $data['total_style'] ?></p>
                                            </div>
                                            <div class="feedback-review mt-4">
                                                <h5>Total Styles</h5>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <?php
                                                include("config.php");
                                                $query = "SELECT count(*) as total_category from `category`";
                                                $res = mysqli_query($connect, $query);
                                                $data = mysqli_fetch_assoc($res);
                                                ?>
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para"><?php echo $data['total_category'] ?></p>
                                            </div>
                                        </div>
                                        <div class="feedback-review mt-4">
                                            <h5 class="text-center">Total Category</h5>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="customer-info text-center">
                                            <div class="feedback-hny">
                                                <?php
                                                include("config.php");
                                                $query = "SELECT count(*) as total_color from `colors`";
                                                $res = mysqli_query($connect, $query);
                                                $data = mysqli_fetch_assoc($res);
                                                ?>
                                                <span class="fa fa-quote-left"></span>
                                                <p class="feedback-para"><?php echo $data['total_color'] ?></p>
                                            </div>
                                        </div>
                                        <div class="feedback-review mt-4">
                                            <h5 class="text-center">Total color</h5>

                                        </div>
                                    </div>
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->

                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("footer.php");
?>