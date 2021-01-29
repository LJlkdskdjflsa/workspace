<?php 
    require("./classes/dbh.class.php");
    require("./classes/types.class.php");

  $types = new Types();
  
  if(isset($_POST['submit'])) {
    $typeName = $_POST['type-title'];
    $typeContent = $_POST['type-content'];
    $typeAuthor = $_POST['type-author'];
  
    $types->addType($typeName, $typeContent, $typeAuthor);
  
    header("location: {$_SERVER['HTTP_ORIGIN']}/workspace/index.php?status=added");
  
  } else if($_GET['send'] === 'del') {
    $id = $_GET['id'];
    $Tests->delType($id);

    header("location: {$_SERVER['HTTP_ORIGIN']}/workspace/index.php?status=deleted");
  } else if($_GET['send'] === 'update') {
    $id = $_GET['id'];

    $typeName = $_POST['type-title'];
    $typeContent = $_POST['type-content'];
    $typeAuthor = $_POST['type-author'];

    $types->updateType($id, $typeName, $typeContent, $typeAuthor);

    header("location: {$_SERVER['HTTP_ORIGIN']}/workspace/index.php?status=updated");
  }
