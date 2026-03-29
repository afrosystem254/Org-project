<?php
include("../path.php");
include(ROOT_PATH . '/app/controllers/post.php');

// 🔹 Access control: only logged-in users (admins and normal users)
function userOrAdminOnly() {
    if (!isset($_SESSION['id'])) {
        $_SESSION['message'] = 'You must log in to access the dashboard';
        $_SESSION['type'] = 'error';
        header('Location: ' . BASE_URL . '/index.php');
        exit();
    }
}

userOrAdminOnly();
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
    <link rel="stylesheet" href="../asset/css/style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../asset/css/admin.css">

    <title>Dashboard</title>
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

            <div class="content">

                <h2 class="page-title">Dashboard</h2>

                <?php include(ROOT_PATH . '/app/includes/message.php'); ?>

                <div class="dashboard-links">

                    <?php if ($_SESSION['admin'] == 1): ?>
                        <!-- Admin Links -->
                        <p><a href="<?php echo BASE_URL . '/admin/users/index.php'; ?>">Manage Users</a></p>
                        <p><a href="<?php echo BASE_URL . '/admin/topics/index.php'; ?>">Manage Topics</a></p>
                        <p><a href="<?php echo BASE_URL . '/admin/posts/index.php'; ?>">Manage Posts</a></p>
                    <?php else: ?>
                        <!-- Normal User Links -->
                        <p><a href="<?php echo BASE_URL . '/admin/posts/index.php'; ?>">Manage Your Posts</a></p>
                    <?php endif; ?>

                </div>

            </div>

        </div>
        <!-- // Admin Content -->

    </div>
    <!-- // Page Wrapper -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Ckeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <!-- Custom Script -->
    <script src="../asset/js/scripts.js"></script>

</body>
</html>