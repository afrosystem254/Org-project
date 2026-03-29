<?php
include(ROOT_PATH . '/app/database/db.php'); 
include(ROOT_PATH . '/app/includes/validate.php'); 
include(ROOT_PATH . '/app/controllers/middleware.php');



$table='topics';
$errors=array();
$id='';
$name='';
$description='';

//create function
$topics=selectAll($table);
if (isset($_POST['add-topic'])) {
    // adminOnly();
    $errors=validateTopic($_POST);
    if (count($errors)===0) {
        unset($_POST['add-topic']);
        $topic_id=create($table,$_POST);
        $_SESSION['message']='Topics added';
        $_SESSION['type']='success';
        header('Location: ' . BASE_URL . '/admin/topics/index.php');
        exit();
    } else {
        $name=$_POST['name'];
        $description=$_POST['description'];
    }
}
//update function
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $topic = selectOne($table, ['id' => $id]);

    if ($topic) { // ✅ Only proceed if topic exists
        $id = $topic['id'];
        $name = $topic['name'];
        $description = $topic['description'];
    }
    
}
//update
if (isset($_POST['update-topic'])) {
    // adminOnly();
    $errors=validateTopic($_POST);

    if (count($errors)===0) {
        $id=$_POST['id'];
        unset($_POST['update-topic'],$_POST['id']);
        $topic_id=update($table,$id,$_POST);
        $_SESSION['message']='Topic updated';
        $_SESSION['type']='success';
        header('Location: ' . BASE_URL . '/admin/topics/index.php?id=' . $id);
        exit();
    } else {
        $name=$_POST['name'];
        $description=$_POST['description'];
    }
}
//delete function
if (isset($_GET["del_id"])) {
    adminOnly();
    $id=$_GET["del_id"];
    $count=delete($table,$id);
    $_SESSION['message']='Topic deleted';
    $_SESSION['type']='success';
    header('Location: ' . BASE_URL . '/admin/topics/index.php?id=' . $id);
    exit();
    
}