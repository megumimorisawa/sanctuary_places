<?php
    //contact.phpからデータを取得
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // var_dump($_POST);
    function() {
    $errors = array();
            if($name === ''){
                $errors[] = 'お名前を入力してください';
            }
            
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
    
    if(count($errors) !== 0){//エラーがあれば入力画面へ戻る
        $_SESSION['errors'] = $errors;
        header('Location: contact.php');
        exit;
    }else{//エラーがなければplacesテーブルに新規聖地を登録
        header('Location: send.php?name='.$genre_name .'&email='.$email.'&message='.$message);
        exit;
    }