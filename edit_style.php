<?php
include("admin_header.php")
?>

<!-- breadcrumb section -->
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

<?php
$id = $_REQUEST['id'];
// database connect
include("config.php");
//query
$query = "SELECT * from `styles` where `id`='$id'";
//query run
$result = mysqli_query($connect, $query);
// print_r($result);
//result use
$data = mysqli_fetch_assoc($result);
// print_r($data);
?>

<!-- Form for edit style -->
<div class="p-4 form_div">
    <?php
    if (isset($_GET["msg"])) {
    ?>
        <div class="alert alert-info">
            <?php
            echo $_GET["msg"];
            ?>
        </div>
    <?php
    }
    ?>

    <div class="p-4 form_div">

        <div class="form-container">

            <div class="header-container">
                <img src="./assets/images/addIcon.png" alt="addIcon">
                <strong>Edit Styles</strong>
            </div>

            <?php
            if (isset($_GET["msg"])) {
                echo "<div class='alert alert-info'>" . $_GET['msg'] . "</div>";
            }
            ?>

            <form action="edit_style.php" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Indian" value="<?php echo $data['name'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-4 col-form-label">Image</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control-file" id="image" name="image" value="<?php echo $data['image'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="body_type" class="col-sm-4 col-form-label">BodyType</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="body_type" name="bodytype" placeholder="Eg: Hourglass" value="<?php echo $data['bodytype'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="gender" name="gender" placeholder="Eg: Female" value="<?php echo $data['gender'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-4 col-form-label">Category</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="category" name="category" placeholder="Eg: Tops" value="<?php echo $data['category'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="details" class="col-sm-4 col-form-label">Details</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="details" name="details" placeholder="Eg: Indian Wear for family functions" value="<?php echo $data['details'] ?>">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-dark">Save</button>
            </form>
        </div>
    </div>

    <?php

    if (isset($_REQUEST["submit"])) {
        $name = $_REQUEST["name"];
        $bodytype = $_REQUEST["bodytype"];
        $gender = $_REQUEST["gender"];
        $category = $_REQUEST["category"];
        $details = $_REQUEST["details"];
        // echo $name;
        if ($_FILES["image"]["name"]) {
            $image = $_FILES["image"];
            $image_name = $image["name"];
            $tmp_path = $image["tmp_name"];
            $new_name = rand() . $image_name;
            move_uploaded_file($tmp_path, "style_images/" . $new_name);
        } else {
            // $new_name=$_REQUEST["previous_image"];
            $new_name = $data["image"];
            //previous data
        }
        include("config.php");

        //UPDATE `table` set `col`='val' where `id`='val'
        $query = "UPDATE `styles` SET `name`='$name',`bodytype`='$bodytype',`category`='$category',`gender`='$gender', `details`='$details',`image`='$new_name' WHERE `id`='$id'";

        $result = mysqli_query($connect, $query);

        if ($result) {
            echo "<script>window.location.assign('manage_style.php?msg=Updated successfully')</script>";
        } else {
            echo "<script>window.location.assign('manage_style.php?msg=Error!!! Try again later')</script>";
        }
    }
    ?>


    <?php
    include("footer.php");
    ?>