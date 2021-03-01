// ---- トグルメニュー -----
$("button").attr("id","header-btn");

$(function(){
  $('button').click(function(){
    $('ul').slideToggle(200);
  });
});

// ----- index_view.php スライドショー -----
$(function(){
  // 画像の枚数
  var count = $("#slide li").length;

  // 現在表示されている画像（最初は１番目の画像）
  var current = 1;

  // 次に表示する画像
  var next = 2;

  // フェードイン/アウトのインターバル（何秒ごとに画像を切り替えるか。4000ミリ秒に設定）
  var interval = 4000;

  // フェードイン/アウトのスピード（2000ミリ秒に設定）
  var duration = 2000;

  // タイマー用の設定
  var timer;

  // １番目の写真以外は非表示
  $("#slide li:not(:first-child)").hide();

  // 3000ミリ秒（変数intervalの値）ごとにslideTimer()関数を実行
  timer = setInterval(slideTimer, interval);

  // slideTimer()関数
  function slideTimer(){
    // 現在の画像をフェードアウト
    $("#slide li:nth-child(" + current + ")").fadeOut(duration);

    // 次の画像をフェードイン
    $("#slide li:nth-child(" + next + ")").fadeIn(duration);

    // 変数currentの新しい値：変数nextの元の値
    current = next;

    // 変数nextの新しい値：変数currentの新しい値+1
    next = ++next;

    // 変数nextの値が3（画像の総数）を超える場合、1に戻す
    if(next > count){
      next = 1;
    }

    // targetクラスを削除
    $("#button li a").removeClass("target");

    // 現在のボタンにtargetクラスを追加
    $("#button li:nth-child(" + current + ") a").addClass("target");
  }

  // ボタンをクリック
  $("#button li a").click(function(){
    // テキスト内容を変数nextに代入
    next = $(this).html();

    // タイマーを停止して再スタート
    clearInterval(timer);
    timer = setInterval(slideTimer, interval);

    // 初回の関数実行
    slideTimer();

    return false;
  });
});

// ----- index_view.php トップ画面登録ボタンのフェードイン -----
$(function(){
  $('.index .main-post').fadeIn(1500)
});

// ----- top.php show_view.phpのレビュー部分のスクロールするとフェードイン -----
$(function(){
	$(window).on('load scroll',function (){
		$('.review-box,.feature-content-box').each(function(){
			var target = $(this).offset().top;
			var scroll = $(window).scrollTop();
			var height = $(window).height();
			if (scroll > target - height){
				$(this).addClass('active');
			}
		});
	});
});

// ----- show_view.phpの聖地写真 -----
$(function(){
    $(".main-content-image-item").click(function(){
        
        $("figure img").attr("src", $(this).attr("href"));
        return false;
    });
});

// -----show_view.phpのレビュー写真 -----
$(function() {
    let scroll_top; // スクロール量
    
    $(window).scroll(function(){
        // scroll量取得
        scroll_top = $(this).scrollTop();
        console.log(scroll_top);
    });
    
    $('body').prepend('<div class="overlay"></div>');
    
    $('.main-content-image-item,.review-image').click(function() {
    
        $('div.overlay').css('height', $(document).height());
        $('.overlay').empty().append('<img src="' + $($(this).children('img')).attr('src') + '" id="zoom"/>').css({display: 'block'});
        
        var left = $(window).width() / 2 + $(window).scrollLeft() - ($('#zoom').prop('width') / 2);
        var top = scroll_top + $(window).height() / 2 - $('#zoom').prop('height') / 2;
       
        $('div.overlay img').css({left: left, top: top, opacity: '1'});
        return false;
    });
        
    $('div.overlay').click(function() {
        $('div.overlay').hide();
    });
});

// ----- Google Map表示 -----
$(function(){
    // Google Map API & Geocoder デモ
    let map;
    let marker;
    let geocoder;
    
    // 初期画面
    $(function initMap() {
      let address = document.getElementById("address").value;
      draw_by_address(address);
    });
                  
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
                };
          });
    };
});
