<?php
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    
    session_start();
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $id = $_GET['id'];
    $user = UserDAO::get_user_by_id($id);
    
    // var_dump($user);
    
    include_once 'views/profile_view.php';