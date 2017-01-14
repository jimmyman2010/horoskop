<?php get_header(); ?>
<div id="wrap_all" class="clearfix">
	<div class="container">
    	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">  
        	<div class="wrap_content"> 
				<div id="content">
				  <div class="header-title">
				  	<h1><?php printf( __( 'Tag Archives: %s' ),'<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
				  </div>
				  <!-- displays the tag's description from the Wordpress admin -->
				  <?php echo tag_description(); ?>

				  <?php 
				                
						if (have_posts()) : while (have_posts()) : the_post(); 
						
								// The following determines what the post format is and shows the correct file accordingly
								$format = get_post_format();
								get_template_part( 'includes/post-formats/'.$format );
								
								if($format == '')
								get_template_part( 'includes/post-formats/standard' );
								
						 endwhile; else:
						 
						 ?>
						 
						 <div class="no-results">
							<?php echo '<p><strong>' . __('There has been an error.', 'astrology') . '</strong></p>'; ?>
							<p><?php _e('We apologize for any inconvenience, please', 'astrology'); ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'astrology'); ?></a> <?php _e('or use the search form below.', 'astrology'); ?></p>
							<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
						</div><!--no-results-->
						
					<?php endif; ?>
				    
				  <?php get_template_part('includes/post-formats/post-nav'); ?>
				  
				</div><!--#content-->
			</div>
		</div>
		<?php get_sidebar('right'); ?>
	</div>
</div>
<?php get_footer(); ?>