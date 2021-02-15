<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/UserDAO.php';
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/FavoriteDAO.php';
    
    session_start();
    
    // $user_id = $_POST['user_id'];
    
    $login_user = $_SESSION['login_user'];
    $place_id = $_POST['place_id'];
    
    
    $favorite = new Favorite($login_user->id, $place_id);
    FavoriteDAO::insert_favorite($favorite);
    
    $_SESSION['flash_message'] = 'お気に入り登録しました';
    header('Location: show.php?user_id=' . $user_id . '&place_id=' . $place_id);
    