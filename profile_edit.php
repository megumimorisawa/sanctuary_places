<?php 
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    session_start();
    
    //ログインしているユーザー情報を取得
    $login_user = $_SESSION['login_user'];
    
    //ユーザーIDからユーザー情報を取得
    $user = UserDAO::get_user_by_id($login_user->id);
    
    include_once 'views/profile_edit_view.php';