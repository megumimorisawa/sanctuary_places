<?php
    require_once 'daos/UserDAO.php';
    
    class Review{
        public $id;
        public $user_id;
        public $place_id;
        public $title;
        public $month;
        public $content;
        // public $image1;
        // public $image2;
        // public $image3;
        // public $image4;
        public $created_at;
        
        public function __construct($user_id="", $place_id="",  $title="", $month="", $content="") {
            $this->user_id = $user_id;
            $this->place_id = $place_id;
            $this->title = $title;
            $this->month = $month;
            $this->content = $content;
            // $this->image1 = $image1;
            // $this->image1 = $image2;
            // $this->image1 = $image3;
            // $this->image1 = $image4;
        }
        
        public function validate(){
            $errors = array();
            if($this->title === ''){
                $errors[] = 'タイトルを入力してください';
            }
            if($this->month === ''){
                $errors[] = '訪れた月を選択してください';
            }
            if($this->content === ''){
                $errors[] = '内容を入力してください';
            }
            // if($this->image1 === ''){
            //     $errors[] = '写真を1枚は選択してください';
            // }
            return $errors;
        }
        
        public function get_user(){
            $user = UserDAO::get_user_by_id($this->user_id);
            return $user;
        }
    }