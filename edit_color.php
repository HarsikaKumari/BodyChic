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

<!-- Accessing data from colors -->
<?php
$id = $_GET['id'];
// database connect
include("config.php");
//query
$query = "SELECT * from `colors` where `id`='$id'";
//query run
$result = mysqli_query($connect, $query);
// print_r($result);
//result use
$data = mysqli_fetch_assoc($result);
// print_r($data);
?>


<!-- Form for edit color -->
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

    <div class="form-container">

        <div class="header-container">
            <img src="./assets/images/addIcon.png" alt="addIcon">
            <strong>Edit color</strong>
        </div>

        <?php
        if (isset($_GET["msg"])) {
            echo "<div class='alert alert-info'>" . $_GET['msg'] . "</div>";
        }
        ?>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">color Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Pale Pink" value="<?php echo $data['name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-4 col-form-label">Image</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
            </div>
            <div class="form-group row">
                <label for="body_type" class="col-sm-4 col-form-label">Details</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="details" name="details" placeholder="Eg: Skin color Details" value="<?php echo $data['details'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-sm-4 col-form-label">Tone</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="tone" name="tone" placeholder="Eg: Brown" value="<?php echo $data['tone'] ?>">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-outline-dark">Save</button>
        </form>
    </div>
</div>


<?php

if (isset($_REQUEST["submit"])) {
    $name = $_REQUEST["name"];
    $details = $_REQUEST["details"];
    // echo $name;
    if ($_FILES["image"]["name"]) {
        $image = $_FILES["image"];
        $image_name = $image["name"];
        $tmp_path = $image["tmp_name"];
        $new_name = rand() . $image_name;
        move_uploaded_file($tmp_path, "color_images/" . $new_name);
    } else {
        // $new_name=$_REQUEST["previous_image"];
        $new_name = $data["image"];
        //previous data
    }
    include("config.php");

    //UPDATE `table` set `col`='val' where `id`='val'
    $query = "UPDATE `colors` SET `name`='$name',`details`='$details', `image`='$new_name' WHERE `id`='$id'";

    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<script>window.location.assign('manage_color.php?msg=Updated successfully')</script>";
    } else {
        echo "<script>window.location.assign('manage_color.php?msg=Error!!! Try again later')</script>";
    }
}
?>

<?php
include("footer.php");
?>