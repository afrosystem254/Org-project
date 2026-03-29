<!-- <?php
function validateTopic($topic){

  $errors=array();

  if (empty($topic['name'])) {
    array_push($errors,'Topic is required!');
  }
  
  $existingTopic=selectOne('topics',['name'=>$topic['name']]);
  if (isset($existingTopic)) {
        
    if (isset($topic['update-topic'])&& $existingTopic['id']!=$topic['id']) {
          array_push($errors, 'Topic the title exists !');
    }
    if (isset($topic['add-post'])) {
          array_push($errors, 'Topic the title exists !');
    }
  } 
  
  
return $errors;
} 