<?php
    require_once 'daos/UserDAO.php';
    
    class Place{
        public $id;
        public $user_id;
        public $genre_name;
        public $name;
        public $introduction;
        public $address;
        public $latitude;
        public $longitude;
        public $tel;
        public $open_time;
        public $close_time;
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
        
        public function __construct($user_id="", $genre_name="", $name="", $introduction="", $address="", $latitude="", $longitude="", $tel="", $open_time="", $close_time="", $close_date="", $nearest_station="", $booking="", $price=""){
            $this->user_id = $user_id;
            $this->genre_name = $genre_name;
            $this->name = $name;
            $this->introduction = $introduction;
            $this->postal_code = $postal_code;
            $this->address = $address;
            $this->latitude = $latitude;
            $this->longitude = $longitude;
            $this->tel = $tel;
            $this->open_time = $open_time;
            $this->close_time = $close_time;
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
            if($this->introduction === ''){
                $errors[] = '紹介文を入力してください';
            }
            // if($this->postal_code === ''){
            //     $errors[] = '郵便番号を入力してください';
            // }
            if($this->address === ''){
                $errors[] = '住所を入力してください';
            }
            if($this->tel === ''){
                $errors[] = '電話番号を入力してください';
            // }else if(!preg_match('/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/', $this->tel)){
            //     $errors[] = '電話番号は「-」を入れて入力してください';
            // }
            if($this->open_time === ''){
                $errors[] = '開店時間を選択してください';
            }
            if($this->close_time === ''){
                $errors[] = '閉店時間を選択してください';
            }
            if($this->close_date === ''){
                $errors[] = '定休日を入力してください';
            }
            if($this->image1 === ''){
                $errors[] = '1枚は写真を選択してください';
            }
            return $errors;
        }
    }
    }
    
    