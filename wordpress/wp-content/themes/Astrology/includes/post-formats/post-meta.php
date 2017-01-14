<?php $post_meta = of_get_option('post_meta'); ?>
<?php if ($post_meta=='true' || $post_meta=='') { ?>
	<div class="post-meta">	
		
		<time datetime="<?php the_time('m d,Y\TH:i'); ?>">
			<? the_time('d'); echo ' of '; the_time('F, Y') ?>
		</time>
		<b>
			<?php comments_popup_link('No comments', '1 comment', '% comments', 'comments-link', 'Comments are closed'); ?>
		</b>
		<?php echo '<br/>';  ?>
		Posted in <?php the_category(' '); //_e(' / by ', 'astrology');
		 //the_author_posts_link(); ?>
		<?php the_tags(); ?>
	</div><!--.post-meta-->
<?php } ?>