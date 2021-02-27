<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/ReviewDAO.php';
    require_once 'daos/PlaceDAO.php';
    session_start();
    
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    //show_view.phpの「クチコミ投稿」ボタンから聖地IDを取得
    $id = $_GET['place_id'];
    
    //取得した聖地IDから聖地情報を取得
    $place = PlaceDAO::get_place_by_id($id);
    
    include_once 'views/review_view.php';