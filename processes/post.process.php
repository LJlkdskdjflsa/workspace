<?php 
    require("../classes/dbh.class.php");
    require("../classes/posts.class.php");

  $posts = new Posts();
  
  if(isset($_POST['submit'])) {
    $title = $_POST['post-title'];
    $body = $_POST['post-content'];
    $author = $_POST['post-author'];
  
    $posts->addPost($title, $body, $author);
  
    header("location: {$_SERVER['HTTP_ORIGIN']}/workspace/index.php?status=added");
  
  } else if($_GET['send'] === 'del') {
    $id = $_GET['id'];
    $posts->delPost($id);

    header("location: {$_SERVER['HTTP_ORIGIN']}/workspace/index.php?status=deleted");
  } else if($_GET['send'] === 'update') {
    $id = $_GET['id'];

    $title = $_POST['post-title'];
    $body = $_POST['post-content'];
    $author = $_POST['post-author'];

    $posts->updatePost($id, $title, $body, $author);

    header("location: {$_SERVER['HTTP_ORIGIN']}/workspace/index.php?status=updated");
  }
