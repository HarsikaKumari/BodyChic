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

        <div class="header-container d-flex align-item-center justify-content-center">
            <img src="./assets/images/editIcon.png" alt="editIcon">
            <strong>Edit Category</strong>
        </div> <br> <br>

        <?php
        if (isset($_GET["msg"])) {
            echo "<div class='alert alert-info'>" . $_GET['msg'] . "</div>";
        }
        ?>

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
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-outline-dark">Save</button>
        </form>
    </div>
</div>

<?php
if (isset($_REQUEST["submit"])) {
    $category_name = $_REQUEST["category"];
    
    if ($_FILES["thumbnail"]["name"]) {
        $thumbnail = $_FILES["thumbnail"];
        $thumbnail_name = $thumbnail["name"];
        $tmp_path = $thumbnail["tmp_name"];
        $new_name = rand() . $thumbnail_name;
        move_uploaded_file($tmp_path, "thumbnails/" . $new_name);
    } else {
        // $new_name=$_REQUEST["previous_thumbnail"];
        $new_name = $data["thumbnail"];
        //previous data
    }
    include("config.php");
    //UPDATE `table` set `col`='val' where `id`='val'
    $query = "UPDATE `category` set `category_name`='$category_name', `thumbnail`='$new_name' where `id`='$id'";
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