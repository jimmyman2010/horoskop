<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->
<head>
	<title><?php if ( is_category() ) {
		echo __('Category Archive for &quot;', 'astrology'); single_cat_title(); echo __('&quot; | ', 'astrology'); bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo __('Tag Archive for &quot;', 'astrology'); single_tag_title(); echo __('&quot; | ', 'astrology'); bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo __(' Archive | ', 'astrology'); bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo __('Search for &quot;', 'astrology').wp_specialchars($s).__('&quot; | ', 'astrology'); bloginfo( 'name' );
	} elseif ( is_home() || is_front_page()) {
		bloginfo( 'name' );
	}  elseif ( is_404() ) {
		echo __('Error 404 Not Found | ', 'astrology'); bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title( ' | ', false, right ); bloginfo( 'name' );
	} ?></title>

	<meta name="format-detection" content="telephone=no">

	<meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if(of_get_option('favicon') != ''){ ?>
	<link rel="icon" href="<?php echo of_get_option('favicon', "" ); ?>" type="image/x-icon" />
	<?php } else { ?>
	<link rel="icon" href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" type="image/x-icon" />
	<?php } ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>

  <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
    	<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
    </div>
  <![endif]-->

  <!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->


<!--[if (gte IE 6)&(lte IE 8)]>
  <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/selectivizr-min.js"></script>
  <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
<![endif]-->


    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/normalize.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/default.css" />

    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/owl.transitions.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/jquery.mmenu.all.css" />


    <link rel="stylesheet" title="styles1" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

    <link rel="stylesheet" title="styles1" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/stylesheets/screen.css" />

    <link rel="stylesheet" title="styles1" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/stylesheets/print.css" />


    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/prettyPhoto.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/owl.transitions.css" />

	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


	<!--[if IE]>
	 	<link rel="stylesheet" title="styles1" type="text/css" media="screen, projection" href="<?php bloginfo( 'stylesheet_url' ); ?>/stylesheets/ie.css" />
	<![endif]-->


	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
  <!--[if lt IE 9]>
  <style type="text/css">
    .border {
      behavior:url(<?php bloginfo('stylesheet_directory'); ?>/PIE.php)
      }
  </style>
  <![endif]-->

  <script type="text/javascript">
  	// initialise plugins
		jQuery(function(){
			// main navigation init
			jQuery('ul.sf-menu').superfish({
				delay:       <?php echo of_get_option('sf_delay'); ?>, 		// one second delay on mouseout
				animation:   {opacity:'<?php echo of_get_option('sf_f_animation'); ?>'<?php if (of_get_option('sf_sl_animation')=='show') { ?>,height:'<?php echo of_get_option('sf_sl_animation'); ?>'<?php } ?>}, // fade-in and slide-down animation
				speed:       '<?php echo of_get_option('sf_speed'); ?>',  // faster animation speed
				autoArrows:  <?php echo of_get_option('sf_arrows'); ?>,   // generation of arrow mark-up (for submenu)
				dropShadows: false
			});

		});


		// Init for audiojs
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});

		// Init for si.files
		SI.Files.stylizeAll();
  </script>


  <style type="text/css">

		<?php $background = of_get_option('body_background');
			if ($background != '') {
				if ($background['image'] != '') {
					echo 'body { background-image:url('.$background['image']. '); background-repeat:'.$background['repeat'].'; background-position:'.$background['position'].';  background-attachment:'.$background['attachment'].'; }';
				}
				if($background['color'] != '') {
					echo 'body { background-color:'.$background['color']. '}';
				}
			};
		?>

		<?php $header_styling = of_get_option('header_color');
			if($header_styling != '') {
				echo '#header {background-color:'.$header_styling.'}';
			}
		?>

		<?php $links_styling = of_get_option('links_color');
			if($links_styling) {
				echo 'a{color:'.$links_styling.'}';
				echo '.button {background:'.$links_styling.'}';
			}
		?>

  </style>

<!--[if gt IE 7]>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/ie.css" />
<![endif]-->




</head>


<?php

$custbodyClass = get_post_meta($post->ID, 'custombodyclass_value', true);
$cclass = '';
if ($custbodyClass) { $cclass = $custbodyClass; }  ?>

<body <?php body_class($cclass); ?> >

<div id="page">
<div id="main"><!-- this encompasses the entire Web site -->
	<a href="#menu_mobile" id="hamburger"><span></span></a>

	<nav id="menu_mobile">
		<?php wp_nav_menu( array(
			'container'       => 'ul',
			'menu_class'      => '',
			'menu_id'         => 'menu_mobile_list',
				'depth'           => 0,
			'theme_location' => 'header_menu',
          ));
        ?>
    </nav>


	<header id="header">




		<div class="top_headerWarp">
			<div class="container">
				<div class="row">
					<div class="logo col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<?php if(of_get_option('logo_type') == 'text_logo'){?>
							<?php if( is_front_page() || is_home() || is_404() ) { ?>
		                        <h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?><span>|</span><em><?php bloginfo('description'); ?></em></a></h2>
		                    <?php } else { ?>
		                        <h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?><span>|</span><em><?php bloginfo('description'); ?></em></a></h2>
		                    <?php } ?>
						<?php } else { ?>
		                    <?php if(of_get_option('logo_url') != ''){ ?>
		                        <a href="<?php bloginfo('url'); ?>/" id="logo">
		                        	<img src="<?php echo of_get_option('logo_url', "" ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
		                    <?php } else { ?>
		                        <a href="<?php bloginfo('url'); ?>/" id="logo">
		                        	<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>"></a>
							<?php } ?>
		                <?php }?>
	            	</div>

					<section id="top-header-area" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<?php if ( ! dynamic_sidebar( 'Top Header Area' ) ) : ?>
	                    <?php endif ?>
					</section>
				</div>
			</div>
		</div>

		<section id="navArea">
			<div class="container">
				<div class="row">
					<nav class="primary col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="clearfix">
							<div class="responds"><span>Menu</span></div>

							<?php wp_nav_menu( array(
								'container'       => 'ul',
								'menu_class'      => 'sf-menu',
								'menu_id'         => 'topnav',
									'depth'           => 0,
								'theme_location' => 'header_menu',
					          ));
					        ?>
						</div>
					</nav><!--.primary-->
				</div>
			</div>
		</section>

	</header>



	<?php if( is_front_page() ) {   ?>

		<section id="sliderWrap">
		   	<?php echo do_shortcode('[text-blocks id="slider-area"]'); ?>
	 	</section>

		<section id="horoscopeWrap">
		   	<?php echo do_shortcode('[text-blocks id="horoscope-area"]'); ?>
	 	</section>

		<section id="welcomeWrap">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php echo do_shortcode('[text-blocks id="welcome-to-astrology-portal"]'); ?>
					</div>
				</div>
			</div>
	 	</section>

		<section id="bannerWrap">
		   	<?php echo do_shortcode('[text-blocks id="home-banner"]'); ?>
	 	</section>

		<section id="latestPostHome">
		   	<?php echo do_shortcode('[text-blocks id="latest-blog-posts-home-page"]'); ?>
	 	</section>

	<?php } ?>


	<?php if( !is_front_page() ) {   ?>

		<?php
			$post_meta_data = get_post_custom($post->ID);

			$full_image_url = wp_get_attachment_url($post_meta_data['astrology_topheader'][0], 'full');
			$image = aq_resize( $full_image_url, 1600, 700, true ); //resize & crop img

			if (!$image) {
				$image = get_bloginfo('template_url').'/images/banner_photo1.jpg';
			}
		?>
		<section id="photoBanner">
			<img src="<?php echo $image; ?>" class="bg"  data-stellar-ratio="0.8"/>
			<div class="photoBanner-inner">
				<div class="wrapH2">
					<?php if (is_post_type_archive('horoscope') ) { ?>
						<h2 class="header_page_title">Horoskopy</h2>
					<?php } else if (is_tax('horoskopy_a_vestby')) {
						global $wp_query;
						$term = $wp_query->get_queried_object();
						$title = $term->name;
						?>
						<h2 class="header_page_title"><?php echo $title; ?></h2>
					<?php } else { ?>
						<h2 class="header_page_title"><?php the_title(); ?></h2>
					<?php } ?>
				</div>
			</div>
		</section>

		<section id="horoscopeWrap">
		   	<?php echo do_shortcode('[text-blocks id="horoscope-area"]'); ?>
	 	</section>

	<?php } ?>


	<section id="primaryWrapContent" class="clearfix">
