<?php

get_header(); ?>

<div class="container">
	<div class="clearfix">
		<div class="row">

			<div id="content">	
				<?php 
				// WP_Query arguments
				$args = array (
					'post_type' => 'horoscope',
					//'posts_per_archive_page' => 1,					
					'orderby' => 'date',
					'paged' => $paged
				);

				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) { 
					$taxonomyObject[] = get_term_by( 'name', 'aquarius' ,'horoscope_category');
					$taxonomyObject[] = get_term_by( 'name', 'aries' ,'horoscope_category');
					$taxonomyObject[] = get_term_by( 'name', 'cancer' ,'horoscope_category');
					$taxonomyObject[] = get_term_by( 'name', 'capricorn' ,'horoscope_category');
					$taxonomyObject[] = get_term_by( 'name', 'gemini' ,'horoscope_category');
					$taxonomyObject[] = get_term_by( 'name', 'leo' ,'horoscope_category');
					$taxonomyObject[] = get_term_by( 'name', 'libra' ,'horoscope_category');
					$taxonomyObject[] = get_term_by( 'name', 'pisces' ,'horoscope_category');
					$taxonomyObject[] = get_term_by( 'name', 'sagittarius' ,'horoscope_category');
					$taxonomyObject[] = get_term_by( 'name', 'scorpio' ,'horoscope_category');
					$taxonomyObject[] = get_term_by( 'name', 'taurus' ,'horoscope_category');
					$taxonomyObject[] = get_term_by( 'name', 'virgo' ,'horoscope_category');


					while ( $query->have_posts() ) {
						$query->the_post();

						?>
						
						<div class="horoDayBox">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="header-title"><h1>Horoscope on <?php echo get_the_date(); ?></h1></div>
				  			</div>

				  			<?php 


							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_aquarius',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_aries',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_cancer',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_capricorn',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_gemini',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_leo',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_libra',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_pisces',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_sagittarius',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_scorpio',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_taurus',true);
							$taxonomyHoro_descr_Object[] = get_post_meta($post->ID, 'astrology_horo_virgo',true);

							for ($i=0; $i < 12; $i++) {  ?>
								<div class="horoBox rollover boxCorners col-lg-4 col-md-4 col-sm-4 col-xs-12">

									<div class="inn">
										<div class="cube">
											<div class="front">
												<img class="img_front" src="<?php echo z_taxonomy_image_url($taxonomyObject[$i]->term_id); ?>" />
											</div>
											<div class="back">
												<img class="img_back" src="<?php echo z_taxonomy_image_url($taxonomyObject[$i]->term_id); ?>" />
											</div>
										</div>
										<h3><?php echo $taxonomyObject[$i]->name; ?></h3>
										<p class="horo_zodiak_descr"><?php echo $taxonomyHoro_descr_Object[$i]; ?></p>
									</div>	
								</div>	

							<?php } ?>
						</div> 	
						<?php 
					}	

				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata();  
				?>
			</div><!--#content-->

			<?php get_template_part('includes/post-formats/post-nav'); ?>

		</div>
	</div>
</div>
	
<?php get_footer(); ?>