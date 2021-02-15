<?php
    require_once 'daos/UserDAO.php';
    session_start();
    
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $image = UserDAO::upload();
    
    $errors = UserDAO::check_new_user($name, $email, $password, $birthday, $image);
    
    if(count($errors) === 0){
        $user = new User($name, $email, $password, $birthday, $image);
        UserDAO::insert($user);
        $_SESSION['flash_message'] = '登録が完了しました';
        header('Location: login.php');
        exit;
    }else{
        $_SESSION['errors'] = $errors;
        header('Location: signup.php');
        exit;
    }
    