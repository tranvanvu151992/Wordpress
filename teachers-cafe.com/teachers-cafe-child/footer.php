<?php

/**

 * The template for displaying the footer.

 *

 * Contains the closing of the #content div and all content after

 *

 * @package bloggr

 */

?>



	</div><!-- #content -->



	<footer id="colophon" class="site-footer" role="contentinfo">

    	<div class="grid grid-pad">

        	<div class="col-1-3">

            	<?php if( is_active_sidebar('footer-1') ): ?> 

            		<?php dynamic_sidebar('footer-1'); ?>

                <?php endif; ?>

            </div>

        	<div class="col-1-3">

            	<?php if( is_active_sidebar('footer-2') ): ?>

            		<?php dynamic_sidebar('footer-2'); ?>

                <?php endif; ?>

            </div>

        	<div class="col-1-3">

            	<?php if( is_active_sidebar('footer-3') ): ?>

            		<?php dynamic_sidebar('footer-3'); ?>

                <?php endif; ?> 

            </div>

			<div class="col-1-3">

            	<?php if( is_active_sidebar('footer-4') ): ?>

            		<?php dynamic_sidebar('footer-4'); ?>

                <?php endif; ?> 

            </div>

        </div>

		

    	<div class="grid grid-pad">

            <div class="col-1-1">

	<hr style="width:100%;background-color:#f1f1f1; color:#f1f1f1;">

                <div class="site-info">





<img src="<?php bloginfo('template_directory');?>/img/card.png" class="downArrow" />

			<img src="/wp-content/themes/teachers-cafe-child/images/ppcom.svg" class="downArrow" />
	

               

                </div><!-- .site-info -->

				<div class="footer-text">

                    <?php if ( get_theme_mod( 'bloggr_footerid' ) ) : ?>

        				<?php echo esc_html( get_theme_mod( 'bloggr_footerid' )); ?>   

					<?php else : ?>  

    					<?php	printf( __( ' %1$s  %2$s', 'teachers-cafe' ), '@ 2016 teachers-cafe', '<a href="http://teachers-cafe.com" rel="designer"></a>' ); ?>

					<?php endif; ?>

                </div>

                	

                <?php if( get_theme_mod( 'active_social' ) == '') : ?>

                <div class="social-container">

                				<?php if ( get_theme_mod( 'bloggr_fb' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_fb' )); ?>">

                                    <i class="fa fa-facebook"></i>

                                    </a>

                                    </li>

								<?php endif; ?>

                                <?php if ( get_theme_mod( 'bloggr_twitter' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_twitter' )); ?>">

                                    <i class="fa fa-twitter"></i>

                                    </a>

                                    </li>

								<?php endif; ?>

                                <?php if ( get_theme_mod( 'bloggr_linked' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_linked' )); ?>">

                                    <i class="fa fa-linkedin"></i>

                                    </a>

                                    </li>

								<?php endif; ?>

                                <?php if ( get_theme_mod( 'bloggr_google' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_google' )); ?>">

                                    <i class="fa fa-google-plus"></i>

                                    </a>

                                    </li>

								<?php endif; ?>

                                <?php if ( get_theme_mod( 'bloggr_instagram' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_instagram' )); ?>">

                                    <i class="fa fa-instagram"></i>

                                    </a>

                                    </li>

								<?php endif; ?>

                                <?php if ( get_theme_mod( 'bloggr_flickr' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_flickr' )); ?>">

                                    <i class="fa fa-flickr"></i>

                                    </a>

                                    </li>

								<?php endif; ?>

                                <?php if ( get_theme_mod( 'bloggr_pinterest' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_pinterest' )); ?>">

                                    <i class="fa fa-pinterest"></i>

                                    </a>

                                    </li>

								<?php endif; ?>

                                <?php if ( get_theme_mod( 'bloggr_youtube' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_youtube' )); ?>">

                                    <i class="fa fa-youtube"></i>

                                    </a>

                                    </li>

								<?php endif; ?>

                                <?php if ( get_theme_mod( 'bloggr_vimeo' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_vimeo' )); ?>">

                                    <i class="fa fa-vimeo-square"></i>

                                    </a>

                                    </li> 

								<?php endif; ?>

                                <?php if ( get_theme_mod( 'bloggr_tumblr' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_tumblr' )); ?>">

                                    <i class="fa fa-tumblr"></i>

                                    </a>

                                    </li>

								<?php endif; ?>

                                <?php if ( get_theme_mod( 'bloggr_dribbble' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_dribbble' )); ?>">

                                    <i class="fa fa-dribbble"></i>

                                    </a>

                                    </li>

								<?php endif; ?>

                                <?php if ( get_theme_mod( 'bloggr_rss' ) ) : ?>

                                	<li>

                                    <a href="<?php echo esc_url( get_theme_mod( 'bloggr_rss' )); ?>">  

                                    <i class="fa fa-rss"></i>

                                    </a>

                                    </li>   

								<?php endif; ?> 

                </div>

                 	 	<?php else : ?>  

					<?php endif; ?>

                <?php // end if ?> 

            </div>

        </div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<script>

    jQuery(document).ready(function($){

        $(".favorite-shop").click(function(){

            var currentuser = <?php echo get_current_user_id(); ?>;

            if(currentuser){

                var shopid = $(this).attr("idthisuser");

                var data = {

                    'action': 'favorite_shop_fc',

                    'userid': <?php echo get_current_user_id(); ?>,

                    'shopid': shopid

                };

                // We can also pass the url value separately from ajaxurl for front end AJAX implementations

                jQuery.post('<?php echo admin_url( "admin-ajax.php" ); ?>', data, function(response) {

                    location.reload();//$(this).replaceWith( $( ".favorite_shop_added" ) );

                });

            }else{

                alert("Please register account to add favorite this shop. Thanks!");

            }

        });

        var value = $('select.product_cat').val();

        if (value === '597' || value === '598'){

            $('.hide_cat_special').hide();

            $('.hide_cat_special select option').attr('selected',false);

            $('.hide_cat_special select option[value="-1"]').attr('selected','selected');

        } else {

            $('.hide_cat_special').show();

        }

        $('select.product_cat').change(function(){

            var value = $(this).val();

            if (value === '597' || value === '598'){

                $('.hide_cat_special').hide();

                $('.hide_cat_special select option').attr('selected',false);

                $('.hide_cat_special select option[value="-1"]').attr('selected','selected');

            } else {

                $('.hide_cat_special').show();

            }

        });
        //readonly
        $('.input_text.wc_file_url').prop('readonly', true);         

    });

</script>

<script type="text/javascript">

    jQuery(document).ready(function() {

        jQuery('.thanks-registering').fadeIn(1000);

        jQuery('.insite-popout3 .thanks-close').click(function() {

            jQuery('.thanks-registering').fadeOut(500);

        });

    });

</script>



<!-- Set type password -->

<script type="text/javascript">
    jQuery(document).ajaxComplete(function() {
        var b=   jQuery('.link_size').val();
        if(b >= 1 ){
         jQuery('#_visibility option:selected').val('visible');
        }
    });
    jQuery(document).ready(function() {
         jQuery('.upload_file_button').click(function(){
            jQuery('.media-router .media-menu-item').first().trigger('click');
        jQuery('.media-menu-item:first-child').addClass('active');

            jQuery('.media-router .media-menu-item').first().addClass('active');            
            //jQuery('.media-menu-item:nth-child(2)').removeClass('active');
        });
        jQuery('<p class="pass-regex"></p>').insertAfter('input[name="pass1"]');

        jQuery("input[name='pass1']").on('keyup', function() {

            var pattern = /^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]).*$/;

            if (pattern.test(jQuery(this).val())) {

                jQuery('.pass-regex').text('');

            }

            else {

                jQuery('.pass-regex').text('The password must have numbers, uppercase, lowercase, and special characters');

            }

        });

        jQuery('#createuser .iump-submit-form #ihc_submit_bttn').click(function() {

            var pattern = /^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]).*$/;

            if (pattern.test(jQuery("input[name='pass1']").val())) {

                return true;

            }

            else {

                jQuery('html, body').animate({

                    scrollTop: jQuery("input[name='pass1']").parents('.iump-form-line-register').offset().top

                }, 500);

                return false;

            }

        });



        jQuery('#student-register .ginput_container_password .ginput_left').append(jQuery('<p class="pass-regex-student"></p>'));

        jQuery('#student-register .ginput_container_password .ginput_left input[type="password"]').on('keyup', function() {

            var pattern1 = /^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]).*$/;

            if (pattern1.test(jQuery(this).val())) {

                jQuery('.pass-regex-student').text('');

            }

            else {

                jQuery('.pass-regex-student').text('The password must have numbers, uppercase, lowercase, and special characters');

            }

        });

        jQuery('#student-register .gform_footer input.gform_button').click(function() {

            var pattern1 = /^.*(?=.{6,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]).*$/;

            if (pattern1.test(jQuery('#student-register .ginput_container_password .ginput_left input[type="password"]').val())) {

                return true;

            }

            else {

                jQuery('#student-register .ginput_container_password .ginput_left input[type="password"]').val('');

                return true;

            }

        });

        jQuery('#disability-type').parent().addClass('select-disability');
      //  jQuery('.dokan-form-top-area #disability-type option:first-child').prop('value','');
        var edu_type = jQuery('select[name="edu-type"]').val();
        if(edu_type == '120') {
            jQuery('.dokan-form-group.select-disability').slideDown();
        }
        
        //check if Disability Type show
        //jQuery('form.dokan-product-edit-form').submit(function(e){            
            if(jQuery('.dokan-form-group.select-disability').css('display') == 'none'){                 
                
                jQuery('.dokan-alert.dokan-alert-danger .error-general:contains("Disability Type")').hide();  
                
            }else{        

                if (jQuery("#disability-type").val() == "-1") {                               
                   //jQuery('.dokan-alert.dokan-alert-danger .error-general:contains("Disability Type")').show();  
                   jQuery('.dokan-alert.dokan-alert-danger').append('<span class="error-general">Error Please select a Disability Type</span>');
                }
                else{                   
                   jQuery('.dokan-alert.dokan-alert-danger .error-general:contains("Disability Type")').hide();
                }
            }
            
            //check price
            // if(jQuery('.dokan-form-group.select_price').css('display') == 'none'){ 
                
            //     jQuery('.dokan-alert.dokan-alert-danger .error-general:contains("select price")').hide(); 
            // }else{   
            //     if(jQuery("#select-price").val() === "-1"){ 
            //         //alert('empty');    
            //         jQuery('.dokan-alert.dokan-alert-danger .error-general:contains("select price")').show();  
            //     }
            //     else{
            //        jQuery('.dokan-alert.dokan-alert-danger .error-general:contains("select price")').hide();
                   
            //     }
            // }
                        
        //});    
       
        
    });

</script>

<?php wp_footer(); ?>
<script type="text/javascript">
    /*jQuery(document).ready(function(){
        jQuery(document).ajaxComplete(function(){
            var value = jQuery('.dokan-product-edit-form select[name="_file_type"]').val();
            
            //var type = jQuery('.gin .input_text.wc_file_url').val();
           // var  = type.split('.').pop().toLowerCase();

           var ext1 = type.split('.');
           var ext = ext1[ext1.length-1];
            jQuery('#dokan-attribute-options .tagit-hidden-field').keyUp(function() {
                alert(value);
                if(value == '0') {
                    if(type != '') {
                        if(jQuery.inArray(ext, ['xlsx','xlsm','xlsb','xltx','xltm','xls','xlt','xml','xlam','xla','xlw']) == -1) {
                            alert('You can only upload one file format Sheet!');
                            return false;
                        }
                        else {
                            return true;
                        }
                    }
                }
                else {
                    if(type != '') {
                        if(jQuery.inArray(ext, ['pptx','pptm','ppt','pdf','xps','potx','potm','pot','thmx','pps','ppsx','ppsm','ppam','ppa','wmv','gif','jpg','png','tif','bmp','wmf','emf','rtf','odp']) == -1) {
                            alert('You can only upload one file format Power Point!');
                            return false;
                        }
                        else {
                            return true;
                        }
                    }
                }
            });
        });
    });*/
</script>
</body>

</html>