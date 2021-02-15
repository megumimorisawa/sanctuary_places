<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/UserDAO.php';
    require_once 'daos/ReviewDAO.php';
    session_start();
    
    
    $genre_name = $_POST['genre_name'];
    // $genre_name = $_SESSION['genre_name'];
    $places = PlaceDAO::get_place_by_genre_name($genre_name);
    // var_dump($places);

    $id = $_POST['user_id'];
    // $id = $_SESSION['user_id'];
    $user = UserDAO::get_user_by_id($id);
    // var_dump($user);
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    include_once 'views/list_view.php';