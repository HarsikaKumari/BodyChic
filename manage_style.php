<?php
include("admin_header.php");
//session check
if (!isset($_SESSION["email"])) {
    echo "<script>window.location.assign('admin_login.php?msg=Please Login.')</script>";
}
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
                    <th>Edit</th>
                    <th>Delete</th>
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
                            <a href="edit_style.php?id=<?php echo $data['id'] ?>" class="btn btn-primary">
                                <img src="./assets/images/editIcon.png" alt="EditButton">
                            </a>
                        </td>
                        <td>
                            <a href="delete_style.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">
                                <img src="./assets/images/deleteIcon.png" alt="DeleteButton">
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
    </div>
</div>

<?php
include("footer.php");
?>