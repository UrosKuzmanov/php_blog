 <!-- First Blog Post -->
 <h2>
     <a href="post.php?p_id=<?php echo $post['post_id'] ?>"><?php echo $post['post_title'] ?></a>
 </h2>
 <p class="lead">
     by <a href="search.php?author=<?php echo $post['post_author'] ?>"><?php echo $post['post_author'] ?></a>
 </p>
 <p><span class="glyphicon glyphicon-time"></span> <?php echo $post['post_date'] ?></p>
 <hr>
 <a href="post.php?p_id=<?php echo $post['post_id'] ?>"><img class="img-responsive" src="./images/<?php echo $post['post_img'] ?>" alt=""></a>
 <hr>
 <p><?php echo substr($post['post_content'], 0, 100)  ?></p>
 <a class="btn btn-primary" href="post.php?p_id=<?php echo $post['post_id'] ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

 <hr>