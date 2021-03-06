<?php
    require_once 'daos/UserDAO.php';
    
    class Place{
        public $id;
        public $user_id;
        public $genre_name;
        public $name;
        public $introduction;
        public $address;
        public $tel;
        public $open_time;
        public $close_time;
        public $last_order;
        public $close_date;
        public $nearest_station;
        public $booking;
        public $price;
        public $image1;
        public $image2;
        public $image3;
        public $image4;
        public $image5;
        public $created_at;
        public $updated_at;
        
        public function __construct($user_id="", $genre_name="", $name="", $introduction="", $address="", $tel="", $open_time="", $close_time="", $last_order="", $close_date="", $nearest_station="", $booking="", $price="", $image1="", $image2="", $image3="", $image4="", $image5=""){
            $this->user_id = $user_id;
            $this->genre_name = $genre_name;
            $this->name = $name;
            $this->introduction = $introduction;
            $this->address = $address;
            $this->tel = $tel;
            $this->open_time = $open_time;
            $this->close_time = $close_time;
            $this->last_order = $last_order;
            $this->close_date = $close_date;
            $this->nearest_station = $nearest_station;
            $this->booking = $booking;
            $this->price = $price;
            $this->image1 = $image1;
            $this->image2 = $image2;
            $this->image3 = $image3;
            $this->image4 = $image4;
            $this->image5 = $image5;
        }
        
        public function validate(){
            $errors = array();
            
            if($this->genre_name === ''){
                $errors[] = 'グループ名・ドラマ名を選択してください';
            }
            if($this->name === ''){
                $errors[] = '場所の名前をを入力してください';
            }
            if($this->introduction === ''){
                $errors[] = '紹介文を入力してください';
            }
            if($this->address === ''){
                $errors[] = '住所を入力してください';
            }
            if($this->close_date === ''){
                $errors[] = '定休日を入力してください';
            }
            if($this->image1 === ''){
                $errors[] = '1枚は写真を選択してください';
            }
            return $errors;
        }
        //この投稿にいいねしているか判定するメソッド
        public function is_favorite($login_user_id){
            //ログインしている人のidとこの投稿のidに与えて判定
            $is_favorite = FavoriteDAO::is_favorite($login_user_id, $this->id);
            return $is_favorite;
            
        }
    
}
    
    