<?php
    require_once 'filters/login_filter.php';
    
    require_once 'daos/PlaceDAO.php';
    session_start();
    
    //index_view.phpからクリックされたジャンル名を取得
    $genre_name = $_GET['genre_name'];
    
    //取得したジャンル名から全ての聖地を抜き出す
    $places = PlaceDAO::get_place_by_genre_name($genre_name);
    
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    
    include_once 'views/list_view.php';