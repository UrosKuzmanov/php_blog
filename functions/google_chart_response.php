<?php
include "../includes/DB.php";
include "functions.php";
$posts=count_items('posts');
$categories=count_items('categories');
$users=count_items('users');
$comments=count_items('comments');


$response = array("posts" => $posts,"categ"=>$categories,"users"=>$users,"comments"=>$comments);
header('Content-type: application/json');
echo json_encode($response);
