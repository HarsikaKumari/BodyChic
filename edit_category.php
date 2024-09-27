<?php
include("admin_header.php")
?>
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
            <h2 class="hny-title text-center">Category</h2>
            <ol class="breadcrumb mb-0">
                <li><a href="index.php">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                </li>
                <li class="active">Category</li>
            </ol>
        </nav>
    </div>
</div>
</div>
</section>

<?php
$id = $_GET['id'];
// database connect
include("config.php");
//query
$query = "SELECT * from `category` where `id`='$id'";
//query run
$result = mysqli_query($connect, $query);
// print_r($result);
//result use
$data = mysqli_fetch_assoc($result);
// print_r($data);
?>

<!-- Form for edit category -->
<div class="p-4 form_div">


    <div class="form-container">

        <div class="header-container">
            <img src="./assets/images/editIcon.png" alt="addIcon">
            <strong>Edit Category</strong>
        </div>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="category" class="col-sm-4 col-form-label">Category Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="category" name="category" placeholder="Eg: Tops" value="<?php echo $data['category_name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="thumbnail" class="col-sm-4 col-form-label">Thumbnail</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                    <input type="hidden" class="form-control-file" name="previous_thumbnail" value="<?php echo $data['thumbnail'] ?>">

                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                <div class="col-sm-8">
                    <?php
                    if ($data['gender'] == "Male") {
                    ?>
                        <input type="radio" id="gender" name="gender" value="Male" checked>Male
                        <input type="radio" id="gender" name="gender" value="Female">Female
                        <input type="radio" id="gender" name="gender" value="Both">Both
                    <?php
                    } else if ($data['gender'] == 'Female') {
                    ?>
                        <input type="radio" id="gender" name="gender" value="Male">Male
                        <input type="radio" id="gender" name="gender" checked value="Female" checked>Female
                        <input type="radio" id="gender" name="gender" value="Both">Both
                    <?php
                    } else {
                    ?>
                        <input type="radio" id="gender" name="gender" value="Male">Male
                        <input type="radio" id="gender" name="gender" value="Female">Female
                        <input type="radio" id="gender" name="gender" checked value="Both">Both
                    <?php
                    }
                    ?>

                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-outline-dark">Save</button>
        </form>
    </div>
</div>


<?php
if (isset($_REQUEST["submit"])) {
    $category_name = $_REQUEST["category"];
    $gender = $_REQUEST["gender"];
    if ($_FILES["thumbnail"]["name"]) {
        $thumbnail = $_FILES["thumbnail"];
        $thumbnail_name = $thumbnail["name"];
        $tmp_path = $thumbnail["tmp_name"];
        $new_name = rand() . $thumbnail_name;
        move_uploaded_file($tmp_path, "thumbnails/" . $new_name);
    } else {
        $new_name = $_REQUEST["previous_thumbnail"];
        //previous data
    }
    include("config.php");
    //UPDATE `table` set `col`='val' where `id`='val'
    $query = "UPDATE `category` set `category_name`='$category_name', `thumbnail`='$new_name',`gender`='$gender' where `id`='$id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>window.location.assign('manage_category.php?msg=Updated successfully')</script>";
    } else {
        echo "<script>window.location.assign('manage_category.php?msg=Error!!! Try again later')</script>";
    }
}
?>

<?php
include("footer.php");
?>