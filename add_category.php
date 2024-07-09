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
            <strong>Add Category</strong>
        </div>

        <form action="add_category.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="category" class="col-sm-4 col-form-label">Category Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="category" name="category" placeholder="Eg: Tops">
                </div>
            </div>
            <div class="form-group row">
                <label for="thumbnail" class="col-sm-4 col-form-label">Thumbnail</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-outline-dark">Add</button>
        </form>
    </div>
</div>

<!-- inserting data in database -->
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
            <strong>Category Added</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Category Not Added Try Again Later!</strong>
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