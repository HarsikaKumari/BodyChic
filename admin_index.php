<?php
include("admin_header.php");
//session check
include("session_check.php");

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
</div>
</section>
<center>
    <h1>Welcome admin</h1>
    <p><?php echo $_SESSION["email"] ?></p>
    <p><?php echo $_SESSION["name"] ?></p>
</center>

<?php
include("footer.php");
?>