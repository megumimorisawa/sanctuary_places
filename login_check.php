<?php
    require_once 'daos/UserDAO.php';
    session_start();
    
     $email = $_POST['email'];
     $password = $_POST['password'];
     
     $user = UserDAO::login($email, $password);
     
     var_dump($user);
     
     if($user !== false){
         $_SESSION['login_user'] = $user;
         $_SESSION['flash_message'] = $user->name . 'さん、ようこそ！';
         header('Location: index.php?id=' . $user->id);
         exit;
     }else{
         $_SESSION['error_message'] = 'ログインできません';
         header('Location: login.php');
         exit;
     }
     
     