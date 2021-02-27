<?php
    require_once 'config.php';
    require_once 'models/User.php';
    
    //DAO
    class UserDAO{
        //データベースと接続
        private static function get_connection(){
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            );
            $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $options);
            return $dbh;
        }
        //データベースと切断
        private static function close_connection($dbh, $stmt){
            $dbh = null;
            $stmt = null;
        }
        
        //全会員情報を取得
        public static function get_all_users(){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->query('SELECT * FROM users');
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                $users = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
            return $users;
        }
        
        //会員番号から会員情報を取得
        public static function get_user_by_id($id){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('SELECT * FROM users WHERE id=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                $user = $stmt->fetch();
                
            }catch(PDOException $e){
                $user = null;
            }finally{
                self::close_connection($dbh, $stmt);
            }
            return $user;
        }
        
        //usersテーブルに新規データを追加
        public static function insert($user){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('INSERT INTO users(name, email, password, birthday, image) VALUES(:name, :email, :password, :birthday, :image)');
                $stmt->bindValue(':name', $user->name, PDO::PARAM_STR);
                $stmt->bindValue(':email', $user->email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $user->password, PDO::PARAM_STR);
                $stmt->bindValue(':birthday', $user->birthday, PDO::PARAM_INT);
                $stmt->bindValue(':image', $user->image);
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
        
        //IDを指定して会員情報を変更するメソッド
        public static function update($id, $name, $self_introduction, $favorite_person){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('UPDATE users SET name= :name, self_introduction= :self_introduction, favorite_person= :favorite_person WHERE id= :id');
                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':self_introduction', $self_introduction, PDO::PARAM_STR);
                $stmt->bindValue(':favorite_person', $favorite_person, PDO::PARAM_STR);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
        //IDを指定してプロフィールアイコンを変更するメソッド
        public static function update_pic($id, $image){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('UPDATE users SET image= :image WHERE id= :id');
                $stmt->bindValue(':image', $image);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
        
        //会員登録入力チェック
        public static function check_new_user($name, $email, $password, $birthday, $image){
            $errors = array();
            if($name === ''){
                $errors[] = 'ニックネームを入力してください';
            }
            if($email === ''){
                $errors[] = 'メールアドレスを入力してください';
            }else if(!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $email)){
                $errors[] = 'メールアドレスではありません';
            
            }else if(!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $email)){
                $errors[] = 'メールアドレスを入力してください';
            }else if(self::check_duplicate_email($email) === true){
                $errors[] = 'そのメールアドレスは既に登録されています';
            }
            if($password === ''){
                $errors[] = 'パスワードを入力してください';
            }
            if($birthday === ''){
                $errors[] = '生年月日を入力してください';
            }else if(!preg_match('/^[0-9]{8}$/', $birthday)){
                $errors[] = '8桁の数字で入力してください';
            }
            if($image === ''){
                $errors[] = 'プロフィール画像を選択してください';
            }
            return $errors;
        }
        
        //ログイン入力チェック
        public static function check_login_input($email, $password){
            $errors = array();
            
            if($email === ''){
                $errors[] = 'メールアドレスを入力してください';
            }else if(!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $email)){
                $errors[] = "正しいメールアドレスを入力してください";
            }
            if(strlen($password) < 6){
                $errors[] = 'パスワードは５文字以上で入力してください';
            }
            return $errors;
        }
        
        //メールアドレスの重複チェック
        public static function check_duplicate_email($email){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('SELECT * FROM users WHERE email=:email');
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                
                $user = $stmt->fetch();
                
                if($user){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
        
        //ログイン処理
        public static function login($email, $password){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('SELECT * FROM users WHERE email=:email AND password=:password');
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':password', $password, PDO::PARAM_STR);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                
                $user = $stmt->fetch();
                
                return $user;
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
        
        //画像アップロード
        public function upload(){
            if(!empty($_FILES['image']['name'])){
                $image = uniqid(mt_rand(), true);
                $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);
                $file = 'upload/' . $image;
                
                move_uploaded_file($_FILES['image']['tmp_name'], $file);
                
                return $image;
            }else{
                return '';
            }
        }
    }