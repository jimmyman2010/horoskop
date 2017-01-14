<?php
function elegance_widgets_init() {

	// Top Header Area
	// Location: in header
	register_sidebar(array(
		'name'					=> 'Top Header Area',
		'id' 						=> 'top-header-area',
		'description'   => __( 'Located in the top of header.'),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));


	// Sidebar Left Widget
	// Location: the sidebar 
	register_sidebar(array(
		'name'					=> 'Sidebar Left',
		'id' 						=> 'left-sidebar',
		'description'   => __( 'Located at the left side of pages.'),
		'before_widget' => '<div id="%1$s" class="widget"><div class="inn">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));


	// Sidebar Right Widget
	// Location: the sidebar
	register_sidebar(array(
		'name'					=> 'Sidebar Right',
		'id' 						=> 'right-sidebar',
		'description'   => __( 'Located at the right side of pages.'),
		'before_widget' => '<div id="%1$s" class="widget"><div class="inn">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));


	// Blog Sidebar Widget
	// Location: the sidebar
	register_sidebar(array(
		'name'					=> 'Blog Sidebar',
		'id' 						=> 'blog-sidebar',
		'description'   => __( 'Located at the right side of pages.'),
		'before_widget' => '<div id="%1$s" class="widget"><div class="inn">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));


	// Footer Area 1 Widget
	// Location: at the footer
	register_sidebar(array(
		'name'					=> 'Footer Area',
		'id' 						=> 'footer-area',
		'description'   => __( 'Located at the footer of pages.'),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));

}
/** Register sidebars by running elegance_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'elegance_widgets_init' );
?>