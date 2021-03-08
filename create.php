<?php
    require_once 'filters/login_filter.php';
    require_once 'filters/post_filter.php';
    
    require_once 'daos/PlaceDAO.php';
    session_start();
    
    //new_view.phpからデータを取得
    $genre_name = $_POST['genre_name'];
    $name = $_POST['name'];
    $introduction = $_POST['introduction'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $open_time = $_POST['open_time'];
    $close_time = $_POST['close_time'];
    $last_order = $_POST['last_order'];
    $close_date = $_POST['close_date'];
    $nearest_station = $_POST['nearest_station'];
    $booking = $_POST['booking'];
    $price = $_POST['price'];
    $login_user = $_SESSION['login_user'];
    
    //聖地画像をアップロード
    $image1 = PlaceDAO::upload1();
    $image2 = PlaceDAO::upload2();
    $image3 = PlaceDAO::upload3();
    $image4 = PlaceDAO::upload4();
    $image5 = PlaceDAO::upload5();
    
    //取得した新しい聖地情報からPlaceクラスをインスタンス化
    $place = new Place($login_user->id, $genre_name, $name, $introduction, $address, $tel, $open_time, $close_time, $last_order, $close_date, $nearest_station, $booking, $price, $image1, $image2, $image3, $image4, $image5);
    
    //place情報のエラーをerrorsに格納
    $errors = $place->validate();
    
    if(count($errors) !== 0){//エラーがあれば入力画面へ戻る
        $_SESSION['errors'] = $errors;
        header('Location: new.php');
        exit;
    }else{//エラーがなければplacesテーブルに新規聖地を登録
        PlaceDAO::insert($place);
        $_SESSION['flash_message'] = '投稿が完了しました';
        header('Location: list.php?genre_name='.$genre_name);
        exit;
    }