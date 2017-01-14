<?php get_header(); ?>

	<div class="container">
		<div class="clearfix">
			<div class="row">
				<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="header-title"><h1><?php //the_title(); ?></h1></div>
				</div>  -->
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">  
					<div id="content">		
						<?php 
				                
							if (have_posts()) : while (have_posts()) : the_post(); 
							
									// The following determines what the post format is and shows the correct file accordingly
									$format = get_post_format();
									get_template_part( 'includes/post-formats/'.$format );
									
									if($format == '')
									get_template_part( 'includes/post-formats/standard' ); ?>
									
									
						<?php get_template_part( 'includes/post-formats/related-posts' ); ?>

									
				    
						<?php comments_template('', true); ?>
						
						
						<?php endwhile; endif; ?>
				    

					</div><!--#content-->
				</div>
				<?php get_sidebar('blog'); ?>
			</div>	
		</div>
	</div>
	
<?php get_footer(); ?>