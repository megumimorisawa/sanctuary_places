<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/UserDAO.php';
    require_once 'daos/ReviewDAO.php';
    
    $id = $_GET['id'];
    $place = PlaceDAO::get_place_by_id($id);
    
    $reviews = ReviewDAO::get_all_reviews($id);
    
    
    $user_id = $_GET['user_id'];
    $user = UserDAO::get_user_by_id($user_id);
    
    
    // var_dump($place);
    // var_dump($user);
    // var_dump($reviews);
    include_once 'views/show_view.php';