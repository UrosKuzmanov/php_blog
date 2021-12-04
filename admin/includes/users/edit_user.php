<?php
    
if (isset($_GET['user_id'])) {
    $edit_user_id = $_GET['user_id'];
    $user_data = user_data( $edit_user_id );
}
update_edit_user_to_DB($user_data['user_password']);
?>


<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="fname">First Name</label>
        <input value="<?php echo $user_data['user_fname'] ?>" type="text" class="form-control" name="fname">
    </div>

    <div class="form-group">
        <label for="lname">Last Name</label>
        <input value="<?php echo $user_data['user_lname'] ?>" type="text" class="form-control" name="lname">
    </div>
    
    <div class="form-group">
        <label for="username">Username</label>
        <input value="<?php echo $user_data['user_username'] ?>" type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input value="<?php echo $user_data['user_email'] ?>" type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input value="<?php echo $user_data['user_password'] ?>" type="password" class="form-control" name="password">
    </div>
    
    
    <div class="form-group">
        <select class="form-control" name="role" id="">
            <option value="Admin">Admin</option>
            <option value="Gost">Gost</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control-file">
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Add User">
    </div>


</form>