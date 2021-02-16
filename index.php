<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/UserDAO.php';
    session_start();
    
    $places = PlaceDAO::get_all_places();
    
    $login_user = $_SESSION['login_user'];
    // $user = UserDAO::get_user_by_id($user->id);
    // var_dump($login_user);
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $error_message = $_SESSION['error_message'];
    $_SESSION['error_message'] = null;
    
    include_once 'views/index_view.php';
    
    