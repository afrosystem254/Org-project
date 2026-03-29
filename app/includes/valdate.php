<?php
function validateUsers($user) {

    $errors = [];

    // USERNAME
    if (empty($user['username'])) {
        $errors[] = 'Username is required!';
    }

    // EMAIL
    if (empty($user['email'])) {
        $errors[] = 'Email is required!';
    }

    // PASSWORD (only required when creating OR when updating with value)
    if (!isset($user['update-user']) || !empty($user['password'])) {

        if (empty($user['password'])) {
            $errors[] = 'Password is required!';
        }

        if ($user['password'] !== $user['passwordConf']) {
            $errors[] = 'Passwords do not match!';
        }
    }

    // CHECK EXISTING USER
    $existingUser = selectOne('users', ['email' => $user['email']]);

    if ($existingUser) {

        // UPDATE CASE
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            $errors[] = 'Email already exists!';
        }

        // CREATE CASE
        if (isset($user['register-btn']) || isset($user['create-admin'])) {
            $errors[] = 'Email already exists!';
        }
    }

    return $errors; // ✅ ALWAYS RETURN
    
}function validateLogin($user) {

    $errors = [];

    if (empty($user['username'])) {
        $errors[] = 'Username is required!';
    }

    if (empty($user['password'])) {
        $errors[] = 'Password is required!';
    }

    return $errors;
}