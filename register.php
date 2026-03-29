<?php
include("path.php");
include(ROOT_PATH . '/app/controllers/user.php');
include_once(ROOT_PATH . '/app/controllers/middleware.php');
// guestOnly();

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

  <title>Register</title>
</head>

<body>
  <!-- header -->
<?php include(ROOT_PATH . '/app/includes/header.php'); ?>
  <div class="auth-content">
    <!-- error messages -->
<?php include(ROOT_PATH . '/app/includes/error.php'); ?>

    <form action="register.php" method="post">

      <div>
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username ;?>" autocomplete="off" class="text-input">
      </div>
      <div>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email ;?>" autocomplete="off" class="text-input">
      </div>
      <div>
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $password ;?>" autocomplete="off" class="text-input">
      </div>
      <div>
        <label>Password Confirmation</label>
        <input type="password" name="passwordConf" value="<?php echo $passwordConf ;?>" autocomplete="off" class="text-input">
      </div>
      <div>
        <button type="submit" name="register-btn" class="btn btn-big">Register</button>
      </div>
      <p>Or <a href="<?php echo BASE_URL . '/login.php'?>">Sign In</a></p>
    </form>

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom Script -->
  <script src="js/scripts.js"></script>

</body>

</html>