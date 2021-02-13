<?php
    require_once 'daos/ReviewDAO.php';
    require_once 'daos/PlaceDAO.php';
    
    // $id = $_GET['id'];
    // $reviews = ReviewDAO::get_all_reviews($id);
    
    $id = $_GET['id'];
    $place = PlaceDAO::get_place_by_id($id);
    
    include_once 'views/review_view.php';