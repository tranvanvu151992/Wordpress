<?php

global $post, $product;

wp_enqueue_script( 'dokan-tabs-scripts' );

$post_id        = $post->ID;
$seller_id      = get_current_user_id();
$from_shortcode = false;

if ( isset( $_GET['product_id'] ) ) {
    $post_id        = intval( $_GET['product_id'] );
    $post           = get_post( $post_id );
    $product        = get_product( $post_id );
    $from_shortcode = true;
}

// bail out if not author
if ( $post->post_author != $seller_id ) {
    wp_die( __( 'Access Denied', 'dokan' ) );
}

$_regular_price         = get_post_meta( $post_id, '_regular_price', true );
$_sale_price            = get_post_meta( $post_id, '_sale_price', true );
$is_discount            = !empty( $_sale_price ) ? true : false;
$_sale_price_dates_from = get_post_meta( $post_id, '_sale_price_dates_from', true );
$_sale_price_dates_to   = get_post_meta( $post_id, '_sale_price_dates_to', true );

$_sale_price_dates_from = !empty( $_sale_price_dates_from ) ? date_i18n( 'Y-m-d', $_sale_price_dates_from ) : '';
$_sale_price_dates_to   = !empty( $_sale_price_dates_to ) ? date_i18n( 'Y-m-d', $_sale_price_dates_to ) : '';
$show_schedule          = false;

if ( !empty( $_sale_price_dates_from ) && !empty( $_sale_price_dates_to ) ) {
    $show_schedule = true;
}

$_featured       = get_post_meta( $post_id, '_featured', true );
$_weight         = get_post_meta( $post_id, '_weight', true );
$_length         = get_post_meta( $post_id, '_length', true );
$_width          = get_post_meta( $post_id, '_width', true );
$_height         = get_post_meta( $post_id, '_height', true );
$_downloadable   = get_post_meta( $post_id, '_downloadable', true );
$_stock_status   = get_post_meta( $post_id, '_stock_status', true );
$_visibility     = get_post_meta( $post_id, '_visibility', true );
$_enable_reviews = $post->comment_status;

if ( ! $from_shortcode ) {
    get_header();
}
?>

<div class="dokan-dashboard-wrap">
    <?php //dokan_get_template( 'dashboard-nav.php', array( 'active_menu' => 'product' ) ); ?>
    <?php //echo progressbar(); 
        //if(current_user_can('free_membership')){
            //echo '<span class="count-file">Uploaded '.count_files().'/4 files</span>';
        //}
    ?>
    <script>
        jQuery(document).ready(function($){
         $('input.input_text.wc_file_url').val(); 
          // alert(file);
        });         
    </script>
    <div class="dokan-dashboard-content dokan-product-edit">
        <header class="dokan-dashboard-header dokan-clearfix">
            <h1 class="entry-title">
                <?php if ( !$post_id ): ?>
                    <?php _e( 'Add New Product', 'dokan' ); ?>
                <?php else: ?>
                    <?php _e( 'Edit Product', 'dokan' ); ?>
                    <?php if(current_user_can('administrator')||current_user_can('basic_membership') || current_user_can('premium_membership')){ ?>
                        <script>
                            jQuery(document).ready(function($){
                                $('.dokan-btn.dokan-btn-theme.dokan-btn-lg.btn-block').click(function(e){
                                    var url = $('.input_text.wc_file_url').val();
                                    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';     
                                    var data = {
                                        'action': 'check_file_size',
                                        'url':url
                                    };
                                    jQuery.post(ajaxurl, data, function(response) {
                                        if(response != ''){
                                            $('#result_file').html(response);     
                                        }
                                    });
                                    return false;
                                });
                            })
                        </script>
                    <?php }else if(current_user_can('free_membership')){ ?>
                        <script>
                            jQuery(document).ready(function($){
                                $('a.dokan-btn.dokan-btn-sm.dokan-btn-danger.delete').click(function(){
                                    var current_count = $('.current_count_file').val();
                                    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';     
                                    var data = {
                                        'action': 'check_count_file_after_delete',
                                        'current_count':current_count
                                    };
                                    jQuery.post(ajaxurl, data, function(response) {
                                        if(response != ''){
                                            $('.current_count_file').val(response);     
                                        }
                                    });
                                });
                                $('input.dokan-btn.dokan-btn-theme.dokan-btn-lg.btn-block').click(function(){
                                    // if( $('input[type=checkbox]#_create_variation').is(':checked') ) {
                                        
                                    // } else {
                                    //     alert(1);
                                    // }
                                    var current_count = $('.current_count_file').val();
                                    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';     
                                    var data = {
                                        'action': 'check_count_file',
                                        'current_count':current_count
                                    };
                                    jQuery.post(ajaxurl, data, function(response) {
                                        if(response != ''){
                                            $('#result_file').html(response);     
                                        }
                                    });
                                    return false;
                                })
                            })
                        </script>
                    <?php } ?>
                    <div id="result_file"></div>
                    <span class="dokan-label <?php echo dokan_get_post_status_label_class( $post->post_status ); ?> dokan-product-status-label">
                        <?php echo dokan_get_post_status( $post->post_status ); ?>
                    </span>

                    <?php if ( $post->post_status == 'publish' ) { ?>
                        <span class="dokan-right">
                            <a class="view-product dokan-btn dokan-btn-sm" href="<?php echo get_permalink( $post->ID ); ?>" target="_blank"><?php _e( 'View Product', 'dokan' ); ?></a>
                        </span>
                    <?php } ?>

                    <?php if ( $_visibility == 'hidden' ) { ?>
                        <span class="dokan-right dokan-label dokan-label-default dokan-product-hidden-label"><i class="fa fa-eye-slash"></i> <?php _e( 'Hidden', 'dokan' ); ?></span>
                    <?php } ?>

                <?php endif ?>
            </h1>
        </header><!-- .entry-header -->

        <div class="product-edit-new-container">
            <?php if ( Dokan_Template_Shortcodes::$errors ) { ?>
                <div class="dokan-alert dokan-alert-danger">
                    <a class="dokan-close" data-dismiss="alert">&times;</a>
                    <?php $dem = 1; ?>
                    <?php foreach ( Dokan_Template_Shortcodes::$errors as $error) { ?>
                        <?php  $dem++; ?>
                        <?php echo '<span class="error'.$dem.' error-general">'.$error.'</span>'; ?>

                    <?php } ?>
                </div>
            <?php } ?>

            <?php if ( isset( $_GET['message'] ) && $_GET['message'] == 'success') { ?>
                <div class="dokan-message">
                    <button type="button" class="dokan-close" data-dismiss="alert">&times;</button>
                    <strong><?php _e( 'Success!', 'dokan' ); ?></strong> <?php _e( 'The product has been saved successfully.', 'dokan' ); ?>

                    <?php if ( $post->post_status == 'publish' ) { ?>
                        <a href="<?php echo get_permalink( $post_id ); ?>" target="_blank"><?php _e( 'View Product &rarr;', 'dokan' ); ?></a>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php
            $can_sell = apply_filters( 'dokan_can_post', true );

            if ( $can_sell ) {

                if ( dokan_is_seller_enabled( get_current_user_id() ) ) { ?>

                    <form id="upload-f" class="dokan-product-edit-form" role="form" method="post">

                        <?php if ( $post_id ): ?>
                            <?php do_action( 'dokan_product_data_panel_tabs' ); ?>
                        <?php endif; ?>
                        <?php do_action( 'dokan_product_edit_before_main' ); ?>

                        <div class="dokan-form-top-area">

                            <div class="content-half-part">

                                <div class="dokan-form-group">
                                    <input type="hidden" name="dokan_product_id" value="<?php echo $post_id; ?>">

                                    <label for="post_title" class="form-label"><?php _e( 'Title', 'dokan' ); ?></label>
                                    <?php dokan_post_input_box( $post_id, 'post_title', array( 'placeholder' => __( 'Product name..', 'dokan' ), 'value' => $post_title ) ); ?>
                                </div>
                                <div class="dokan-product-short-description">
                                    <input type="hidden" name="dokan_product_id" value="<?php echo $post_id; ?>"/>
                                    <label for="post_excerpt" class="form-label"><?php _e( 'Abstrac of file', 'dokan' ); ?></label>
                                    <?php dokan_post_input_box( $post_id, 'post_excerpt', array( 'placeholder' => __( '250 characters.', 'dokan' ), 'value' => $post_excerpt),'textarea' ); ?>
                                </div>
                                <!--<div class="hide_if_variation dokan-clearfix" style="display: none;">

                                    <div class="dokan-form-group dokan-clearfix dokan-price-container">

                                        <div class="content-half-part regular-price">
                                            <label for="_regular_price" class="form-label"><?php _e( 'Price', 'dokan' ); ?></label>

                                            <div class="dokan-input-group">
                                                <span class="dokan-input-group-addon"><?php echo get_woocommerce_currency_symbol(); ?></span>
                                                <?php dokan_post_input_box( $post_id, '_regular_price', array( 'placeholder' => __( '0.00', 'dokan' ) ), 'number' ); ?>
                                            </div>
                                        </div>

                                        <div class="content-half-part sale-price">
                                            <label for="_sale_price" class="form-label"><?php _e( 'Discounted Price', 'dokan' ); ?></label>

                                            <div class="dokan-input-group">
                                                <span class="dokan-input-group-addon"><?php echo get_woocommerce_currency_symbol(); ?></span>
                                                <?php dokan_post_input_box( $post_id, '_sale_price', array( 'placeholder' => __( '0.00', 'dokan' ) ), 'number' ); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="discount-price dokan-form-group">
                                        <label>
                                            <input type="checkbox" <?php //checked( $is_discount, true ); ?> class="sale-schedule"> <?php //_e( 'Schedule Discounted Price', 'dokan' ); ?>
                                        </label>
                                    </div>

                                    <div class="sale-schedule-container dokan-clearfix dokan-form-group">
                                        <div class="content-half-part from">
                                            <div class="dokan-input-group">
                                                <span class="dokan-input-group-addon"><?php //_e( 'From', 'dokan' ); ?></span>
                                                <input type="text" name="_sale_price_dates_from" class="dokan-form-control datepicker" value="<?php //echo esc_attr( $_sale_price_dates_from ); ?>" maxlength="10" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" placeholder="YYYY-MM-DD">
                                            </div>
                                        </div>

                                        <div class="content-half-part to">
                                            <div class="dokan-input-group">
                                                <span class="dokan-input-group-addon"><?php //_e( 'To', 'dokan' ); ?></span>
                                                <input type="text" name="_sale_price_dates_to" class="dokan-form-control datepicker" value="<?php //echo esc_attr( $_sale_price_dates_to ); ?>" maxlength="10" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" placeholder="YYYY-MM-DD">
                                            </div>
                                        </div>
                                    </div>
                                </div><!--.sale-schedule-container -->
                                
                                <!-- Taxonomy Edu Country -->
                                <?php if ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ): ?>
                                    <div class="dokan-form-group">
                                        <label for="edu-Country" class="form-label"><?php _e( 'Educational Country', 'dokan' ); ?></label>
                                        <?php
                                        $eduCountry = -1;
                                        $eduCountry = array();
                                        $eduCountry = wp_get_post_terms( $post_id, 'edu-Country', array( 'fields' => 'ids') );

                                        if ( $eduCountry ) {
                                            $eduCountry = reset( $eduCountry );
                                        }

                                        wp_dropdown_categories( array(
                                            'show_option_none' => __( '- Select a Educational Country -', 'dokan' ),
                                            'hierarchical'     => 1,
                                            'hide_empty'       => 0,
                                            'name'             => 'edu-Country',
                                            'id'               => 'edu-Country',
                                            'taxonomy'         => 'edu-Country',
                                            'title_li'         => '',
                                            'class'            => 'edu-Country dokan-form-control chosen',
                                            'exclude'          => '',
                                            'selected'         => $eduCountry,
                                            ) );
                                            ?>
                                    </div>
                                <?php elseif ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'multiple' ): ?>
                                    <div class="dokan-form-group dokan-list-category-box">
                                        <h5><?php _e( 'Choose a Educational Country', 'dokan' );  ?></h5>
                                        <ul class="dokan-checkbox-cat">
                                        <?php
                                        $eduCountry = array();
                                        $eduCountry = wp_get_post_terms( $post_id, 'edu-Country', array( 'fields' => 'ids') );

                                        include_once DOKAN_LIB_DIR.'/class.category-walker.php';
                                        wp_list_categories(array(
                                            'walker'       => new DokanCategoryWalker(),
                                            'title_li'     => '',
                                            'id'           => 'edu-Country',
                                            'hide_empty'   => 0,
                                            'taxonomy'     => 'edu-Country',
                                            'hierarchical' => 1,
                                            'selected'     => $eduCountry
                                            ));
                                            ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <!-- Taxonomy Educational Type -->
                                <?php if ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ): ?>
                                    <div class="dokan-form-group">
                                        <label for="edu-type" class="form-label"><?php _e( 'Educational Type', 'dokan' ); ?></label>
                                        <?php
                                        $edutype = -1;
                                        $edutype = array();
                                        $edutype = wp_get_post_terms( $post_id, 'edu-type', array( 'fields' => 'ids') );

                                        if ( $edutype ) {
                                            $edutype = reset( $edutype );
                                        }

                                        wp_dropdown_categories( array(
                                            'show_option_none' => __( '- Select a Educational Type -', 'dokan' ),
                                            'hierarchical'     => 1,
                                            'hide_empty'       => 0,
                                            'name'             => 'edu-type',
                                            'id'               => 'edu-type',
                                            'taxonomy'         => 'edu-type',
                                            'title_li'         => '',
                                            'class'            => 'edu-type dokan-form-control chosen',
                                            'exclude'          => '',
                                            'selected'         => $edutype,
                                            ) );
                                            ?>
                                    </div>
                                <?php elseif ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'multiple' ): ?>
                                    <div class="dokan-form-group dokan-list-category-box">
                                        <h5><?php _e( 'Choose a Educational Type', 'dokan' );  ?></h5>
                                        <ul class="dokan-checkbox-cat">
                                            <?php
                                            $edutype = array();
                                            $edutype = wp_get_post_terms( $post_id, 'edu-type', array( 'fields' => 'ids') );

                                            include_once DOKAN_LIB_DIR.'/class.category-walker.php';
                                            wp_list_categories(array(
                                                'walker'       => new DokanCategoryWalker(),
                                                'title_li'     => '',
                                                'id'           => 'edu-type',
                                                'hide_empty'   => 0,
                                                'taxonomy'     => 'edu-type',
                                                'hierarchical' => 1,
                                                'selected'     => $edutype
                                                ));
                                                ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <!-- Taxonomy Disability Type -->
                                <?php if ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ): ?>
                                    <div class="dokan-form-group">
                                        <label for="disability-type" class="form-label"><?php _e( 'Disability Type', 'dokan' ); ?></label>
                                        <?php
                                        $disability = -1;
                                        $disability = array();
                                        $disability = wp_get_post_terms( $post_id, 'disability-type', array( 'fields' => 'ids') );

                                        if ( $disability ) {
                                            $disability = reset( $disability );
                                        }
                                        wp_dropdown_categories( array(
                                            'show_option_none' => __( '- Select a Disability Type -', 'dokan' ),
                                            'hierarchical'     => 1,
                                            'hide_empty'       => 0,
                                            'name'             => 'disability-type',
                                            'id'               => 'disability-type',
                                            'taxonomy'         => 'disability-type',
                                            'title_li'         => '',
                                            'class'            => 'disability-type dokan-form-control chosen',
                                            'exclude'          => '',
                                            'selected'         => $disability,
                                            ) );
                                            ?>
                                        </div>
                                    <?php elseif ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'multiple' ): ?>
                                        <div class="dokan-form-group dokan-list-category-box">
                                            <h5><?php _e( 'Choose a Disability Type', 'dokan' );  ?></h5>
                                            <ul class="dokan-checkbox-cat">
                                            <?php
                                            $disability = array();
                                            $disability = wp_get_post_terms( $post_id, 'disability-type', array( 'fields' => 'ids') );

                                            include_once DOKAN_LIB_DIR.'/class.category-walker.php';
                                            wp_list_categories(array(
                                                'walker'       => new DokanCategoryWalker(),
                                                'title_li'     => '',
                                                'id'           => 'disability-type',
                                                'hide_empty'   => 0,
                                                'taxonomy'     => 'disability-type',
                                                'hierarchical' => 1,
                                                'selected'     => $disability
                                                ));
                                                ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                <?php if ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ): ?>
                                    <div class="dokan-form-group content-relation">
                                        <label for="product_cat" class="form-label"><?php _e( 'Educational Content', 'dokan' ); ?></label>
                                        <?php
                                        $product_cat = -1;
                                        $term = array();
                                        $term = wp_get_post_terms( $post_id, 'product_cat', array( 'fields' => 'ids') );

                                        if ( $term ) {
                                            $product_cat = reset( $term );
                                        }

                                        wp_dropdown_categories( array(
                                            'show_option_none' => __( '- Select a category -', 'dokan' ),
                                            'hierarchical'     => 1,
                                            'hide_empty'       => 0,
                                            'name'             => 'product_cat',
                                            'id'               => 'product_cat',
                                            'taxonomy'         => 'product_cat',
                                            'title_li'         => '',
                                            'class'            => 'product_cat dokan-form-control chosen',
                                            'exclude'          => '',
                                            'selected'         => $product_cat,
                                        ) );
                                        ?>
                                    </div>
                                <?php elseif ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'multiple' ): ?>
                                    <div class="dokan-form-group dokan-list-category-box">
                                        <h5><?php _e( 'Choose a category', 'dokan' );  ?></h5>
                                        <ul class="dokan-checkbox-cat">
                                            <?php
                                            $term = array();
                                            $term = wp_get_post_terms( $post_id, 'product_cat', array( 'fields' => 'ids') );

                                            include_once DOKAN_LIB_DIR.'/class.category-walker.php';
                                            wp_list_categories(array(
                                                'walker'       => new DokanCategoryWalker(),
                                                'title_li'     => '',
                                                'id'           => 'product_cat',
                                                'hide_empty'   => 0,
                                                'taxonomy'     => 'product_cat',
                                                'hierarchical' => 1,
                                                'selected'     => $term
                                            ));
                                            ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <?php if ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ): ?>
                                    <div class="dokan-form-group file_type">
                                        <label for="file-type" class="form-label"><?php _e( 'File Type', 'dokan' ); ?></label>
                                        <?php 
                                        $product_filetype = array();
                                        $product_filetype = get_option('file_type');
                                        $myArray = explode("|", $product_filetype);                                                
                                        ?>
                                        <select id="file-type" name="file-type" class="product_cat product_cat_upload dokan-form-control chosen cat_level_1">
                                        <option value="-1" >- Select file type -</option>
                                        <?php 
                                        $i=1;
                                        foreach($myArray as $my_Array){ 
                                            echo '<option class="level-'.$i.'" value="'.$i.'">'.$my_Array.'</option>';                                                    
                                        $i++;
                                        }                                            
                                        ?>  
                                        </select>
                                        
                                    </div>
                                <?php endif; ?>
                                
                                <div class="dokan-form-group select_price" style="display: none;" >
                                    <label for="select-price" class="form-label"><?php _e( 'Select Price', 'dokan' ); ?></label>
                                    <?php 
                                        $product_price = array();
                                        $product_price = get_option('new_price');
                                        $myArray = explode("|", $product_price);                                               
                                        ?>
                                        <select id="select-price" name="_regular_price" class="product_cat product_cat_upload dokan-form-control chosen cat_level_1">
                                        <option value="-1">- Select Price -</option>
                                        <?php 
                                        $i=0;
                                        foreach($myArray as $my_Array){ 
                                            echo '<option class="level-'.$i.'" value="'.$my_Array.'">$'.$my_Array.'</option>';                                                    
                                        $i++;
                                        }                                            
                                        ?>  
                                        </select>
                                    
                                </div>
                                <?php if ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ): ?>
                                    <div class="dokan-form-group hide_cat_special">
                                        <label for="subject" class="form-label"><?php _e( 'Subject', 'dokan' ); ?></label>
                                        <?php
                                        $subject = -1;
                                        $subject = array();
                                        $subject = wp_get_post_terms( $post_id, 'subject', array( 'fields' => 'ids') );

                                        if ( $subject ) {
                                            $subject = reset( $subject );
                                        }

                                        wp_dropdown_categories( array(
                                            'show_option_none' => __( '- Select a Subject -', 'dokan' ),
                                            'hierarchical'     => 1,
                                            'hide_empty'       => 0,
                                            'name'             => 'subject',
                                            'id'               => 'subject',
                                            'taxonomy'         => 'subject',
                                            'title_li'         => '',
                                            'class'            => 'subject dokan-form-control chosen',
                                            'exclude'          => '',
                                            'selected'         => $subject,
                                            ) );
                                            ?>
                                    </div>
                                <?php elseif ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'multiple' ): ?>
                                    <div class="dokan-form-group dokan-list-category-box">
                                        <h5><?php _e( 'Choose a Subject', 'dokan' );  ?></h5>
                                        <ul class="dokan-checkbox-cat">
                                        <?php
                                        $subject = array();
                                        $subject = wp_get_post_terms( $post_id, 'subject', array( 'fields' => 'ids') );

                                        include_once DOKAN_LIB_DIR.'/class.category-walker.php';
                                        wp_list_categories(array(
                                            'walker'       => new DokanCategoryWalker(),
                                            'title_li'     => '',
                                            'id'           => 'subject',
                                            'hide_empty'   => 0,
                                            'taxonomy'     => 'subject',
                                            'hierarchical' => 1,
                                            'selected'     => $subject
                                            ));
                                            ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <?php if ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ): ?>
                                    <div class="dokan-form-group hide_cat_special">
                                        <label for="grade" class="form-label"><?php _e( 'Grade', 'dokan' ); ?></label>
                                        <?php
                                        $grade = -1;
                                        $grade = array();
                                        $grade = wp_get_post_terms( $post_id, 'grade', array( 'fields' => 'ids') );

                                        if ( $grade ) {
                                            $grade = reset( $grade );
                                        }

                                        wp_dropdown_categories( array(
                                            'show_option_none' => __( '- Select a Grade -', 'dokan' ),
                                            'hierarchical'     => 1,
                                            'hide_empty'       => 0,
                                            'name'             => 'grade',
                                            'id'               => 'grade',
                                            'taxonomy'         => 'grade',
                                            'title_li'         => '',
                                            'class'            => 'grade dokan-form-control chosen',
                                            'exclude'          => '',
                                            'selected'         => $grade,
                                            ) );
                                            ?>
                                    </div>
                                <?php elseif ( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'multiple' ): ?>
                                    <div class="dokan-form-group dokan-list-category-box">
                                        <h5><?php _e( 'Choose a Grade', 'dokan' );  ?></h5>
                                        <ul class="dokan-checkbox-cat">
                                        <?php
                                        $grade = array();
                                        $grade = wp_get_post_terms( $grade, 'grade', array( 'fields' => 'ids') );

                                        include_once DOKAN_LIB_DIR.'/class.category-walker.php';
                                        wp_list_categories(array(
                                            'walker'       => new DokanCategoryWalker(),
                                            'title_li'     => '',
                                            'id'           => 'grade',
                                            'hide_empty'   => 0,
                                            'taxonomy'     => 'grade',
                                            'hierarchical' => 1,
                                            'selected'     => $grade
                                            ));
                                            ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                
                                <!--<div class="dokan-form-group">
                                    <label for="product_tag" class="form-label"><?php _e( 'Tags', 'dokan' ); ?></label>
                                    <?php
                                    /*require_once DOKAN_LIB_DIR.'/class.tag-walker.php';
                                    $term = wp_get_post_terms( $post_id, 'product_tag', array( 'fields' => 'ids') );
                                    $selected = ( $term ) ? $term : array();
                                    $drop_down_tags = wp_dropdown_categories( array(
                                        'show_option_none' => __( '', 'dokan' ),
                                        'hierarchical'     => 1,
                                        'hide_empty'       => 0,
                                        'name'             => 'product_tag[]',
                                        'id'               => 'product_tag',
                                        'taxonomy'         => 'product_tag',
                                        'title_li'         => '',
                                        'class'            => 'product_tags dokan-form-control chosen',
                                        'exclude'          => '',
                                        'selected'         => $selected,
                                        'echo'             => 0,
                                        'walker'           => new Dokan_Walker_Tag_Multi()
                                    ) );

                                    echo str_replace( '<select', '<select data-placeholder="'.__( 'Select product tags','dokan' ).'" multiple="multiple" ', $drop_down_tags );
                                    */
                                    ?>
                                </div><!-- .content-half-part -->
                            </div>

                            <div class="content-half-part featured-image">

                                <div class="dokan-feat-image-upload">
                                    <?php
                                    $wrap_class        = ' dokan-hide';
                                    $instruction_class = '';
                                    $feat_image_id     = 0;

                                    if ( has_post_thumbnail( $post_id ) ) {
                                        $wrap_class        = '';
                                        $instruction_class = ' dokan-hide';
                                        $feat_image_id     = get_post_thumbnail_id( $post_id );
                                    }
                                    ?>

                                    <div class="instruction-inside<?php echo $instruction_class; ?>">
                                        <input type="hidden" name="feat_image_id" class="dokan-feat-image-id" value="<?php echo $feat_image_id; ?>">

                                        <i class="fa fa-cloud-upload"></i>
                                        <a href="#" class="dokan-feat-image-btn btn btn-sm"><?php _e( 'Upload a product cover image', 'dokan' ); ?></a>
                                    </div>

                                    <div class="image-wrap<?php echo $wrap_class; ?>">
                                        <a class="close dokan-remove-feat-image">&times;</a>
                                        <?php if ( $feat_image_id ) { ?>
                                            <?php echo get_the_post_thumbnail( $post_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array( 'height' => '', 'width' => '' ) ); ?>
                                        <?php } else { ?>
                                            <img height="" width="" src="" alt="">
                                        <?php } ?>
                                    </div>
                                </div><!-- .dokan-feat-image-upload -->

                                <div class="dokan-product-gallery">
                                    <div class="dokan-side-body" id="dokan-product-images">
                                        <div id="product_images_container">
                                            <ul class="product_images dokan-clearfix">
                                                <?php
                                                $product_images = get_post_meta( $post_id, '_product_image_gallery', true );
                                                $gallery = explode( ',', $product_images );

                                                if ( $gallery ) {
                                                    foreach ($gallery as $image_id) {
                                                        if ( empty( $image_id ) ) {
                                                            continue;
                                                        }

                                                        $attachment_image = wp_get_attachment_image_src( $image_id, 'thumbnail' );
                                                        ?>
                                                        <li class="image" data-attachment_id="<?php echo $image_id; ?>">
                                                            <img src="<?php echo $attachment_image[0]; ?>" alt="">
                                                            <a href="#" class="action-delete" title="<?php esc_attr_e( 'Delete image', 'dokan' ); ?>">&times;</a>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>

                                            <input type="hidden" id="product_image_gallery" name="product_image_gallery" value="<?php echo esc_attr( $product_images ); ?>">
                                        </div>

                                        <a href="#" class="add-product-images dokan-btn dokan-btn-sm dokan-btn-success"><?php _e( '+ Add more images', 'dokan' ); ?></a>
                                    </div>
                                </div> <!-- .product-gallery -->
                            </div><!-- .content-half-part -->
                        </div><!-- .dokan-form-top-area -->

                        <!--<div class="dokan-product-short-description">
                            <label for="post_excerpt" class="form-label"><?php _e( 'Short Description', 'dokan' ); ?></label>
                            <?php wp_editor( esc_textarea( wpautop( $post_excerpt ) ), 'post_excerpt', array('editor_height' => 50, 'quicktags' => false, 'media_buttons' => false, 'teeny' => true, 'editor_class' => 'post_excerpt') ); ?>
                        </div>

                        <div class="dokan-product-description">
                            <label for="post_content" class="form-label"><?php _e( 'Description', 'dokan' ); ?></label>
                            <?php wp_editor( esc_textarea( wpautop( $post_content ) ), 'post_content', array('editor_height' => 50, 'quicktags' => false, 'media_buttons' => false, 'teeny' => true, 'editor_class' => 'post_content') ); ?>
                        </div>-->

                        <?php do_action( 'dokan_new_product_form' ); ?>
                        <?php if ( $post_id ): ?>
                            <?php do_action( 'dokan_product_edit_after_main' ); ?>
                        <?php endif; ?>
                        <div class="dokan-product-inventory dokan-clearfix">
                            <div class="dokan-side-left" style="display: none;">
                                <h2><?php _e( 'Inventory & Variants', 'dokan' ); ?></h2>

                                <p>
                                    <?php _e( 'Manage inventory, and configure the options for selling this product.', 'dokan' ); ?>
                                </p>
                            </div>

                            <div class="dokan-side-right">
                                <!--<div class="dokan-form-group hide_if_variation" style="width: 50%;display: none !important;">
                                    <label for="_sku" class="form-label"><?php _e( 'SKU', 'dokan' ); ?> <span><?php _e( '(Stock Keeping Unit)', 'dokan' ); ?></span></label>
                                    <?php dokan_post_input_box( $post_id, '_sku' ); ?>
                                </div>

                                <div class="dokan-form-group hide_if_variation" style="display: none !important;">
                                    <?php dokan_post_input_box( $post_id, '_manage_stock', array( 'label' => __( 'Enable product stock management', 'dokan' ) ), 'checkbox' ); ?>
                                </div>-->

                                <!--<div class="show_if_stock dokan-stock-management-wrapper dokan-form-group dokan-clearfix">

                                    <div class="dokan-w3 hide_if_variation">
                                        <label for="_stock" class="dokan-form-label"><?php _e( 'Quantity', 'dokan' ); ?></label>
                                        <input type="number" name="_stock" placeholder="<?php __( '1', 'dokan' ); ?>" value="<?php echo wc_stock_amount( $_stock ); ?>" min="0" step="1">
                                    </div>

                                    <div class="dokan-w3 hide_if_variation">
                                        <label for="_stock_status" class="dokan-form-label"><?php _e( 'Stock Status', 'dokan' ); ?></label>

                                        <?php dokan_post_input_box( $post_id, '_stock_status', array( 'options' => array(
                                            'instock'     => __( 'In Stock', 'dokan' ),
                                            'outofstock' => __( 'Out of Stock', 'dokan' ),
                                        ) ), 'select' ); ?>
                                    </div>

                                    <div class="dokan-w3 hide_if_variation">
                                        <label for="_backorders" class="dokan-form-label"><?php _e( 'Allow Backorders', 'dokan' ); ?></label>

                                        <?php dokan_post_input_box( $post_id, '_backorders', array( 'options' => array(
                                            'no'     => __( 'Do not allow', 'dokan' ),
                                            'notify' => __( 'Allow but notify customer', 'dokan' ),
                                            'yes'    => __( 'Allow', 'dokan' )
                                        ) ), 'select' ); ?>
                                    </div>
                                </div><!-- .show_if_stock -->

                                <div class="dokan-form-group" style="display: none;">
                                    <?php dokan_post_input_box( $post_id, '_sold_individually', array('label' => __( 'Allow only one quantity of this product to be bought in a single order', 'dokan' ) ), 'checkbox' ); ?>
                                </div>

                                <?php if ( $post_id ): ?>
                                    <?php do_action( 'dokan_product_edit_after_inventory' ); ?>
                                <?php endif; ?>

                                <div class="dokan-clearfix downloadable downloadable_files hide_if_variation">
                                    <label class="dokan-checkbox-inline dokan-form-label" for="_downloadable">
                                        <input type="checkbox" id="_downloadable" name="_downloadable" value="yes" <?php checked( $_downloadable, 'yes' ); ?>>
                                        <?php _e( 'This is a downloadable product', 'dokan' ); ?>
                                    </label>


                                    <?php if ( $post_id ): ?>
                                        <?php do_action( 'dokan_product_edit_before_sidebar' ); ?>
                                    <?php endif; ?>
                                    <div class="dokan-side-body dokan-download-wrapper<?php echo ( $_downloadable == 'yes' ) ? '' : ' dokan-hide'; ?>">

                                        <table class="dokan-table dokan-table-condensed">
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2">
                                                        <a href="#" class="insert-file-row dokan-btn dokan-btn-sm dokan-btn-success" data-row="<?php
                                                            $file = array(
                                                                'file' => '',
                                                                'name' => ''
                                                            );
                                                            ob_start();
                                                            include DOKAN_INC_DIR . '/woo-views/html-product-download.php';
                                                            echo esc_attr( ob_get_clean() );
                                                        ?>"><?php _e( 'Add File', 'dokan' ); ?></a>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                            <thead>
                                                <tr>
                                                    <th><?php _e( 'Name', 'dokan' ); ?> <span class="tips" title="<?php _e( 'This is the name of the download shown to the customer.', 'dokan' ); ?>">[?]</span></th>
                                                    <th><?php _e( 'File URL', 'dokan' ); ?> <span class="tips" title="<?php _e( 'This is the URL or absolute path to the file which customers will get access to.', 'dokan' ); ?>">[?]</span></th>
                                                    <th><?php _e( 'Action', 'dokan' ); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $downloadable_files = get_post_meta( $post_id, '_downloadable_files', true );

                                                if ( $downloadable_files ) {
                                                    foreach ( $downloadable_files as $key => $file ) {
                                                        include DOKAN_INC_DIR . '/woo-views/html-product-download.php';
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        <div class="dokan-clearfix" style="display: none;">
                                            <div class="content-half-part">
                                                <label for="_download_limit" class="form-label"><?php _e( 'Download Limit', 'dokan' ); ?></label>
                                                <?php dokan_post_input_box( $post_id, '_download_limit', array( 'placeholder' => __( 'e.g. 4', 'dokan' ) ) ); ?>
                                            </div><!-- .content-half-part -->

                                            <div class="content-half-part">
                                                <label for="_download_expiry" class="form-label"><?php _e( 'Download Expiry', 'dokan' ); ?></label>
                                                <?php dokan_post_input_box( $post_id, '_download_expiry', array( 'placeholder' => __( 'Number of days', 'dokan' ) ) ); ?>
                                            </div><!-- .content-half-part -->
                                        </div>

                                    </div> <!-- .dokan-side-body -->
                                </div> <!-- .downloadable -->

                                <?php if ( $post_id ): ?>
                                    <?php do_action( 'dokan_product_edit_after_downloadable' ); ?>
                                <?php endif; ?>
                                <?php if ( $post_id ): ?>
                                    <?php do_action( 'dokan_product_edit_after_sidebar' ); ?>
                                <?php endif; ?>
                                <!--<div class="dokan-divider-top"></div>-->

                                <div class="dokan-clearfix dokan-variation-container" style="display: none;">
                                    <label class="checkbox-inline form-label hide_if_variation" for="_has_attribute">
                                        <input name="_has_attribute" value="no" type="hidden">
                                        <input name="_has_attribute" id="_has_attribute" value="yes" type="checkbox" <?php checked( $_has_attribute, 'yes' ); ?>>
                                        <?php _e( 'This product has multiple options', 'dokan' ); ?>
                                        <span><?php _e( 'e.g. Multiple sizes and/or colors', 'dokan' ); ?></span>
                                    </label>

                                    <?php if ( $_create_variations != 'yes' ): ?>
                                        <div class="dokan-side-body dokan-attribute-content-wrapper dokan-hide">
                                            <table class="dokan-table dokan-attribute-options-table">
                                                <thead>
                                                    <tr>
                                                        <th><?php _e( 'Option Name', 'dokan' ) ?> <span class="tips" title="" data-original-title="<?php _e( 'Enter you variation attribute option name', 'dokan' ); ?>">[?]</span></th>
                                                        <th width="22%"><?php _e( 'Option Values', 'dokan' ) ?> <span class="tips" title="" data-original-title="<?php _e( 'Enter attribute options values corresponding options name', 'dokan') ?>">[?]</span></th>
                                                        <th width="7%">
                                                            <span class="dokan-loading dokan-attr-option-loading dokan-hide"></span>
                                                        </th>
                                                        <th width="29%">
                                                            <select name="predefined_attribute" id="predefined_attribute" class="dokan-form-control" data-predefined_attr='<?php echo json_encode( $attribute_taxonomies ); ?>'>
                                                                <option value=""><?php _e( 'Custom Attribute', 'dokan' ); ?></option>
                                                                <?php
                                                                if ( !empty( $attribute_taxonomies ) ) { ?>
                                                                    <?php foreach ( $attribute_taxonomies as $key => $value ) { ?>
                                                                        <option value="<?php echo $value->attribute_name; ?>"><?php echo $value->attribute_label; ?></option>
                                                                    <?php }
                                                                }?>
                                                            </select>
                                                        </th>
                                                        <th><a href="#" class="dokan-btn dokan-btn-default add_attribute_option"><?php _e( 'Add Option', 'dokan' ) ?></a></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php if ( $product_attributes ): ?>
                                                    <?php foreach( $product_attributes as $attribute ): ?>
                                                    <tr class="dokan-attribute-options">
                                                        <td width="20%">
                                                            <?php if ( $attribute['is_taxonomy'] ): ?>
                                                                <?php $tax = get_taxonomy( $attribute['name'] ); ?>
                                                                <input type="text" disabled="disabled" value="<?php echo $tax->label; ?>" class="dokan-form-control dokan-attribute-option-name-label" data-attribute_name="<?php echo wc_sanitize_taxonomy_name( str_replace( 'pa_', '', $attribute['name'] ) ); ?>">
                                                                <input type="hidden" name="attribute_names[]" value="<?php echo esc_attr( $attribute['name'] ); ?>" class="dokan-attribute-option-name">
                                                            <?php else: ?>
                                                                <input type="text" name="attribute_names[]" value="<?php echo $attribute['name']; ?>" class="dokan-form-control dokan-attribute-option-name">
                                                            <?php endif ?>
                                                            <input type="hidden" name="attribute_is_taxonomy[]" value="<?php echo ( $attribute['is_taxonomy'] ) ? 1 : 0 ?>">
                                                        </td>
                                                        <?php
                                                        if ( $attribute['is_taxonomy'] ) {
                                                            $tax = get_taxonomy( $attribute['name'] );
                                                            $attribute_name = $tax->labels->name;
                                                            $options = wp_get_post_terms( $post_id, $attribute['name'], array('fields' => 'names') );
                                                        } else {
                                                            $attribute_name = $attribute['name'];
                                                            $options = array_map( 'trim', explode('|', $attribute['value'] ) );
                                                        }
                                                        ?>
                                                        <td colspan="4"><input type="text" name="attribute_values[]" value="<?php echo implode( ',', $options ); ?>" class="dokan-form-control dokan-attribute-option-values"></td>
                                                        <td><button class="dokan-btn dokan-btn-theme remove_attribute"><i class="fa fa-trash-o"></i></button></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr class="dokan-attribute-options">
                                                        <td width="20%">
                                                            <input type="text" name="attribute_names[]" value="" class="dokan-form-control dokan-attribute-option-name">
                                                            <input type="hidden" name="attribute_is_taxonomy[]" value="0">
                                                        </td>
                                                        <td colspan="4"><input type="text" name="attribute_values[]" value="" class="dokan-form-control dokan-attribute-option-values"></td>
                                                        <td><button class="dokan-btn dokan-btn-theme remove_attribute"><i class="fa fa-trash-o"></i></button></td>
                                                    </tr>
                                                <?php endif ?>

                                                    <tr class="dokan-attribute-is-variations">
                                                        <td colspan="6">
                                                            <label class="checkbox-inline form-label" for="_create_variation">
                                                                <input name="_create_variation" value="no" type="hidden">
                                                                <input name="_create_variation" id="_create_variation" value="yes" type="checkbox">
                                                                <?php _e( 'Create variation using those attribute options', 'dokan' ); ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="dokan-variation-content-wrapper"></div>

                                    <?php elseif ( $_create_variations == 'yes' ): ?>

                                        <?php include_once 'edit/load_variation_template.php'; ?>

                                        <?php if ( $post_id ): ?>
                                            <?php do_action( 'dokan_product_edit_after_variations' ); ?>
                                        <?php endif; ?>
                                        <div class="dokan-divider-top"></div>

                                        <label class="checkbox-inline form-label" for="_create_variation">
                                            <input name="_create_variation" value="no" type="hidden">
                                            <input name="_create_variation" id="_create_variation" value="yes" class="dokan_create_variation" type="checkbox" <?php checked( $_create_variations, 'yes' ); ?>>
                                            <?php _e( 'Use those above variations', 'dokan' ); ?><span> (<?php _e( 'If unchecked, then no variation will be created', 'dokan' ); ?>)</span>
                                        </label>
                                        <input type="hidden" name="_variation_product_update" value="<?php esc_attr_e( 'yes', 'dokan' ); ?>">
                                    <?php endif ?>
                                </div><!-- .dokan-divider-top -->

                            </div><!-- .dokan-side-right -->
                        </div><!-- .dokan-product-inventory -->

                        <?php if ( $post_id ): ?>
                            <?php do_action( 'dokan_product_options_shipping_before' ); ?>
                        <?php endif; ?>

                        <?php if ( 'yes' == get_option( 'woocommerce_calc_shipping' ) || 'yes' == get_option( 'woocommerce_calc_taxes' ) ): ?>
                        <div class="dokan-product-shipping-tax dokan-clearfix <?php echo ( 'no' == get_option('woocommerce_calc_shipping') ) ? 'woocommerce-no-shipping' : '' ?> <?php echo ( 'no' == get_option('woocommerce_calc_taxes') ) ? 'woocommerce-no-tax' : '' ?>">
                            <div class="dokan-side-left" style="display: none;">
                                <h2><?php _e( 'Shipping & Tax', 'dokan' ); ?></h2>

                                <p>
                                    <?php _e( 'Manage shipping and tax for this product', 'dokan' ); ?>
                                </p>
                            </div>

                            <div class="dokan-side-right">
                                <?php if( 'yes' == get_option('woocommerce_calc_shipping') ): ?>
                                    <div class="dokan-clearfix hide_if_downloadable dokan-shipping-container">
                                        <input type="hidden" name="product_shipping_class" value="0">
                                        <div class="dokan-form-group">
                                            <label class="dokan-checkbox-inline" for="_disable_shipping">
                                                <input type="checkbox" id="_disable_shipping" name="_disable_shipping" <?php checked( $_disable_shipping, 'no' ); ?>>
                                                <?php _e( 'This product required shipping', 'dokan' ); ?>
                                            </label>
                                        </div>

                                        <div class="show_if_needs_shipping dokan-shipping-dimention-options">
                                            <?php dokan_post_input_box( $post_id, '_weight', array( 'class' => 'form-control', 'placeholder' => __( 'weight (' . esc_html( get_option( 'woocommerce_weight_unit' ) ) . ')', 'dokan' ) ), 'number' ); ?>
                                            <?php dokan_post_input_box( $post_id, '_length', array( 'class' => 'form-control', 'placeholder' => __( 'length (' . esc_html( get_option( 'woocommerce_dimension_unit' ) ) . ')', 'dokan' ) ), 'number' ); ?>
                                            <?php dokan_post_input_box( $post_id, '_width', array( 'class' => 'form-control', 'placeholder' => __( 'width (' . esc_html( get_option( 'woocommerce_dimension_unit' ) ) . ')', 'dokan' ) ), 'number' ); ?>
                                            <?php dokan_post_input_box( $post_id, '_height', array( 'class' => 'form-control', 'placeholder' => __( 'height (' . esc_html( get_option( 'woocommerce_dimension_unit' ) ) . ')', 'dokan' ) ), 'number' ); ?>
                                            <div class="dokan-clearfix"></div>
                                        </div>

                                        <?php if ( $post_id ): ?>
                                            <?php do_action( 'dokan_product_options_shipping' ); ?>
                                        <?php endif; ?>
                                        <div class="show_if_needs_shipping dokan-form-group">
                                            <label class="control-label" for="product_shipping_class"><?php _e( 'Shipping Class', 'dokan' ); ?></label>
                                            <div class="dokan-text-left">
                                                <?php
                                                // Shipping Class
                                                $classes = get_the_terms( $post->ID, 'product_shipping_class' );
                                                if ( $classes && ! is_wp_error( $classes ) ) {
                                                    $current_shipping_class = current($classes)->term_id;
                                                } else {
                                                    $current_shipping_class = '';
                                                }

                                                $args = array(
                                                    'taxonomy'          => 'product_shipping_class',
                                                    'hide_empty'        => 0,
                                                    'show_option_none'  => __( 'No shipping class', 'dokan' ),
                                                    'name'              => 'product_shipping_class',
                                                    'id'                => 'product_shipping_class',
                                                    'selected'          => $current_shipping_class,
                                                    'class'             => 'dokan-form-control'
                                                );
                                                ?>

                                                <?php wp_dropdown_categories( $args ); ?>
                                                <p class="help-block"><?php _e( 'Shipping classes are used by certain shipping methods to group similar products.', 'dokan' ); ?></p>
                                            </div>
                                        </div>

                                        <div class="show_if_needs_shipping dokan-shipping-product-options">

                                            <div class="dokan-form-group">
                                                <?php dokan_post_input_box( $post_id, '_overwrite_shipping', array( 'label' => __( 'Override default shipping cost for this product', 'dokan' ) ), 'checkbox' ); ?>
                                            </div>

                                            <div class="dokan-form-group show_if_override">
                                                <label class="dokan-control-label" for="_additional_product_price"><?php _e( 'Additional cost', 'dokan' ); ?></label>
                                                <input id="_additional_product_price" value="<?php echo $_additional_price; ?>" name="_additional_price" placeholder="9.99" class="dokan-form-control" type="number" step="any">
                                            </div>

                                            <div class="dokan-form-group show_if_override">
                                                <label class="dokan-control-label" for="dps_additional_qty"><?php _e( 'Per Qty Additional Price', 'dokan' ); ?></label>
                                                <input id="additional_qty" value="<?php echo ( $_additional_qty ) ? $_additional_qty : $dps_additional_qty; ?>" name="_additional_qty" placeholder="1.99" class="dokan-form-control" type="number" step="any">
                                            </div>

                                            <div class="dokan-form-group show_if_override">
                                                <label class="dokan-control-label" for="dps_additional_qty"><?php _e( 'Processing Time', 'dokan' ); ?></label>
                                                <select name="_dps_processing_time" id="_dps_processing_time" class="dokan-form-control">
                                                    <?php foreach ( $processing_time as $processing_key => $processing_value ): ?>
                                                          <option value="<?php echo $processing_key; ?>" <?php selected( $porduct_shipping_pt, $processing_key ); ?>><?php echo $processing_value; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ( 'yes' == get_option('woocommerce_calc_shipping') && 'yes' == get_option( 'woocommerce_calc_taxes' ) ): ?>
                                    <div class="dokan-divider-top hide_if_downloadable"></div>
                                <?php endif ?>

                                <?php if ( 'yes' == get_option( 'woocommerce_calc_taxes' ) ) { ?>
                                <div class="dokan-clearfix dokan-tax-container">
                                    <div class="dokan-form-group">
                                        <label for="_required_tax" class="dokan-form-label">
                                        <input type="hidden" name="_required_tax" value="no">
                                        <input type="checkbox" id="_required_tax" name="_required_tax" value="yes" <?php checked( $_required_tax, 'yes' ); ?>>
                                        <?php _e( 'This product required Tax', 'dokan' ); ?>
                                        </label>
                                    </div>
                                    <div class="show_if_needs_tax dokan-tax-product-options">
                                        <div class="dokan-form-group dokan-w">
                                            <label class="dokan-control-label" for="_tax_status"><?php _e( 'Tax Status', 'dokan' ); ?></label>
                                            <div class="dokan-text-left">
                                                <?php dokan_post_input_box( $post_id, '_tax_status', array( 'options' => array(
                                                    'taxable'   => __( 'Taxable', 'dokan' ),
                                                    'shipping'  => __( 'Shipping only', 'dokan' ),
                                                    'none'      => _x( 'None', 'Tax status', 'dokan' )
                                                    ) ), 'select'
                                                ); ?>`
                                            </div>
                                        </div>

                                        <div class="dokan-form-group dokan-w">
                                            <label class="dokan-control-label" for="_tax_class"><?php _e( 'Tax Class', 'dokan' ); ?></label>
                                            <div class="dokan-text-left">
                                                <?php dokan_post_input_box( $post_id, '_tax_class', array( 'options' => $classes_options ), 'select' ); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div><!-- .dokan-side-right -->
                        </div><!-- .dokan-product-inventory -->
                        <?php endif; ?>

                        <?php if ( $post_id ): ?>
                            <?php do_action( 'dokan_product_edit_after_shipping' ); ?>
                        <?php endif; ?>
                        <div class="dokan-other-options dokan-clearfix">
                            <div class="dokan-side-left" style="display: none;">
                                <h2><?php _e( 'Other Options', 'dokan' ); ?></h2>
                            </div>

                            <div class="dokan-side-right" style="padding-left: 0px;">
                                <?php if ( $post_id ): ?>
                                    <div class="dokan-form-group">
                                        <label for="post_status" class="form-label"><?php _e( 'Product Status', 'dokan' ); ?></label>
                                        <?php if ( $post_status != 'pending' ) { ?>
                                            <?php $post_statuses = apply_filters( 'dokan_post_status', array(
                                                'publish' => __( 'Online', 'dokan' ),
                                                'draft'   => __( 'Draft', 'dokan' )
                                            ), $post ); ?>

                                            <select id="post_status" class="dokan-form-control" name="post_status">
                                                <?php foreach ( $post_statuses as $status => $label ) { ?>
                                                    <option value="<?php echo $status; ?>"<?php selected( $post_status, $status ); ?>><?php echo $label; ?></option>
                                                <?php } ?>
                                            </select>
                                        <?php } else { ?>
                                            <?php $pending_class = $post_status == 'pending' ? '  dokan-label dokan-label-warning': ''; ?>
                                            <span class="dokan-toggle-selected-display<?php echo $pending_class; ?>"><?php echo dokan_get_post_status( $post_status ); ?></span>
                                        <?php } ?>
                                    </div>
                                <?php endif ?>

                                <div class="dokan-form-group" style="margin-top: 10px;">
                                    <label for="_visibility" class="form-label"><?php _e( 'Visibility', 'dokan' ); ?></label>
                                    <?php dokan_post_input_box( $post_id, '_visibility', array( 'options' => array(
                                        'visible' => __( 'Catalog or Search', 'dokan' ),
                                        'catalog' => __( 'Catalog', 'dokan' ),
                                        'search'  => __( 'Search', 'dokan' ),
                                        'hidden'  => __( 'Hidden', 'dokan ')
                                    ) ), 'select' ); ?>
                                </div>

                                <div class="dokan-form-group" style="display: none;">
                                    <label for="_purchase_note" class="form-label"><?php _e( 'Purchase Note', 'dokan' ); ?></label>
                                    <?php dokan_post_input_box( $post_id, '_purchase_note', array( 'placeholder' => __( 'Customer will get this info in their order email', 'dokan' ) ), 'textarea' ); ?>
                                </div>

                                <div class="dokan-form-group" style="display: none;">
                                    <?php $_enable_reviews = ( $post->comment_status == 'open' ) ? 'yes' : 'no'; ?>
                                    <?php dokan_post_input_box( $post_id, '_enable_reviews', array('value' => $_enable_reviews, 'label' => __( 'Enable product reviews', 'dokan' ) ), 'checkbox' ); ?>
                                </div>

                            </div>
                        </div><!-- .dokan-other-options -->

                        <?php if ( $post_id ): ?>
                            <?php do_action( 'dokan_product_edit_after_options' ); ?>
                        <?php endif; ?>

                        <?php wp_nonce_field( 'dokan_add_new_product', 'dokan_add_new_product_nonce' ); ?>
                        <input type="submit" name="dokan_add_product" class="dokan-btn dokan-btn-theme dokan-btn-lg btn-block" value="<?php esc_attr_e( 'Save Product', 'dokan' ); ?>"/>

                    </form>

                <?php } else { ?>

                    <?php dokan_seller_not_enabled_notice(); ?>

                <?php } ?>

            <?php } else { ?>

                <?php do_action( 'dokan_can_post_notice' ); ?>

            <?php } ?>
        </div> <!-- #primary .content-area -->
    </div>
</div><!-- .dokan-dashboard-wrap -->
<div class="dokan-clearfix"></div>

<?php
if( $post_id ) {
    ?>
    <div class="variation-single-content">
       <?php include_once 'edit/vatiation-popup.php'; ?>
    </div>
    <?php
}
?>

<script type="text/html" id="tmpl-dokan-variations">

    <# if ( data.variation_item.length ) { #>
        <input type="hidden" name="dokan_create_new_variations" value="yes">
        <table class="dokan-table">
            <thead>
                <tr>
                    <th></th>
                    <th><?php _e( 'Variant', 'dokan' ) ?></th>
                    <th><?php _e( 'Price', 'dokan' ) ?></th>
                    <th><?php _e( 'SKU', 'dokan' ) ?></th>
                </tr>
            </thead>
            <tbody>
            <# _.each( data.variation_item, function( el, i ) { #>
                <tr>
                    <td>
                        <input type="checkbox" name="variable_enabled[{{i}}]" value="yes" checked>
                    </td>
                    <td>
                        {{ el.join(' - ') }}
                        <# _.each( data.variation_title, function( title, index ) { #>
                            <input type="hidden" name="attribute_{{ title.replace(' ','_').toLowerCase() }}[{{i}}]" value="{{el[index].toLowerCase()}}">
                            <input type="hidden" name="variation_menu_order[{{i}}]" value="{{i}}">
                        <# }); #>
                    </td>
                    <td><input type="number" name="variable_regular_price[{{i}}]" placeholder="<?php _e( '0.00', 'dokan' ) ?>" class="dokan-form-control"/ min="0" step="any"></td>
                    <td><input type="text" name="variable_sku[{{i}}]" placeholder="SKU" class="dokan-form-control"/></td>
                </tr>
            <# }); #>
            </tbody>
        </table>
    <# } #>
</script>

 <script type="text/html" id="tmpl-dokan-single-attribute">
    <div id="doakn-single-attribute-wrapper" class="white-popup">
        <form action="" method="post" id="doakn-single-attribute-form">
            <table class="dokan-table dokan-single-attribute-options-table">
                <thead>
                    <tr>
                        <th><?php _e( 'Option Name', 'dokan' ) ?> <span class="tips" title="" data-original-title="Enter you variation attribute option name">[?]</span></th>
                        <th width="22%"><?php _e( 'Option Values', 'dokan' ) ?> <span class="tips" title="" data-original-title="Enter attribute options values corresponding options name">[?]</span></th>
                        <th width="7%">
                            <span class="dokan-loading dokan-attr-option-loading dokan-hide"></span>
                        </th>
                        <th width="29%">
                            <select name="predefined_attribute" id="predefined_attribute" class="dokan-form-control">
                                <option value=""><?php _e( 'Custom Attribute', 'dokan' ); ?></option>

                                <# if ( !_.isNull( data.attribute_taxonomies ) ) { #>
                                    <# _.each( data.attribute_taxonomies, function( tax_val, tax_key ) { #>
                                        <option value="{{ tax_val.attribute_name }}">{{ tax_val.attribute_label }}</option>
                                    <# }); #>
                                <# } #>
                            </select>
                        </th>
                        <th><a href="#" class="dokan-btn dokan-btn-default add_single_attribute_option"><?php _e( 'Add Option', 'dokan' ) ?></a></th>
                    </tr>
                </thead>
                <tbody>
                    <# if ( !_.isNull( data.attribute_data ) ){ #>
                        <# _.each( data.attribute_data, function( attr_val, attr_key ) { #>
                        <tr class="dokan-single-attribute-options">
                            <td width="20%">
                                <# if ( attr_val.is_taxonomy ) { #>
                                    <input type="text" disabled="disabled" value="{{ attr_val.label }}" class="dokan-form-control dokan-single-attribute-option-name-label" data-attribute_name="{{attr_val.data_attr_name}}">
                                    <input type="hidden" name="attribute_names[]" value="{{attr_val.name}}" class="dokan-single-attribute-option-name">
                                    <input type="hidden" name="attribute_is_taxonomy[]" value="1">
                                <# } else { #>
                                    <input type="text" name="attribute_names[]" value="{{attr_val.name}}" class="dokan-form-control dokan-single-attribute-option-name">
                                    <input type="hidden" name="attribute_is_taxonomy[]" value="0">
                                <# } #>
                            </td>
                            <td colspan="3">
                                <# if ( attr_val.is_taxonomy ) { #>
                                    <input type="text" name="attribute_values[]" value="{{ attr_val.term_value.replace(/\|/g, ',' ) }}" class="dokan-form-control dokan-single-attribute-option-values">
                                <# } else { #>
                                    <input type="text" name="attribute_values[]" value="{{ attr_val.value.replace(/\|/g, ',' ) }}" class="dokan-form-control dokan-single-attribute-option-values">
                                <# } #>
                            </td>
                            <td><button class="dokan-btn dokan-btn-theme remove_single_attribute"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                        <# }) #>
                    <# } else { #>
                        <tr colspan="3" class="dokan-single-attribute-options">
                            <td width="20%">
                                <input type="text" name="attribute_names[]" value="" class="dokan-form-control dokan-single-attribute-option-name">
                                <input type="hidden" name="attribute_is_taxonomy[]" value="0">
                            </td>
                            <td><input type="text" name="attribute_values[]" value="" class="dokan-form-control dokan-single-attribute-option-values"></td>
                            <td><button class="dokan-btn dokan-btn-theme remove_single_attribute"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                    <# } #>
                </tbody>
            </table>
            <input type="hidden" name="product_id" value="<?php echo $post_id ?>">
            <input type="submit" class="dokan-btn dokan-btn-theme dokan-right" name="dokan_new_attribute_option_save" value="<?php esc_attr_e( 'Save', 'dokan' ); ?>">
            <span class="dokan-loading dokan-save-single-attr-loader dokan-hide"></span>
            <div class="dokan-clearfix"></div>
        </form>
    </div>
</script>

<?php

wp_reset_postdata();

if ( ! $from_shortcode ) {
    get_footer();
}
?>

