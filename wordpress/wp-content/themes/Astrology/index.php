<?php

 get_header(); ?>
 
<div class="container">
	<div class="clearfix">
		<div class="row">
    		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">  
				<div id="content">
					<?php   //include_once (TEMPLATEPATH . '/title.php');
				        

				        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						query_posts(array('post_type'=>'post', 'posts_per_page'=>9, 'category__not_in' => array(4), 'paged' => $paged));

				        if (have_posts()) : while (have_posts()) : the_post(); 
						
								// The following determines what the post format is and shows the correct file accordingly
								$format = get_post_format();
								get_template_part( 'includes/post-formats/'.$format );
								
								if($format == '')
								get_template_part( 'includes/post-formats/standard' );
								
						 					endwhile; 
						else:			 
					?>		 
							<div class="no-results">
								<?php echo '<p><strong>' . __('There has been an error.', 'astrology') . '</strong></p>'; ?>
					    		<p>
					    			<?php _e('We apologize for any inconvenience, please', 'astrology'); ?>
					    			<a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'astrology'); ?></a>
					    			<?php _e('or use the search form below.', 'astrology'); ?>
					    		</p>
					    		<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
					  		</div><!--no-results-->
		
					 <? endif; ?>
  

					<?php get_template_part('includes/post-formats/post-nav'); ?>

				</div><!--#content-->
			</div>
			<?php get_sidebar('blog'); ?>
		</div>	
	</div>
</div>
<?php get_footer(); ?>