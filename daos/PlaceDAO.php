<?php
    require_once 'config.php';
    require_once 'models/Place.php';
    require_once 'models/User.php';
    
    //DAO
    class PlaceDAO {
        //データベースへ接続メソッド
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
        
        //データベースから全聖地情報を取得するメソッド
        public static function get_all_places(){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->query('SELECT * FROM places order by id desc');
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Place');
                $places = $stmt->fetchAll();
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
            return $places;
        }
        //データベースに新規聖地を登録するメソッド
        public static function insert($place){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('INSERT INTO places (user_id, genre_name, name, introduction, postal_code, address, tel, open_time, close_time, close_date, nearest_station, booking, price, image1, image2, image3, image4, image5)VALUES(:user_id, :genre_name, :name, :introduction, :postal_code, :address, :tel, :open_time, :close_time, :close_date, :nearest_station, :booking, :price, :image1, :image2, :image3, :image4, :image5)');
                $stmt->bindValue(':user_id', $place->user_id, PDO::PARAM_INT);
                $stmt->bindValue(':genre_name', $place->genre_name, PDO::PARAM_STR);
                $stmt->bindValue(':name', $place->name, PDO::PARAM_STR);
                $stmt->bindValue(':introduction', $place->introduction, PDO::PARAM_STR);
                $stmt->bindValue(':postal_code', $place->postal_code, PDO::PARAM_INT);
                $stmt->bindValue(':address', $place->address, PDO::PARAM_STR);
                $stmt->bindValue(':tel', $place->tel, PDO::PARAM_INT);
                $stmt->bindValue(':open_time', $place->open_time, PDO::PARAM_INT);
                $stmt->bindValue(':close_time', $place->close_time, PDO::PARAM_INT);
                $stmt->bindValue(':close_date', $place->close_date, PDO::PARAM_INT);
                $stmt->bindValue(':nearest_station', $place->nearest_station, PDO::PARAM_STR);
                $stmt->bindValue(':booking', $place->booking, PDO::PARAM_STR);
                $stmt->bindValue(':price', $place->price, PDO::PARAM_STR);
                $stmt->bindValue(':image1', $place->image1);
                $stmt->bindValue(':image2', $place->image2);
                $stmt->bindValue(':image3', $place->image3);
                $stmt->bindValue(':image4', $place->image4);
                $stmt->bindValue(':image5', $place->image5);
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
        
        //IDを指定して聖地を削除するメソッド
        public static function delete($id){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('DELETE FROM places WHERE id = :id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
        
        //ジャンル名を指定して全ての聖地を抜き出すメソッド
        public static function get_place_by_genre_name($genre_name){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('SELECT * FROM places WHERE genre_name = :genre_name order by id desc');
                $stmt->bindValue(':genre_name', $genre_name, PDO::PARAM_STR);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Place');
                $places = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
            return $places;
        }
        
        //IDを指定して聖地情報を抜き出すメソッド
        public static function get_place_by_id($id){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('SELECT * FROM places WHERE id = :id');
                $stmt->bindValue(':id', $id, PDO::PARAM_STR);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Place');
                $place = $stmt->fetch();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
            return $place;
        }
        
        //IDを指定して聖地情報を変更するメソッド
        public static function update($id, $genre_name, $name, $introduction, $postal_code, $address, $tel, $open_time, $close_time, $close_date, $nearest_station, $booking, $price, $image1, $image2, $image3, $image4, $image5){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('UPDATE plases SET genre_name= :genre_name, name= :name, introduction= :introduction, postal_code= :postal_code, address= :address, latitude= :latitude, longitude= :longitude, tel= :tel, open_time= :open_time, close_time= :close_time, close_date= :close_date, nearest_station= :nearest_station, booking= :booking, price= :price, image1= :image1, image2= :image2, image3= :image3, image4= :image4, image5= :image5 WHERE id= :id');
                $stmt->bindValue(':genre_name', $genre_name, PDO::PARAM_STR);
                $stmt->bindValue(':name', $name, PDO::PARAM_STR);
                $stmt->bindValue(':introduction', $introduction, PDO::PARAM_STR);
                $stmt->bindValue(':postal_code', $postal_code, PDO::PARAM_INT);
                $stmt->bindValue(':address', $address, PDO::PARAM_STR);
                $stmt->bindValue(':tel', $tel, PDO::PARAM_INT);
                $stmt->bindValue(':open_time', $open_time, PDO::PARAM_INT);
                $stmt->bindValue(':close_time', $close_time, PDO::PARAM_INT);
                $stmt->bindValue(':close_date', $close_date, PDO::PARAM_STR);
                $stmt->bindValue(':nearest_station', $nearest_station, PDO::PARAM_STR);
                $stmt->bindValue(':booking', $booking, PDO::PARAM_STR);
                $stmt->bindValue(':price', $price, PDO::PARAM_STR);
                $stmt->bindValue(':image1', $image1);
                $stmt->bindValue(':image2', $image2);
                $stmt->bindValue(':image3', $image3);
                $stmt->bindValue(':image4', $image4);
                $stmt->bindValue(':image5', $image5);
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
        
        //1枚目ファイルをアップデートするメソッド
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
        //2枚目ファイルをアップデートするメソッド
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
        //3枚目ファイルをアップデートするメソッド
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
        //4枚目ファイルをアップデートするメソッド
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
        //5枚目ファイルをアップデートするメソッド
        public function upload5(){
            if(!empty($_FILES['image5']['name'])){
                $image = uniqid(mt_rand(), true);
                $image .= '.' . substr(strrchr($_FILES['image5']['name'], '.'), 1);
                $file = 'upload/' . $image;
                move_uploaded_file($_FILES['image5']['tmp_name'], $file);
                
                return $image;
            }else{
                return '';
            }
        }
    }