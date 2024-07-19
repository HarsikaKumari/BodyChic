<?php
include("admin_header.php");
//session check
if (!isset($_SESSION["email"])) {
    echo "<script>window.location.assign('admin_login.php?msg=Please Login.')</script>";
}
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


<!-- Accessing data from colors table -->

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

<!-- Manage Color -->
<div class="text-center text-secondary fs-5 pb-4 manage_category">
    <div class=" d-flex align-items-center justify-content-center flex-wrap">

        <div class="container table-responsive">
            <img src="./assets/images/manageIcon.png" alt="addIcon" class="justify-center">
            <h1 class="text-center">Manage Colors</h1>

            <table class="table table-striped table-hover">
                <tr>
                    <th>Sno</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Details</th>
                    <th>Tone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                //1. database connect
                include("config.php");
                //2. query
                //SELECT * from `table`
                $query = "SELECT * from `colors`";
                //3. query run with database
                $result = mysqli_query($connect, $query);
                //4. result use
                // print_r($result);
                $sno = 1;
                while ($data = mysqli_fetch_assoc($result)) {

                ?>

                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td>
                            <img src="color_images/<?php echo $data['image'] ?>" style="height:100px;width:100px;">
                        </td>
                        <td><?php echo $data['details'] ?></td>
                        <td><?php echo $data['tone'] ?></td>
                        <td>
                            <a href="edit_color.php?id=<?php echo $data['id'] ?>" class="btn btn-primary">
                                <img src="./assets/images/editIcon.png" alt="EditButton">
                            </a>
                        </td>
                        <td>
                            <a href="delete_color.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">
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

<?php
include("footer.php");
?>