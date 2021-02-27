<?php
    require_once 'filters/login_filter.php';
    require_once 'filters/post_filter.php';
    
    require_once 'daos/ReviewDAO.php';
    require_once 'daos/PlaceDAO.php';
    session_start();
    
    //review_view.phpで入力された情報を取得
    $title = $_POST['title'];
    $month = $_POST['month'];
    $content = $_POST['content'];
    $place_id = $_POST['place_id'];
    $login_user = $_SESSION['login_user'];
    
    //レビュー画像をアップロード
    $image1 = ReviewDAO::upload1();
    $image2 = ReviewDAO::upload2();
    $image3 = ReviewDAO::upload3();
    $image4 = ReviewDAO::upload4();
    
    //取得したレビュー情報からReviewクラスをインスタンス化
    $review = new Review($login_user->id, $place_id, $title, $month, $content, $image1, $image2, $image3, $image4);
    
    //review情報のエラーをerrorsに格納
    $errors = $review->validate();
    
    if(count($errors) === 0){//エラーがなければreviewsテーブルにレビューを登録
        ReviewDAO::insert_review($review);
        $_SESSION['flash_message'] = 'レビューを投稿しました';
        header('Location: show.php?place_id=' . $place_id);
        exit();
    }else{//エラーがあればレビュー入力画面へ戻る
        $_SESSION['errors'] = $errors;
        header('Location: review.php');
        exit;
    }
    