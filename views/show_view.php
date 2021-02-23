
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap">
        <link rel="stylesheet" href="css/show.css">
        <title>聖地詳細情報</title>
    </head>
    <body>
        <div class="show">
            <section class="header">
                <div class="header-inner">
                    <img src="css/image/logo.png" alt="ロゴ画像">
                    <nav class="header-nav">
                        <button><img src="css/image/button.png" alt="ボタン画像"></button>
                        <ul>
                            <li><a href="profile.php?id=<?= $login_user->id ?>">マイページ</a></li>
                            <li><a href="contact.php">お問い合わせ</a></li>
                            <li><a href="logout.php">ログアウト</a></li>
                        </ul>
                    </nav>
                </div>
            </section>
            
            <div class="show-ttl">
                <h1>聖地詳細情報</h1>
            </div>
            
            <section class="message">
                <?php if($flash_message !== null): ?>
                <p><?= $flash_message ?></p>
                <?php endif; ?>
            </section>
            
            <section class="main">
                <div class="main-inner">
                    <div class="main-top">
                        <div class="main-content">
                            <h2><?= $place->name ?></h2>
                            <div class="main-content-favorite-btn">
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
                            </div>
                        </div>
                        <div class="main-content-ttx">
                            <p><?= $place->introduction ?></p>
                        </div>
                            
                        <img src='upload/<?= $place->image1 ?>'>
                        <?php if($place->image2 === ''): ?>
                        <?php print '' ?>
                        <?php else: ?>
                        <?php print "<img src='upload/$place->image2'>" ?>
                        <?php endif; ?>
                        <?php if($place->image2 === ''): ?>
                        <?php print '' ?>
                        <?php else: ?>
                        <?php print "<img src='upload/$place->image3'>" ?>
                        <?php endif; ?>
                        <?php if($place->image2 === ''): ?>
                        <?php print '' ?>
                        <?php else: ?>
                        <?php print "<img src='upload/$place->image4'>" ?>
                        <?php endif; ?>
                        <?php if($place->image2 === ''): ?>
                        <?php print '' ?>
                        <?php else: ?>
                        <?php print "<img src='upload/$place->image5'>" ?>
                        <?php endif; ?>
                    </div>
                    
                    <table>
                        <tr>
                            <th>聖地名</th><td><?= $place->name ?></td>
                        </tr>
                        <tr>
                            <th>お問い合わせ先</th><td><?= $place->tel ?></td>
                        </tr>
                        <tr>
                            <th>予約可否</th><td><?= $place->booking ?></td>
                        </tr>
                        <tr>
                            <th>住所</th><td><?= $place->postal_code ?><br/><?= $place->address ?><br/><input type="hidden" name="address" id="address" value="<?= $place->address ?>"><div id="map"></div></td>
                        </tr>
                        <tr>
                            <th>最寄駅</th><td><?= $place->nearest_station ?></td>
                        </tr>
                        <tr>
                            <th>営業時間・定休日</th><td><?= $place->open_time ?>〜<?= $place->close_time ?><br/><?= $place->close_date ?></td>
                        </tr>
                        <tr>
                            <th>価格帯</th><td><?= $place->price ?></td>
                        </tr>
                    </table>
                </div>
            </section>
            
            <section class="review">
                <div class="review-ttl">
                    <h2>クチコミ一覧</h2>
                </div>
                
                <div class="review-comment">
                    <a href="review.php?place_id=<?= $place->id ?>">クチコミ投稿</a>
                </div>
                
                <?php if(count($reviews) == 0): ?>
                <?php print "<p>レビューはまだありません</p>"; ?>
                <?php else: ?>
                <?php foreach($reviews as $review): ?>
                <div class="review-box">
                    <div class="review-content">
                        <p><a href="profile.php?id=<?= $review->user_id ?>"><?= $review->get_user()->name ?></a></p>
                        <p>「<?= $review->title ?>」</p>
                        <p>訪れた月：<?= $review->month ?>月</p>
                        <div class="review-content-ttx">
                            <p><?= $review->content ?></p>
                        </div>
                    </div>
                    <img src='upload/<?= $review->image1 ?>'>
                    <?php if($review->image2 === ''): ?>
                    <?php print '' ?>
                    <?php else: ?>
                    <?php print "<img src='upload/$review->image2'>" ?>
                    <?php endif; ?>
                    <?php if($review->image3 === ''): ?>
                    <?php print '' ?>
                    <?php else: ?>
                    <?php print "<img src='upload/$review->image3'>" ?>
                    <?php endif; ?>
                    <?php if($review->image4 === ''): ?>
                    <?php print '' ?>
                    <?php else: ?>
                    <?php print "<img src='upload/$review->image4'>" ?>
                    <?php endif; ?>
                    <p class="review-content-date">更新日：<?= $review->created_at ?></p>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </section>
            
            <div class="review-btn">
                <a class="review-btn-home" href="index.php">ホーム画面へ戻る</a>
                <a class="review-btn-back" href="list.php?genre_name=<?= $place->genre_name ?>">一覧へ戻る</a>
            </div>
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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2qi6Rr9OTuGMClC8RSYlkDrHz_MeV3iM&callback=initMap"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="main.js"></script>
        </div>
    </body>
</html>