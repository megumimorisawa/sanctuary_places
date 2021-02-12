<?php
    require_once 'filters/login_filter.php';
    require_once 'daos/PlaceDAO.php';
    
    $id = $_GET['id'];
    $place = PlaceDAO::get_place_by_id($id);
    
    // var_dump($place);
    
    include_once 'views/show_view.php';