<?php

    $url = home_url();

?>

<div id="right-sidebar" class="widget-area" role="complementary">

    <?php 

    if(current_user_can('basic_membership') || current_user_can('administrator') || current_user_can('premium_membership')|| current_user_can('free_membership')){

        wp_nav_menu( array(

            'menu' => 'Member menu'

        ) );

    }else{

    ?>

    

    <ul id="menu-menu-right" class="menu">

        <li class="parent-category  vision">

            <a href="<?php echo esc_url( $url ); ?>/vision-2/">رؤيتنا</a>

        </li>

        <li class="parent-category  objective">

            <a href="<?php echo esc_url( $url ); ?>/objective-2/">هدفنا</a>

        </li>

        <?php

            $prod_categories = get_terms('product_cat', array(

                    'orderby'=> 'ID',

                    'order' => 'ASC',

                    'hide_empty' => 0,

                    'exclude' => array(597, 598)

            )); 

            $subject_taxonomy = get_terms('subject', array('hide_empty' => 0)); 

            $grade_taxonomy = get_terms('grade', array('hide_empty' => 0)); 

            $count = 0;

            foreach( $prod_categories as $prod_cat ) :

                // $terms = get_terms($taxonomyName, array('parent' => $prod_cat->term_id, 'orderby' => 'slug', 'hide_empty' => false));

                // $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );

                // $cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );

                $cat_get = $prod_cat->slug;

            ?>

            <?php 

                // if ($count != 0 && $count != 1) :

                    $child_class = 'menu-item-has-children';

                    $onclick = 'onlick="return false;"';

                    $term_link = '#';

                // else :

                //     $term_link = get_term_link( $prod_cat, 'product_cat' );

                // endif;

            ?>



            <li class="parent-category <?php echo $child_class.' '.$prod_cat->slug; ?>">

                <a href="<?php echo $term_link; ?>" <?php echo $onclick; ?>><?php echo $prod_cat->name; ?></a>

                <?php //if ($count != 0 && $count != 1) : ?>

                <ul class="sub-menu">

                    <?php 

                        foreach( $subject_taxonomy as $subject_term ) : 

                        $subject_get = $subject_term->slug;

                    ?>

                        <li class="parent-term menu-item-has-children <?php echo $subject_term->slug; ?>">

                            <a href="#" onlick="return false;"> - <?php echo $subject_term->name; ?></a>

                            <ul class="sub-child-menu" style="display:none;">

                                <?php 

                                    foreach( $grade_taxonomy as $grade_term ) :

                                    $grade_link = get_term_link( $grade_term, 'greade' );

                                ?>

                                    <li class="child-term <?php echo $grade_term->slug; ?>">

                                        <a href="<?php echo $grade_link.'?product_cat='.$cat_get.'&subject='.$subject_get; ?>"><?php echo $grade_term->name; ?></a>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </li>

                    <?php

                        $subject_get = '';

                        endforeach;

                    ?>

                </ul>

                <?php //endif;?>

            </li>

            <?php

                $cat_get = '';

                $count++;

            endforeach; 

            wp_reset_query(); 

        ?>

    </ul>





	<!-- <ul id="menu-menu-right" class="menu"> -->

	<?php

    	// $eduCountry = array();

    	// $eduCountry = wp_get_post_terms( $post_id, 'product_cat', array( 'fields' => 'ids') );

    	// include_once DOKAN_LIB_DIR.'/class.category-walker.php';

    	// wp_list_categories(array(

    	// 	'title_li'     => '',

    	// 	'id'           => 'product_cat',

    	// 	'hide_empty'   => 0,

    	// 	'taxonomy'     => 'product_cat',

    	// 	'walker' => new Navigation_Catwalker(),

    	// ));

	?>

	<!-- </ul> -->

    <?php } ?>

    <style type="text/css">

    	#right-sidebar .menu{margin-left: 0px;}

    	#right-sidebar ul.menu > li.menu-item-has-children,

        .parent-category,.sub-category-1 ,

        .sub-category-2,.sub-menu,.sub-child-menu {

            list-style: none;

        }

        #right-sidebar ul.menu > li.active > ul > li > a{

            background: rgba(0, 0, 0, 0) linear-gradient(to bottom, #95bb10 0%, #7b9a0d 100%) repeat scroll 0 0;

            border: 1px solid #97be10;

            border-radius: 5px;

            color: #ffffff;

            display: block;

            margin-bottom: 1px;

            padding: 5px 12px 5px 15px;

            font-size: 14px;

        }

        #right-sidebar ul.sub-menu > li.menu-item-has-children{

            position: relative;

        }

    	.sub-menu{

            margin-left: 0;

            padding: 0 !important;

        }

    	.sub-category-2 a,.sub-category-1 a{text-decoration: none;}

    </style>

	<?php dynamic_sidebar( 'sidebar-home-right' ); ?>

</div>