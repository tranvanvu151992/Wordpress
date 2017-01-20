<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package bloggr
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="grid grid-pad">
        	<div class="col-1-3">
            	<?php if( is_active_sidebar('footer-1') ): ?> 
            		<?php dynamic_sidebar('footer-1'); ?>
                <?php endif; ?>
            </div>
        	<div class="col-1-3">
            	<?php if( is_active_sidebar('footer-2') ): ?>
            		<?php dynamic_sidebar('footer-2'); ?>
                <?php endif; ?>
            </div>
        	<div class="col-1-3">
            	<?php if( is_active_sidebar('footer-3') ): ?>
            		<?php dynamic_sidebar('footer-3'); ?>
                <?php endif; ?> 
            </div>
			<div class="col-1-3">
            	<?php if( is_active_sidebar('footer-4') ): ?>
            		<?php dynamic_sidebar('footer-4'); ?>
                <?php endif; ?> 
            </div>
        </div>
		
    	<div class="grid grid-pad">
            <div class="col-1-1">
	<hr style="width:100%;background-color:#f1f1f1; color:#f1f1f1;">
                <div class="site-info">


<img src="<?php bloginfo('template_directory');?>/img/card.png" class="downArrow" />
				
               
                </div><!-- .site-info -->
				<div class="footer-text">
                    <?php if ( get_theme_mod( 'bloggr_footerid' ) ) : ?>
        				<?php echo esc_html( get_theme_mod( 'bloggr_footerid' )); ?>   
					<?php else : ?>  
    					<?php	printf( __( ' %1$s  %2$s', 'teachers-cafe' ), '@ 2016 teachers-cafe', '<a href="http://teachers-cafe.com" rel="designer"></a>' ); ?>
					<?php endif; ?>
                </div>
                	
                <?php if( get_theme_mod( 'active_social' ) == '') : ?>
                <div class="social-container">
                				<?php if ( get_theme_mod( 'bloggr_fb' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_fb' )); ?>">
                                    <i class="fa fa-facebook"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'bloggr_twitter' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_twitter' )); ?>">
                                    <i class="fa fa-twitter"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'bloggr_linked' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_linked' )); ?>">
                                    <i class="fa fa-linkedin"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'bloggr_google' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_google' )); ?>">
                                    <i class="fa fa-google-plus"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'bloggr_instagram' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_instagram' )); ?>">
                                    <i class="fa fa-instagram"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'bloggr_flickr' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_flickr' )); ?>">
                                    <i class="fa fa-flickr"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'bloggr_pinterest' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_pinterest' )); ?>">
                                    <i class="fa fa-pinterest"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'bloggr_youtube' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_youtube' )); ?>">
                                    <i class="fa fa-youtube"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'bloggr_vimeo' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_vimeo' )); ?>">
                                    <i class="fa fa-vimeo-square"></i>
                                    </a>
                                    </li> 
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'bloggr_tumblr' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_tumblr' )); ?>">
                                    <i class="fa fa-tumblr"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'bloggr_dribbble' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_dribbble' )); ?>">
                                    <i class="fa fa-dribbble"></i>
                                    </a>
                                    </li>
								<?php endif; ?>
                                <?php if ( get_theme_mod( 'bloggr_rss' ) ) : ?>
                                	<li>
                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_rss' )); ?>">  
                                    <i class="fa fa-rss"></i>
                                    </a>
                                    </li>   
								<?php endif; ?> 
                </div>
                 	 	<?php else : ?>  
					<?php endif; ?>
                <?php // end if ?> 
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
