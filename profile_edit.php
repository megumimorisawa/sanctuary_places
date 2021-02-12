<?php 
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    
    $id = $_GET['id'];
    $user = UserDAO::get_user_by_id($id);
    
    include_once 'views/profile_edit_view.php';