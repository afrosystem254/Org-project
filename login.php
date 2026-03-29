  <?php 
  include("path.php");
  include(ROOT_PATH . '/app/controllers/user.php');
  include_once(ROOT_PATH . '/app/controllers/middleware.php');
 guestOnly();
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="asset/css/style.css">

  <title>Login</title>
</head>

<body>
  <!-- header -->

  <?php include(ROOT_PATH . '/app/includes/header.php'); ?>

  <div class="auth-content">

    <form action="login.php" method="post">
      <h2 class="form-title">Login</h2>
      <!-- errors -->
<?php include(ROOT_PATH . '/app/includes/error.php'); ?>

      <div>
        <label>Username</label>
        <input type="text" name="username" class="text-input">
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" class="text-input">
      </div>
      <div>
        <button type="submit" name="login-btn" class="btn btn-big">Login</button>
      </div>
      <p>Or <a href="<?php echo BASE_URL . '/register.php'?>">Sign Up</a></p>
    </form>

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="asset/js/scripts.js"></script>

</body>

</html>