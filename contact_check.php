<?php
    require_once 'daos/UserDAO.php';
    session_start();
    
    //contact.phpからデータを取得
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // 入力内容のチェック
    function validate($email, $message) {
        $errors = array();
            if($email === ''){
                $errors[] = 'メールアドレスを入力してください';
            }else if(!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $email)){
                $errors[] = 'メールアドレスを入力してください';
            }
            if($message === ''){
                $errors[] = '内容を入力してください';
            }
        return $errors;
    };
    
    $errors = validate($email, $message);
    
    if(count($errors) !== 0){//エラーがあれば入力画面へ戻る
        $_SESSION['errors'] = $errors;
        header('Location: contact.php');
        exit;
    }else{//エラーがなければsend.phpへ入力された内容を送る
        $_SESSION['email'] = $email;
        $_SESSION['message'] = $message;
        header('Location: send.php');
        exit;
    }