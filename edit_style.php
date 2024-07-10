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
</div>
</section>

<!-- Form for edit style -->
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
            <button type="submit" name="submit" class="btn btn-outline-dark">Submit</button>
        </form>
    </div>
</div>


<?php
include("footer.php");
?>