<?php
    require_once 'daos/UserDAO.php';
    session_start();
    
    //signup_view.phpで入力された情報を取得
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //ユーザー画像アップロード
    $image = UserDAO::upload();
    
    //ユーザーの入力をチェック
    $errors = UserDAO::check_new_user($name, $email, $password, $birthday, $image);
    
    if(count($errors) === 0){//入力内容にエラーがなければusersテーブルに新規データを追加
        $user = new User($name, $email, $password, $birthday, $image);
        UserDAO::insert($user);
        $_SESSION['flash_message'] = '登録が完了しました';
        header('Location: login.php');
        exit;
    }else{//入力内容にエラーがあれば入力画面に戻る
        $_SESSION['errors'] = $errors;
        header('Location: signup.php');
        exit;
    }
    