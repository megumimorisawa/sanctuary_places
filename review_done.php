<?php
    require_once 'filters/login_filter.php';
    require_once 'filters/post_filter.php';
    
    require_once 'daos/ReviewDAO.php';
    require_once 'daos/UserDAO.php';
    session_start();
    
    $title = $_POST['title'];
    $month = $_POST['month'];
    $content = $_POST['content'];
    $place_id = $_POST['id'];
    
    // $image = ReviewDAO::upload();
    
    $review = new Review($login_user->id, $place_id, $title, $month, $content);
    
    $errors = $review->validate();
    
    if(count($errors) === 0){
        ReviewDAO::insert_review($review);
        $_SESSION['flash_message'] = 'レビューを投稿しました';
        header('Location: show.php?place_id=' . $place_id . '&user_id=' . $login_user->id);
        exit();
    }else{
        $_SESSION['errors'] = $errors;
        header('Location: show.php?id=' . $place_id);
        exit;
    }
    