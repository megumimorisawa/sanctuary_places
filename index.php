<?php
    require_once 'filters/login_filter.php';
    
    session_start();
    
    //ログインしたユーザー情報を取得
    $login_user = $_SESSION['login_user'];
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $error_message = $_SESSION['error_message'];
    $_SESSION['error_message'] = null;
    
    include_once 'views/index_view.php';
    
    