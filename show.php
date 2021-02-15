<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/UserDAO.php';
    require_once 'daos/ReviewDAO.php';
    
    session_start();
    
    $place_id = $_GET['place_id'];
    $place = PlaceDAO::get_place_by_id($place_id);
    
    $reviews = ReviewDAO::get_all_reviews($place_id);
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    include_once 'views/show_view.php';