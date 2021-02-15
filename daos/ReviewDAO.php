<?php
    require_once 'config.php';
    require_once 'models/Review.php';
    
    class ReviewDAO {
        //データベースと接続メソッド
        public static function get_connection(){
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );
            $dbh = new PDO(DSN, DB_USERNAME, DB_PASSWORD, $options);
            return $dbh;
        }
        //データベースから切断するメソッド
        public static function close_connection($dbh, $stmt){
            $dbh = null;
            $stmt = null;
        }
        
        //データベースにレビューを登録するメソッド
        public static function insert_review($review){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('INSERT INTO reviews (user_id, place_id, title, month, content, image1, image2, image3, image4)VALUES(:user_id, :place_id, :title, :month, :content, :image1, :image2, :image3, :image4)');
                $stmt->bindValue(':user_id', $review->user_id, PDO::PARAM_INT);
                $stmt->bindValue(':place_id', $review->place_id, PDO::PARAM_INT);
                $stmt->bindValue(':title', $review->title, PDO::PARAM_STR);
                $stmt->bindValue(':month', $review->month, PDO::PARAM_INT);
                $stmt->bindValue(':content', $review->content, PDO::PARAM_STR);
                $stmt->bindValue(':image1', $review->image1);
                $stmt->bindValue(':image2', $review->image2);
                $stmt->bindValue(':image3', $review->image3);
                $stmt->bindValue(':image4', $review->image4);
                $stmt->execute();
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
        
        //データベースから注目する聖地に対する全レビューを取得するメソッド
        public static function get_all_reviews($place_id){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('SELECT * FROM reviews WHERE place_id = :place_id ORDER BY ID DESC');
                $stmt->bindValue(':place_id', $place_id, PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Review');
                $reviews = $stmt->fetchAll();
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
            return $reviews;
        }
        
        //ファイルをアップデートするメソッド
        public function upload1(){
            if(!empty($_FILES['image1']['name'])){
                $image = uniqid(mt_rand(), true);
                $image .= '.' . substr(strrchr($_FILES['image1']['name'], '.'), 1);
                $file = 'upload/' . $image;
                move_uploaded_file($_FILES['image1']['tmp_name'], $file);
                
                return $image;
            }else{
                return '';
            }
        }
        public function upload2(){
            if(!empty($_FILES['image2']['name'])){
                $image = uniqid(mt_rand(), true);
                $image .= '.' . substr(strrchr($_FILES['image2']['name'], '.'), 1);
                $file = 'upload/' . $image;
                move_uploaded_file($_FILES['image2']['tmp_name'], $file);
                
                return $image;
            }else{
                return '';
            }
        }
        public function upload3(){
            if(!empty($_FILES['image3']['name'])){
                $image = uniqid(mt_rand(), true);
                $image .= '.' . substr(strrchr($_FILES['image3']['name'], '.'), 1);
                $file = 'upload/' . $image;
                move_uploaded_file($_FILES['image3']['tmp_name'], $file);
                
                return $image;
            }else{
                return '';
            }
        }
        public function upload4(){
            if(!empty($_FILES['image4']['name'])){
                $image = uniqid(mt_rand(), true);
                $image .= '.' . substr(strrchr($_FILES['image4']['name'], '.'), 1);
                $file = 'upload/' . $image;
                move_uploaded_file($_FILES['image4']['tmp_name'], $file);
                
                return $image;
            }else{
                return '';
            }
        }
        
    }
