<?php

/**

* The header for our theme.

*

* Displays all of the <head> section and everything up till <div id="content">

*

* @package bloggr

*/

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<!--[if IE 8]>   <html class="no-js lt-ie8 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>   <html class="no-js lt-ie9" lang="en"> <![endif]-->

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>"/>

    <meta name="viewport" content="width=device-width, initial-scale=1"/>

	<!-- <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" /> -->

    <link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet"/>
    
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <!-- <link rel="pingback" href="<?php //bloginfo( 'pingback_url' ); ?>"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory'); ?>/style.css">
    
    <?php if ( get_theme_mod('site_favicon') ) : ?>

        <link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />

    <?php endif; ?>

    <?php if ( get_theme_mod('apple_touch_144') ) : ?>

        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_theme_mod('apple_touch_144')); ?>" />

    <?php endif; ?>

    <?php if ( get_theme_mod('apple_touch_114') ) : ?>

        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_theme_mod('apple_touch_114')); ?>" />

    <?php endif; ?>

    <?php if ( get_theme_mod('apple_touch_72') ) : ?>

        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_theme_mod('apple_touch_72')); ?>" />

    <?php endif; ?>

    <?php if ( get_theme_mod('apple_touch_57') ) : ?>

        <link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('apple_touch_57')); ?>" />

    <?php endif; ?>

    <?php wp_head(); ?>
    <script src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory'); ?>/js/upload_pro.js"></script>


<!-- 
    <script src="<?php bloginfo( 'stylesheet_directory' ) ?>/js/masonry.jsBK" type="text/javascript"></script> -->

    <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ) ?>/css/woo_product.css"/>

    <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.js"></script>

</head>
<style type="text/css">
  .lt-ie9 #right-sidebar ul.menu > li.active > ul > li > a{
    background:#97be10 !important;
}
.lt-ie9 #right-sidebar ul.menu > li.active > ul > li.active > a{
    background:#0f8be2 !important;
}
.lt-ie8 .wp-social-login-provider.wp-social-login-provider-facebook:after {
    content: "Connect with Facebook";
    text-align: center;
    display: block;
}
.lt-ie8 .wp-social-login-provider{
    color: #ffffff;
}
.lt-ie8 .wp-social-login-provider.wp-social-login-provider-google:after{
    content: "Connect with Google";
    display: block;
    text-align: center;
}
.lt-ie8 .top-contror{
    background-image: url(images/drop-icon2.png);
}
.page-template-template-store-author .onsale{
    min-height: 3.236em;
    min-width: 3.236em;
    padding: .202em;
    font-weight: 700;
    position: absolute;
    text-align: center;
    line-height: 3.236;
    top: 0px;
    right: 0px;
    margin: 0;
    border-radius: 100%;
    background-color: #77a464;
    color: #fff;
    font-size: .857em;
    -webkit-font-smoothing: antialiased;
}
.woocommerce span.onsale{
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 50px;
}
.related .author-title{
    max-width: 100%;
}
.lt-ie8 .wp-social-login-provider.wp-social-login-provider-twitter:after {
    content: "Connect with Twitter";
    display: block;
    text-align: center;
}
.lt-ie8  .ihc_level_template_2 .ihc-level-item-top{
    background: #4dbcbc;
}
.lt-ie8 .ihc_level_template_2 .ihc-level-item-price{
    background: #52cbcb;
}
.lt-ie8  .products li.product{
    background: #ffffff;

}
.lt-ie8 .page-template-template-store-author .products li.product{
    position: relative;
    list-style: none;
    width: 23%;
    margin: 0 1%;
    margin-bottom: 25px;
    float: left;
    background: #fff;
}
.lt-ie8 .ml-close{
    display: none !important;
    visibility: hidden;
    background: #ffffff;
    color: #fff;
    border:0px;
}

.woocommerce ul.products li.product .onsale{
    margin: 0px;
}
.lt-ie8 .woocommerce ul.products li.product,.lt-ie8 .woocommerce-page ul.products li.product{
    margin-bottom: 18px;
}
.lt-ie8 .woocommerce div.imagewrapper{
    border-width: 1px;
    border-style: solid;
    border-color: #ddd;
}
.dokan-form-group.select_price.over_cs{
    position: relative;
}
/*.dokan-form-group.select_price.over_cs span.loading {
    background-image: url(https://www.teachers-cafe.com/wp-content/themes/teachers-cafe-child/images/spin.gif);
    width: 100%;
    height: 35px;
    display: block;
    background-size: 30px 30px;
    position: absolute;
    opacity: 0.8;
}*/
.over_cs #select-price{
    pointer-events: none;
    opacity: 0.8;
}
</style>
<script type="text/javascript">
    jQuery(document).ready(function($){    
    //jQuery('.dokan-form-group.select_price').append('<span class="loading"></span>');
    //jQuery('.dokan-form-group.select_price').addClass('over_cs');
    jQuery('#file-type, #product_cat').change(function(){
        if (jQuery(this)[0].selectedIndex > 0) {
            //jQuery('.dokan-form-group.select_price').addClass('over_cs');
            var product_cat_id = jQuery("#product_cat").val();
            var file_type = jQuery('#file-type').val().toLowerCase().replace(/ /g, '');
            console.log(file_type);
            jQuery.ajax({
                type: "POST",
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: { action: "get_price_cat",product_cat_id :product_cat_id, file_type:file_type} 
            }).done(function(data){
                jQuery("#select-price").html(data);
                jQuery('.dokan-form-group.select_price').slideDown();
                //jQuery('.dokan-form-group.select_price').removeClass('over_cs');
            });
            
        }else{
            jQuery( ".dokan-form-group.select_price" ).slideUp();
        }
        
    })
return false;
})
</script>
<script>
    jQuery(document).ready(function($){
 

// $("#upload-f").submit(function(){
//     alert("Submitted");
// });
        
        
        $('#right-sidebar .ctax_dropdown').append('<span class="label_edit"></span>');
        $('span.label_edit').click(function(){
            //alert('text-transform');
            // jQuery('select').change();
            var parent= jQuery(this).siblings();
            // alert('click')
           // alert(parent);
           open(parent);
           //parent.trigger('mousedown');
       });

        function open(elem) {
            if (document.createEvent) {
                var e = document.createEvent("MouseEvents");
                e.initMouseEvent("mousedown", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
                elem[0].dispatchEvent(e);
            } else if (element.fireEvent) {
                elem[0].fireEvent("onmousedown");
            }
        }
        $('.yith-wcwl-wishlistexistsbrowse.show a').attr('href','/wishlist');
        $('.register-bt').click(function(){
            $('#additional-settings').addClass('on-register');
            $('#modal-login .section-container').addClass('on-register');
        });
        $('#modal-login .close-icon').click(function(){
            $('#modal-login .section-container,#additional-settings').removeClass('on-register');
            $('#modal-login').click();
        });
        $('.login-area .login').click(function(){
            $('#modal-login .section-container,#additional-settings').removeClass('on-register');
        });
        $('.member-contror').hover(function(){
            $('.nav-member').slideDown(100);
        },function(){
            $('.nav-member').slideUp(10);
        });
        $('a.insert-file-row.dokan-btn.dokan-btn-sm.dokan-btn-success').click(function(){ 
            $('a.insert-file-row.btn.btn-sm').css('display','none'); 
        })
        $('.checkbox.variable_is_downloadable').on('change', function(){
            $('.insert-file-row.btn.btn-sm.btn-success').click();
        }) 
        var href = $('.logout_link').attr('href');
        $('.logout a').attr("href", href); 
        $('#right-sidebar ul.menu > li.menu-item-has-children').append('<span class="plus-icon"></span>');
        $('#right-sidebar ul.menu > li.menu-item-has-children ul.sub-menu > li.menu-item-has-children').append('<span class="plus-icon"></span>');
        $('#right-sidebar ul.menu > li.menu-item-has-children > .plus-icon').click(function(){
            $(this).parent().toggleClass('active');
            $(this).parent().find('ul.sub-menu').slideToggle(200);
        });
        $('#right-sidebar ul.sub-menu > li.menu-item-has-children > .plus-icon').click(function(){
            $(this).parent().toggleClass('active');
            $(this).parent().find('ul.sub-child-menu').slideToggle(200);
        });
        $('.list-user-click').click(function(){
            $(this).toggleClass('active');
            $('.list-user').slideToggle(100);
        });
        $('.reviews_tab ').html($('.woocommerce-product-rating.move').html());

        jQuery(document).on("change",".register-option input[type=radio]",function () {
            var checked = jQuery('.register-option input[type=radio]:checked').val();
            if(checked == 'student'){
                $('#student-register').fadeIn(500);
                $('#author-register').fadeOut(500);
            }else{
                $('#author-register').fadeIn(500);
                $('#student-register').fadeOut(500);
            }
        });
        $(".register-option li:first-child input[type=radio]").prop("checked", true);
        //$("#myElem").fadeIn('slow').animate({opacity: 0,top:0}, 3500).effect("pulsate", { times: 2 }, 800).fadeOut('slow'); 
        
        //Add label Author                        
        $('.woof_author_search_container .woof_container_inner').prepend('<h4>مؤلف</h4>');
        
        $('.woof_submit_search_form').each(function() {
            var text = $(this).text();
            $(this).text(text.replace('Filter', 'فلتر'));             
        });
        $('.woof_reset_search_form').each(function() {
            var text = $(this).text();
            $(this).text(text.replace('Reset', 'إعادة تعيين'));             
        });        
        
        $('#form-wysija-2 .wysija-input').attr("placeholder", "عنوان البريد الإلكتروني").placeholder();
                       
        setTimeout(function(){
            $('.price_label').each(function() {
                var text1 = $(this).text();                
                $(this).html(text1.replace('Price:', '<p style="float: left; margin: 0px; padding: 0px;">السعر:</p>')); 
            });  
        }, 500);
        
        $('#account_username_field > label').each(function() {
            var text1 = $(this).text();                
            $(this).text(text1.replace('Account username', 'اسم المستخدم حساب')); 
        }); 
        
        $('#account_password_field > label').each(function() {
            var text1 = $(this).text();                
            $(this).text(text1.replace('Account password', 'كلمة مرور الحساب')); 
        }); 
        
        $('.shop_table.order_details tfoot tr:nth-of-type(1) th').each(function() {
            var text1 = $(this).text();                
            $(this).html(text1.replace('Subtotal:', 'حاصل الجمع:')); 
        }); 
        $('.shop_table.order_details tfoot tr:nth-of-type(2) th').each(function() {
            var text1 = $(this).text();                
            $(this).html(text1.replace('Payment Method:', 'طريقة الدفع او السداد:')); 
        });
        $('.shop_table.order_details tfoot tr:nth-of-type(3) th').each(function() {
            var text1 = $(this).text();                
            $(this).html(text1.replace('Total:', 'مجموع:')); 
        });
        
        $('.submit #wp-submit.button.button-primary.button-large').each(function() {
            var text1 = $(this).val();                
            $(this).val(text1.replace('Log In', 'تسجيل الدخول')); 
        }); 
        $('.mluser #login_user').each(function() {            
            $(this).attr("placeholder", "اسم المستخدم");           
        });
        $('.mlpsw #login_pass').each(function() {            
            $(this).attr("placeholder", "كلمه السر");           
        });
        $('.ihc-register-col:nth-of-type(1) .iump-form-line-register:nth-of-type(1) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('First Name', 'الإسم الأول'));            
        });
        $('.ihc-register-col:nth-of-type(1) .iump-form-line-register:nth-of-type(2) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Last Name', 'الإسم الأخير'));            
        });    
        $('.ihc-register-col:nth-of-type(1) .iump-form-line-register:nth-of-type(3) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Date of Birth', 'تاريخ الميلاد'));            
        });  
        $('.ihc-register-col:nth-of-type(1) .iump-form-line-register:nth-of-type(4) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Country', 'الدولة'));            
        });
        $('.ihc-register-col:nth-of-type(1) .iump-form-line-register:nth-of-type(6) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Address', 'العنوان'));            
        });
        $('.ihc-register-col:nth-of-type(1) .iump-form-line-register:nth-of-type(7) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Transfer Money', 'تحويل أموال'));            
        });   
        $('.ihc-register-col:nth-of-type(1) .iump-form-line-register:nth-of-type(5) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('ID/Passport No', 'الرقم المدني \ رقم الجواز'));            
        });      
        $('.ihc-register-col:nth-of-type(2) .iump-form-line-register:nth-of-type(1) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Phone', 'رقم الحساب البنكي'));            
        });
          $('.ihc-register-col:nth-of-type(2) .iump-form-line-register:nth-of-type(3) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Email', 'متخصص'));            
        });
        $('.woocommerce-message:contains("removed")').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('removed', '<span style="display: inline-block;">إزالة</span>')); 
        });
        $('.woocommerce-message a').each(function() {
            var text1 = $(this).text();                
            $(this).text(text1.replace('Undo', 'فك')); 
        });
                
        $('.ihc-wrapp-the-errors .ihc-register-error').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace(": Loggin Form is not showing up when You're logged.", ': نموذج تسجيل الدخول لا تظهر عندما تم تسجيل دخولك.')); 
        });
        $('.ihc-wrapp-the-errors .ihc-register-error').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace(": Register Form is not showing up when You're logged.", ': التسجيل نموذج لا تظهر عندما تم تسجيل دخولك.')); 
        });
        $('.ihc-register-col:nth-of-type(2) .iump-form-line-register:nth-of-type(4) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Email', 'البريد الإلكتروني'));            
        });
        $('.ihc-register-col:nth-of-type(2) .iump-form-line-register:nth-of-type(5) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Password', 'كلمة السر'));            
        });
        $('.ihc-register-col:nth-of-type(2) .iump-form-line-register:nth-of-type(6) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Confirm Password', 'تأكيد كلمة المرور'));            
        });
        $('.ihc-register-col:nth-of-type(2) .iump-form-line-register:nth-of-type(7) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Biographical Info', 'معلومات السيرة الذاتية'));            
        });
        $('.ihc-register-col:nth-of-type(2) .iump-form-line-register:nth-of-type(8) .iump-labels-register').each(function() {
            var text1 = $(this).html();                
            $(this).html(text1.replace('Upload Profile Photo', 'تحميل الملف صور'));            
        });
        
        $('#ihc_submit_bttn').each(function() {
            var text1 = $(this).val();                
            $(this).val(text1.replace('Save Changes', 'حفظ التغييرات'));            
        });
        
        $(".wysija-submit-field").attr('value', 'الاشتراك!');   
             
        // Remove empty fields from GET forms      	
        $("form#advanced-searchform").submit(function() {
          $(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
    		return true; // ensure form still submits
    	});

    	// Un-disable form fields when page loads, in case they click back after submission
    	$( "form#advanced-searchform" ).find( ":input" ).prop( "disabled", false );

        $('#disability-type').parent().hide();
        $('#edu-type').on('change', function() {
            if( this.value != '-1'){
                if(this.value =='120'){
                    $('#disability-type').parent().slideDown(500);
                } 
                else{
                    $('#disability-type').parent().slideUp(500);
                }               
            }
        });
        
            
        $('input[type=text][name=paypal-email-address]').parent().show();
        $('input[type=text][name=Bank-name]').parent().hide();
        $('input[type=text][name=ac-no]').parent().hide();

        $('input:radio[name=transfer-money][value=Paypal]').prop('checked', true);
        $('input[type=text][name=paypal-email-address]').prop('required', true);

        $('input[type=radio][name=transfer-money]').change(function() {
            if (this.value == 'Paypal') {
                $('input[type=text][name=paypal-email-address]').parent().show();
                $('input[type=text][name=Bank-name]').parent().hide();
                $('input[type=text][name=ac-no]').parent().hide();
                $('input[type=text][name=paypal-email-address]').prop('required', true);
                $('input[type=text][name=Bank-name]').prop('required', false);
                $('input[type=text][name=ac-no]').prop('required', false);
            }else{
                $('input[type=text][name=paypal-email-address]').parent().hide();
                $('input[type=text][name=Bank-name]').parent().show();
                $('input[type=text][name=ac-no]').parent().show();
                $('input[type=text][name=paypal-email-address]').prop('required', false);
                $('input[type=text][name=Bank-name]').prop('required', true);
                $('input[type=text][name=ac-no]').prop('required', true);
            }
        });
});
</script>
<style>
    #modal-login .section-container.on-register > #login {
        display: none !important;
    }
    #modal-login .section-container.on-register > #register {
        display: block !important;
    }
    #additional-settings.on-register .hide-login {
        display: block !important;
        float: right;
        margin-left: 5px;
    }
    #additional-settings.on-register{
        display:none
    }
    #modal-login .inline {
        display: inline !important;
    }
    .logged-in .register-bt {
        display: none;
    }
</style>
<?php
if($_GET['ihc_ap_menu'] == 'profile'){
    ?>
    <style>
        .ihc-ap-menu,.iump-user-page-details,.page-title{
            display: none;
        }
        .ihc-reg-update-msg {
            color: #65b457;
            font-size: 30px;
            margin-bottom: 20px;
            text-align: center;
        }
        .page-entry-content {
            border: medium none;
        }
        .iump-user-page-box-title {
            display: inline-block;
            font-family: unset !important;
            font-size: 30px !important;
            font-weight: 300 !important;
            line-height: 45px !important;
            margin-bottom: 0.5em !important;
            margin-right: 20px;
            text-transform: uppercase !important;
        }
        #ihc_account_page_tab_content {
            padding-top: 0 !important;
        }
    </style>
    <?php        
}
if(!is_user_logged_in()){?>
<style>
    .single_add_to_cart_button.button.alt{display:none !important}
    .login-atc {background: #8dc035 none repeat scroll 0 0;border-radius: 4px;clear: both;color: white !important;display: block;float: left;font-size: 17px;font-weight: bold;
        padding: 7px 10px;
        text-align: center;
        width: 100%;
    }
</style>
<script>
    jQuery(document).ready(function($){
        $('.summary.entry-summary form.cart').append('<a data-toggle="ml-modal" class="login-atc" href="#modal-login">أضف إلى السلة</a>')
        //$('.single_add_to_cart_button.button.alt').remove();
    })
</script>
<?php } ?>
<?php if($_SERVER["REDIRECT_URL"] =='/upload-files/products/'){ ?>
<script>
    jQuery(document).ready(function($){
        $('.page-id-36881 footer').insertAfter('.page-id-36881 .site-content'); 
    })
</script>
<style>
    .page-id-36881 .dokan-dashboard-content.dokan-product-listing {
        padding: 0 15px;
        width: 100%;
    }
    .page-id-36881 .dokan-dashboard-content.dokan-product-listing article {
        padding: 0;
    }
    .page-id-36881 .site-content > .page-content > .main-content {
        background: #f8f8f8 none repeat scroll 0 0;
        margin: 0;
        padding: 0;
        width: 100%;
    }
    .page-id-36881 .page-title {
        display: none;
    }
    .page-id-36881 .site-content > .page-content {
        margin: 0;
    }
    footer.entry-footer {
        display: none;
    }
</style>
<?php } ?>
<body <?php body_class(); ?>>
<!--
<div id="myElem">
    <span>SUCCESS</span>
</div>
-->
<style>
    #myElem{
        position: fixed;
        bottom: -100px;
        right:100px;
        z-index: 99999;
        opacity: 1;
    }
    #myElem span{
        color: white;
        padding:50px;
        background: #84c125;
    }
</style>
<?php         if(current_user_can('free_membership')){ ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        var current_count_file= jQuery('#total_size_file').val();
        jQuery('#custom_dokan_new').click(function(){
            if(current_count_file>=4){
                alert("لقد تم تحميلها أكثر من 4 ملفات");
                jQuery('#custom_dokan_new').prop( "disabled", true );

            }

        })
    });
</script>
<?php } ?>
<div id="page" class="hfeed site">

    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bloggr' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="grid grid-pad no-top header-overflow">
           <div class="site-branding">
            <?php if ( get_theme_mod( 'bloggr_logo' ) ) : ?>
                <div class="site-logo">
                    <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                        <img src='<?php echo esc_url( get_theme_mod( 'bloggr_logo' ) ); ?>' <?php if ( get_theme_mod( 'logo_size' ) ) : ?>width="<?php echo get_theme_mod( 'logo_size' ); ?>"<?php endif; ?> alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                        <span class='site-title'><?php bloginfo( 'name' ); ?></span>
                        <h3 class="tcafe">T-café</h3>
                    </a>
                </div><!-- site-logo -->
            <?php else : ?>
                <hgroup>
                    <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
                </hgroup>
            <?php endif; ?>
        </div><!-- .site-branding -->
        <div class="login-area">

            <?php echo do_shortcode('[modal_login]'); ?>
            <!--<a class="register-bt" data-toggle="ml-modal" href="#modal-login">Register</a>-->
            <a href="/subscription-plan/" class="register-bt">تسجيل</a>
            <?php 
            if(is_user_logged_in()){  
                if(current_user_can('free_membership') || current_user_can('basic_membership') || current_user_can('premium_membership') || current_user_can('administrator')){ 
                    $current_user = wp_get_current_user();
                    update_user_meta( $current_user->ID, 'dokan_enable_selling', yes ); ?>
                    <style>                        .member-nav_hidden{
                        display: none;
                    }
</style>
               <?php  }else{
                    ?>
                    <script>
                        jQuery(document).ready(function($){
                            $('.member-nav').remove();
                        })
                    </script>
                    <style>
                        .member-nav {
                            display: none;
                        }
                    </style>
                    <?php
                }                        
                //if(current_user_can('free_membership') || current_user_can('basic_membership') || current_user_can('premium_membership') || current_user_can('administrator')){ ?>
                <style>
                    .login-area > a{display:none !important}
                </style>
                <?php 
                $current_user = wp_get_current_user();
                update_user_meta( $current_user->ID, 'dokan_enable_selling', yes );
                ?>
                <div class="member-contror">
                    <div class="top-contror">
                        <a href="/my-profile/"><img src="<?php $avatar = get_user_meta($current_user->ID, 'ihc_avatar', true);$avatar_url = wp_get_attachment_image_src($avatar);
                            if($avatar_url){
                                echo $avatar_url[0]; 
                            }else{
                                echo get_avatar_url($current_user->ID);
                            }
                            ?>" /></a> 
                            <span>
                                <?php 
                                if($current_user->user_firstname){
                                    echo $current_user->user_firstname;
                                }else{
                                    echo $current_user->user_login;
                                } ?>
                            </span>   
                        </div>
                        <?php  wp_nav_menu(array('menu_class' => 'nav-member','container' => 'none','menu' => 'Main menu')); ?>
                    </div>
                    <?php 
                    if(current_user_can('free_membership') || current_user_can('basic_membership') || current_user_can('premium_membership')){ 
                        $current_user = wp_get_current_user();
                        $level_list_data = get_user_meta($current_user->ID, 'ihc_user_levels', true);
                        if (isset($level_list_data)){
                            $level_list_data = explode(',', $level_list_data);
                            foreach ($level_list_data as $id){
                                $temp_level_data = ihc_get_level_by_id($id);
                                $level_list_arr[] = $temp_level_data['order'];
                            }
                            if ($level_list_arr){
                                $level_list = implode(',', $level_list_arr);
                            }
                        }
                        if (in_array('2',$level_list_arr,true)) {
                            $user = new WP_User( $current_user->ID );
                            $user->set_role('premium_membership');
                        } else if (in_array('1',$level_list_arr,true)){
                            $user = new WP_User( $current_user->ID );
                            $user->set_role('basic_membership');
                        } else if (in_array('0',$level_list_arr,true)){
                            $user = new WP_User( $current_user->ID );
                            $user->set_role('free_membership');
                        }else{
                            //
                        }
                    }
                } ?>
                <a style="display:none" class="logout_link" href="<?php echo wp_logout_url( home_url() ); ?>">Log out </a>
            </div>

            <div class="search2">
                <form action="<?php bloginfo('url'); ?>" id="searchform" method="get" role="search">
                   <input id="s" type="search" title="Search for:" name="s" value="" placeholder="البحث عن المنتجات…" class="search-field" id="woocommerce-product-search-field">
                   <input type="submit" id="searchsubmit" value="بحث" />
                   <input type="hidden" value="product" name="post_type"/>
               </form>
           </div>


           <?php //echo do_shortcode('[nwadcart_widget]'); ?>
           <?php echo do_shortcode('[WooCommerceWooCartPro]'); ?>
           <div class="navigation-container">
            <!-- #site-navigation -->
            <button class="toggle-menu menu-right push-body">Menu <i class="fa fa-bars"></i></button>
        </div><!-- navigation-container -->
        <?php if( get_theme_mod( 'active_social' ) == '') : ?>

            <div class="header-social-container hide-on-mobile">

                <?php if ( get_theme_mod( 'bloggr_fb' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_fb' ); ?>">

                            <i class="fa fa-facebook"></i>

                        </a>

                    </li>

                <?php endif; ?>

                <?php if ( get_theme_mod( 'bloggr_twitter' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_twitter' ); ?>">

                            <i class="fa fa-twitter"></i>

                        </a>

                    </li>

                <?php endif; ?>

                <?php if ( get_theme_mod( 'bloggr_linked' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_linked' ); ?>">

                            <i class="fa fa-linkedin"></i>

                        </a>

                    </li>

                <?php endif; ?>

                <?php if ( get_theme_mod( 'bloggr_google' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_google' ); ?>">

                            <i class="fa fa-google-plus"></i>

                        </a>

                    </li>

                <?php endif; ?>

                <?php if ( get_theme_mod( 'bloggr_instagram' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_instagram' ); ?>">

                            <i class="fa fa-instagram"></i>

                        </a>

                    </li>

                <?php endif; ?>

                <?php if ( get_theme_mod( 'bloggr_flickr' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_flickr' ); ?>">

                            <i class="fa fa-flickr"></i>

                        </a>

                    </li>

                <?php endif; ?>

                <?php if ( get_theme_mod( 'bloggr_pinterest' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_pinterest' ); ?>">

                            <i class="fa fa-pinterest"></i>

                        </a>

                    </li>

                <?php endif; ?>

                <?php if ( get_theme_mod( 'bloggr_youtube' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_youtube' ); ?>">

                            <i class="fa fa-youtube"></i>

                        </a>

                    </li>

                <?php endif; ?>

                <?php if ( get_theme_mod( 'bloggr_vimeo' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_vimeo' ); ?>">

                            <i class="fa fa-vimeo-square"></i>

                        </a>

                    </li>

                <?php endif; ?>

                <?php if ( get_theme_mod( 'bloggr_tumblr' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_tumblr' ); ?>">

                            <i class="fa fa-tumblr"></i>

                        </a>

                    </li>

                <?php endif; ?>

                <?php if ( get_theme_mod( 'bloggr_dribbble' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_dribbble' ); ?>">

                            <i class="fa fa-dribbble"></i>

                        </a>

                    </li>

                <?php endif; ?>

                <?php if ( get_theme_mod( 'bloggr_rss' ) ) : ?>

                    <li>

                        <a href="<?php echo get_theme_mod( 'bloggr_rss' ); ?>">

                            <i class="fa fa-rss"></i>

                        </a>

                    </li>

                <?php endif; ?>

            </div>

        <?php else : ?>

        <?php endif; ?>

        <?php // end if ?>



    </div><!-- grid -->

</header><!-- #masthead -->



<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right">

    <h3>Menu</h3>

    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

</nav>



<div id="content" class="site-content">