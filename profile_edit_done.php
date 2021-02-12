<?php
    require_once 'filters/login_filter.php';
    require_once 'daos/UserDAO.php';
    
    session_start();
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $self_introduction = $_POST['self_introduction'];
    $favorite_person = $_POST['favorite_person'];
    
    
    UserDAO::update($id, $name, $self_introduction, $favorite_person);
    
    $_SESSION['flash_message'] = '編集を完了しました';
    header('Location: profile.php?id=' . $id);
    exit;