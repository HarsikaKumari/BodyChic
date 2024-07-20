<?php
include("header.php");
include("session_check.php")
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
                <li class="active">Styles</li>
            </ol>
        </nav>
    </div>
</div>
</section>

<!-- Manage Category -->
<div class="text-center text-secondary fs-5 pb-4 manage_category pt-5">
    <img src="./assets/images/exploreIcon.gif" alt="addIcon" class="justify-center">
    <strong>Explore Styles</strong>
    <div class=" d-flex align-items-center justify-content-center flex-wrap">

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
            //  Array ( [id] => 6 [category_name] => Dresses [image] => 9998221411.jpg [status] => Active [created_at] => 2024-07-05 12:48:31.743273 )
        ?>
            <div class="card" style="width: 300px; margin:2rem; height:400px;">
                <div class="card-body">
                    <h4 class="card-subtitle mb-4 text-muted"><?php echo $data["name"] ?></h4>
                    <p class="card-img-top">
                        <img src="style_images/<?php echo $data['image'] ?>" style="height:300px;width:200px;">
                    </p>
                </div>
            </div>

        <?php
            $sno++;
        }
        ?>
    </div>
</div>

<?php
include("footer.php")
?>