<?php

add_action( 'after_setup_theme', 'my_setup' );

if ( ! function_exists( 'my_setup' ) ):

function my_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 700, 405, true ); // Normal post thumbnails
		add_image_size( 'slider-post-thumbnail', 1626, 569, true ); // Slider Thumbnail		
	}

	function pw_add_image_sizes() {
	    add_image_size( 'pw-thumb', 250, 150, true );	    
	}
	add_action( 'init', 'pw_add_image_sizes' );
	 
	function pw_show_image_sizes($sizes) {
	    $sizes['pw-thumb'] = __( 'Custom Thumb', 'pippin' );	 
	    return $sizes;
	}
	add_filter('image_size_names_choose', 'pw_show_image_sizes');


	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header_menu' => 'Header Menu',
	  		  'footer_menu' => 'Footer Menu'
	  		)
	  	);
	}
}
endif;

/****************/


/* Testimonial */
function my_post_type_testi() {
	register_post_type( 'testi',
                array( 
				'label' => __('Testimonials'), 
				'singular_label' => __('Testimonial', ''),
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					//'slug' => 'testimonial-view',
					'with_front' => true,
				),
				'supports' => array(
						'title',
						'custom-fields',
						'thumbnail',
						'editor')
					) 
				);
}

add_action('init', 'my_post_type_testi');





/* Portfolio */
/* function my_post_type_portfolio() {
	register_post_type( 'portfolio',
                array( 
				'label' => __('Portfolio'), 
				'singular_label' => __('Porfolio Item', 'astrology'),
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'hierarchical' => true,
				'capability_type' => 'page',
				'menu_icon' => get_template_directory_uri() . '/includes/images/icon_portfolio.png',
				'rewrite' => array(
					//'slug' => 'portfolio-view',
					'with_front' => true,
				),
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'excerpt',
						'custom-fields',
						'comments')
					) 
				);
	register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
}

add_action('init', 'my_post_type_portfolio');



/* Horoscope */
function my_post_type_horoscope () {
	register_post_type( 'horoscope',
                array( 
				'label' => __('Horoskopy'), 
				'singular_label' => __('Horoskop', 'astrology'),
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'hierarchical' => true,
				'has_archive' => true,
				'capability_type' => 'page',
				//'menu_icon' => get_template_directory_uri() . '/includes/images/icon_portfolio.png',
				'rewrite' => array(
					'slug' => 'horoskopy',
					'with_front' => true,
				),
				'supports' => array(
						'title',
						//'editor',
						'thumbnail',
						//'excerpt',
						'custom-fields',
						//'comments'
	)
					) 
				);
	register_taxonomy('horoscope_category', 'horoscope', array('hierarchical' => true, 'label' => 'Zverokruh', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
}

add_action('init', 'my_post_type_horoscope');

?>