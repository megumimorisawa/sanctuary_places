// ---- トグルメニュー -----
$("button").attr("id","header-btn");

$(function(){
  $('button').click(function(){
    $('ul').slideToggle(200);
  });
});

// ----- index_view.php トップ画面のフェードイン -----
$(function(){
  $('.index .main img').fadeIn(1300, function(){
    $('.index .main-post').fadeIn(1500);
  });
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
