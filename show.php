<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/PlaceDAO.php';
    require_once 'daos/ReviewDAO.php';
    require_once 'daos/FavoriteDAO.php';
    
    session_start();
    
    //ログインしたユーザー情報を取得
    $login_user = $_SESSION['login_user'];
    
    //list_view.phpから選択された聖地IDを取得
    $place_id = $_GET['place_id'];
    
    //取得した聖地IDから聖地情報を抜き出す
    $place = PlaceDAO::get_place_by_id($place_id);
    
    //取得した聖地IDから該当聖地に対するレビューを全取得
    $reviews = ReviewDAO::get_all_reviews($place_id);
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    include_once 'views/show_view.php';