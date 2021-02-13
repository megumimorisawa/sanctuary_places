<?php
    require_once 'filters/login_filter.php';
    require_once 'filters/post_filter.php';
    
    require_once 'daos/UserDAO.php';
    require_once 'daos/PlaceDAO.php';
    session_start();
    // var_dump($_POST);
    
    $genre_name = $_POST['genre_name'];
    $name = $_POST['name'];
    $introduction = $_POST['introduction'];
    $postal_code = $_POST['postal_code'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $open_time = $_POST['open_time'];
    $close_time = $_POST['close_time'];
    $close_date = $_POST['close_date'];
    $nearest_station = $_POST['nearest_station'];
    $booking = $_POST['booking'];
    $price = $_POST['price'];
    $id = $_POST['user_id'];
    
    $image1 = PlaceDAO::upload();
    
    $place = new Place($login_user->id, $genre_name, $name, $introduction, $postal_code, $address, $tel, $open_time, $close_time, $close_date, $nearest_station, $booking, $price, $image1, $image2, $image3, $image4, $image5);
    $errors = $place->validate();
    
    
    if(count($errors) !== 0){
        $_SESSION['errors'] = $errors;
        header('Location: new.php');
        exit;
    }else{
        PlaceDAO::insert($place);
        $_SESSION['flash_message'] = '投稿が完了しました';
        header('Location: index.php?user_id=' . $id );
        exit;
    }