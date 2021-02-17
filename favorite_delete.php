<?php
    require_once 'daos/UserDAO.php';
    require_once 'daos/FavoriteDAO.php';
    session_start();
    
    $login_user = $_SESSION['login_user'];
    $place_id = $_POST['place_id'];
    
    FavoriteDAO::delete_favorite($login_user->id, $place_id);
    $_SESSION['flash_message'] = 'お気に入りを解除しました';
    header('Location: show.php?user_id='.$user_id.'&place_id='.$place_id);
    exit;
    
    