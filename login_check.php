<?php
    require_once 'daos/UserDAO.php';
    session_start();
    
    //login_view.phpで入力された情報を取得
    $email = $_POST['email'];
    $password = $_POST['password'];
     
    //取得した情報よりログイン処理
    $user = UserDAO::login($email, $password);
     
    if($user !== false){//ログインユーザー情報があればindex.phpへ
        $_SESSION['login_user'] = $user;
        $_SESSION['flash_message'] = $user->name . 'さん、ようこそ！';
        header('Location: index.php');
        exit;
    }else{//ログインユーザー情報がなければ入力画面へ戻る
        $_SESSION['error_message'] = 'ログインできません';
        header('Location: login.php');
        exit;
    }