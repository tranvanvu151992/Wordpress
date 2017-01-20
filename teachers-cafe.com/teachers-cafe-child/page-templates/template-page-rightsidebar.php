<?php

/**

 * Template Name: Right Sidebar

 */

get_header(); ?>

<div class="page-content">

    <div class="main-content">

        <h1 class="page-title"><?php wp_title(""); ?></h1>

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

        <?php echo premium_member(); ?>

    </div>

    <?php get_sidebar('right'); ?>

</div>

<?php get_footer(); ?>