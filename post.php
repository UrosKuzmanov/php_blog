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
        <div class="col-md-8">



            <?php
            $post = show_post();
            $post_id = $post['post_id'];
            create_comment($post_id)
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