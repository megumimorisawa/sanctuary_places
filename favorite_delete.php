<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/UserDAO.php';
    require_once 'daos/FavoriteDAO.php';
    session_start();
    
    //ログインしたユーザ情報を取得
    $login_user = $_SESSION['login_user'];
    
    //聖地のIDを取得
    $place_id = $_POST['place_id'];
    
    //データベースから該当の聖地IDを削除してお気に入り解除
    FavoriteDAO::delete_favorite($login_user->id, $place_id);
    $_SESSION['flash_message'] = 'お気に入りを解除しました';
    header('Location: show.php?user_id='.$user_id.'&place_id='.$place_id);
    exit;
    
    