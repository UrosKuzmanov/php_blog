<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-primary">Id</th>
            <th class="text-primary">Category Title</th>
            <th class="text-primary">Delete</th>
            <th class="text-primary">Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php display_cat_list(); ?>
    </tbody>
</table>
<?php delete_item("categories", "cat_id", "categories.php")?>