<?php
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    require_once 'daos/FavoriteDAO.php';
    require_once 'daos/PlaceDAO.php';
    
    session_start();
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $user = $_SESSION['login_user'];
    $favorites = FavoriteDAO::get_all_favorites($user->id);
    
    include_once 'views/profile_view.php';