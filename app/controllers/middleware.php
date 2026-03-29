<?php
function usersOnly() {
    if (empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You need to login first';
        $_SESSION['type'] = 'error';
        return false; // do not redirect
    }
    return true;
}


function adminOnly() {
    if (empty($_SESSION['id']) || !isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
        $_SESSION['message'] = 'You are not authorized';
        $_SESSION['type'] = 'error';
        header('Location: ' . BASE_URL . '/admin/dashboard.php'); // redirect
        exit(); // stop execution
    }
}

function guestOnly() {
    if (!empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You are already logged in';
        $_SESSION['type'] = 'error';
        return false; // do not redirect
    }
    return true;
}
?>