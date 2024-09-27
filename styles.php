<?php
include("header.php");
include("session_check.php")
?>

<!-- breadcrumb section -->
<div class="breadcrumb-contentnhy">
    <div class="container">
        <nav aria-label="breadcrumb">
            <h2 class="hny-title text-center">Styles</h2>
            <ol class="breadcrumb mb-0">
                <li><a href="index.php">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                </li>
                <li class="active">Styles</li>
            </ol>
        </nav>
    </div>
</div>
</section>

<!-- Manage Category -->
<div class="text-center text-secondary fs-5 pb-4 manage_category pt-5">
    <img src="./assets/images/exploreIcon.gif" alt="addIcon" class="justify-center">
    <strong>Explore Styles</strong>
    <div class="col-md-12">
        <div class="row my-2">
            <div class="col-md-2 pt-1 offset-md-3">
                <label>Choose other bodyType</label>
            </div>
            <div class="col-md-4">
                <form method="post">
                    <div class="input-group">
                        <select type="text" class="form-control" id="body_type" name="bodytype" placeholder="Eg: Hourglass">
                            <option value="" selected disabled>Choose Other BodyType</option>
                            <?php
                            $arr = ["Hourglass", "Rectangular", "Pear", "Apple", "Inverted", "Triangle", "Oval"];
                            foreach ($arr as $a) {
                            ?>
                                <option <?php
                                        if (isset($bodyType)) {
                                            if ($bodyType == $a) {
                                                echo "selected";
                                            }
                                        }
                                        ?>><?php echo $a ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <button class="btn btn-primary input-group-text" name="search">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class=" d-flex align-items-center justify-content-center flex-wrap">

        <?php
        include("config.php");
        $bodyType = $_SESSION["bodyType"];
        if (isset($_REQUEST["search"])) {
            $bodyType = $_REQUEST["bodytype"];
        }
        if (isset($_GET['category'])) {
            $query = "SELECT * from `styles` where `bodytype`='$bodyType' and `category`='$_GET[category]'";
        } else {
            $query = "SELECT * from `styles` where `bodytype`='$bodyType'";
        }
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
                //  print_r($data);
        ?>
                <div class="card" style="width: 300px; margin:2rem; height:400px;">
                    <div class="card-body">
                        <h4 class="card-subtitle mb-4 text-muted"><?php echo $data["name"] ?></h4>
                        <p class="card-img-top">
                            <img src="style_images/<?php echo $data['image'] ?>" style="height:300px;width:200px;">
                        </p>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <h5>No styles found
                <?php
                if (isset($_GET['category'])) {
                    $que = "SELECT * from `category` where `id`='$_GET[category]'";
                    include("config.php");
                    $res1 = mysqli_fetch_assoc(mysqli_query($connect, $que));
                    echo "for $res1[category_name]";
                }
                ?>
                in
                <?php echo $bodyType ?> bodyShape,

                we are Updating more styles Soon!!</h5>



        <?php
        }
        ?>

    </div>
    <a href="category.php" class="btn btn-primary d-block mx-auto w-25">Change Category</a>
</div>

<?php
include("footer.php")
?>