<?php include("../../path.php");
include(ROOT_PATH . '/app/controllers/post.php');
adminOnly();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
            crossorigin="anonymous">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Candal|Lora"
            rel="stylesheet">

        <!-- Custom Styling -->
        <link rel="stylesheet" href="../../asset/css/style.css">

        <!-- Admin Styling -->
        <link rel="stylesheet" href="../../asset/css/admin.css">

        <title>Admin Section - Add post</title>
    </head>

    <body>
        <!-- admin header -->
  <?php include(ROOT_PATH . '/app/includes/adminheader.php'); ?>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

            <!-- Left Sidebar -->
<?php include(ROOT_PATH . '/app/includes/side.php'); ?>

            <!-- // Left Sidebar -->


            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="register.php" class="btn btn-big">Add post</a>
                    <a href="index.php" class="btn btn-big">Manage post</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Edit post</h2>
<?php include(ROOT_PATH . '/app/includes/error.php'); ?>

<form action="edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?php echo $id; ?>">
    <div>
        <label>Title</label>
        <input type="text" name="title" class="text-input" value="<?php echo $title; ?>">
    </div>

    <div>
        <label>Body</label>
        <textarea name="body" id="body"><?php echo $body; ?></textarea>
    </div>

    <div>
        <label>Image</label>
        <input type="file" name="image" class="text-input">
    </div>

    <div>
        <label>Topic</label>
        <select name="topic_id" class="text-input">
            <?php foreach ($topics as $topic): ?>
                <option value="<?php echo $topic['id']; ?>" <?php echo ($topic_id == $topic['id']) ? 'selected' : '' ?>>
                    <?php echo $topic['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

        <div>       
    <?php if(empty($publish)&& $publish==0): ?>
        <label>
            <input type="checkbox" name="publish" >
            Published
        </label>
    <?php else : ?>
        <label>
            <input type="checkbox" name="publish" checked >
            Published
        </label>
    <?php endif;?>
    </div>
    
    <button type="submit" name="update-post" class="btn btn-big">Update post</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->



        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Ckeditor -->
        <script
            src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
        <!-- Custom Script -->
        <script src="../../asset/js/scripts.js"></script>

    </body>

</html>