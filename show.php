<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/UserDAO.php';
    require_once 'daos/ReviewDAO.php';
    
    session_start();
    
    $place_id = $_GET['place_id'];
    $place = PlaceDAO::get_place_by_id($place_id);
    
    $reviews = ReviewDAO::get_all_reviews($place_id);
    
    $user_id = $_GET['user_id'];
    $user = UserDAO::get_user_by_id($user_id);
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    // var_dump($place);
    // var_dump($user);
    // var_dump($reviews);
    include_once 'views/show_view.php';