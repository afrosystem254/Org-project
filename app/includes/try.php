<!-- < //include("../../path.php");
//include(ROOT_PATH . '/app/controllers/post.php');
?>   -->

<form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <label>Title</label>
                            <input type="text" name="title" value="<?php echo $title;?>" class="text-input">
                        </div>
                        <div>
                            <label>Body</label>
                            <textarea name="body" id="body"><?php echo $body;?></textarea>
                        </div>
                        <div>
                            <label>Image</label>
                            <input type="file" name="image" class="text-input">
                        </div>
                        <div>
                            <label>Topic</label>
                            <select name="topic_id" class="text-input">
                                <option value=""></option>
                                <?php foreach ($topics as $key => $topic):?>
                                    <?php if(!empty($topic_id)&&$topic_id==$topic['id']):?>
                                       <option selected value="<?php echo $topic['id']?>"><?php echo $topic['name']?></option>
                                    <?php else:?>
                                         <option value="<?php echo $topic['id']?>"><?php echo $topic['name']?></option>
                                    <?php endif;?>
                                <?php endforeach;?> 
           
                            </select>
                        </div>
                        <div>
                            <?php if (empty($publish)): ?>
                                <label>
                                    <input type="checkbox" name="publish">
                                    Publish
                                </label>
                            <?php else:?>
                                <label>
                                    <input type="checkbox" name="publish" checked>
                                    Publish
                                </label>
                            <?php endif;?>

                            
                        </div>
                        <div>
                            <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
                        </div>
                    </form>
