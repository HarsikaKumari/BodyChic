<?php
include("header.php");
if (isset($_SESSION["gender"])) {
    $gender = $_SESSION["gender"];
}
if (isset($_REQUEST["search"])) {
    $gender = $_REQUEST["gender"];
}
?>

<div class="breadcrumb-contentnhy">
    <div class="container">
        <nav aria-label="breadcrumb">
            <h2 class="hny-title text-center">Types</h2>
            <ol class="breadcrumb mb-0">
                <li><a href="index.php">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                </li>
                <li class="active">Types</li>
            </ol>
        </nav>
    </div>
</div>
</div>
</section>

<section class="w3l-grids-hny-2">
    <!-- /content-6-section -->
    <div class="grids-hny-2-mian py-5">
        <div class="container py-lg-5">

            <h3 class="hny-title mb-0 text-center">Explore more <span>Category</span></h3>
            <!-- <p class="mb-4 text-center"></p> -->


            <form method="post">
                <div class="row my-2">
                    <div class="col-md-2 offset-md-3">
                        <label>Change Gender</label>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select class="form-control" name="gender">
                                <?php
                                $gender_arr = ["All", "Both", "Male", "Female"];
                                foreach ($gender_arr as $gen) {
                                ?>
                                    <option
                                        <?php
                                        if (isset($gender)) {
                                            if ($gender == $gen) {
                                                echo "Selected";
                                            }
                                        }
                                        ?>><?php echo $gen ?></option>
                                <?php
                                }
                                ?>

                            </select>
                            <button class="btn btn-primary input-group-text" name="search">Change</button>
                        </div>

                    </div>
                </div>
            </form>

            <div class="welcome-grids row mt-5">
                <?php
                include("config.php");

                if (isset($gender)) {
                    if ($gender == "All") {
                        $query = "SELECT * from `category`";
                    } else {
                        $query = "SELECT * from `category` where `gender`='$gender'";
                    }
                } else {
                    $query = "SELECT * from `category`";
                }
                $result = mysqli_query($connect, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($data = mysqli_fetch_assoc($result)) {
                ?>

                        <div class="col-lg-2 col-md-4 col-6 welcome-image">
                            <div class="boxhny13">
                                <a href="styles.php?category=<?php echo $data['id'] ?>">
                                    <img src="category_images/<?php echo $data['thumbnail'] ?>" class="img-fluid" style="height:160px;width:160px;" />
                                    <div class="boxhny-content">
                                        <h3 class="title"><?php echo $data['category_name'] ?>
                                    </div>
                                </a>
                            </div>
                            <h4><a><?php echo $data['category_name'] ?></a></h4>

                        </div>

                    <?php

                    }
                } else {
                    ?>
                    <h1>No category found!!</h1>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</section>

<?php
include("footer.php");
?>