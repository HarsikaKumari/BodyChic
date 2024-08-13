<?php
include("admin_header.php");
//session check
if (!isset($_SESSION["email"])) {
    echo "<script>window.location.assign('admin_login.php?msg=Please Login.')</script>";
}
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


<div class="breadcrumb-contentnhy">
    <div class="container">
        <nav aria-label="breadcrumb">
            <h2 class="hny-title text-center">Style</h2>
            <ol class="breadcrumb mb-0">
                <li><a href="index.php">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                </li>
                <li class="active">Style</li>
            </ol>
        </nav>
    </div>
</div>
</section>

<!-- Form for add Styles -->
<div class="p-4 form_div">

    <div class="form-container">
        <?php
        if (isset($_GET['msg'])) {
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
        <div class="header-container">
            <img src="./assets/images/addIcon.png" alt="addIcon">
            <strong>Add Styles</strong>
        </div>

        <form action="add_style.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Style Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Indian">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-4 col-form-label">Image</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
            </div>
            <div class="form-group row">
                <label for="body_type" class="col-sm-4 col-form-label">BodyType</label>
                <div class="col-sm-8">
                    <select type="text" class="form-control" id="body_type" name="body_type" placeholder="Eg: Hourglass">
                        <option value="" selected disabled>Choose BodyType</option>
                        <?php
                        $arr = ["Hourglass", "Rectangular", "Pear", "Apple", "Inverted", "Triangle", "Oval"];
                        foreach ($arr as $a) {
                        ?>
                            <option><?php echo $a ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-sm-4 col-form-label">Category</label>
                <div class="col-sm-8">
                    <select class=" p-2 form-control" name="category">
                        <option>Choose Category</option>
                        <?php
                        include("config.php");
                        $query = "SELECT * from `category`";
                        $result = mysqli_query($connect, $query);
                        while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?php echo $data['id'] ?>"><?php echo $data['category_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="details" class="col-sm-4 col-form-label">Details</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="details" name="details" placeholder="Eg: Indian Wear for family functions">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-outline-dark">Save</button>
        </form>
    </div>
</div>


<!-- inserting data in database -->
<?php
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $image = $_FILES["image"];
    $body_type = $_POST["body_type"];
    $category = $_POST["category"];
    $details = $_POST["details"];
    // print_r($thumbnail);

    $image_name = $image["name"];
    $image_path = $image["tmp_name"];
    $image_new_name = rand() . $image_name;

    move_uploaded_file($image_path, "style_images/" . $image_new_name);

    include("config.php");

    $query = "INSERT INTO `styles`(`name`, `image`, `bodytype`, `category`, `details`) VALUES('$name', '$image_new_name','$body_type', '$category', '$details' ) ";

    $result = mysqli_query($connect, $query);
    if ($result > 0) {
        echo "<script>window.location.assign('add_style.php?msg=Style Added!!')</script>";
    } else {
        echo "<script>window.location.assign('add_style.php?msg=Error while adding!!')</script>";
    }
}
?>

<?php
include("footer.php");
?>