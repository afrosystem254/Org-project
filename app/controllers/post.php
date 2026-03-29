<?php
include(ROOT_PATH . '/app/database/db.php'); 
include(ROOT_PATH . '/app/includes/validatepost.php');
include(ROOT_PATH . '/app/controllers/middleware.php');
// adminOnly();
// initiliazation
$table='post';
$topics=selectAll('topics');
$posts=selectAll($table);
$id='';
$title=''; 
$body='';
$topic_id='';
$publish=''; 
$errors=array();

// adding post
if (isset($_POST['add-post'])) {
// adminOnly();
$errors=validatePost($_POST);
// uploading
if (isset($_FILES['image']['name'])) {
    $image_name=time() . '_' . $_FILES['image']['name'];
    $destination=ROOT_PATH . "/asset/images/" . $image_name;
    $result=move_uploaded_file($_FILES['image']['tmp_name'],$destination);
    if ($result) {
        $_POST['image']=$image_name;
    } else {
        array_push($errors,"Failed to upload!");

    }
    
} else {
    array_push($errors,"Post image required!");
}

// errors

    if (count($errors)===0) {
         unset($_POST['add-post']);
    $_POST['user_id']=$_SESSION['id'];
    $_POST['publish']=isset($_POST['publish']) ? 1:0;
    $_POST['body']=htmlentities($_POST['body']);

    $post_id=create($table,$_POST);
    $_SESSION['message']='Post added';
    $_SESSION['type']='success';
    header('Location: ' . BASE_URL . '/admin/posts/index.php');

    } else {
        $title=$_POST['title'];
        $body=$_POST['body'];
        $topic_id=$_POST['topic_id'];
        $publish=isset($_POST['publish']) ? 1:0;
    }
      
}
// getting info
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = selectOne($table, ['id' => $id]);

    if ($post) {   // ✅ ADD THIS CHECK
        $id = $post['id'];
        $title = $post['title'];
        $body = $post['body'];
        $topic_id = $post['topic_id'];
        $publish = $post['publish'];
    }
}
// update 
if (isset($_POST['update-post'])) {
    adminOnly();
    $errors=validatePost($_POST);
     
    if (isset($_FILES['image']['name'])) {
    $image_name=time() . '_' . $_FILES['image']['name'];
    $destination=ROOT_PATH . "/asset/images/" . $image_name;
    $result=move_uploaded_file($_FILES['image']['tmp_name'],$destination);
    if ($result) {
        $_POST['image']=$image_name;
    } else {
        array_push($errors,"Failed to upload!");

    }
    
   } else {
    array_push($errors,"Post image required!");
   }
   if (count($errors)===0) {
    $id=$_POST['id'];
    unset($_POST['update-post'],$_POST['id']);
    $_POST['user_id']=$_SESSION['id'];
    $_POST['publish']=isset($_POST['publish']) ? 1:0;
    $_POST['body']=htmlentities($_POST['body']);

    $post_id=update($table,$id,$_POST);
    $_SESSION['message']='Post Updated';
    $_SESSION['type']='success';
    header('Location: ' . BASE_URL . '/admin/posts/index.php');
    exit();
    } else {
        $title=$_POST['title'];
        $body=$_POST['body'];
        $topic_id=$_POST['topic_id'];
        $publish=isset($_POST['publish']) ? 1:0;
    }
    
}
// delete
if (isset($_GET["del_id"])) {
    adminOnly();
    $id=$_GET["del_id"];
    $count=delete($table,$id);
    $_SESSION['message']='Post deleted';
    $_SESSION['type']='success';
    header('Location: ' . BASE_URL . '/admin/posts/index.php?id=' . $id);
    exit();
}
// publish
if (isset($_GET['publish']) && isset($_GET['p_id'])) {
    // adminOnly();
    $publish = (int) $_GET['publish'];
    $p_id = (int) $_GET['p_id'];

    $count = update($table, $p_id, ['publish' => $publish]);

    $_SESSION['message'] = ($publish === 1)
        ? 'Post published'
        : 'Post unpublished';

    $_SESSION['type'] = 'success';

    header('Location: ' . BASE_URL . '/admin/posts/index.php');
    exit();
}