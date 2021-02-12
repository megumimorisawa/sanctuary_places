<?php
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    
    session_start();
    
    $id = $_POST['id'];
    $image = UserDAO::upload();
    
    UserDAO::update($id, $image);
    
    $_SESSION['flash_message'] = '画像の変更が完了しました';
    header('Location: profile.php?id=' . $id);
    exit;