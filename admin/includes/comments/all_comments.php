

<table class="table table-bordered table-hover ">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Post</th>
            <th>Content</th>
            <th>Status</th>
            <th>Date</th>
            <th class="text-primary">Approve</th>
            <th class="text-primary">Unapprove</th>
            <th class="text-primary">Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php  display_table_data_comm()?>
    </tbody>
</table>

<?php 
delete_item("comments","comment_id","comments.php");
change_comm_status();
?>