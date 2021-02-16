<?php
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    require_once 'daos/FavoriteDAO.php';
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/ReviewDAO.php';
    
    session_start();
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $id = $_GET['id'];
    $user = UserDAO::get_user_by_id($id);
    
    $favorites = FavoriteDAO::get_all_favorites($user->id);
    
    include_once 'views/profile_view.php';