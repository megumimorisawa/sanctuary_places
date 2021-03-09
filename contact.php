<?php
    require_once 'daos/UserDAO.php';
    session_start();
    
    $login_user = $_SESSION['login_user'];
    
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    include_once "views/contact_view.php";