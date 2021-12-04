<?php
include "includes/header.php"
?>

<div id="wrapper">
   
    <!-- Navigation -->
    <?php include "includes/navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Categoryes
                        <small><?php echo user_full_name()?></small>
                    </h1>
                    <div class="col-xs-6">
                        <?php
                        if(isset($_GET['edit'])){
                            include "includes/categories/update_category.php";//Update Category Form
                        }else{
                            include "includes/categories/add_category.php"; //Add Category Form
                        }
                         ?>
                    </div>
                    <div class="col-xs-6">
                        <!-- categories list -->
                        <?php include "includes/categories/categories_table.php" ?><!-- table whit cat list -->
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/footer.php" ?>