
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>聖地詳細情報</title>
    <style>
        #map {
            width: 40%;
            height: 200px;
            border: solid 2px red;
        }
    </style>
</head>
<body>
    <h1>聖地詳細情報</h1>
    <?php if($flash_message !== null): ?>
    <p><?= $flash_message ?></p>
    <?php endif; ?>
    
    
    
    場所の名称：<?= $place->name ?><br/>
    <img src='upload/<?= $place->image1 ?>'>
    <img src='upload/<?= $place->image2 ?>'>
    <img src='upload/<?= $place->image3 ?>'>
    <img src='upload/<?= $place->image4 ?>'>
    <img src='upload/<?= $place->image5 ?>'><br/>
    紹介文：<?= $place->introduction ?><br/>
    郵便番号：<?= $place->postal_code ?><br/>
    住所：<?= $place->address ?><br/>
    <input type="hidden" name="address" id="address" value="<?= $place->address ?>">
    
    <div id="map"></div>
    
    電話番号：<?= $place->tel ?><br/>
    営業時間：<?= $place->open_time ?>〜<?= $place->close_time ?><br/>
    定休日：<?= $place->close_date ?><br/>
    最寄駅：<?= $place->nearest_station ?><br/>
    予約可否：<?= $place->booking ?><br/>
    価格帯：<?= $place->price ?><br/>

    <?php if($place->is_favorite($login_user->id) === false): ?>
    <form action="favorite.php" method="POST">
        <input type="submit" value="お気に入り">
        <input type="hidden" name="place_id" value="<?= $place->id ?>">
    </form>
    <?php else: ?>
    <form action="favorite_delete.php" method="POST">
        <input type="submit" value="お気に入り解除">
        <input type="hidden" name="place_id" value="<?= $place->id ?>">
    </form>
    <?php endif; ?>
    
    
    
    <br/>
    <br/>
    <h2>クチコミ一覧</h2>
    
    <?php if(count($reviews) !== 0): ?>
    <?php foreach($reviews as $review): ?>
    <p>名前：<a href="profile.php?id=<?= $review->user_id ?>"><?= $review->get_user()->name ?></a></p>
    <img src='upload/<?= $review->image1 ?>'><img src='upload/<?= $review->image2 ?>'><img src='upload/<?= $review->image3 ?>'><img src='upload/<?= $review->image4 ?>'>
    <p>タイトル：<?= $review->title ?></p>
    <p>訪れた月：<?= $review->month ?>月</p>
    <p>内容：<?= $review->content ?></p>
    <p>更新日：<?= $review->created_at ?></p>
    <?php endforeach; ?>
    <?php endif; ?>
    
    
    <a href="index.php">ホーム画面へ戻る</a>
    <a href="review.php?place_id=<?= $place->id ?>">クチコミ投稿</a>
    <a href="list.php?genre_name=<?= $place->genre_name ?>">一覧へ戻る</a>
    <script>
        // Google Map API & Geocoder デモ
        var map;
        var marker;
        var geocoder;
        
        // 初期画面
        function initMap() {
          var address = document.getElementById("address").value;
          draw_by_address(address);
          
        }
          
          // $.ajax(
          //       {
          //       url: "map_data.php", // 送信先のURL
          //       type: 'GET',
          //       dataType: 'json',
          //       processData: false,
          //       contentType: false
          //   })
          //   .done(function(data) {
          //       //データ取得成功
          //   })
          //   .fail(function( jqXHR, textStatus, errorThrown ) {
          //       // 送信失敗
          //   });
        
        // 緯度経度から地図を表示
        // function draw_by_latlng(input_lat, input_lng){
        //     var latLngInput = new google.maps.LatLng(input_lat, input_lng);
        //     var geocoder = new google.maps.Geocoder();
        
        //       geocoder.geocode({
        //         latLng: latLngInput
        //       }, function(results, status) {
        //         if (status == google.maps.GeocoderStatus.OK) {
            
        //           //Mapクラスのインスタンスを生成します。
        //           var map = new google.maps.Map(
        //             document.getElementById("map"),
        //             {
        //                 center: results[0].geometry.location, // 地図の中心を指定
        //               zoom: 15 // 地図のズームを指定
        //           });
                  
        //           //表示範囲クラスのインスタンスを生成します。
        //           var bounds = new google.maps.LatLngBounds();
                  
        //           //緯度・経度情報を取得します。
        //           var latlng = results[0].geometry.location;
            
        //           //住所を取得します。
        //           var input_address = results[0].formatted_address;
            
        //           //取得した緯度・経度で表示範囲を拡張します。
        //           bounds.extend(latlng);
            
        //           //地図上に緯度・経度、住所の情報を表示します。
        //           new google.maps.InfoWindow(
        //             {
        //               content: input_address
        //             }
        //           ).open(
        //             map,
        //             new google.maps.Marker(
        //               {
        //                 position: latlng,
        //                 map: map
        //               }
        //             )
        //           );
        //             var address = document.getElementById("address");
        //             address.value = input_address; 
                    
        //             var lat = document.getElementById("lat");
        //             var lng = document.getElementById("lng");
        //             lat.value = input_lat;
        //             lng.value = input_lng;
        //       }
        //   });
        // }
        
        // 住所から地図を表示
        function draw_by_address(input_address){
            geocoder = new google.maps.Geocoder();
            geocoder.geocode({
              'address':  input_address
           }, function(results, status) { // 結果
                if (status === google.maps.GeocoderStatus.OK) { // ステータスがOKの場合
                  map = new google.maps.Map(document.getElementById('map'), {
                        center: results[0].geometry.location, // 地図の中心を指定
                       zoom: 15 // 地図のズームを指定
                   });
                 marker = new google.maps.Marker({
                       position: results[0].geometry.location, // マーカーを立てる位置を指定
                        map: map // マーカーを立てる地図を指定
                   });
                  infoWindow = new google.maps.InfoWindow({ // 吹き出しの追加
                    content:"<div class='maker'>" + input_address + "</div>" // 吹き出しに表示する内容
                    });
                    //marker.addListener('click', function() { // マーカーをクリックしたとき
                    infoWindow.open(map, marker); // 吹き出しの表示
                    //});  
                    // var address = document.getElementById("address");
                    // address.value = input_address; 
                    // var latlng = results[0].geometry.location;
                    // var glat = latlng.lat();
                    // var glng = latlng.lng();
                    // var lat = document.getElementById("lat");
                    // var lng = document.getElementById("lng");
                    // lat.value = glat;
                    // lng.value = glng;
             } else { // 失敗した場合
                  alert(status);
      }
   });
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALg70uaMcYjkzto9oPmiXyODIXCvpvAzg&callback=initMap"></script>
</body>
</html>