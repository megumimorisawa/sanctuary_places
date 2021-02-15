<?php
    require_once 'filters/login_filter.php';
    require_once 'daos/ReviewDAO.php';
    require_once 'daos/PlaceDAO.php';
    session_start();
    
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    // $id = $_GET['id'];
    // $reviews = ReviewDAO::get_all_reviews($id);
    
    $id = $_GET['place_id'];
    $place = PlaceDAO::get_place_by_id($id);
    
    include_once 'views/review_view.php';