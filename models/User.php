<?php
    class User{
        public $id;
        public $name;
        public $email;
        public $password;
        public $birthday;
        public $image;
        public $self_introduction;
        public $favorite_person;
        public $favorite_place;
        public $updated_at;
        public $created_at;
        
        public function __construct($name="", $email="", $password="", $birthday="", $image="", $self_introduction="", $favorite_person="", $favorite_place=""){
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->birthday = $birthday;
            $this->image = $image;
            $this->self_introduction = $self_introduction;
            $this->favorite_person = $favorite_person;
            $this->favorite_place = $favorite_place;
        }
        
        public function get_id(){
            return $this->id;
        }
        
        public function validate(){
            $errors = array();
            if($this->name === ''){
                $errors[] = 'ニックネームを入力してください';
            }
            
            if($this->email === ''){
                $errors[] = 'メールアドレスを入力してください';
            }else if(!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $this->email)){
                $errors[] = 'メールアドレスを入力してください';
            }
            
            if($this->password === ''){
                $errors[] = 'パスワードを入力してください';
            }
            
            if($this->birthday === ''){
                $errors[] = '生年月日を入力してください';
            }else if(!preg_match('/^([0-9]{8})$/', $this->birthday)){
                $errors[] = '8桁の数字で入力してください';
            }
            
            if($this->image === ''){
                $errors[] = 'プロフィール画像を選択してください';
            }
            
            return $errors;
        }
        
        public function get_user(){
            $user = UserDAO::get_user_by_id($this->user_id);
            return $user;
        }
        
    }