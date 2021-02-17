<?php
    require_once 'daos/PlaceDAO.php';
    
    //場所のidを指定して住所情報を取得
    $place = PlaceDAO::get_address_assoc($place_id);
    
    header('Content-type: application/json');
    
    echo json_encode($posts);
