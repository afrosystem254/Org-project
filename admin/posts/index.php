<?php include("../../path.php");
include(ROOT_PATH . '/app/controllers/post.php');
// adminOnly();
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

   
        <title>Admin Section - Manage Posts</title>
    </head>

    <body>
                   <?php include(ROOT_PATH . '/app/includes/adminheader.php'); ?>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

            <!-- Left Sidebar -->
                       <?php include(ROOT_PATH . '/app/includes/side.php'); ?>

            <!-- // Left Sidebar -->


            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="register.php" class="btn btn-big">Add Post</a>
                    <a href="index.php" class="btn btn-big">Manage Posts</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Manage Posts</h2>
                    <!-- success  -->
                       <?php include(ROOT_PATH . '/app/includes/message.php'); ?>

                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $key => $posts):?>
                                <tr>
                                <td><?php echo $key+1;?></td>
                                <td><?php echo $posts['title'];?></td>
                                <td>Awa</td>
                                <td><a href="edit.php?id=<?php echo $posts['id']?>" class="edit">edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $posts['id']?>" class="delete">delete</a></td>
                                <?php if($posts['publish']):?>
                                <td><a href="index.php?publish=0&p_id=<?php echo $posts['id']?>" class="unpublish">Unpublish</a></td>
                                <?php else:?>
                                <td><a href="index.php?publish=1&p_id=<?php echo $posts['id']?>" class="publish">Publish</a></td>
                                <?php endif;?>
                            </tr>
                           
                            <?php endforeach;?> 
                            
                        </tbody>
                    </table>

                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->



        <!-- JQuery -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Custom Script -->
        <script src="../../asset/js/scripts.js"></script>

    </body>

</html>