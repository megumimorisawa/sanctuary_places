<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/UserDAO.php';
    session_start();
    
    $places = PlaceDAO::get_all_places();
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $error_message = $_SESSION['error_message'];
    $_SESSION['error_message'] = null;
    
    $id = $_GET['user_id'];
    $user = UserDAO::get_user_by_id($id);
    
    include_once 'views/index_view.php';
    
    