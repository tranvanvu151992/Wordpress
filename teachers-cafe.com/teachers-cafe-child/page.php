<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package bloggr
 */
get_header(); ?>
<div class="page-content column-3">
    <?php get_sidebar('left'); ?>
    <div class="main-content">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="post-content">
            <?php
            if ( have_posts() ) :
            	while ( have_posts() ) : the_post();
            		get_template_part( 'content', 'page' ); 
            	endwhile;
            else :
            	//
            endif;
            ?>
        </div>
        <?php //echo premium_member(); ?>
    </div>
    <?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>