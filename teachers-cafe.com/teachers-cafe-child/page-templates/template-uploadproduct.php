<?php
/**
 *  Template Name: upload product form
**/ 
get_header();?>
    <div class="grid grid-pad">
        <aside id="sidebar" class="column-left col-2-12">
            <?php 
                 if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-home-left')):
                 endif;
            ?>
    	</aside>
    	<div class="col-8-12">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                     <?php echo upload_product_front_end(); ?>
                </main><!-- #main -->
            </div><!-- #primary -->
    	</div>
        <?php get_sidebar(); ?>
        
    </div> 
<?php get_footer(); ?>