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
</div>
</section>

<!-- Form for add category -->
<div class="p-4 form_div">

    <div class="form-container">

        <div class="header-container">
            <img src="./assets/images/addIcon.png" alt="addIcon">
            <strong>Add Category</strong>
        </div>

        <form action="category.php" method="post" enctype="multipart/form-data">
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
            <button type="submit" name="submit" class="btn btn-outline-dark">Submit</button>
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
    // echo "<div class='alert alert-info alert-dismissible'>" . $_GET['msg'] . "</div>";
}

?>

<!-- Manage Category -->
<div class="text-center text-secondary fs-5 pb-4 manage_category">
    <img src="./assets/images/manageIcon.png" alt="addIcon" class="justify-center">
    <strong>Manage Category</strong>
    <div class=" d-flex align-items-center justify-content-center flex-wrap">

        <?php
        //1. database connect
        include("config.php");
        //2. query
        //SELECT * from `table`
        $query = "SELECT * from `category`";
        //3. query run with database
        $result = mysqli_query($connect, $query);
        //4. result use
        // print_r($result);
        $sno = 1;
        while ($data = mysqli_fetch_assoc($result)) {
            //  print_r($data);
            //  Array ( [id] => 6 [category_name] => Dresses [thumbnail] => 9998221411.jpg [status] => Active [created_at] => 2024-07-05 12:48:31.743273 )
        ?>
            <div class="card" style="width: 20rem; margin:4rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $s_no ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $data["category_name"] ?></h6>
                    <p class="card-img-top">
                        <img src="category_images/<?php echo $data['thumbnail'] ?>" style="height:200px;width:250px;">
                    </p>
                    <a href="delete_category.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">
                        <img src="./assets/images/deleteIcon.png" alt="DeleteButton">
                    </a>
                    <a href="delete_category.php" class="btn btn-danger">
                        <img src="./assets/images/editIcon.png" alt="EditButton">
                    </a>
                </div>
            </div>

        <?php
            $s_no++;
        }
        ?>
    </div>
</div>

<?php
include("footer.php");
?>
