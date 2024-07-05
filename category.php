<?php
include("admin_header.php")
?>

<style>
    .form-container {
        padding: 20px;
        border: 1px solid red;
        border-radius: 5px;
        background-color: #fff;
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
</style>


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

    <div class="form-container">
        <form action="category.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category Name</label>
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
            <button type="submit" name="submit" class="btn btn-outline-dark">Submit</button>
        </form>
    </div>
</div>

<?php

if (isset($_POST["submit"])) {
    $category = $_POST["category"];
    $thumbnail = $_FILES["thumbnail"];
    // print_r($thumbnail);

    $thumbnail_name = $thumbnail["name"];
    $thumbnail_path = $thumbnail["tmp_name"];
    $thumbnail_new_name = rand() . $thumbnail_name;

    move_uploaded_file($thumbnail_path, "category_images/" . $thumbnail_new_name);

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