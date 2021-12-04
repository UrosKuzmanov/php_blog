<?php

/************ Delete Item ***************** */
function delete_item($delete_from, $delete_where, $refresh_to)
{
    global $connection;
    if (isset($_GET['delete'])) { //Delete Query
        $delete_id = $_GET['delete'];
        $query = "DELETE FROM {$delete_from} WHERE {$delete_where}={$delete_id}";
        $del_query = mysqli_query($connection, $query);
        confirm_query($del_query);
        header("Location:{$refresh_to}");
    }
}

/********************** Dashboard*************** */

function count_items($table)
{
    global $connection;
    $query = "SELECT * FROM {$table}";
    $query_do = mysqli_query($connection, $query);
    $no_items = mysqli_num_rows($query_do);
    return $no_items;
}




//***********connections************************
function  confirm_query($result)
{
    global $connection;
    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    }
}


//************************ Check User Role ***********/
function check_user_role()
{
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Admin") {
    } else {
        header("Location:../index.php");
    }
}

function logout()
{
    if (isset($_GET['logout'])) {
        $_SESSION['username'] = null;
        $_SESSION['user_fname'] = null;
        $_SESSION['user_lname'] = null;
        $_SESSION['user_role'] = null;
        header("Location:index.php");
    }
}

// **************Admin Categories**************

function add_category() //Add Cat. To DB
{
    global $connection;
    if (isset($_POST['submit'])) {
        $input_cat_title = $_POST['cat_title'];

        if ($input_cat_title == "" || empty($input_cat_title)) {
            return "<p class='text-danger'>This field should not be empty !!!</p>";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUE ('{$input_cat_title}') ";
            $create_cat_query = mysqli_query($connection, $query);

            confirm_query($create_cat_query);
            header("Location:categories.php");
        }
    }
};


function get_category($cat_id)
{
    global $connection;
    $query = "SELECT * FROM categories WHERE cat_id=$cat_id";
    $edit_categories_query = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($edit_categories_query);

    $cat_title = $row['cat_title'];

    return  $cat_title;
}

function edit_category() //Edit Category And Update To DB
{
    global $connection;

    $cat_id = $_GET['edit'];
    $cat_title = get_category($cat_id);


    if (isset($_POST['update_cat'])) {
        $updata_cat_title = $_POST['cat_title'];
        $query = "UPDATE categories SET cat_title='{$updata_cat_title}' WHERE cat_id={$cat_id}";
        $update_query = mysqli_query($connection, $query);
        header("Location:categories.php");
    }
    return  $cat_title;
}

function get_all_cat() //all category arr
{
    global $connection;
    $query = "SELECT * FROM categories";
    $categories_query = mysqli_query($connection, $query);
    $cat_arr = [];
    while ($row = mysqli_fetch_assoc($categories_query)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        $cat_arr[$cat_id] = $cat_title;
    }
    return $cat_arr;
}

function display_cat_list() //Display list of cat in table
{
    $all_cat = get_all_cat();

    foreach ($all_cat as $cat_id => $cat_title) {
?>
        <tr>
            <td> <?php echo $cat_id ?></td>
            <td> <?php echo $cat_title ?></td>
           
            <td><a href="#"><i class="fa fa-fw fa-trash text-danger del_link " data="<?php echo $cat_id ?>"></i></a></td>
            
            <td><a href="categories.php?edit=<?php echo $cat_id ?>"><i class="fa fa-fw fa-edit text-warning"></i></a></td>
        </tr>
    <?php
    }
}







//**********Admin Posts***********************


function get_all_posts()
{
    global $connection;
    $all_posts_arr = [];
    $post_arr = [];
    $query = "SELECT * FROM posts";
    $all_posts_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($all_posts_query)) {
        $post_arr['post_id'] = $row['post_id'];
        $post_arr['post_author'] = $row['post_author'];
        $post_arr['post_title'] = $row['post_title'];
        $post_arr['post_category_id'] = $row['post_category_id'];
        $post_arr['post_status'] = $row['post_status'];
        $post_arr['post_img'] = $row['post_img'];
        $post_arr['post_date'] = $row['post_date'];
        $post_arr['post_content'] = $row['post_content'];
        $post_arr['post_category_name'] = get_category($row['post_category_id']);
        $all_posts_arr[] = $post_arr;
    }
    return $all_posts_arr;
}

function no_of_comment($post_id)
{
    global $connection;
    $query = "SELECT * FROM comments WHERE comment_post_id=$post_id";
    $query_do = mysqli_query($connection, $query);
    $no_of_comm = mysqli_num_rows($query_do);
    return $no_of_comm;
}

function display_table_data()
{
    $all_posts = get_all_posts();
    foreach ($all_posts as $post_arr) {
    ?>
        <tr>
            <td><?php echo $post_arr['post_id'] ?></td>
            <td><?php echo  $post_arr['post_author'] ?></td>
            <td><?php echo $post_arr['post_title'] ?></td>
            <td><?php echo $post_arr['post_category_name'] ?></td>
            <td><?php echo $post_arr['post_status'] ?></td>
            <td><img Width="100px" src="../images/<?php echo $post_arr['post_img'] ?>" alt=""></td>
            <td><?php echo no_of_comment($post_arr['post_id']) ?></td>
            <td><?php echo $post_arr['post_date'] ?></td>
            <td><a href="#" class="del_link" data="<?php echo $post_arr['post_id'] ?>"><i class="fa fa-fw fa-trash text-danger  "></i></a></td>
           <!-- <td><a href="posts.php?delete="><i class="fa fa-fw fa-trash text-danger  "></i></a></td>-->
            <td><a href="posts.php?source=edit_post&p_id=<?php echo $post_arr['post_id'] ?>"><i class="fa fa-fw fa-edit text-warning"></i></a></td>
        </tr>
    <?php }
}




function add_post() //add post to DB
{
    global $connection;
    if (isset($_POST['create_post'])) {
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_cat_id = $_POST['post_category'];
        $post_img = $_FILES['image']['name'];
        $post_img_temp = $_FILES['image']['tmp_name'];
        $post_status = $_POST['post_status'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];


        move_uploaded_file($post_img_temp, "../images/$post_img");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_img, post_content, post_tags, post_status)";
        $query .= "VALUES ('{$post_cat_id}','{$post_title}','{$post_author}', now(),'{$post_img}','{$post_content}','{$post_tags}','{$post_status}') ";
        $add_post_query = mysqli_query($connection, $query);
        confirm_query($add_post_query);
        header("Location:posts.php");
    }
}

function display_category_opt() //dsp category list for select menu
{

    $all_cat = get_all_cat();

    foreach ($all_cat as $cat_id => $cat_title) {
    ?>
        <option value='<?php echo $cat_id ?>'> <?php echo $cat_title ?></option>";
    <?php
    }
}

function post_data($post_id) //get data of single post
{
    global $connection;
    $query = "SELECT * FROM posts WHERE post_id=$post_id";
    $query_do = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($query_do);
    return $row;
}

function update_edit_post_to_DB()
{
    global $connection;
    $post_id = $_GET['p_id'];
    if (isset($_POST['update_post'])) {
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_img = $_FILES['image']['name'];
        $post_img_temp = $_FILES['image']['tmp_name'];
        $post_status = $_POST['post_status'];
        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_category = $_POST['post_category'];

        move_uploaded_file($post_img_temp, "../images/$post_img");

        if (empty($post_img)) {
            $post_img = post_data($post_id)['post_img'];
        }
        $query = "UPDATE posts SET post_title='{$post_title}', post_author='{$post_author}',post_category_id='{$post_category}', post_img='{$post_img}', post_content='{$post_content}', post_tags='{$post_tags}', post_status='{$post_status}' WHERE post_id=$post_id";
        $update_post_query = mysqli_query($connection, $query);
        confirm_query($update_post_query);
        header("Location:posts.php");
    }
}

/********************************Admin Users *****************************/

function get_all_users()
{
    global $connection;
    $all_users_arr = [];
    $user_arr = [];
    $query = "SELECT * FROM users";
    $query_do = mysqli_query($connection, $query);
    confirm_query($query_do);
    while ($row = mysqli_fetch_assoc($query_do)) {
        $user_arr['user_id'] = $row['user_id'];
        $user_arr['user_fname'] = $row['user_fname'];
        $user_arr['user_lname'] = $row['user_lname'];
        $user_arr['user_username'] = $row['user_username'];
        $user_arr['user_email'] = $row['user_email'];
        $user_arr['user_role'] = $row['user_role'];
        $user_arr['user_date'] = $row['user_date'];
        $all_users_arr[] = $user_arr;
    }
    return $all_users_arr;
}

function user_data($user_id) //get data of single post
{
    global $connection;
    $query = "SELECT * FROM users WHERE user_id=$user_id";
    $query_do = mysqli_query($connection, $query);
    confirm_query($query_do);
    $row = mysqli_fetch_array($query_do);
    return $row;
}


function display_user_table_data()
{
    $all_users = get_all_users();
    foreach ($all_users as $user_arr) {
    ?>
        <tr>
            <td><?php echo $user_arr['user_id'] ?></td>
            <td><?php echo  $user_arr['user_fname'] ?></td>
            <td><?php echo $user_arr['user_lname'] ?></td>
            <td><?php echo $user_arr['user_email'] ?></td>
            <td><?php echo $user_arr['user_role'] ?></td>
            <td><?php echo $user_arr['user_username'] ?></td>
            <td><?php echo $user_arr['user_date'] ?></td>
            <td><i data="<?php echo $user_arr['user_id']?>" class="fa fa-fw fa-trash text-danger del_link  "></i></td>
            <td><a href="users.php?source=edit_user&user_id=<?php echo $user_arr['user_id'] ?>"><i class="fa fa-fw fa-edit text-warning"></i></a></td>
        </tr>
    <?php }
}

function add_user()
{
    global $connection;
    if (isset($_POST['add_user'])) {
        $user_fname = $_POST['fname'];
        $user_lname = $_POST['lname'];
        $user_username = $_POST['username'];
        //$post_img = $_FILES['image']['name'];
        //$post_img_temp = $_FILES['image']['tmp_name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $user_role = $_POST['role'];
        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array("cost" => 12));


        //move_uploaded_file($post_img_temp, "../images/$post_img");

        $query = "INSERT INTO users(user_fname, user_lname, user_username, user_email, user_password, user_role)";
        $query .= "VALUES ('{$user_fname}','{$user_lname}','{$user_username}','{$user_email}','{$user_password}','{$user_role}') ";
        $query_do = mysqli_query($connection, $query);
        confirm_query($query_do);
        header("Location:users.php");
    }
}


function update_edit_user_to_DB($old_password)
{
    global $connection;
    $user_id = $_GET['user_id'];
    if (isset($_POST['update_user'])) {
        $user_fname = $_POST['fname'];
        $user_lname = $_POST['lname'];
        // $post_img = $_FILES['image']['name'];
        // $post_img_temp = $_FILES['image']['tmp_name'];
        $user_username = $_POST['username'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $user_role = $_POST['role'];
        if ($old_password !== $user_password) {
            $user_password = password_hash($user_password, PASSWORD_BCRYPT, array("cost" => 12));
        }

        // move_uploaded_file($post_img_temp, "../images/$post_img");

        // if (empty($post_img)) {
        //    $post_img = post_data($post_id)['post_img'];
        // }
        $query = "UPDATE users SET user_fname='{$user_fname}', user_lname='{$user_lname}', user_username='{$user_username}', user_email='{$user_email}', user_password='{$user_password}', user_role='{$user_role}' WHERE user_id=$user_id";
        $update_post_query = mysqli_query($connection, $query);
        confirm_query($update_post_query);
        header("Location:users.php");
    }
}


/*************************** Admin Comments***************************** */

function get_post_name($post_id)
{
    global $connection;
    $query = "SELECT post_title FROM posts WHERE post_id=$post_id";
    $query_do = mysqli_query($connection, $query);
    confirm_query($query_do);
    $post = mysqli_fetch_assoc($query_do);
    $post_name = $post['post_title'];
    return $post_name;
}

function get_all_comments()
{
    global $connection;
    $all_comm_arr = [];
    $comm_arr = [];
    $query = "SELECT * FROM comments";
    $query_do = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_do)) {
        $comm_arr['comm_id'] = $row['comment_id'];
        $comm_arr['comm_author'] = $row['comment_author'];
        $comm_arr['comm_email'] = $row['comment_email'];
        $comm_arr['comm_post_id'] = $row['comment_post_id'];
        $comm_arr['comm_content'] = $row['comment_content'];
        $comm_arr['comm_status'] = $row['comment_status'];
        $comm_arr['comm_date'] = $row['comment_date'];
        $comm_arr['comm_post_name'] = get_post_name($row['comment_post_id']);
        $all_comm_arr[] = $comm_arr;
    }
    return $all_comm_arr;
}
function display_table_data_comm()
{
    $all_comm = get_all_comments();
    foreach ($all_comm as $comm_arr) {
    ?>
        <tr>
            <td><?php echo $comm_arr['comm_id'] ?></td>
            <td><?php echo  $comm_arr['comm_author'] ?></td>
            <td><?php echo $comm_arr['comm_email'] ?></td>
            <td><a href="../post.php?p_id=<?php echo $comm_arr['comm_post_id'] ?>"><?php echo $comm_arr['comm_post_name'] ?></a></td>
            <td><?php echo $comm_arr['comm_content'] ?></td>
            <td><?php echo $comm_arr['comm_status'] ?></td>
            <td><?php echo $comm_arr['comm_date'] ?></td>
            <td><a href="comments.php?change_status=Approve&comm_id=<?php echo $comm_arr['comm_id'] ?>"><i class="fa fa-fw fa-thumbs-up text-success  "></i></a></td>
            <td><a href="comments.php?change_status=Unapprove&comm_id=<?php echo $comm_arr['comm_id'] ?>"><i class="fa fa-fw fa-thumbs-down text-warning  "></i></a></td>
            <td><a href="comments.php?delete=<?php echo $comm_arr['comm_id'] ?>"><i class="fa fa-fw fa-trash text-danger  "></i></a></td>
        </tr>
<?php }
}
function change_comm_status()
{
    global $connection;
    if (isset($_GET['change_status'])) {
        $new_status = $_GET['change_status'];
        $comm_id = $_GET['comm_id'];
        $query = "UPDATE `comments` SET `comment_status` = '{$new_status}' WHERE `comments`.`comment_id` = $comm_id;";
        $query_do = mysqli_query($connection, $query);
        confirm_query($query_do);
        header("Location:comments.php");
    }
}



//***********Home Page-Index *******************/

function show_posts($all_post_data)
{
    if (empty($all_post_data)) {
        echo "<h1>No required posts</h1>";
    }
    foreach ($all_post_data as $post) {
        if ($post['post_status'] == "published") {
            include "./includes/UI/posts/post_wrapper.php";
        }
    }
}

function show_post()
{
    global $connection;
    if (isset($_GET['p_id'])) {
        $post_id = $_GET['p_id'];
        $query = "SELECT * FROM posts WHERE post_id=$post_id";
        $query_do = mysqli_query($connection, $query);
        $post = mysqli_fetch_assoc($query_do);

        include "includes/UI/post/post.php";
    }
    return $post;
}



//**********Search Posts ***********************/

function search_posts()
{
    global $connection;
    if (isset($_POST['search_submit'])) {
        $search = $_POST['search'];

        $query = "SELECT * FROM posts WHERE post_content LIKE '%$search%'";
        $search_query = mysqli_query($connection, $query);

        if (!$search_query) {
            die("Query failed" . mysqli_error($connection));
        }
        if (mysqli_num_rows($search_query) == 0) {
            echo "<h1> NO RESULT</h1>";
        } else {
            $posts = [];
            while ($row = mysqli_fetch_assoc($search_query)) {
                $posts[] = $row;
            }
            echo '
            <div class="col-md-8">
                <h1 class="page-header">
                    Search: "' . $search . '"
                </h1>';
            show_posts($posts);
        }
    }
}

/********************************** Select Posts By Cat. or Author **************************/
function select_posts_by($crt, $value)
{
    global $connection;
    $query = "SELECT * FROM posts WHERE $crt='{$value}'";
    $query_do = mysqli_query($connection, $query);
    $posts = [];
    confirm_query($query_do);
    while ($row = mysqli_fetch_assoc($query_do)) {
        $posts[] = $row;
    }
    show_posts($posts);
}

function show_posts_by()
{
    if (isset($_GET['author'])) {
        $author = $_GET['author'];
        select_posts_by('post_author',  $author);
    } elseif (isset($_GET['category'])) {
        $category = $_GET['category'];
        select_posts_by('post_category_id', $category);
    }
}

/**********************************Create Comment ***********************/
function create_comment($post_id)
{
    global $connection;
    if (isset($_POST['create_comment'])) {
        $comm_author = $_POST['comment_author'];
        $comm_email = $_POST['comment_email'];
        $comm_content = $_POST['comment'];
        $comm_poct_id = $post_id;
        $com_date = date("d.m.y");

        if ($comm_author == "" || empty($comm_author) || $comm_email == "" || empty($comm_email) || $comm_content == "" || empty($comm_content)) {
            return "<p class='text-danger'>This fields should not be empty !!!</p>";
        } else {
            $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_date) VALUE ('{$comm_poct_id}','{$comm_author}','{$comm_email}','{$comm_content}','{$com_date}') ";
            $query_do = mysqli_query($connection, $query);

            confirm_query($query_do);
            header("Location:post.php?p_id=$post_id");
        }
    }
}

/******************************Show Comments ********************************* */

function show_comments($post_id)
{
    global $connection;
    $query = "SELECT * FROM comments WHERE comment_post_id=$post_id AND comment_status='Approve'";
    $query_do = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_do)) {
        $comm_author = $row['comment_author'];
        $comm_data = $row['comment_date'];
        $comm_content = $row['comment_content'];
        include "includes/UI/comment/comment.php";
    }
}



/**********************Login logout******************************** */
function login_logout()
{
    if (isset($_SESSION['username'])) {
        include "./includes/UI/Log_well/logout.php";
    } else {

        include "./includes/UI/Log_well/login.php";
    }
}


function admin_link() /********sow hide login filed */
{
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == "Admin") {
        echo  '<li>
        <a href="admin">Admin</a>
    </li>';
    }
}


/************* user name+lname */
function user_full_name(){
return  $_SESSION['user_fname']." ".$_SESSION['user_lname'];
}
