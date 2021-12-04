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
                        Welcome to Comments
                        <small><?php echo user_full_name()?></small>
                    </h1>
                    

                    <?php
                    $source="";
                    if(isset($_GET['source'])){
                        $source=$_GET['source'];
                    }
                    switch($source){
                        default:
                        include "includes/comments/all_comments.php" ;
                    }
                    

                    ?>
                    
                    
                   
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/footer.php" ?>