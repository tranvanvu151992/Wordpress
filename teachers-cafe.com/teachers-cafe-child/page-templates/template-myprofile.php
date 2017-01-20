<?php

/**

 * Template Name: My Profile

**/ 

get_header();

?>

<script>

//    jQuery(document).ready(function($){

//        // load page event

//        var data = $('select[name=file_type] option:selected').attr('data');

//        $('select[name=price] option').css('display','none');

//        $('select[name=price] option[data='+data+']').css('display','block');

//        $('select[name=price] option[data='+data+'][order=order_1]').attr('selected','selected');

//        

//        // select file type event

//        $('select[name=file_type]').change(function(){

//            var data = $(this).find('option:selected').attr('data');

//            $('select[name=price] option').css('display','none');

//            $('select[name=price] option[data='+data+']').css('display','block');

//            $('select[name=price] option[data='+data+'][order=order_1]').attr('selected','selected');

//        })

//    })

</script>    

<?php 

//$cat_id = 604;

//if( have_rows('file_types', 'product_cat_'.$cat_id) ): 

//    $i=1;

//    while( have_rows('file_types', 'product_cat_604') ): the_row();

//        $file_type = get_sub_field_object('file_type'); 

//        $file_type_name = $file_type['choices'];

//        if($i==1){

//            $j=1;

//            echo '<select name="file_type">';

//            foreach($file_type_name as $key => $value){

//                echo '<option data='.$cat_id.'_'.$j.' value='.$key.'>'.$value.'</option>';

//            $j++;

//            }

//            echo '</select>';

//        }

//    $i++;

//	endwhile;

//endif; 

//if( have_rows('file_types', 'product_cat_'.$cat_id) ): 

//    $i=1;

//    echo '<select name="price">';

//    echo '<option>Choose Price</option>';   

//    while( have_rows('file_types', 'product_cat_604') ): the_row();

//        if( have_rows('price') ): 

//            $j=1;

//            while( have_rows('price') ): the_row();

//                $price = get_sub_field('price'); 

//                echo '<option style="display:none" value='.$price.' data='.$cat_id.'_'.$i.' order="order_'.$j.'">'.$price.'</option>';  

//            $j++;      

//            endwhile;

//        endif;

//    $i++;    

//	endwhile;

//    echo '</select>';

//endif; 

//

?>



<div class="page-content column-3">

    <?php get_sidebar('left'); ?>

    <div class="main-content">

        <h1 class="page-title"><?php the_title(); ?></h1>        

        <a href="/user-account/?ihc_ap_menu=profile" class="upload-product">تعديل الملف الشخصي</a>

        <div class="post-content">

            <?php 
                $current_user = wp_get_current_user();
            
            ?>

            <div class="info-left">

                <a href="/store/?au_id=<?php echo $current_user->ID; ?>"><img src="<?php $avatar = get_user_meta($current_user->ID, 'ihc_avatar', true);$avatar_url = wp_get_attachment_image_src($avatar);

                if($avatar_url){

                    echo $avatar_url[0]; 

                }else{

                    echo get_avatar_url($current_user->ID);

                }

                ?>" /></a> 

                <a class="view-store" href="/store/?au_id=<?php echo $current_user->ID; ?>">عرض متجر</a>

            </div>

            <div class="info-right">

                <ul class="user-dashboash">

                    <li>
                    <?php 
                    if ($current_user->roles[0] =='subscriber'){                        
                        echo '<span>زائر :</span>';
                    }else{
                        echo '<span>مؤلف:</span>';
                    }
                    ?>                    
                    
                    <?php 

                        if($current_user->user_firstname){

                            echo $current_user->user_firstname;

                        }else{

                            echo $current_user->user_login;

                        } ?>

                    </li>
<?php                     if ($current_user->roles[0] !='subscriber'){                         ?>
                    <li>
                        <div class="member">
                            <span>نوع العضوية :</span>
        
                                <?php //echo $current_user->roles[0]; 
        
                                    if(current_user_can('basic_membership')){
        
                                        echo 'عضوية أساسية';
        
                                    }else if(current_user_can('premium_membership')){
        
                                        echo 'Premium Membership';
        
                                    }else if(current_user_can('free_membership')){
        
                                        echo 'عضوية مجانية';
        
                                    }else if(current_user_can('administrator')){
        
                                        echo 'Admin';
        
                                    }else{
                                        echo 'Free';
                                    }
        
                                ?>
                        </div>
                        <a href="/upload-files/" class="upload-product">تحميل الملفات</a>
                    </li>

                    <li>

                        <?php 

                            if(current_user_can('basic_membership') || current_user_can('administrator') || current_user_can('premium_membership')){

                                echo progressbar();

                                echo '<span class="space-upload">مساحة لتحميل الملفات</span>'; 

                            }else{

                                echo 'تم تحميلها : '.count_files().'/4 ملفات';

                            }

                        ?>

                    </li>
                         <?php } ?>   
                </ul>

                <?php //echo $current_user->roles[0]; 

                    if(current_user_can('basic_membership')|| current_user_can('free_membership')){

                        echo '<a href="/upgrade-packpage/" class="upgrade-acc">Upgrade Packpage</a>';  

                    }

//                        else if(current_user_can('free_membership')){

//                            echo '<a href="/upgrade-packpage/" class="upgrade-acc">Upgrade Packpage</a>';

//                        }else if(current_user_can('administrator')){

//                            echo '<a href="/upgrade-packpage/" class="upgrade-acc">Upgrade Packpage</a>';

//                        }

                ?>

            </div>

            <!--

            <?php

            if ( have_posts() ) :

            	while ( have_posts() ) : the_post();

            ?>

                <ul class="left-col">

                    <li>

                        <span>First Name:</span><?php echo $current_user->user_firstname; ?>

                    </li>

                    <li>

                        <span>Last Name:</span><?php echo $current_user->user_lastname; ?>

                    </li>

                    <li>

                        <span>Date of Birth:</span><?php echo get_user_meta($current_user->ID, 'date-of-birth', true); ?>

                    </li>

                    <li>

                        <span>Country:</span><?php echo get_user_meta($current_user->ID, 'country', true); ?>

                    </li>

                    <li>

                        <span>ID/Passport No:</span><?php echo get_user_meta($current_user->ID, 'id-passport', true); ?>

                    </li>

                    <li>

                        <span>Address:</span><?php echo get_user_meta($current_user->ID, 'addr1', true); ?>

                    </li>

                    <li>

                        <span>Bank Name:</span><?php echo get_user_meta($current_user->ID, 'Bank-name', true); ?>

                    </li>

                    <li>

                        <span>A/C no:</span><?php echo get_user_meta($current_user->ID, 'ac-no', true); ?>

                    </li>

                </ul>

                <ul class="right-col">

                    <li>

                        <span>Phone:</span><?php echo get_user_meta($current_user->ID, 'phone', true); ?>

                    </li>

                    <li>

                        <span>Specialist:</span><?php echo get_user_meta($current_user->ID, 'specialist', true); ?>

                    </li>

                    <li>

                        <span>Email:</span><?php echo $current_user->user_email; ?>

                    </li>

                    <li>

                        <span>Biographical Info:</span><?php echo get_user_meta($current_user->ID, 'description', true); ?>

                    </li>

                    <li>

                        <span>Profile Photo:</span>

                        <div class="crop-image">

                            <img src="<?php $avatar = get_user_meta($current_user->ID, 'ihc_avatar', true);$avatar_url = wp_get_attachment_image_src($avatar);

                            if($avatar_url){

                                echo $avatar_url[0]; 

                            }else{

                                echo get_avatar_url($current_user->ID);

                            }

                            ?>" />

                        </div>

                    </li>

                </ul>

            <?php

            	endwhile;

            else :

            	//

            endif;

            ?>

            -->

        </div>

        <?php //echo premium_member(); ?>

    </div>

    <?php get_sidebar('right'); ?>

</div>

<?php get_footer(); ?>