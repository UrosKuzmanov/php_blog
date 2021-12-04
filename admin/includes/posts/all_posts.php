<?php delete_item("posts","post_id","posts.php") ?>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
<table class="table table-bordered table-hover ">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Img</th>
            <th>Comments</th>
            <th>Date</th>
            <th class="text-primary">Delete</th>
            <th class="text-primary">Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php display_table_data() ?>
    </tbody>
</table>