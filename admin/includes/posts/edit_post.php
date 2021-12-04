<?php
if (isset($_GET['p_id'])) {
    $edit_post_id = $_GET['p_id'];
    $post_data = post_data($edit_post_id);
}
update_edit_post_to_DB();
?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_data['post_title'] ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="post_category">Category</label>
        <select class="form-control" name="post_category" id="">
            <?php display_category_opt() ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_data['post_author'] ?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <select class="form-control" name="post_status" id="">
            <option value="draft">Post Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label><br>
        <img Width="100px" src="../images/<?php echo $post_data['post_img'] ?>" alt="">
        <input type="file" name="image" class="form-control-file">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_data['post_tags'] ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="" cols="30" rows="10"><?php echo $post_data['post_content'] ?>
         </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Publish Post">
    </div>

</form>