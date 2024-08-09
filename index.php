<?php
session_start();

// Display any messages if set
if (isset($_GET["msg"])) {
?>
	<div class="alert alert-warning alert-dismissible fade show m-0" role="alert">
		<strong><?php echo $_GET['msg'] ?></strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php
}
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

	<!--w3l-banner-slider-main-->
	<section class="w3l-banner-slider-main">
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
							Body<span class="lohny">C</span>hic
						</a>
						<!--//login-right-->

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
								<li class="nav-item">
									<span class=" navbar-expand-lg navbar-light button-log usernhy">

										<?php if (isset($_SESSION['email'])) { ?>
											<a class="nav-link btn-open2" href="logout.php">
												<span class="fa fa-user" aria-hidden="true"></span> Logout
											</a>
										<?php } else { ?>
											<a class="nav-link btn-open2" href="#">
												<span class="fa fa-user" aria-hidden="true"></span> Login
											</a>
										<?php } ?>

									</span>
								</li>
							</ul>

						</div>
					</div>
				</nav>
				<!--//nav-->

			</header>

			<!--/banner-slider-->
			<div class="content-baner-inf">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="container">
								<div class="carousel-caption">
									<h3>Women's
										Fashion
										<br>
									</h3>
									<a href="#" class="shop-button btn">
										explore More
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item2">
							<div class="container">
								<div class="carousel-caption">
									<h3>Men's
										Fashion
									</h3>
									<a href="#" class="shop-button btn">
										Explore More
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item3">
							<div class="container">
								<div class="carousel-caption">
									<h3>Women's
										Fashion
									</h3>
									<a href="#" class="shop-button btn">
										Explore More
									</a>

								</div>
							</div>
						</div>
						<div class="carousel-item item4">
							<div class="container">
								<div class="carousel-caption">
									<h3>Men's
										Fashion
									</h3>
									<a href="#" class="shop-button btn">
										Explore More
									</a>
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>

	</section>

	<!-- //w3l-banner-slider-main -->
	<section class="w3l-grids-hny-2">
		<!-- /content-6-section -->
		<div class="grids-hny-2-mian py-5">
			<div class="container py-lg-5">

				<h3 class="hny-title mb-0 text-center">Let's Explore <span>Styles</span></h3>
				<p class="mb-4 text-center">Handpicked Favourites just for you</p>

				<div class="welcome-grids row mt-5">

					<?php
					//1. database connect
					include("config.php");
					//2. query
					//SELECT * from `table`
					$query = "SELECT * from `styles` limit 5";
					//3. query run with database
					$result = mysqli_query($connect, $query);
					//4. result use
					// print_r($result);
					$sno = 1;
					while ($data = mysqli_fetch_assoc($result)) {
					?>

						<div class="col-lg-2 col-md-4 col-6 welcome-image">
							<div class="boxhny13">
								<a href="#URL">
									<img src="style_images/<?php echo $data['image'] ?>" class="img-fluid" style="height:160px;width:160px;" />
									<div class="boxhny-content">
										<h3 class="title"><?php echo $data['name'] ?>
									</div>
								</a>
							</div>
							<h4><a><?php echo $data['name'] ?></a></h4>

						</div>

					<?php
						// $sno=$sno+1;
						$sno++;
					}
					?>

					<div class="col-lg-2 col-md-4 col-6 welcome-image">
						<div class="boxhny13">
							<a href="styles.php">
								<img src="assets/images/grid3.jpg" class="img-fluid" alt="" />
								<div class="boxhny-content">
									<h3 class="title">More</h3>
								</div>
							</a>
						</div>
						<h4><a href="styles.php">Explore More &rarr;</a></h4>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- //content-6-section -->

	<section class="w3l-content-w-photo-6">
		<!-- /specification-6-->
		<div class="content-photo-6-mian py-5">
			<div class="container py-lg-5">
				<div class="align-photo-6-inf-cols row">

					<div class="photo-6-inf-right col-lg-6">
						<h3 class="hny-title text-left">Explore Our Diverse <span>Categories</span></h3>
						<p>Discover a wide range of categories that suit your style and preferences. From casual wear to formal attire, we have it all. Browse through our collection to find the perfect outfit for any occasion.</p>
						<a href="category.php" class="read-more btn">
							Explore Category
						</a>
					</div>
					<div class="photo-6-inf-left col-lg-6">
						<img src="assets/images/categoryDress.jpg" class="img-fluid" alt="Categories">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //specification-6-->
	<section>
		<!-- /video-6-->
		<div class="video-66-info">
			<div class="container-fluid">
				<div class="video-grids-info row">
					<div class="col-lg-8">
						<div class="text-center">
							<img src="assets/images/exploreColor.jpg" class="img-fluid" alt="Color Collection">
						</div>
					</div>
					<div class="video-gd-left col-lg-4 p-lg-5 p-4">
						<div class="p-xl-4 p-0 video-wrap">
							<h3 class="hny-title text-left">Explore Our <span>Color Collection</span></h3>
							<p>Find the perfect colors that match your style. Our collection offers a variety of shades to enhance your wardrobe.</p>
							<a href="color.php" class="read-more btn">
								Explore Color
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	include("footer.php");
	?>