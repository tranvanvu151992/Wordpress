<?php
/**
 * Template Name: Transacsion history
**/ 
get_header();
?>
 <div class="page-content">
<div class="main-content">
<div class="dokan-dashboard-wrap ">
    <?php //dokan_get_template( 'dashboard-nav.php', array( 'active_menu' => 'order' ) ); ?>

    <div class="dokan-dashboard-content dokan-orders-content">

        <article class="dokan-orders-area">
            <?php
            if(current_user_can('basic_membership') || current_user_can('premium_membership') || current_user_can('free_membership')){ 
            $current_user = wp_get_current_user(); ?>
            <ul class="user-dashboash">
                <li><span>مؤلف :</span><?php 
                                            if($current_user->user_firstname){
                                                echo $current_user->user_firstname;
                                            }else{
                                                echo $current_user->user_login;
                                            } ?>
                </li>
                <li><span>نوع العضوية :</span>
                    <?php //echo $current_user->roles[0]; 
                        if(current_user_can('basic_membership')){
                            echo 'عضوية أساسية';
                        }else if(current_user_can('premium_membership')){
                            echo 'عضوية ممتازة';
                        }else if(current_user_can('free_membership')){
                            echo 'Free Membership';
                        }
                    ?>
                </li>
                <li>
                    <?php 
                        if(current_user_can('basic_membership') || current_user_can('premium_membership')){
                            echo progressbar(); 
                        }
                    ?>
                </li>
            </ul>
            <?php 
                //if(current_user_can('basic_membership') || current_user_can('premium_membership')){
//                    echo progressbar(); 
//                }
            }else if(current_user_can('administrator')){ 
                
                $authors = get_users();
                $user_info = get_userdata($_GET['user_id']);
                foreach ( $authors as $author ) {
                    $author_id = $author->ID;
                    $author_info = get_userdata($author_id);
                    $author_roles = $author_info->roles;
                    if((in_array('free_membership',$author_roles))||(in_array('basic_membership',$author_roles))||(in_array('premium_membership',$author_roles))){
                        $first_author_id = $author_id;
                    }
                }
                if($_GET['user_id']){
                    //
                }else{
                    $_GET['user_id'] = $first_author_id;
                }
                
                $user_info = get_userdata($_GET['user_id']);
                $roles = $user_info->roles;
            ?>
            <ul class="user-dashboash">
                
                <li><span>مؤلف :</span><?php 
                                            if($user_info->user_firstname){
                                                echo $user_info->user_firstname;
                                            }else{
                                                echo $user_info->user_login;
                                            } ?>
                </li>
                <li><span>نوع العضوية :</span>
                    <?php //echo $user_info->roles[0]; 
                        if(in_array('premium_membership',$roles)){
                            echo 'عضوية ممتازة';
                        }else if(in_array('basic_membership',$roles)){
                            echo 'عضوية أساسية';
                        }else if(in_array('free_membership',$roles)){
                            echo 'عضوية مجانية';
                        }
                    ?>
                </li>
                <li>
                <?php 
                    if(in_array('premium_membership',$roles) || in_array('basic_membership',$roles)){
                        //echo progressbar(); 
                    }
                }
                ?>
                </li>
            </ul>
            <?php if ( isset( $_GET['order_id'] ) ) { ?>
                <a href="<?php echo dokan_get_navigation_url( 'orders' ) ; ?>" class="dokan-btn"><?php _e( '&larr; Orders', 'dokan' ); ?></a>
            <?php } else {
                //dokan_order_listing_status_filter();
            } ?>

            <?php
            $order_id = isset( $_GET['order_id'] ) ? intval( $_GET['order_id'] ) : 0;

            if ( $order_id ) {
                dokan_get_template_part( 'orders/order-details' );
            } else {
                ?>
    


                <?php
                dokan_get_template_part( 'orders/listing' );
            }
            ?>

        </article>

    </div> <!-- #primary .content-area -->

</div><!-- .dokan-dashboard-wrap -->

</div>
        <?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>