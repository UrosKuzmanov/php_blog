<?php
include "includes/DB.php";
?>
<?php
include "includes/header.php";
?>

<!-- Navigation -->
<?php
include "includes/navigation.php";
?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->

        <div class="col-md-8">

            <?php
            search_posts();
            show_posts_by()

            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php
        include "includes/sidebar.php";
        ?>


    </div>
    <!-- /.row -->

    <hr>
    <!-- Footer -->
    <?php
    include "includes/footer.php";
    ?>