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
</section>

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
                    <a href="edit_category.php?id=<?php echo $data['id'] ?>" class=" btn btn-primary">
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