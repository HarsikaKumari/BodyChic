<?php
include("admin_header.php")
?>

<!-- form Styling -->
<style>
    .form_div {
        background-image: url('./assets/images/formCategory.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        color: red;
        height: 100vh;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .form-container {
        padding: 20px;
        margin-left: 30%;
        border: 1px solid red;
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 800px;
    }

    .form-group label {
        color: red;
    }

    .btn-outline-dark {
        color: red;
        border-color: red;
    }

    .btn-outline-dark:hover {
        background-color: red;
        color: white;
    }

    @media (max-width: 768px) {
        body {
            justify-content: center;
        }

        .form-container {
            margin: 20px;
            width: auto;
        }
    }
</style>

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
</section>

<!-- Form for add category -->
<div class="p-4 form_div">

    <div class="form-container">

        <div class="header-container">
            <img src="./assets/images/addIcon.png" alt="addIcon">
            <strong>Add Color</strong>
        </div>

        <form action="add_color.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Pale Pink">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-4 col-form-label">Image</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
            </div>
            <div class="form-group row">
                <label for="details" class="col-sm-4 col-form-label">Details</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="details" name="details" placeholder="Eg: Skin color Details">
                </div>
            </div>
            <div class="form-group row">
                <label for="tone" class="col-sm-4 col-form-label">Tone</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="tone" name="tone" placeholder="Eg: Brown">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-outline-dark">Add</button>
        </form>
    </div>
</div>

<!-- inserting data in database -->
<?php
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $image = $_FILES["image"];
    $details = $_POST["details"];
    $tone = $_POST["tone"];
    // print_r($image);

    $image_name = $image["name"];
    $image_path = $image["tmp_name"];
    $image_new_name = rand() . $image_name;

    move_uploaded_file($image_path, "color_images/" . $image_new_name);

    include("config.php");

    $query = "INSERT INTO `colors`(`name`, `image`, `details`, `tone`) VALUES('$name', '$image_new_name', '$details', '$tone') ";
    $result = mysqli_query($connect, $query);

    if ($result) {
?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Color Added</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Color Not Added Try Again Later!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    }
}
?>
<!-- accessing data from database -->
<?php
$s_no = 1;
?>

<?php
if (isset($_GET["msg"])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['msg'] ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}
?>

<?php
include("footer.php");
?>