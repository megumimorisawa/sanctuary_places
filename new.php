<?php
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    session_start();
    
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    $id = $_GET['user_id'];
    $user = UserDAO::get_user_by_id($id);
    
    include_once 'views/new_view.php';