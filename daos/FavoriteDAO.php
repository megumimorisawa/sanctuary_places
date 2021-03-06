<?php
    require_once 'config.php';
    require_once 'models/Favorite.php';
    
    //DAO
    class FavoriteDAO {
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
        //データベースにお気に入りを登録するメソッド
        public static function insert_favorite($favorite){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('INSERT INTO favorites (user_id, place_id) VALUES (:user_id, :place_id)');
                $stmt->bindValue(':user_id', $favorite->user_id, PDO::PARAM_INT);
                $stmt->bindValue(':place_id', $favorite->place_id, PDO::PARAM_INT);
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
        
        //データベースからユーザーがお気に入りした全聖地を取得するメソッド
        public static function get_all_favorites($id){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('SELECT * FROM favorites WHERE user_id = :user_id order by id desc');
                $stmt->bindValue(':user_id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Favorite');
                
                $favorites = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
            return $favorites;
        }
        
        //ログインしているユーザーのidと場所のidが与えられた時、既にいいねしているか判定
        public static function is_favorite($login_user_id, $place_id){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('SELECT * FROM favorites WHERE user_id=:user_id AND place_id=:place_id');
                $stmt->bindValue(':user_id', $login_user_id, PDO::PARAM_INT);
                $stmt->bindValue(':place_id', $place_id, PDO::PARAM_INT);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Favorite');
                
                $favorite = $stmt->fetch();
                
                // そんな情報がfavoritesテーブルになかったならば
                if($favorite === false){
                    return false;
                }else{
                    return true;
                }
            
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
        
        //データベースから聖地IDを削除して、お気に入りを解除するメソッド
        public static function delete_favorite($login_user_id,$place_id){
            try{
                $dbh = self::get_connection();
                $stmt = $dbh->prepare('DELETE FROM favorites WHERE user_id = :user_id AND place_id = :place_id');
                $stmt->bindValue(':user_id', $login_user_id, PDO::PARAM_INT);
                $stmt->bindValue(':place_id', $place_id, PDO::PARAM_INT);
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                self::close_connection($dbh, $stmt);
            }
        }
}