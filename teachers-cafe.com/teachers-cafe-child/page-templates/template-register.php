<?php

/**

 * Template Name: Register Page

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

            ?>

                <div class="register-area">

                    <ul class="register-option">

                        <li>

                            <input type="radio" name="user_role" value="student"/><label>مشتري</label>

                        </li>

                        <li>

                            <input type="radio" name="user_role" value="author"/><label>بائع</label>

                        </li>

                    </ul>

                    <div id="student-register">

                        <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="false"]'); ?>

                    </div>

                    <div class="clear"></div>

                    <div id="author-register">

                        <?php echo do_shortcode('[ihc-select-level]'); ?>

                    </div>

                </div>

            <?php		

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