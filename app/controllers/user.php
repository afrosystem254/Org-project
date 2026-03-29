
<?php
include(ROOT_PATH . '/app/database/db.php'); 
include(ROOT_PATH . '/app/includes/valdate.php');
include_once(ROOT_PATH . '/app/controllers/middleware.php');

function loginUser($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    // 🔹 Make sure admin is always 1 or 0
    $_SESSION['admin'] = (isset($user['admin']) && $user['admin'] == 1) ? 1 : 0;

    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    header('Location: ' . BASE_URL . '/index.php');
    exit();
}
// initialize variable
$adminUsers=[];
$table = 'users';
$adminUsers=selectAll($table);
$errors = array();
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$admin=0;
$id='';

// ---------- USER REGISTRATION ----------
if (isset($_POST['register-btn'])) {

    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $passwordConf = $_POST['passwordConf'] ?? '';

    $errors = validateUsers($_POST);

    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // 🔥 Check if admin exists
        $existingAdmin = selectOne($table, ['admin' => 1]);

        if ($existingAdmin) {
            $_POST['admin'] = 0;

            $_SESSION['message'] = 'Registration successful. You can now log in.';
            $_SESSION['type'] = 'success';

        } else {
            $_POST['admin'] = 1;

            $_SESSION['message'] = 'First user created! You are now the admin.';
            $_SESSION['type'] = 'success';
        }

        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);

        loginUser($user);
    }
}
// ---------- ADMIN CREATION ----------
if (isset($_POST['create-admin'])) {

    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $passwordConf = $_POST['passwordConf'] ?? '';

    $errors = validateUsers($_POST);

    if (count($errors) === 0) {
        unset($_POST['create-admin'], $_POST['passwordConf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;;

        $user_id = create($table, $_POST);

        $_SESSION['message'] = 'Admin user created.';
        $_SESSION['type'] = 'success';

        header('Location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    }
}

// ---------- LOGIN ----------
if (isset($_POST['login-btn'])) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);
        } else {
            array_push($errors, 'Wrong credentials');
        }
    }
}

if (isset($_GET["del_id"])) {
    adminOnly();
    $id=$_GET["del_id"];
    $count=delete($table,$id);
    $_SESSION['message']='Admin user deleted';
    $_SESSION['type']='success';
    header('Location: ' . BASE_URL . '/admin/users/index.php?id=' . $id);
    exit();
} 


if (isset($_GET['id'])) {
    adminOnly();
    $user = selectOne($table, ['id' => $_GET['id']]);
    if ($user) {
        $id = $user['id'] ?? '';
        $username = $user['username'] ?? '';
        $email = $user['email'] ?? '';
        $admin = ($user['admin'] ?? 0) == 1 ? 1 : 0;
    } else {
        // User not found
        $id = '';
        $username = '';
        $email = '';
        $admin = 0;
        $_SESSION['message'] = 'User not found';
        $_SESSION['type'] = 'error';
    }
}

if (isset($_POST['update-user'])) {
    adminOnly();
    $errors=validateUsers($_POST);

     if (count($errors)===0) {
        $id=$_POST['id'];
      unset($_POST['update-user'],$_POST['id'],$_POST['passwordConf']);
      $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $_POST['admin']=isset($_POST['admin'])?1:0;
      $user_id=update($table,$id,$_POST);
      $_SESSION['message']='User updated';
      $_SESSION['type']='success';
      header('Location: ' . BASE_URL . '/admin/users/index.php');
         exit();
    } else {
        $password = $user['password'] ?? '';
        $passwordConf = $user['passwordConf'] ?? '';
        $username = $user['username'] ?? '';
        $email = $user['email'] ?? '';
        $admin = isset($user['admin'])? 1:0;
    }
}  








// include(ROOT_PATH . '/app/database/db.php'); 
// include(ROOT_PATH . '/app/includes/validate.php');
// include_once(ROOT_PATH . '/app/controllers/middleware.php');

// $table = 'users';
// $errors = [];
// $username = '';
// $email = '';
// $password = '';
// $passwordConf = '';
// $admin = 0;
// $id = '';

// // --- Function to login a user ---
// function loginUser($user){
//     $_SESSION['id'] = $user['id'];
//     $_SESSION['username'] = $user['username'];
//     $_SESSION['admin'] = (isset($user['admin']) && $user['admin'] == 1) ? 1 : 0;
//     $_SESSION['message'] = 'You are now logged in';
//     $_SESSION['type'] = 'success';
//     header('Location: ' . BASE_URL . '/index.php');
//     exit();
// }

// // --- Get all admin users ---
// $adminUsers = selectAll($table);

// # -------------------------------
// # USER REGISTRATION
// # -------------------------------
// if (isset($_POST['register-btn'])) {
//     $username = $_POST['username'] ?? '';
//     $email = $_POST['email'] ?? '';
//     $password = $_POST['password'] ?? '';
//     $passwordConf = $_POST['passwordConf'] ?? '';

//     $errors = validateUsers($_POST);

//     if (count($errors) === 0) {
//         unset($_POST['register-btn'], $_POST['passwordConf']);
//         $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

//         // Check if admin exists
//         $existingAdmin = selectOne($table, ['admin' => 1]);
//         $_POST['admin'] = $existingAdmin ? 0 : 1;

//         $user_id = create($table, $_POST);
//         $user = selectOne($table, ['id' => $user_id]);

//         loginUser($user);
//     }
// }

// # -------------------------------
// # ADMIN CREATION
// # -------------------------------
// if (isset($_POST['create-admin'])) {
//     adminOnly();

//     $errors = validateUsers($_POST);

//     if (count($errors) === 0) {
//         unset($_POST['create-admin'], $_POST['passwordConf']);
//         $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
//         $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;

//         create($table, $_POST);

//         $_SESSION['message'] = 'Admin user created';
//         $_SESSION['type'] = 'success';
//         header('Location: ' . BASE_URL . '/admin/users/index.php');
//         exit();
//     }
// }

// # -------------------------------
// # LOGIN
// # -------------------------------
// if (isset($_POST['login-btn'])) {
//     $errors = validateLogin($_POST);

//     if (count($errors) === 0) {
//         $user = selectOne($table, ['username' => $_POST['username']]);
//         if ($user && password_verify($_POST['password'], $user['password'])) {
//             loginUser($user);
//         } else {
//             $errors[] = 'Wrong credentials';
//         }
//     }
// }

// # -------------------------------
// # DELETE USER
// # -------------------------------
// if (isset($_POST['delete-user'])) {
//     adminOnly();

//     $id = $_POST['id'] ?? '';
//     if ($id) {
//         delete($table, $id);
//         $_SESSION['message'] = 'User deleted successfully';
//         $_SESSION['type'] = 'success';
//     }
//     header('Location: ' . BASE_URL . '/admin/users/index.php');
//     exit();
// }

// # -------------------------------
// # GET USER FOR EDIT
// # -------------------------------
// if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
//     adminOnly();

//     $user = selectOne($table, ['id' => $_GET['id']]);
//     if ($user) {
//         $id = $user['id'];
//         $username = $user['username'];
//         $email = $user['email'];
//         $admin = $user['admin'] == 1 ? 1 : 0;
//     } else {
//         $_SESSION['message'] = 'User not found';
//         $_SESSION['type'] = 'error';
//         header('Location: ' . BASE_URL . '/admin/users/index.php');
//         exit();
//     }
// }

// # -------------------------------
// # UPDATE USER
// # -------------------------------
// if (isset($_POST['update-user'])) {
//     adminOnly();

//     $errors = validateUsers($_POST);

//     if (count($errors) === 0) {
//         $id = $_POST['id'];

//         unset($_POST['update-user'], $_POST['id'], $_POST['passwordConf']);

//         if (!empty($_POST['password'])) {
//             $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
//         } else {
//             unset($_POST['password']); // keep old password
//         }

//         $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;

//         update($table, $id, $_POST);

//         $_SESSION['message'] = 'User updated successfully';
//         $_SESSION['type'] = 'success';
//         header('Location: ' . BASE_URL . '/admin/users/index.php');
//         exit();
//     } else {
//         // Keep form values
//         $username = $_POST['username'] ?? '';
//         $email = $_POST['email'] ?? '';
//         $password = $_POST['password'] ?? '';
//         $passwordConf = $_POST['passwordConf'] ?? '';
//         $admin = isset($_POST['admin']) ? 1 : 0;
//     }
// }