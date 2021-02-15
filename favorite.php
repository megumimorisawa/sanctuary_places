<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/UserDAO.php';
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/FavoriteDAO.php';
    
    session_start();
    
    $user_id = $_POST['user_id'];
    $place_id = $_POST['place_id'];
    
    
    $favorite = new Favorite($user_id, $place_id);
    FavoriteDAO::insert_favorite($favorite);
    
    var_dump($favorite);
    $_SESSION['flash_message'] = 'お気に入り登録しました';
    header('Location: show.php?user_id=' . $user_id . '&place_id=' . $place_id);
    