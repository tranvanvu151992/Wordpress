<?php

/*

Template Name: Store Teacher

*/

get_header(); ?>

<div class="page-template-dokanorders-php">

    <div class="page-content"> 

        <div class="main-content" id="dokan-store">

            <h1 class="page-title" style="text-transform: none;">مؤلف: <?php $user_info = get_userdata($_GET['au_id']); echo ($user_info->user_login) ? $user_info->user_login : $user_info->user_login;//the_title(); ?></h1>

            <div class="post-content">

                <?php

                // Start the Query

                $v_args = array(

                    //'p'=>  $_lesson,

                    'post_type'     =>  'product', // your CPT

                    'author' =>   $_GET['au_id'],

                    //'tax_query'   =>  $tax_query

                );

                $SearchQuery = new WP_Query( $v_args );

                //var_dump($SearchQuery);

                ?>

                <script src="<?php bloginfo( 'stylesheet_directory' ) ?>/js/masonry.js" type="text/javascript"></script>

                <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>

                <script type="text/javascript">

                    jQuery(document).ready(function($){

                        $container = $('.products');

                        $container.imagesLoaded(function(){ 

                            $container.masonry({

                                itemSelector: '.product',

                            }); 

                        });   

                    });

                </script>

                <ul class="products">

                <?php

                if( $SearchQuery->have_posts() ) :while($SearchQuery->have_posts() ) : $SearchQuery->the_post(); global $woocommerce; global $product;?>

                

                    <?php wc_get_template_part( 'content', 'product' ); ?>

                <?php

                endwhile;

                else :

                  _e( 'لم يتم العثور على المنتجات', 'whattodo' );

                endif;

                wp_reset_postdata();

                ?>

                </ul>

            </div>

            <?php //echo premium_member(); ?>

        </div>

        <?php get_sidebar('right'); ?>

    </div>

</div>

<?php get_footer(); ?>