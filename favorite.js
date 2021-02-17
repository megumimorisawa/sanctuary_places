$('.favorite-btn').click(function(){
	let button = this;
	if($(this).data('condition') == false){
	  $(this).css('backgroundColor', '#f9c');
	  $(this).data('condition',true);
	}
	else if($(this).data('condition') == true){
	  $(this).css('backgroundColor', '');
	  $(this).data('condition',false);
	}
});

	

