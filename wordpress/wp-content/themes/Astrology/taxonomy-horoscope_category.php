<?php get_header(); ?>

	<div class="container">
		<div class="clearfix">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="header-title">
					<h1>
						<?php 
						global $wp_query;
					    $term = $wp_query->get_queried_object();
					    $title = $term->name;
					    $slug = $term->slug;
						echo '<span>'.$title.'</span> '; ?>
					</h1>
			  	</div>
			</div>  

	    	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">  
				<div id="content"> 				

				    <?php 
			
					// WP_Query arguments
					$args = array (
						'post_type' => 'horoscope',
						'posts_per_archive_page' => 1,
						'tax_query' => array(
							array(
								'taxonomy' => 'horoscope_category',
								'field' => 'slug',
								'terms' => $slug
							)
						),					
						'orderby' => 'date',
						'paged' => $paged
					);

					// The Query
					$query = new WP_Query( $args );

					// The Loop
					if ( $query->have_posts() ) { 
						while ( $query->have_posts() ) {
							$query->the_post();  ?>
						
							<div class="horo-of-day">
								<h3>
				  			<?php // echo get_the_date(); 
									the_title(); ?></h3>			  			
					  			<?php $taxonomyHoro_descr = get_post_meta($post->ID, 'astrology_horo_'.$term->slug,true); ?>								
								<p class="horo_zodiak_descr"><?php echo $taxonomyHoro_descr; ?></p>
							</div> 	
							<?php 
						}	

					} else {
						// no posts found
					}

					// Restore original Post Data
					wp_reset_postdata();  ?>
				
				</div><!--#content-->

			    <?php get_template_part('includes/post-formats/post-nav'); ?>
			</div>
			<?php get_sidebar('blog'); ?>
		</div>	
	</div>
</div>
<?php get_footer(); ?>