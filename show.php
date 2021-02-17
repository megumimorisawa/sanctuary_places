<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/UserDAO.php';
    require_once 'daos/ReviewDAO.php';
    require_once 'daos/FavoriteDAO.php';
    
    session_start();
    
    $login_user = $_SESSION['login_user'];
    
    $place_id = $_GET['place_id'];
    $place = PlaceDAO::get_place_by_id($place_id);
    
    $reviews = ReviewDAO::get_all_reviews($place_id);
    
    // var_dump($reviews);
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    
    // FavoriteDAO::is_favorite($login_user->id,$place_id);
    
    // var_dump($place->is_favorite($login_user->id));
    include_once 'views/show_view.php';