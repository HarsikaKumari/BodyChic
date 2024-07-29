<?php
include("header.php");
include("session_check.php")
?>

<div class="breadcrumb-contentnhy">
  <div class="container">
    <nav aria-label="breadcrumb">
      <h2 class="hny-title text-center">Color Us</h2>
      <ol class="breadcrumb mb-0">
        <li><a href="index.php">Home</a>
          <span class="fa fa-angle-double-right"></span>
        </li>
        <li class="active">color</li>
      </ol>
    </nav>
  </div>
</div>
</div>
</section>

<section class="w3l-grids-hny-2">
  <!-- /content-6-section -->
  <div class="grids-hny-2-mian py-5">
    <div class="container py-lg-5">

      <h3 class="hny-title mb-0 text-center">Explore more <span>Colors</span></h3>
      <!-- <p class="mb-4 text-center"></p> -->

      <div class="welcome-grids row mt-5">

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

          <div class="col-lg-2 col-md-4 col-6 welcome-image">
            <div class="boxhny13">
              <a href="#URL">
                <img src="color_images/<?php echo $data['image'] ?>" class="img-fluid" style="height:160px;width:160px;" />
                <div class="boxhny-content">
                  <h3 class="title"><?php echo $data['name'] ?>
                </div>
              </a>
            </div>
            <h4><a><?php echo $data['name'] ?></a></h4>

          </div>

        <?php
          // $sno=$sno+1;
          $sno++;
        }
        ?>

      </div>
    </div>
  </div>
</section>

<?php
include("footer.php");
?>