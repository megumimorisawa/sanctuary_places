//トグルメニュー
$("button").attr("id","header-btn");

$(function(){
  $('button').click(function(){
    $('ul').slideToggle(200);
  });
});

//スクロールするとフェードイン
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

//show_view.phpの聖地写真
$(function(){
    $(".main-content-image-item").click(function(){
        
        $("figure img").attr("src", $(this).attr("href"));
        return false;
    });
});

//show_view.phpのレビュー写真
$(function(){
  $(".review-image").click(function(){
 
    $("body").append('<div id="bg">');
    $("body").append('<div id="photo">');
    
    $("#bg").hide();
    $("#photo").hide();

    $("#photo").html("<img>");

    $("#photo img").attr("src", $(this).attr("href"));

    $("#photo img").attr("width", 640);
    $("#photo img").attr("height", 420);
    $("#photo img").attr("alt", "Photo");

    $("#bg").fadeIn();
    $("#photo").fadeIn();
    

    $("#bg").click(function(){
      
      $(this).fadeOut(function(){
        $(this).remove();
      });
      
      $("#photo").fadeOut(function(){
        $(this).remove();
      });
    });
    
    return false;
    
  });
});