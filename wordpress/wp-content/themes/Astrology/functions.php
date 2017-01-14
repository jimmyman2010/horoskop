<?php

	/*-----------------------------------------------------------------------------------*/
	/* Set Proper Parent/Child theme paths for inclusion
	/*-----------------------------------------------------------------------------------*/

	/*-----------------------------------------------------------------------------------*/
	/*	Load Text Domain
	/*-----------------------------------------------------------------------------------*/
	    //load_theme_textdomain( 'framework' );



/*-----------------------------------------------------------------------------------*/
/*	Include Meta Box
/*-----------------------------------------------------------------------------------*/
    define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/includes/meta-box' ) );
    define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/includes/meta-box' ) );
    require_once RWMB_DIR . 'meta-box.php';
    require_once RWMB_DIR . 'config-meta-boxes.php';

	@define( 'PARENT_DIR', get_template_directory() );
	@define( 'CHILD_DIR', get_stylesheet_directory() );

	@define( 'PARENT_URL', get_template_directory_uri() );
	@define( 'CHILD_URL', get_stylesheet_directory_uri() );
	
	
	//Loading jQuery and Scripts
	require_once PARENT_DIR . '/includes/theme-scripts.php';

	
	//Widget and Sidebar
	require_once PARENT_DIR . '/includes/sidebar-init.php';
	require_once PARENT_DIR . '/includes/register-widgets.php';
	
	//Theme initialization
	require_once PARENT_DIR . '/includes/theme-init.php';
	
	//Additional function
	require_once PARENT_DIR . '/includes/theme-function.php';
	
	//Shortcodes
	require_once PARENT_DIR . '/includes/theme_shortcodes/shortcodes.php';
	include_once(PARENT_DIR . '/includes/theme_shortcodes/alert.php');
	include_once(PARENT_DIR . '/includes/theme_shortcodes/tabs.php');
	include_once(PARENT_DIR . '/includes/theme_shortcodes/toggle.php');
	include_once(PARENT_DIR . '/includes/theme_shortcodes/html.php');
	
	//tinyMCE includes
	include_once(PARENT_DIR . '/includes/theme_shortcodes/tinymce/tinymce_shortcodes.php');
	
	//Aqua Resizer for image cropping and resizing on the fly
	require_once PARENT_DIR . '/includes/aq_resizer.php';
	
	// Add the postmeta
	include_once(PARENT_DIR . '/includes/theme-postmeta.php');
	
	// Add the postmeta to Portfolio posts
	//include_once(PARENT_DIR . '/includes/theme-portfoliometa.php');
	
	// Add the postmeta to Slider posts
	//include_once(PARENT_DIR . '/includes/theme-slidermeta.php');
	
	// Add the postmeta to Testimonials
	include_once(PARENT_DIR . '/includes/theme-testimeta.php');
	
	// Add the postmeta to Our Team posts
	//include_once(PARENT_DIR . '/includes/theme-teammeta.php');
	
	// Add the postmeta to Our Team posts
	//include_once(PARENT_DIR . '/includes/theme-mypostmeta.php');

	require_once PARENT_DIR . '/includes/mobile_Detect.php';
	
	
	//Loading theme textdomain
	load_theme_textdomain( 'astrology', PARENT_DIR . '/languages' );
	
	
	//Loading options.php for theme customizer
	include_once(PARENT_DIR . '/options.php');
	
	require_once PARENT_DIR . '/includes/text-blocks.php';
	
	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));
	
	/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', PARENT_URL . '/admin/' );
		include_once(PARENT_DIR . '/admin/options-framework.php');
	}
	
	
	
	// Removes Trackbacks from the comment cout	
	if (!function_exists('comment_count')) {
		add_filter('get_comments_number', 'comment_count', 0);
		
		function comment_count( $count ) {
			if ( ! is_admin() ) {
				global $id;
				$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
				return count($comments_by_type['comment']);
			} else {
				return $count;
			}
		}
	
	}
	



// Add custom body class to the head
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) $classes[] = 'ie';
    else $classes[] = 'unknown';

    if($is_iphone) $classes[] = 'iphone';
    return $classes;
}


	
	// Post Formats
	$formats = array( 
				'aside', 
				'gallery', 
				'link', 
				'image', 
				'quote', 
				'audio',
				'video');
	add_theme_support( 'post-formats', $formats ); 
	add_post_type_support( 'post', 'post-formats' );
	
	
	
	// Custom excpert length
	if(!function_exists('new_excerpt_length')) {
		
		function new_excerpt_length($length) {
			return 60;
		}
		add_filter('excerpt_length', 'new_excerpt_length');
	
	}

  
	
	// enable shortcodes in sidebar
	add_filter('widget_text', 'do_shortcode');
	
	// custom excerpt ellipses for 2.9+
	if(!function_exists('custom_excerpt_more')) {
	
		function custom_excerpt_more($more) {
			return 'More &raquo;';
		}
		add_filter('excerpt_more', 'custom_excerpt_more');
	
	}
	
	// no more jumping for read more link
	if(!function_exists('no_more_jumping')) {
		
		function no_more_jumping($post) {
			return '&nbsp;<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
		}
		add_filter('excerpt_more', 'no_more_jumping');
		
	}
	
	
	// category id in body and post class
	if(!function_exists('category_id_class')) {
		
		function category_id_class($classes) {
			global $post;
			foreach((get_the_category($post->ID)) as $category)
				$classes [] = 'cat-' . $category->cat_ID . '-id';
				return $classes;
		}
		add_filter('post_class', 'category_id_class');
		add_filter('body_class', 'category_id_class');
		
	}

/**********/

 function is_blog () {
	global $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post') ) ? true : false ;
}

function dimox_breadcrumbs() {
 
/* === OPTIONS === */
$text['home'] = 'Home'; // text for the 'Home' link
$text['category'] = 'Archive by Category "%s"'; // text for a category page
$text['search'] = 'Search Results for "%s" Query'; // text for a search results page
$text['tag'] = 'Posts Tagged "%s"'; // text for a tag page
$text['author'] = 'Articles Posted by %s'; // text for an author page
$text['404'] = 'Error 404'; // text for the 404 page
 
$show_current = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
$show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
$show_title = 1; // 1 - show the title for the links, 0 - don't show
$delimiter = ' &#47; '; // delimiter between crumbs
$before = '<span class="current">'; // tag before the current crumb
$after = '</span>'; // tag after the current crumb
/* === END OF OPTIONS === */
 
global $post;
$home_link = home_url('/');
$link_before = '<span typeof="v:Breadcrumb">';
$link_after = '</span>';
$link_attr = ' rel="v:url" property="v:title"';
$link = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
$parent_id = $parent_id_2 = $post->post_parent;
$frontpage_id = get_option('page_on_front');
 
if (is_home() || is_front_page()) {
 
if ($show_on_home == 1) echo '<div class="breadcrumbs"><a href="' . $home_link . '">' . $text['home'] . '</a></div>';
 
} else {
 
echo '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
if ($show_home_link == 1) {
echo '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a>';
if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
}
 
if ( is_category() ) {
$this_cat = get_category(get_query_var('cat'), false);
if ($this_cat->parent != 0) {
$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
$cats = str_replace('</a>', '</a>' . $link_after, $cats);
if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
echo $cats;
}
if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
 
} elseif ( is_search() ) {
echo $before . sprintf($text['search'], get_search_query()) . $after;
 
} elseif ( is_day() ) {
echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
echo $before . get_the_time('d') . $after;
 
} elseif ( is_month() ) {
echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
echo $before . get_the_time('F') . $after;
 
} elseif ( is_year() ) {
echo $before . get_the_time('Y') . $after;
 
} elseif ( is_single() && !is_attachment() ) {
if ( get_post_type() != 'post' ) {
$post_type = get_post_type_object(get_post_type());
$slug = $post_type->rewrite;
printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
} else {
$cat = get_the_category(); $cat = $cat[0];
$cats = get_category_parents($cat, TRUE, $delimiter);
if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
$cats = str_replace('</a>', '</a>' . $link_after, $cats);
if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
echo $cats;
if ($show_current == 1) echo $before . get_the_title() . $after;
}
 
} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
$post_type = get_post_type_object(get_post_type());
echo $before . $post_type->labels->singular_name . $after;
 
} elseif ( is_attachment() ) {
$parent = get_post($parent_id);
$cat = get_the_category($parent->ID); $cat = $cat[0];
if ($cat) {
$cats = get_category_parents($cat, TRUE, $delimiter);
$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
$cats = str_replace('</a>', '</a>' . $link_after, $cats);
if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
echo $cats;
}
printf($link, get_permalink($parent), $parent->post_title);
if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
 
} elseif ( is_page() && !$parent_id ) {
if ($show_current == 1) echo $before . get_the_title() . $after;
 
} elseif ( is_page() && $parent_id ) {
if ($parent_id != $frontpage_id) {
$breadcrumbs = array();
while ($parent_id) {
$page = get_page($parent_id);
if ($parent_id != $frontpage_id) {
$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
}
$parent_id = $page->post_parent;
}
$breadcrumbs = array_reverse($breadcrumbs);
for ($i = 0; $i < count($breadcrumbs); $i++) {
echo $breadcrumbs[$i];
if ($i != count($breadcrumbs)-1) echo $delimiter;
}
}
if ($show_current == 1) {
if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
echo $before . get_the_title() . $after;
}
 
} elseif ( is_tag() ) {
echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
} elseif ( is_author() ) {
global $author;
$userdata = get_userdata($author);
echo $before . sprintf($text['author'], $userdata->display_name) . $after;
 
} elseif ( is_404() ) {
echo $before . $text['404'] . $after;
 
} elseif ( has_post_format() && !is_singular() ) {
echo get_post_format_string( get_post_format() );
}
 
if ( get_query_var('paged') ) {
if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
echo __('Page') . ' ' . get_query_var('paged');
if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
}
 
echo '</div><!-- .breadcrumbs -->';
 
}
} // end dimox_breadcrumbs()


   


/**************/

function custom_admin_js() {
    $url = get_option('siteurl');
    $url = get_bloginfo('template_directory') . '/js/customAdmin-style.js';
    echo '<script type="text/javascript" src="'. $url . '"></script>';
} 
    add_action('admin_head', 'custom_admin_js');


/********/


function get_page_ID_by_page_template($template_name)
  {
      global $wpdb;
      $page_ID = $wpdb->get_var("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = '$template_name' AND meta_key = '_wp_page_template'");
      return $page_ID;
  }    

/*******************************************************************/

function my_upload_size_limit( $limit ) {
add_filter( 'upload_size_limit', 'my_upload_size_limit' );
    return wp_convert_hr_to_bytes( '25M' );
}

/**********/
/*add_action( 'pre_get_posts', 'be_exclude_category_from_blog' );
function be_exclude_category_from_blog( $query ) {
    if( ($query->is_archive('horoscope') && !is_admin() && is_post_type_archive('horoscope')) ||  is_tax('horoskopy') )  {
        $query->set( 'showposts', '10' );
    }                    
}*/



/**********/








?>