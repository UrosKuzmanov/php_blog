<?php
$cat_title=edit_category()
?>

<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <input class="form-control" type="text" name="cat_title" value="<?php echo $cat_title  ?>">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_cat" value="Upload">
        <a class="btn btn-warning" href="categories.php">Cancle</a>
    </div>
</form>


