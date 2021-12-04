<?php delete_item("users","user_id","users.php") ?>

<table class="table table-bordered table-hover ">
    <thead>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Username</th>
            <th>Date</th>
            <th class="text-primary">Delete</th>
            <th class="text-primary">Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php display_user_table_data() ?>
    </tbody>
</table>