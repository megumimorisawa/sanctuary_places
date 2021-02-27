<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/UserDAO.php';
    require_once 'daos/FavoriteDAO.php';
    
    session_start();
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    //index_view.phpの「マイページ」ボタンからログインしているユーザーのIDを取得
    $id = $_GET['id'];
    
    //取得したユーザーIDからユーザー情報を取得
    $user = UserDAO::get_user_by_id($id);
    
    //ユーザーIDからお気に入りした全聖地を取得
    $favorites = FavoriteDAO::get_all_favorites($user->id);
    
    include_once 'views/profile_view.php';