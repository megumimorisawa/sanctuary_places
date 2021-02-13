<?php 
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    
    session_start();
    
    $id = $_GET['id'];
    $user = UserDAO::get_user_by_id($id);
    
    // var_dump($user);
    // if($user->get_user()->id !== $login_user->id){
    // $_SESSION['error_message'] = '他人の投稿を操作できません';
    // header('Location: index.php');
    // exit;
    // }
    
    include_once 'views/profile_pic_edit_view.php';
    