<?php
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    
    session_start();
    
    //profile_edit_view.phpで入力されたユーザー情報を取得
    $login_user = $_SESSION['login_user'];
    $name = $_POST['name'];
    $self_introduction = $_POST['self_introduction'];
    $favorite_person = $_POST['favorite_person'];
    
    //取得した情報からユーザー情報アップデート
    UserDAO::update($login_user->id, $name, $self_introduction, $favorite_person);
    
    $_SESSION['flash_message'] = '編集を完了しました';
    header('Location: profile.php?id='.$login_user->id);
    exit;