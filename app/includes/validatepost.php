<?php
function validatePost($posts){

  $errors = array();

  if (empty($posts['title'])) {
    array_push($errors, 'Title is required!');
  }

  if (empty($posts['body'])) {
    array_push($errors, 'Body is required!');
  }

  if (empty($posts['topic_id'])) {
    array_push($errors, 'Select your topic!');
  }

  // ✅ FIXED HERE
  $existingPost = selectOne('post', ['title' => $posts['title']]);

  if ($existingPost) {
    if (isset($posts['update-post'])&& $existingPost['id']!=$posts['id']) {
          array_push($errors, 'Post the title exists !');
    }
    if (isset($posts['add-post'])) {
          array_push($errors, 'Post the title exists !');
    }
  } 
  
  return $errors;
}