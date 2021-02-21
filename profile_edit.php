<?php 
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    session_start();
    
    $login_user = $_SESSION['login_user'];
    $user = UserDAO::get_user_by_id($login_user->id);
    
    include_once 'views/profile_edit_view.php';