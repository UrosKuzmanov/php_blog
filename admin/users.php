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
                        Welcome to Users
                        <small><?php echo user_full_name()?></small>
                    </h1>
                    

                    <?php
                    $source="";
                    if(isset($_GET['source'])){
                        $source=$_GET['source'];
                    }
                    switch($source){
                        case "add_user";
                        include "includes/users/add_user_form.php";
                        break;
                        case "edit_user";
                        include "includes/users/edit_user.php";
                        break;
                        default:
                        include "includes/users/all_users.php" ;
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