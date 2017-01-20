<?php

/*

Template Name: HomePage

*/

get_header();

$get = $_GET['ihc_register'];
if($get == 'create_message') {
?>
    <style type="text/css">
        .home .ihc-reg-success-msg {
            display: none;
        }
    </style>
    <div class="thanks-registering">
        <div class="insite-popout1">
            <div class="insite-popout2">
                <div class="insite-popout3">
                    <p class="thanks-close">X</p>
                    <p>Thanks for registering with us. We will contact you by email within 24 hours with more infomation about the next steps.</p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="page-content column-3">

    <?php get_sidebar('left'); ?>

    <div class="main-content">           

    <style type="text/css">

    #content{width:auto; height:400px; margin:50px;}

    </style>

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

    <div class="clear"></div>
    
    <div id="quicksearchs">

        <h3 class="quick-s">بحث سريع</h3>

        <?php

            $edu_Country = get_terms( 'edu-Country', array(

                'orderby'    => 'ASC',

                'hide_empty' => 0,

            ) );

            $edu_type = get_terms( 'edu-type', array(

                'orderby'    => 'ASC',

                'hide_empty' => 0,

            ) );

            $disability = get_terms( 'disability-type', array(

                'orderby'    => 'ASC',

                'hide_empty' => 0,

            ) );

            $edu_content = get_terms( 'edu-content', array(

                'orderby'    => 'ASC',

                'hide_empty' => 0,

            ) );

            $subject = get_terms( 'subject', array(

                'orderby'    => 'ASC',

                'hide_empty' => 0,

            ) );

            $grade = get_terms( 'grade', array(

                'orderby'    => 'ASC',

                'hide_empty' => 0,

            ) );

        ?>

       <!-- http://www.teachers-cafe.com/shop/?swoof=1&product_cat=educational-field-training-and-professional-development&subject=math&grade=kindergarten&edu-Country=brazil&edu-type=simple -->

        <form method="get" id="advanced-searchform" role="search" action="/shop/">

            <input name="swoof" value="1" hidden="true" />

            <ul>

                <li>

                    <label>الدولة</label>

                    <select name="edu-Country" id="Country">

                          <?php 

                          $i=1;

                          ?>

                          <option <?php if($i==1){echo 'selected="true"';} ?> value="">اختار</option>

                          <?php 

                          foreach($edu_Country as $edu_Countrys){ ?>

                          <option value="<?php echo $edu_Countrys->slug; ?>"><?php echo $edu_Countrys->name; ?></option>

                          <?php $i++; } ?>

                    </select>

                </li>

                <li>

                    <label>البائع</label>

                    <select id="Authors" class="Authors" name="woof_author">';

                        <option value="">اختار</option>';

                        <?php 
                        $args = array(
                            'role__in' => array('free_membership','premium_membership', 'basic_membership'),
                        );
                        $authors = get_users($args);
                        
                        foreach ( $authors as $user ) {

                            $user_login = $user->user_login;
    
                            //$role = $user->roles[0];  
                             
                            //if($role =='free_membership' || ($role =='seller' && $role =='premium_membership') || $role =='basic_membership'){
                                echo '<option value="'.$user->ID.'">'. $user_login. '</option>';
                            //}   

                        }  ?>

                    </select>

                </li>

                <li>

                    <label>المحتوى التعليمي</label>

                    <select name="product_cat" id="Education">

                         <?php

                            $taxonomy     = 'product_cat';

                            $orderby      = 'name';  

                            $show_count   = 0;      // 1 for yes, 0 for no

                            $pad_counts   = 0;      // 1 for yes, 0 for no

                            $hierarchical = 1;      // 1 for yes, 0 for no  

                            $title        = '';  

                            $empty        = 0;

                            

                            $args = array(

                            'taxonomy'     => $taxonomy,

                            //'orderby'      => $orderby,

                            'show_count'   => $show_count,

                            'pad_counts'   => $pad_counts,

                            'hierarchical' => $hierarchical,

                            'title_li'     => $title,

                            'hide_empty'   => $empty

                            );

                        ?>

                        <?php 

                        $i=1;

                         $all_categories = get_categories( $args ); 

                        ?>

                        <option <?php if($i==1){echo 'selected="true"';} ?> value="">اختار</option>

                        <?php

                        foreach ($all_categories as $cat) {

                          if($cat->category_parent == 0) {

                            $category_id = $cat->term_id;       

                            echo '<option value="'.$cat->slug.'">'. $cat->name .'</option>';

                          }

                        }

                        $i++;

                        ?>

                    </select>  

                </li>

                <li>

                    <label>الماده الدراسيه</label>

                    <select name="subject" class="cat_level_2" id="Subject">

                        <?php 

                        $i=1;

                        ?>

                            <option <?php if($i==1){echo 'selected="true"';} ?> value="">اختار</option>

                            <?php 

                            foreach($subject as $subject){ ?>

                            <option  value="<?php echo $subject->slug; ?>"><?php echo $subject->name; ?></option>

                        <?php $i++; } ?>            

                    </select>

                </li>

                <li>

                    <label>المرحله الدراسيه</label>

                    <select name="grade" class="cat_level_3" id="Grade">

                        <?php 

                        $i=1;

                        ?>

                            <option <?php if($i==1){echo 'selected="true"';} ?> value="">اختار</option>

                            <?php 

                            foreach($grade as $grade){ ?>

                            <option value="<?php echo $grade->slug; ?>"><?php echo $grade->name; ?></option>

                        <?php $i++; } ?>  

                     </select>

                </li>

                <!--

                <li>

                    <label>Lesson Title</label>

                    <select name="s" id="Lesson">

                        <?php 

                        $i=1;

                        ?>

                        <option <?php if($i==1){echo 'selected="true"';} ?> value="">Select</option>

                        <?php  

                        $args = array( 'post_type' => 'product', 'posts_per_page' => -1,);

                        $loop = new WP_Query( $args );

                        while ( $loop->have_posts() ) : $loop->the_post(); 

                        global $product; 

                        echo '<option value="'.get_the_ID().'">'.get_the_title().'</option>';

                        $i++; endwhile; 

                        wp_reset_query(); 

                    

                        ?>

                    </select>

                </li>

                -->

                <li>

                    <label>إحتياجات خاصة</label>

                    <select name="disability-type" id="Special">

                        <?php 

                        $i=1;

                        ?>

                        <option <?php if($i==1){echo 'selected="true"';} ?> value="">اختار</option>

                        <?php 

                        foreach($disability as $disability){ ?>

                        <option  value="<?php echo $disability->slug; ?>"><?php echo $disability->name; ?></option>

                        <?php $i++; } ?>  

                    </select>

                </li>

            </ul>

            <input type="submit" id="searchsubmit" value="بحث" class="btn" />

        </form>
        
    </div>
    
</div>

<?php get_footer(); ?>