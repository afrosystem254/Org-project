<?php include("../../path.php");
include(ROOT_PATH . '/app/controllers/topics.php');
// adminOnly()
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

        <title>Admin Section - Add Topic</title>
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
                    <a href="register.php" class="btn btn-big">Add Topic</a>
                    <a href="index.php" class="btn btn-big">Manage Topics</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Edit Topic</h2>
                    <!-- errors -->
                  <?php include(ROOT_PATH . '/app/includes/error.php'); ?>

                    <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?= $id ?? '' ;?>" >

                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value="<?= $name ?? '' ;?>" class="text-input">
                    </div>
                    <div>
                        <label>Description</label>
                        <textarea name="description" id="body"><?= $description ?? '' ?></textarea>
                    </div>

                    <div>
                        <button type="submit" name="update-topic" class="btn btn-big">Update Topic</button>
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