<?php  add_user()  ?>

<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="fname">
    </div>

    <div class="form-group">
        <label for="post_tags">Last Name</label>
        <input type="text" class="form-control" name="lname">
    </div>
    
    <div class="form-group">
        <label for="author">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="author">Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="author">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    
    
    <div class="form-group">
        <select class="form-control" name="role" id="">
            <option value="Admin">Admin</option>
            <option value="Gost">Gost</option>
        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" name="image" class="form-control-file">
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
    </div>


</form>