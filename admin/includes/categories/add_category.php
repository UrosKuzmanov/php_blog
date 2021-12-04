<?php
$message=add_category();//add cat to DB or return the err message 
?>


<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Add Category</label>
        <?php echo $message ?>
        <input class="form-control" type="text" name="cat_title">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
    </div>
</form>