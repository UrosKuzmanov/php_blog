<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="search_submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!--Search Form-->
        <!-- /.input-group -->
    </div>
    <!-- Blog login Well -->
    <?php login_logout()?>

    <!-- Blog Categories Well -->

    <?php
    $query = "SELECT * FROM categories LIMIT 8";
    $sidebar_catego_query = mysqli_query($connection, $query);
    ?>

    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <!-- First Cat. Col. -->
                <ul class="list-unstyled">
                    <?php
                    $no_cat = 1;
                    $sec_cat_col = [];

                    while ($row = mysqli_fetch_assoc($sidebar_catego_query)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                        if ($no_cat < 5) { //First Col. First 4
                            echo "<li><a href='search.php?category=" . $row['cat_id'] . "'> {$cat_title}</a> </li>";
                        } else { //Arr For Sec Col. Last 4
                            $sec_cat_col[$cat_id] = $cat_title;
                        }
                        $no_cat++;
                    }

                    ?>

                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <!--Sec. Cat. Col. -->
                <ul class="list-unstyled">
                    <?php
                    $no_cat = 1;
                    foreach ($sec_cat_col as $value => $name) {
                        echo "<li><a href='search.php?category=$value'> {$name}</a> </li>";
                    }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>