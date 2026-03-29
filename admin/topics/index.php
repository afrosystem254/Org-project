<?php 
include("../../path.php");
include(ROOT_PATH . '/app/controllers/topics.php');
adminOnly()
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

        <title>Admin Section - Manage Topics</title>
    </head>

    <body>
        <!-- header -->
          <?php include(ROOT_PATH . '/app/includes/adminheader.php'); ?>


        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

            <!-- Left Sidebar -->
          <?php include(ROOT_PATH . '/app/includes/side.php'); ?>

            <!-- // Left Sidebar -->


            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="register.php" class="btn btn-big">Add Topic</a>
                    <a href="index.php" class="btn btn-big">Manage Topics</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Manage Topics</h2>
                    <!-- message -->
         <?php include(ROOT_PATH . '/app/includes/message.php'); ?>

                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Name</th>
                            <th colspan="2">Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($topics as $key => $topics):?>

                            <tr>
                                <td><?php echo $key+1;?></td>
                                <td><?php echo $topics['name'];?></td>
                                <td><a href="edit.php?id=<?php echo $topics['id'];?> " class="edit">edit</a></td>
                                <td><a href="index.php?del_id=<?php echo $topics['id'];?>" class="delete">delete</a></td>
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
        <script src="../..asset/js/scripts.js"></script>

    </body>

</html>