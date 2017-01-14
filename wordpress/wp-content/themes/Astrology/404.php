<?php get_header(); ?>

    <div class="container">

        <div class="span12">
        
            <div id="error404" class="clearfix">
                <div class="error404-num">404</div>
                <?php echo '<h1>' . __('Sorry!', 'astrology') . '</h1>'; ?>
                <?php echo '<h2>' . __('Page Not Found', 'astrology') . '</h2>'; ?>
                <?php echo '<h6>' . __('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'astrology') . '</h6>'; ?>
                <?php echo '<p>' . __('Please try using our search box below to look for information on the internet.', 'astrology') . '</p>'; ?>
                <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
            </div><!--#error404 .post-->
        
        </div>
        <?php //get_sidebar('blog'); ?>
    </div> 
      
<?php get_footer(); ?>