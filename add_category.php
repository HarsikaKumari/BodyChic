<?php
include("admin_header.php")
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

<div class="p-4">
    <div class="text-center text-secondary fs-4 pb-4">
        <img src="./assets/images/addIcon.png" alt="addIcon" class="justify-center" style="height: 30px; width:30px;">
        <strong>Add Category</strong>

    </div>
    <form action="add_category.php" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control-plaintext" id="category" name="category" placeholder="Tops">
            </div>
        </div>
        <div class="form-group row">
            <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
            <div class="col-sm-10">
                <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
            </div>
        </div>
        <!-- <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Select Status</label>
            <div class="col-sm-10">
                <select class="form-control col-sm-10" name="status">
                    <option>Active</option>
                    <option>NotActive</option>
                </select>
            </div>
        </div> -->

        <button type="submit" name="submit" class="btn btn-outline-dark">submit</button>

    </form>
</div>

<?php

if (isset($_POST["submit"])) {
    $category = $_POST["category"];
    $thumbnail = $_FILES["thumbnail"];
    print_r($thumbnail);

    $thumbnail_name = $thumbnail["name"];
    $thumbnail_path = $thumbnail["tmp_name"];
    $thumbnail_new_name = rand().$thumbnail_name;

    move_uploaded_file($thumbnail_path, "category_images/".$thumbnail_new_name);

    include("config.php");

    $query = "INSERT INTO `category`(`category_name`, `thumbnail`) VALUES('$category', '$thumbnail_new_name') ";
    $result = mysqli_query($connect, $query);

    if ($result) {
?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Product Added</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Product Not Added Try Again Later!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    }
}
?>

<?php
include("footer.php");
?>