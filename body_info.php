<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Body Ratio Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BodyChic Your Own Designer</title>
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <!-- Template CSS -->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet">
    <!-- Template CSS -->

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .form-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-group label {
            flex: 1;
            margin-right: 10px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            flex: 2;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .btn-calculate,
        .btn-clear {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-calculate {
            background-color: #28a745;
            color: white;
            border: none;
            margin-right: 10px;
        }

        .btn-clear {
            background-color: #6c757d;
            color: white;
            border: none;
        }

        .result-container {
            margin-top: 30px;
            text-align: center;
        }

        .result-container h3 {
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
        }

        .result-container p {
            font-size: 18px;
            color: #6c757d;
        }

        .btn-explore {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .image-container {
            text-align: center;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<?php
include("session_check.php")
?>

<body>

    <section class="w3l-banner-slider-main inner-pagehny">
        <div class="breadcrumb-infhny">

            <div class="top-header-content">

                <!-- breadcrumb section -->
                <div class="breadcrumb-contentnhy">
                    <div class="container">
                        <nav aria-label="breadcrumb">
                            <h2 class="hny-title text-center">User</h2>
                            <ol class="breadcrumb mb-0">
                                <li><a href="index.php">Register</a>
                                    <span class="fa fa-angle-double-right"></span>
                                </li>
                                <li class="active">Data</li>
                            </ol>
                        </nav>
                    </div>
                </div>
    </section>

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

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form id="bodyForm" method="POST">
                    <div class="form-group">
                        <label for="bustSize">Bust Size</label>
                        <input type="number" id="bustSize" class="form-control" name="bustSize" placeholder="Bust Size" required> cm
                    </div>
                    <div class="form-group">
                        <label for="waistSize">Waist Size</label>
                        <input type="number" id="waistSize" class="form-control" name="waistSize" placeholder="Waist Size" required> cm
                    </div>
                    <div class="form-group">
                        <label for="highHipSize">High Hip Size</label>
                        <input type="number" id="highHipSize" class="form-control" name="highHipSize" placeholder="High Hip Size" required> cm
                    </div>
                    <div class="form-group">
                        <label for="hipSize">Hip Size</label>
                        <input type="number" id="hipSize" class="form-control" name="hipSize" placeholder="Hip Size" required> cm
                    </div>
                    <div class="form-group">
                        <label for="colorTone">Color Tone</label>
                        <select type="text" class="form-control" id="tone" name="tone">
                            <option value="" selected disabled>Choose Tone</option>
                            <?php
                            $arr = ["Olive", "Pale", "Fair", "Medium", "Brown", "Dark"];
                            foreach ($arr as $a) {
                            ?>
                                <option><?php echo $a ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="btn-calculate" class="btn-calculate">Calculate</button>
                    <button type="reset" class="btn-clear">Clear</button>
                </form>
            </div>
            <div class="col-md-5 mb-5 ml-4">
                <img src="./assets/images/body_measurements.jpeg" alt="Body Measurements">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="result" class="mt-4"></div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="col-md-12 result-container" id="result">
            <?php
            if (isset($_REQUEST["btn-calculate"])) {
                $bustSize = $_POST['bustSize'];
                $waistSize = $_POST['waistSize'];
                $highHipSize = $_POST['highHipSize'];
                $hipSize = $_POST['hipSize'];
                $colorTone = $_POST['tone'];

                include("config.php");


                // Calculate body ratio
                $bustWaistRatio = $bustSize / $waistSize;
                $hipWaistRatio = $hipSize / $waistSize;
                $bodyType = '';

                if ($bustWaistRatio > 1.5 && $hipWaistRatio > 1.5) {
                    $bodyType = 'Hourglass';
                } else if ($bustWaistRatio > 1.5) {
                    $bodyType = 'Inverted Triangle';
                } else if ($hipWaistRatio > 1.5) {
                    $bodyType = 'Pear';
                } else {
                    $bodyType = 'Rectangle';
                }

                echo "<div class='result-display'>";
                echo "<h3>Your Body Type: $bodyType</h3>";
                echo "<p>Color Tone: $colorTone</p>";
                echo "<button class='btn-explore' onclick=\"window.location.href='styles.php'\">Explore More Styles</button>";
                echo "</div>";


                // Updating user data in database

                $email = $_GET["email"];

                $query = "UPDATE `users` SET `bust_size` = '$bustSize', `waist_size` = '$waistSize', `high_hip_size` = '$highHipSize', `body_shape` = '$bodyType', `hip_size` = '$hipSize',`colortone`='$colorTone' WHERE `email` = '$email'";

                $result = mysqli_query($connect, $query);
                if ($result > 0) {
                    $_SESSION["bodyType"] = $bodyType;
                    $_SESSION["tone"] = $colorTone;
            ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Information Added Successfully</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Information Not Added,Please Try Again Later!</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php
                }
            }
            ?>



        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>

<?php
include("footer.php");
?>