<?php
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    
    session_start();
    
    $id = $_POST['id'];
    $image = UserDAO::upload();
    // var_dump($_POST);
    
    UserDAO::update_pic($id, $image);
    // var_dump($image);
    $_SESSION['flash_message'] = '画像の変更が完了しました';
    header('Location: profile.php?id=' . $id);
    exit;