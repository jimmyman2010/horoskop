(function($){

$(document).ready(function(){

	$('nav#menu_mobile').mmenu();
													 
	// ---------------------------------------------------------
	// Tabs
	// ---------------------------------------------------------
	$(".tabs").each(function(){

			$(this).find(".tab").hide();
			$(this).find(".tab-menu li:first a").addClass("active").show();
			$(this).find(".tab:first").show();

	});

	$(".tabs").each(function(){

			$(this).find(".tab-menu a").click(function() {

					$(this).parent().parent().find("a").removeClass("active");
					$(this).addClass("active");
					$(this).parent().parent().parent().parent().find(".tab").hide();
					var activeTab = $(this).attr("href");
					$(activeTab).fadeIn();
					return false;

			});

	});


	// ---------------------------------------------------------
	// Toggle
	// ---------------------------------------------------------

	$(".toggle").each(function(){

			$(this).find(".box").hide();

	});

	$(".toggle").each(function(){

			$(this).find(".trigger").click(function() {

					$(this).toggleClass("active").next().stop(true, true).slideToggle("normal");

					return false;

			});

	});



	$(".recent-posts.team li:nth-child(3n)").addClass("nomargin");



	// prettyphoto init
	$("a[rel^='prettyPhoto']").prettyPhoto({
		animation_speed:'normal',
		slideshow:5000,
		autoplay_slideshow: false,
		overlay_gallery: true
	});


	/***************** IZOTOPE PORTFOLIO *******/

	var container = $('.isotope'),
	    filterLinks = $('#filter-by a');

		filterLinks.click(function(e){
		    var selector = $(this).attr('data-filter');
		    container.isotope({
		        filter : '.' + selector,
		        itemSelector : '.isotope-item',
		        layoutMode : 'fitRows',
		        animationEngine : 'best-available'
	    });

	    filterLinks.removeClass('active');
	    $('#filter-by li').removeClass('current-cat');
	    $(this).addClass('active');
	    e.preventDefault();
	});




	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').stop(false, false).animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});


	/* ----------------------- ------------- USFULL ADDONS ------ ------------------ */

	$('.breadcrumb li a').each(function(){
		var th = $(this);
		if (th.text()=='Uncategorized') {
			th.parent().parent().remove();
		}
	});



	$('#content article:first, #content article:first').addClass('first');
	$('.single-post #content article').addClass('clearfix');
	$('#topnav > li:last').addClass('last');

	$('#topnav .sub-menu li').each(function(){
		var temp1 = $(this).find('ul');
		if (temp1.length > 0) $(this).addClass('hasChildren');
	});

	$('#home-content div[id*="advanced-recent-posts"]').addClass('clearfix');
	$('#searchform input[type="text"]').attr('placeholder', 'Keyword');

	$('.single-portfolio').each(function(){
		var temp1 = $(this).find('.grid_gallery');
		var temp2 = $(this).find('.two_third');
		if (temp1.length > 0) temp2.addClass('has_grid_gallery');
	});

	$('.search-results #content article.post-holder, .blog #content article.post-holder, .archive #content article.post-holder, .author #content article.post-holder').each(function(){
		var tempImage = $(this).find('.featured-thumbnail');
		if (tempImage.length == 0) $(this).find('.post-content').css({paddingLeft: '0'});
	});

	/*if ($('.pagination').length < 2) { $('.pagination').css({display: 'none'}); }
	if ($('.pagenavi').length>0) {  $('.pagenavi').fadeIn(1000); }*/

	/*******/

	$('ul.count').each(function(){
		var tt = $(this).find('li');
		for (var i = tt.length - 1; i >= 0; i--) {
			var tx = '<span class="num">'+(i+1)+'.</span>'; 	
			$(tt[i]).append(tx);
		};
	});


	$('.recent-post-item').addClass('clearfix');

	$("body").on('mouseover', '.wpcf7-not-valid-tip',function(){ $(this).remove(); });

	$.fn.equalHeights = function() {
	    var heights = []; 
	    this.each(function(){  heights.push($(this).height());  });

	    var maxHeight = Math.max.apply(0, heights);
	    this.height(maxHeight);
	}

	window.onload = function(){

		$('#carouselArea > div').css({opacity: '1'});
		$('#carouselArea').addClass('loaded');

		$('.breadcrumb').animate({opacity:'1'}, 400);
		//$('#bannerWrap .bannerBox').equalHeights();

		$(window).stellar();
		$('#photoBanner .bg').stellar();

		$('#photoBanner .bg, #photoBanner .photoBanner-inner').css({opacity: 1});
	}


	function sliderImgToCenter(){

	    var ww = document.body.clientWidth;
	    var imgW = $('#photoBanner .bg').width();

	    if ( ww>=767 ) {
	        if ( imgW>ww ) {
	            $('#photoBanner .bg').css({marginLeft: -(imgW-ww)/2+'px'});      
	        }
	        $('#photoBanner').css({height: 'auto'});
	        $('#photoBanner .photoBanner-inner .wrapH2').css({height: 'auto'});
	    }
	    else {
	        $('#photoBanner .bg').css({marginLeft: '0'});
	        var el_heiht = $('#photoBanner .bg').height();
	        console.log(el_heiht);
	        $('#photoBanner').height(el_heiht);
	        $('#photoBanner .photoBanner-inner .wrapH2').height(el_heiht);
	    }   

	}   

	sliderImgToCenter();




	$("#owl-posts").owlCarousel({
		items : 4, //10 items above 1000px browser width
		itemsDesktop : [1000,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,2], // betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0
		//itemsMobile : [], // itemsMobile disabled - inherit from itemsTablet option
		navigation: true,
		autoPlay: false
	});


	/* ----------------------- ------------- END OF USFULL ADDONS ------ ------------------ */

	/* ----------------------- -------------------------------- ------------------ */
	/* ----------------------- -------------- CURRENT TEMPLATE ------------ ------------------ */
	/* ----------------------- -------------------------------- ------------------ */


	$('.cube').hover(function(){
	    $(this).addClass('flip');
	},function(){
	    $(this).removeClass('flip');
	});


	/**************************/


	window.onresize = res;
	function res(){

		if (document.body.clientWidth>=767) {
			//$('#bannerWrap .bannerBox').css({height:'auto'});
			//$('#bannerWrap .bannerBox').equalHeights();
		}
		sliderImgToCenter();

	}

/*  ******************* END OF FILE***************************/
});


})(jQuery);
