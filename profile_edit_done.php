<?php
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    
    session_start();
    
    $login_user = $_SESSION['login_user'];
    $name = $_POST['name'];
    $self_introduction = $_POST['self_introduction'];
    $favorite_person = $_POST['favorite_person'];
    
    var_dump($name);
    
    UserDAO::update($login_user->id, $name, $self_introduction, $favorite_person);
    
    var_dump($login_user->name);
    $_SESSION['flash_message'] = '編集を完了しました';
    header('Location: profile.php');
    exit;