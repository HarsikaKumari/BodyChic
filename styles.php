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

<!-- Form for add Styles -->
<div class="p-4 form_div">

    <div class="form-container">

        <div class="header-container">
            <img src="./assets/images/addIcon.png" alt="addIcon">
            <strong>Add Styles</strong>
        </div>

        <form action="styles.php" method="post" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" id="body_type" name="body_type" placeholder="Eg: Hourglass">
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="gender" name="gender" placeholder="Eg: Female">
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-4 col-form-label">Category</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="category" name="category" placeholder="Eg: Tops">
                </div>
            </div>
            <div class="form-group row">
                <label for="details" class="col-sm-4 col-form-label">Details</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="details" name="details" placeholder="Eg: Indian Wear for family functions">
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
    $body_type = $_POST["body_type"];
    $gender = $_POST["gender"];
    $category = $_POST["category"];
    $details = $_POST["details"];
    // print_r($thumbnail);

    $image_name = $image["name"];
    $image_path = $image["tmp_name"];
    $image_new_name = rand() . $image_name;

    move_uploaded_file($image_path, "style_images/" . $image_new_name);

    include("config.php");

    $query = "INSERT INTO `styles`(`name`, `image`, `bodytype`, `gender`, `category`, `details`) VALUES('$name', '$image_new_name','$body_type', '$gender', '$category', '$details' ) ";

    $result = mysqli_query($connect, $query);

    if ($result) {
?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Style Added</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Style Not Added Try Again Later!</strong>
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

<!-- Manage Category -->
<div class="text-center text-secondary fs-5 pb-4 manage_category">
    <div class=" d-flex align-items-center justify-content-center flex-wrap">

        <div class="container table-responsive">
            <img src="./assets/images/manageIcon.png" alt="addIcon" class="justify-center">
            <h1 class="text-center">Manage Styles</h1>

            <table class="table table-striped table-hover">
                <tr>
                    <th>Sno</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Body Type</th>
                    <th>Gender</th>
                    <th>Category</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                <?php
                //1. database connect
                include("config.php");
                //2. query
                //SELECT * from `table`
                $query = "SELECT * from `styles`";
                //3. query run with database
                $result = mysqli_query($connect, $query);
                //4. result use
                // print_r($result);
                $sno = 1;
                while ($data = mysqli_fetch_assoc($result)) {

                ?>

                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td>
                            <img src="style_images/<?php echo $data['image'] ?>" style="height:100px;width:100px;">
                        </td>
                        <td><?php echo $data['name'] ?>
                        </td>
                        <td><?php echo $data['bodytype'] ?></td>
                        <td><?php echo $data['gender'] ?></td>
                        <td><?php echo $data['category'] ?></td>
                        <td>
                            <a href="delete_style.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">
                                <img src="./assets/images/deleteIcon.png" alt="DeleteButton">
                            </a>
                        </td>
                        <td>
                            <a href="edit_style.php" class="btn btn-primary">
                                <img src="./assets/images/editIcon.png" alt="EditButton">
                            </a>

                        </td>
                    </tr>

                <?php
                    // $sno=$sno+1;
                    $sno++;
                }
                ?>

            </table>
        </div>

        <?php
        //1. database connect
        include("config.php");
        //2. query
        //SELECT * from `table`
        $query = "SELECT * from `styles`";
        //3. query run with database
        $result = mysqli_query($connect, $query);
        //4. result use
        // print_r($result);
        $sno = 1;
        while ($data = mysqli_fetch_assoc($result)) {
            //  print_r($data);
            //  Array ( [id] => 6 [category_name] => Dresses [thumbnail] => 9998221411.jpg [status] => Active [created_at] => 2024-07-05 12:48:31.743273 )
        ?>

        <?php
            $s_no++;
        }
        ?>
    </div>
</div>

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
                    <a href="edit_category.php" class="btn btn-primary">
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