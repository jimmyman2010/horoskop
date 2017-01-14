(function($){

$(document).ready(function(){

	$('#bannerWrap').addClass('tableMobile');
	$('#beforeFooter').addClass('tableMobile');

	if ( document.body.clientWidth < 767 ) {
		$('#bannerWrap').css({minWidth: document.body.clientWidth+'px'});
		$('#beforeFooter').css({minWidth: document.body.clientWidth+'px'});
	}

/*  ******************* END OF FILE***************************/
});


})(jQuery);	