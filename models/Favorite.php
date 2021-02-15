<?php
    require_once 'daos/UserDAO.php';
    require_once 'daos/PlaceDAO.php';
    
    class Favorite{
        public $id;
        public $user_id;
        public $place_id;
        
        public function __construct($user_id="", $place_id=""){
            $this->user_id = $user_id;
            $this->place_id = $place_id;
        }
        public function get_place(){
            $place = PlaceDAO::get_place_by_id($this->place_id);
            return $place;
        }
    }