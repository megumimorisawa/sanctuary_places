<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/UserDAO.php';
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/FavoriteDAO.php';
    
    session_start();
    
    //ログインしたユーザー情報を取得
    $login_user = $_SESSION['login_user'];
    
    //show_view.phpのお気に入りボタンから聖地IDを取得
    $place_id = $_POST['place_id'];
    
    //取得したユーザー情報と聖地IDからFavoriteクラスをインスタンス化
    $favorite = new Favorite($login_user->id, $place_id);
    
    //お気に入り登録
    FavoriteDAO::insert_favorite($favorite);
    
    $_SESSION['flash_message'] = 'お気に入り登録しました';
    header('Location: show.php?user_id=' . $user_id . '&place_id=' . $place_id);
    