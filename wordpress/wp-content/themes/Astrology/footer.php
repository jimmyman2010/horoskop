    </section> <!-- end of .primary_content_wrap -->    
</div>    <!-- #main -->  


<div id="beforeFooter">
    <div class="container clearfix">
        <div class="row">  
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                <?php echo do_shortcode('[text-blocks id="before-footer"]'); ?> 
            </div>  
        </div>    
    </div> 
</div>

<footer id="footer" class="clearfix">
    <div class="container clearfix">
        <div class="row">  
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                <p>
                    <?php 
                        $myfooter_text = of_get_option('footer_text'); 
                        if($myfooter_text) {  echo of_get_option('footer_text'); }
                    ?>  
                </p>

                <div id="footer_socials">
                    <?php if ( ! dynamic_sidebar( 'Footer Area' ) ) : ?>                            
                    <?php endif ?>  
                </div>
            </div>
        </div>
    </div>
</footer>        
     
</div> <!--  end of #page -->

<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->
<?php if(of_get_option('ga_code')) { ?>
	<script type="text/javascript">
		<?php echo stripslashes(of_get_option('ga_code')); ?>
	</script>
  <!-- Show Google Analytics -->	

<?php } ?>

<!--   </div> end of #wrapMain -->
</body>
</html>




