

    <!-- Blog Post -->

    <!-- Title -->
    <h1><?php echo $post['post_title'] ?></h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#"><?php echo get_category($post['post_id'])  ?></a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post['post_date'] ?></p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="images/<?php echo $post['post_img'] ?>" alt="">

    <hr>

    <!-- Post Content -->
    <p ><?php echo $post['post_content'] ?></p>

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form action="" method="post" role="form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="comment_author"></input>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="E-mail" name="comment_email"></input>
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Your Comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    <?php show_comments($post['post_id']) ?>

 

