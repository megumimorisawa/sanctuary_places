<?php
    require_once 'models/User.php';
    session_start();
    
    //ログインしているユーザーの情報を取得
    $login_user = $_SESSION['login_user'];
    
    if($login_user === null){
        $_SESSION['error_message'] = 'ログインしてください';
        header('Location: login.php');
        exit;
    }