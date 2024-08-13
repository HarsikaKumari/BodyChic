<?php
include("header.php");
if (isset($_SESSION["tone"])) {
  $tone = $_SESSION["tone"];
}
if (isset($_REQUEST["search"])) {
  $tone = $_REQUEST["tone"];
}
?>

<div class="breadcrumb-contentnhy">
  <div class="container">
    <nav aria-label="breadcrumb">
      <h2 class="hny-title text-center">Color</h2>
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
      <form method="post">
        <div class="form-group my-2 row">
          <label for="tone" class="col-sm-2 offset-md-3 col-form-label">Choose Color Tone</label>
          <div class="col-sm-4 input-group">
            <select class="form-control" id="tone" name="tone">
              <option value="" selected disabled>Choose Tone</option>
              <?php
              $arr = ["Olive", "Pale", "Fair", "Medium", "Brown", "Dark"];
              foreach ($arr as $a) {
              ?>
                <option <?php
                        if (isset($tone)) {
                          if ($tone == $a) {
                            echo "Selected";
                          }
                        }
                        ?>><?php echo $a ?></option>
              <?php
              }
              ?>
            </select>
            <button name="search" class="btn btn-primary input-group-text">Search</button>
          </div>
        </div>
      </form>
      <div class="welcome-grids row mt-5">

        <?php
        //1. database connect
        include("config.php");
        //2. query
        //SELECT * from `table`

        if (isset($tone)) {
          $query = "SELECT * from `colors` where `tone`='$tone'";
        } else {
          $query = "SELECT * from `colors`";
        }

        $result = mysqli_query($connect, $query);
        $sno = 1;
        if (mysqli_num_rows($result) > 0) {
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
        } else {
          ?>
          <h5>Currently, no color suggestions available in this tone, we will be uploading soon!! </h5>
        <?php
        }
        ?>

      </div>
    </div>
  </div>
</section>

<?php
include("footer.php");
?>