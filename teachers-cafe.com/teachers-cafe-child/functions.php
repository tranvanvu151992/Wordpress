<?php
load_theme_textdomain( 'teachers-cafe-child', templatepath.'/languages' );

function premium_member(){
	$user_query = new WP_User_Query( array( 'role' => 'premium_membership','orderby'=>'rand' ) );
    // User Loop
	if ( ! empty( $user_query->results ) || is_home() || is_front_page()) {
		echo '<div class="pre-member-area">';
		echo '<h3 class="pre-member-title" style="margin-left:5px;">عضوية ممتازة</h3>';
		echo '<ul class="pre-memebers">';
		foreach ( $user_query->results as $user ) {
			?>
			<li>
				<a href="/store/?au_id=<?php echo $user->ID; ?>"><img src="<?php $avatar = get_user_meta($user->ID, 'ihc_avatar', true);$avatar_url = wp_get_attachment_image_src($avatar);
					if($avatar_url){
						echo $avatar_url[0]; 
					}else{
						echo get_avatar_url($user->ID);
					}    
					?>" /></a> 
					<div class="right-user">
						<p><?php echo $user->display_name; ?></p>
						<p><?php echo get_user_meta($user->ID, 'country', true); ?></p>
						<p class="subject"><a href="/store/?au_id=<?php echo $user->ID; ?>">موضوع</a></p>
					</div>
				</li>
				<?php    
			}
			echo '</ul>';
			echo '</div>';
		} else {
        //echo 'No users found.';
		}
	}
/**
         * Create custom taxonomy for products
         */    
function create_product_taxonomy() {


	$labels = array(

		'name'              => _x( 'Educational Country', 'taxonomy general name' ),

		'singular_name'     => _x( 'Educational Country', 'taxonomy singular name' ),

		'search_items'      => __( 'Search Educational Country' ),

		'all_items'         => __( 'All Educational Country' ),

		'parent_item'       => __( 'Parent Educational Country' ),

		'parent_item_colon' => __( 'Parent Educational Country:' ),

		'edit_item'         => __( 'Edit Educational Country' ), 

		'update_item'       => __( 'Update Product Category' ),

		'add_new_item'      => __( 'Add New Educational Country' ),

		'new_item_name'     => __( 'New Educational Country' ),

		'menu_name'         => __( 'Educational Country' ),

		);



	$args = array(

		'labels' => $labels,

		'hierarchical' => true,

		'query_var' => true,

		'rewrite' => true,

		'show_admin_column' => true

		);



	register_taxonomy( 'edu-Country', 'product', $args );

	$labels = array(

		'name'              => _x( 'Educational Type', 'taxonomy general name' ),

		'singular_name'     => _x( 'Educational Type', 'taxonomy singular name' ),

		'search_items'      => __( 'Search Educational Type' ),

		'all_items'         => __( 'All Educational Type' ),

		'parent_item'       => __( 'Parent Educational Type' ),

		'parent_item_colon' => __( 'Parent Educational Type' ),

		'edit_item'         => __( 'Edit Educational Type' ), 

		'update_item'       => __( 'Update Educational Type' ),

		'add_new_item'      => __( 'Add New Educational Type' ),

		'new_item_name'     => __( 'New Educational Type' ),

		'menu_name'         => __( 'Educational Type' ),

		);



	$args = array(

		'labels' => $labels,

		'hierarchical' => true,

		'query_var' => true,

		'rewrite' => true,

		'show_admin_column' => true

		);



	register_taxonomy( 'edu-type', 'product', $args );

	$labels = array(

		'name'              => _x( 'Disability Type', 'taxonomy general name' ),

		'singular_name'     => _x( 'Disability Type', 'taxonomy singular name' ),

		'search_items'      => __( 'Search Disability Type' ),

		'all_items'         => __( 'All Disability Type' ),

		'parent_item'       => __( 'Parent Disability Type' ),

		'parent_item_colon' => __( 'Parent Disability Type' ),

		'edit_item'         => __( 'Edit Disability Type' ), 

		'update_item'       => __( 'Update Disability Type' ),

		'add_new_item'      => __( 'Add New Disability Type' ),

		'new_item_name'     => __( 'New Disability Type' ),

		'menu_name'         => __( 'Disability Type' ),

		);



	$args = array(

		'labels' => $labels,

		'hierarchical' => true,

		'query_var' => true,

		'rewrite' => true,

		'show_admin_column' => true

		);



	register_taxonomy( 'disability-type', 'product', $args );



	$labels = array(

		'name'              => _x( 'Educational Content', 'taxonomy general name' ),

		'singular_name'     => _x( 'Educational Content', 'taxonomy singular name' ),

		'search_items'      => __( 'Search Educational Content' ),

		'all_items'         => __( 'All Educational Content' ),

		'parent_item'       => __( 'Parent Educational Content' ),

		'parent_item_colon' => __( 'Parent Educational Content' ),

		'edit_item'         => __( 'Edit Educational Content' ), 

		'update_item'       => __( 'Update Educational Content' ),

		'add_new_item'      => __( 'Add New Educational Content' ),

		'new_item_name'     => __( 'New Educational Content' ),

		'menu_name'         => __( 'Educational Content' ),

		);



	$args = array(

		'labels' => $labels,

		'hierarchical' => true,

		'query_var' => true,

		'rewrite' => true,

		'show_admin_column' => true

		);



	register_taxonomy( 'edu-content', 'product', $args );



	$labels = array( 
		'name'              => _x( 'Subject', 'taxonomy general name' ),
		'singular_name'     => _x( 'Subject', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Subject' ),
		'all_items'         => __( 'All Subject' ),
		'parent_item'       => __( 'Parent Subject' ),
		'parent_item_colon' => __( 'Parent Subject' ),
		'edit_item'         => __( 'Edit Subject' ), 
		'update_item'       => __( 'Update Subject' ),
		'add_new_item'      => __( 'Add New Subject' ),
		'new_item_name'     => __( 'New Subject' ),
		'menu_name'         => __( 'Subject' ),
		);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,  
		'query_var' => true,  
		'rewrite' => true,
		'show_admin_column' => true
		);
	register_taxonomy( 'subject', 'product', $args );
	$labels = array(

		'name'              => _x( 'Grade', 'taxonomy general name' ),

		'singular_name'     => _x( 'Grade', 'taxonomy singular name' ),

		'search_items'      => __( 'Search Grade' ),

		'all_items'         => __( 'All Grade' ),

		'parent_item'       => __( 'Parent Grade' ),

		'parent_item_colon' => __( 'Parent Grade' ),

		'edit_item'         => __( 'Edit Grade' ), 

		'update_item'       => __( 'Update Grade' ),

		'add_new_item'      => __( 'Add New Grade' ),

		'new_item_name'     => __( 'New Grade' ),

		'menu_name'         => __( 'Grade' ),

		);



	$args = array(

		'labels' => $labels,

		'hierarchical' => true,

		'query_var' => true,

		'rewrite' => true,

		'show_admin_column' => true

		);
	register_taxonomy( 'grade', 'product', $args );

}
add_action( 'init', 'create_product_taxonomy', 0 );
function ads_cpt_columns($columns) {

	$new_columns = array(

		'shortcode_ad' => __('Shortcode', 'ThemeName')

		);

	return array_merge($columns, $new_columns);
}

//add_filter('manage_ads_posts_columns' , 'ads_cpt_columns');
function ads_post_table_row( $column_name, $post_id ) {
	$custom_fields = get_post_custom( $post_id );

	switch ($column_name) {
		case 'shortcode_ad' :
		echo '[ad-banenr id="'.$post_id.'"]';
		break;
		default:

	}

}

//add_action( 'manage_ads_posts_custom_column', 'ads_post_table_row', 10, 2 );

function show_ads_func( $atts ) {
	ob_start();
	$args=array(
		'post_type' =>'ads',
		'posts_per_page'=>3,
		'orderby' =>'rand',
      //'post__not_in' => $array1,
      //'offset' => 1
		);           
	$query= new WP_Query($args);   
     // var_dump($query);      
	if($query->have_posts()):
		while($query->have_posts()) :$query->the_post();    
	$id = get_the_ID();                     
	if( have_rows('upload_image_ad') ):
              $rows = get_field('upload_image_ad'); // get all the rows
          shuffle( $rows);
            //$rand_row = $rows[ array_rand( $rows ) ]; // get a random row
            //var_dump($rand_row);
          foreach($rows as $row){
          	$image = wp_get_attachment_image_src( $row['image'], 'full' );
          	?>
          	<p class="adcount">
          		<a href="<?php echo $row['ad_url']; ?>" target="_blank" style="display: block; text-align: center;">
          			<img class="ad-images" src="<?php echo $row['image']; ?>" alt="" />
          		</a>
          	</p>
          	<?php
          	break;
          }
          endif;         
          endwhile;                                      
          endif;
      //array_push($array1, $id);
          wp_reset_query();
          $output = ob_get_contents();
          ob_end_clean();
          return $output;
      }
      add_shortcode( 'ad-banenr', 'show_ads_func' );




      function remote_filesize($url) {
      	static $regex = '/^Content-Length: *+\K\d++$/im';
      	if (!$fp = @fopen($url, 'rb')) {
      		return false;
      	}
      	if (
      		isset($http_response_header) &&
      		preg_match($regex, implode("\n", $http_response_header), $matches)
      		) {
      		return (int)$matches[0];
      }
      return strlen(stream_get_contents($fp));
  }
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

  add_action( 'woocommerce_before_add_to_cart_button', 'woocommerce_template_single_meta_remove_category',10 );
  function woocommerce_template_single_meta_remove_category(){    
  	global $post, $product;
  	$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
  	$edu_country = get_the_terms( $post->ID, 'edu-Country' );
  	$edu_type = get_the_terms( $post->ID, 'edu-type' );
  	$disability = get_the_terms( $post->ID, 'disability-type' );
  	$edu_content = get_the_terms( $post->ID, 'edu-content' );
  	$subject = get_the_terms( $post->ID, 'subject' );
  	$grade = get_the_terms( $post->ID, 'grade' );
  	$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
  	?>
  	<?php //echo get_the_term_list( $post->ID, 'subject' , '' , ',' , '.' ); ?>
  	<div class="product_meta">
  		<?php do_action( 'woocommerce_product_meta_start' ); ?>
  		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
  			<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span>.</span>
  		<?php endif; ?>
  		<h5>نظرة عامة</h5>
  		<?php if (!empty($edu_country)){ ?>
  		<p class="edu">البلد التربوي:
  			<?php   foreach( $edu_country as $edu_countrys ) {
  				echo $edu_countrys->name.", ";
  			}
  		}
  		?>
  	</p>
  	<?php if (!empty($edu_type)){ ?>
  	<p class="edu">نوع التعليمي:
  		<?php   foreach( $edu_type as $edu_types ) {
  			echo $edu_types->name.", ";
  		}  
  	}
  	?>
  </p>
  <?php if (!empty($disability)){ ?>
  <p class="edu">نوع الإعاقة:
  	<?php   foreach( $disability as $disabilitys ) {
  		echo $disabilitys->name.", ";
  	}
  }
  ?>
</p>
<?php if (!empty($edu_content)){ ?>
<p class="edu">المحتوى التعليمي:
	<?php foreach( $edu_content as $edu_contents ) {
		echo $edu_contents->name.", ";
	}
}
?>
</p>
<?php if (!empty($subject)){ ?>
<p class="edu">موضوع:
	<?php   foreach( $subject as $subjects ) {
		echo $subjects->name.", ";
	}
}
?>
</p>
<?php if (!empty($grade)){ ?>
<p class="edu">درجة:
	<?php   foreach( $grade as $grades ) {
		echo $grades->name.", ";
	}
}
?>
</p>
<!-- echo $product->get_categories( ', ', '<span class="posted_in">' . _n( '', '', $cat_count, 'woocommerce' ) . ' ', '.</span>' ); 
	echo $product->get_tags( ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', $tag_count, 'woocommerce' ) . ' ', '.</span>' );  -->
	<?php do_action( 'woocommerce_product_meta_end' ); ?>
</div>
<?php
}
add_filter('widget_text', 'do_shortcode');
function pippin_change_password_form() {

	global $post;   



	if (is_singular()) :

		$current_url = get_permalink($post->ID);

	else :

		$pageURL = 'http';

	if ($_SERVER["HTTPS"] == "on") $pageURL .= "s";

	$pageURL .= "://";

	if ($_SERVER["SERVER_PORT"] != "80") $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

	else $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

	$current_url = $pageURL;

	endif;      

	$redirect = $current_url;



	ob_start();

        // show any error messages after form submission
	pippin_show_error_messages(); ?>
	<?php if(isset($_GET['password-reset']) && $_GET['password-reset'] == 'true') { ?>
	<div class="pippin_message success">
		<span><?php _e('Password changed successfully', 'rcp'); ?></span>
	</div>
	<?php } ?>

	<form id="pippin_password_form" method="POST" action="<?php echo $current_url; ?>">

		<fieldset>

			<p style="margin-bottom: 20px;">

				<label for="pippin_user_pass"><?php _e('كلمة السر الجديدة', 'rcp'); ?></label>

				<input name="pippin_user_pass" id="pippin_user_pass" class="required" type="password"/>

			</p>

			<p>

				<label for="pippin_user_pass_confirm"><?php _e('تأكيد كلمة المرور', 'rcp'); ?></label>

				<input name="pippin_user_pass_confirm" id="pippin_user_pass_confirm" class="required" type="password"/>

			</p>

			<p style="clear: both;">

				<input type="hidden" name="pippin_action" value="reset-password"/>

				<input type="hidden" name="pippin_redirect" value="<?php echo $redirect; ?>"/>

				<input type="hidden" name="pippin_password_nonce" value="<?php echo wp_create_nonce('rcp-password-nonce'); ?>"/>

				<input id="pippin_password_submit" type="submit" value="<?php _e('تغيير كلمة السر', 'pippin'); ?>"/>

			</p>

		</fieldset>

	</form>

	<?php

	return ob_get_clean();  

}



// password reset form

function pippin_reset_password_form() {

	if(is_user_logged_in()) {

		return pippin_change_password_form();
	}
}
add_shortcode('password_form', 'pippin_reset_password_form');
function pippin_reset_password() {
    // reset a users password
	if(isset($_POST['pippin_action']) && $_POST['pippin_action'] == 'reset-password') {

		global $user_ID;
		if(!is_user_logged_in())
			return;
		if(wp_verify_nonce($_POST['pippin_password_nonce'], 'rcp-password-nonce')) {
			if($_POST['pippin_user_pass'] == '' || $_POST['pippin_user_pass_confirm'] == '') {
                // password(s) field empty
				pippin_errors()->add('password_empty', __('الرجاء إدخال كلمة السر، وتأكيد ذلك', 'pippin'));
			}
			if($_POST['pippin_user_pass'] != $_POST['pippin_user_pass_confirm']) {
                // passwords do not match
				pippin_errors()->add('password_mismatch', __('كلمات المرور غير متطابقة', 'pippin'));
			}
            // retrieve all error messages, if any
			$errors = pippin_errors()->get_error_messages();
			if(empty($errors)) {
                // change the password here
				$user_data = array(
					'ID' => $user_ID,
					'user_pass' => $_POST['pippin_user_pass']
					);
				wp_update_user($user_data);
                // send password change email here (if WP doesn't)
				wp_redirect(add_query_arg('password-reset', 'true', $_POST['pippin_redirect']));
				exit;
			}
		}
	}   
}
add_action('init', 'pippin_reset_password');
if(!function_exists('pippin_show_error_messages')) {
    // displays error messages from form submissions
	function pippin_show_error_messages() {
		if($codes = pippin_errors()->get_error_codes()) {
			echo '<div class="pippin_message error">';
                // Loop error codes and display errors
			foreach($codes as $code){
				$message = pippin_errors()->get_error_message($code);
				echo '<span class="pippin_error"><strong>' . __('خطأ', 'rcp') . '</strong>: ' . $message . '</span><br/>';
			}
			echo '</div>';
		}   
	}
}
if(!function_exists('pippin_errors')) { 
    // used for tracking error messages
	function pippin_errors(){
        static $wp_error; // Will hold global variable safely
        return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
    }
}

// get total upload file size by user ID
function total_files_size(){
	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => -1,
		'author'         => get_current_user_id(),
		'orderby'        => 'post_date',
		'order'          => 'DESC',
		'post_status' => 'any',
		);
	$my_query = null;
	$my_query = new WP_Query($args);
	if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post();
	global $product,$woocommerce;
        // Variable product total files size
	if($product->product_type == 'variable'){
		$available_variations = $product->get_available_variations();
		foreach($available_variations as $available_variation){
			$variation_id = $available_variation['variation_id'];
			$variable_product= new WC_Product_Variation( $variation_id );
			$variable_product_files = $variable_product->get_files();
			foreach($variable_product_files as $variable_product_file){
				$file_url = $variable_product_file['file'];
				$size = remote_filesize($file_url);
				$total_variable_size += $size; 
              //  echo $file_url.'-'.$size.'-'.$product->id.'<br>';
			}
		}
	}
        // Simple product total files size
	if($product->product_type == 'simple'){
		$simple_product_files = $product->get_files();
		foreach($simple_product_files as $simple_product_file){
			$file_url = $simple_product_file['file'];
			$size = remote_filesize($file_url);
			$total_simple_size += $size; 
               // echo $file_url.'-'.$size.'<br>';
		}
	}
	endwhile; 
	else :
        // notthing
		endif;
	return $total_variable_size+$total_simple_size;
}
function progressbar(){
	?>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<?php
	if(current_user_can('basic_membership') || current_user_can('administrator') || current_user_can('premium_membership')){
		$total_files_size = total_files_size();
		if(current_user_can('administrator') || current_user_can('premium_membership')){
            $max_size = 1073741824;// 1GB
            $per_size = ($total_files_size*100)/$max_size;
            
            // show current size 
            if(($total_files_size >= 1024)&&($total_files_size < 1048576)){
            	$pre_size = round($total_files_size/1024,2).'KB';
            }else if(($total_files_size >= 1048576)&&($total_files_size < $max_size)){
            	$pre_size = round($total_files_size/1048576,2).'MB';
            }else if($total_files_size == $max_size){
            	$pre_size = '1GB';
            }else if($total_files_size < 1024){
            	$pre_size = $total_files_size.'BYTES';
            }
            ?>
            <script>
            	jQuery(document).ready(function($) {
            		$( "#progressbar" ).progressbar({
            			value: <?php echo $per_size; ?>
            		});
            		$('.ui-progressbar-value.ui-widget-header.ui-corner-left').css('width','<?php echo $per_size; ?>%');
            	});
            </script>
            <div class="procesbar-content" style="float: right; margin-top: 10px;">
            	<div id="progressbar"></div><span class="size-field"><?php echo $pre_size; ?> / 1GB</span>
            	<div class="clear"></div>
            </div>
            <?php
        }
        if(current_user_can('basic_membership')){ 
            $max_size = 104857600; // 100MB
            $per_size = ($total_files_size*100)/$max_size;
            
            // show current size
            if(($total_files_size >= 1024)&&($total_files_size < 1048576)){
            	$pre_size = round($total_files_size/1024,2).'KB';
            }else if(($total_files_size >= 1048576)&&($total_files_size < $max_size)){
            	$pre_size = round($total_files_size/1048576,2).'MB';
            }else if($total_files_size == $max_size){
            	$pre_size = '100MB';
            }else if($total_files_size < 1024){
            	$pre_size = $total_files_size.'BYTES';
            }
            ?>
            <script>
            	jQuery(document).ready(function($) {
            		$( "#progressbar" ).progressbar({
            			value: <?php echo $per_size; ?>
            		});
            		$('.ui-progressbar-value.ui-widget-header.ui-corner-left').css('width','<?php echo $per_size; ?>%');
            	});
            </script>
            <div class="procesbar-content" style="float: right; margin-top: 10px;">
            	<div id="progressbar"></div><span class="size-field"><?php echo $pre_size; ?> / 100MB</span>
            	<div class="clear"></div>
            </div>
            <?php 
        }  
    }    
}


add_action( 'wp_ajax_minus_file_size', 'minus_file_size' );
add_action( 'wp_ajax_nopriv_minus_file_size', 'minus_file_size' );
function minus_file_size() {
	$url = $_POST['url'];
	$not_del = $_POST['not_del'];
	$total_size_file = $_POST['total_size_file'];
	$current_count_file = $_POST['current_count_file'];
	$message = array();
	if(current_user_can('basic_membership')){ 
		$current_total_size = $total_size_file;
		$file_size = remote_filesize($url);
		$message['member'] = 'vip';
	} else if(current_user_can('administrator')||current_user_can('premium_membership')){
		$current_total_size = $total_size_file;
		$file_size = remote_filesize($url);
		$message['member'] = 'vip';
	} else if (current_user_can('free_membership')){
		$current_total_size = $total_size_file;
		$file_size = 1;
		$message['member'] = 'free';
	}

	if ($not_del === 'edit'){
		if (current_user_can('free_membership')){
			$message['total'] = intval($current_total_size) - intval($file_size);
		} else {
			$message['total'] = intval($current_total_size) - intval($file_size);
		}
	} else {
		$message['total'] = intval($current_total_size);
	}
	wp_send_json_success($message);
	die();
}
// check simple product upload file
add_action( 'wp_ajax_check_file_size', 'check_file_size' );
add_action( 'wp_ajax_nopriv_check_file_size', 'check_file_size' );
function check_file_size() {
	$url = $_POST['url'];
	$file_size = remote_filesize($url);
	$current_total_size = total_files_size();
	if(current_user_can('basic_membership')){ 
        $max_size = 104857600; // 100MB
        if($file_size+$current_total_size>$max_size){
        	?>
        	<script>
        		jQuery(document).ready(function($){
        			alert('you had upload files exceeded the allowed limit')
        			//jQuery(document).ajaxComplete(function($){
        			//jQuery('#custom_dokan_new').prop( "disabled", true );
        	//	});
        	})
        	</script>
        	<?php
        }else{
        	?>
        	<script>
        		jQuery(document).ready(function($){
        			$('#click-done').click();
        		})
        	</script>
        	<?php
        }
    }
    if(current_user_can('administrator')||current_user_can('premium_membership')){
        $max_size = 1073741824;// 1GB
        if($file_size+$current_total_size>$max_size){
        	?>
        	<script>
        		jQuery(document).ready(function($){
        			alert('you had upload files exceeded the allowed limit')
        		})
        	</script>
        	<?php
        }else{
        	?>
        	<script>
        		jQuery(document).ready(function($){
        			$('#click-done').click();
        		})
        	</script>
        	<?php
        }
    }
    die();
}

add_action('template_include', 'new_search_tmpl');
function new_search_tmpl( $template ) {
	if( isset($_REQUEST['filter']) == 'advanced' ) {
		$t = locate_template('advanced-search-results.php', false);
		if ( ! empty($t) ) $template = $t;
	}
	return $template;
}
add_action('wp_head','count_files');

// count files
function count_files(){
	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => -1,
		'author'         => get_current_user_id(),
		'orderby'        => 'post_date',
		'order'          => 'DESC',
		'post_status' => 'any',
		);
	$my_query = null;
	$my_query = new WP_Query($args);

	$i=0;
	$j=0;
	if ( $my_query->have_posts() ) : while ( $my_query->have_posts() )  : $i++; $my_query->the_post();
	global $product,$woocommerce;
   if($product->product_type == 'simple'){
        $simple_product_files = $product->get_files();
        foreach($simple_product_files as $simple_product_file){  
            $j++;   
        }

  }
	endwhile; 
	else :
		endif;
	$i++;
	$count_simple_product = $j++;
	return $count_simple_product;
	return $count_variable_product;
}

// check count file upload after click delete
add_action( 'wp_ajax_check_count_file_after_delete', 'check_count_file_after_delete' );
add_action( 'wp_ajax_nopriv_check_count_file_after_delete', 'check_count_file_after_delete' );
function check_count_file_after_delete() {
	$current_count = $_POST['current_count'];
	$count_after_delete = $current_count-1;
	echo $count_after_delete;
	die();
}

add_action( 'wp_ajax_check_count_file', 'check_count_file' );
add_action( 'wp_ajax_nopriv_check_count_file', 'check_count_file' );
function check_count_file() {
	$current_count = $_POST['current_count'];
	if($current_count >= 4){ ?>
		<script>
			jQuery(document).ready(function($){
				alert("لقد تم تحميلها أكثر من 4 ملفات");
			})
		</script>
		<?php
	}else{
		?>
		<script>
			jQuery(document).ready(function($){
				$('#click-done').click();
			})
		</script>
		<?php
	}
	die();
}

add_action('woocommerce_before_single_product','header_single_woo');
function header_single_woo(){
	$author_id =  get_the_author_id();
	$author_info = get_userdata($author_id);
	?>
	<div class="header-single-woo">
		<div class="header-sing-l">
			<a href="/store/?au_id=<?php echo $author_id; ?>"><img src="<?php $avatar = get_user_meta($author_id, 'ihc_avatar', true);$avatar_url = wp_get_attachment_image_src($avatar);
				if($avatar_url){
					echo $avatar_url[0]; 
				}else{
					echo get_avatar_url($author_id);
				}
				?>" /></a>
				<h2><a href="/store/?au_id=<?php echo $author_id; ?>"><?php echo $author_info->user_login; ?></a></h2>
				<?php 
				$check2 = explode(",",get_user_meta( $author_id, 'favorite', true ));
				$currentuser = get_current_user_id();
				if (in_array($currentuser, $check2) && $currentuser){
					?>
					<span class="favorite_shop_added" idthisuser="<?php echo $author_id; ?>">وأضاف المفضلة</span>
					<?php
				}else{
					?>
					<span class="favorite-shop" idthisuser="<?php echo $author_id; ?>">ورشة المفضل</span>
					<?php
				}
				?>

			</div>
			<div class="header-sing-r">
				<?php 
            //wp_reset_query();
				$exclude_ids = array( get_the_ID() );
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => -1,
					'author'         => $author_id,
					'orderby'        => 'post_date',
					'order'          => 'DESC',
					'post_status' => 'publish',
					'post__not_in' => $exclude_ids
					);
				$my_query = null;
				$my_query = new WP_Query($args);
				echo '<ul class="au_relate_products">';
				$i=0;
				if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post();
				if($i<2){
					?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<?php if(!get_the_post_thumbnail()){
								echo '<img src="/wp-content/plugins/woocommerce/assets/images/placeholder.png">';
							}else{
								the_post_thumbnail(array(100,100));
							} ?>
							<h3><?php the_title(); ?></h3>
						</a>
					</li>
					<?php
				}
				$i++;
				endwhile; 
				$count_i = $i++;
				if($count_i > 2){
					?>
					<li class="pro-plus">
						<a href="/store/?au_id=<?php echo $author_id; ?>">
							<?php echo $count_i-2 .'<br><span>العناصر</span>'; ?>
						</a>
					</li>
					<?php };
					else :
                // notthing
						endif;
					echo '</ul>';
					wp_reset_query();
					?>
				</div>
			</div>
			<?php    
		}
		remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
		add_action('woocommerce_before_add_to_cart_button','woocommerce_template_single_excerpt',9);

		add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
		function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
    // Adds the new tab
	$tabs['test_tab'] = array(
		'title'     => __( 'تفاصيل البند', 'woocommerce' ),
		'priority'  => 1,
		'callback'  => 'woo_new_product_tab_content'
		);
	return $tabs;
}
function woo_new_product_tab_content() {
    // The new tab content
    //echo '<h2>New Product Tab</h2>';
	the_excerpt();
}

function register_add_price_submenu_page() {
	add_submenu_page( 'edit.php?post_type=product', 'Add Price', 'Add Price', 'manage_options', 'add_price-submenu-page', 'add_price_submenu_page_callback' ); 
}
function add_price_submenu_page_callback() {
	?>
	<div class="wrap">
		<!-- <h3>Add Price</h3> -->
		<form method="post" action="options.php">
			<?php
			settings_fields("section");
			do_settings_sections("theme-options");      
			submit_button(); 
			?>          
		</form>
	</div>
	<?php
}
add_action('admin_menu', 'register_add_price_submenu_page',99);


function display_price_element()
{
	?>
	<input placeholder='Enter some text, or some price by "|" separating values.' type="text" name="new_price" id="new_price" value="<?php echo get_option('new_price'); ?>" style="width: 100%;"/>
	<?php
}
function display_file_type_element()
{
	?>
	<input placeholder='Enter some text, or some price by "|" separating values.' type="text" name="file_type" id="file_type" value="<?php echo get_option('file_type'); ?>" style="width: 100%;"/>
	<?php
}
function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");

	add_settings_field("new_price", "New Price", "display_price_element", "theme-options", "section");
	add_settings_field("file_type", "File Type", "display_file_type_element", "theme-options", "section");

	register_setting("section", "new_price");
	register_setting("section", "file_type");
}

add_action("admin_init", "display_theme_panel_fields");
class Navigation_Catwalker extends Walker_Category {

// Configure the start of each level
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "";
	}

// Configure the end of each level
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "";
	}

// Configure the start of each element
	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0) {

    // Set the category name and slug as a variables for later use
		$cat_name = esc_attr( $category->name );
		$cat_name = apply_filters( 'list_cats', $cat_name, $category );
		$cat_slug = esc_attr( $category->slug );
		$n_depth = $depth + 1;
		$termchildren = get_term_children( $category->term_id, $category->taxonomy );

		if(count($termchildren)===0){
			$class .=  '';
		}else{
			$class .=  'menu-item-has-children';
		}
    // Configure the output for the top list element and its URL
		if ( $depth === 0 ) {
			$link = '<a class="parent-category-dropdown" href="' . esc_url( get_term_link($category) ) . '"' . '>' . $cat_name . '</a>';
			$indent = str_repeat("\t", $depth);
			$output .= "\t<li class=' parent-category $class " . $cat_slug . "' data-level='$n_depth'>$link\n$indent<ul class='sub-menu'>\n";
		}

    // Configure the output for lower level list elements and their URL's
		if ( $depth === 1 ) {
			$link = '<a href="' . esc_url( get_term_link($category) ) . '"' . '>' . $cat_name . '</a>';
     //   $output .= "\t<li class='sub-category-1 $class' data-level='$n_depth'>$link\n";
			$indent = str_repeat("\t", $depth);
			$output .= "\t<li class='sub-category-1 $class " . $cat_slug . "' data-level='$n_depth'>$link\n$indent<ul class='sub-menu-1'>\n";
		} 
		if( $depth > 1) {
			$link = '<a href="' . esc_url( get_term_link($category) ) . '"' . '>' . $cat_name . '</a>';
			$output .= "\n<li class='sub-category-2 $class' data-level='$n_depth'>$link\n";
		}


	}

// Configure the end of each element
	function end_el(&$output, $page, $depth = 0, $args = array() ) {
		if ( $depth === 0 ) {
			$indent = str_repeat("\t", $depth);
			$output .= "$indent</ul>\n";
		}
		if ( $depth === 1 ) {
			$indent = str_repeat("\t", $depth);
			$output .= "$indent</ul>\n";    
		}
		if ( $depth > 0 ) {
			$output .= "</li>";
		}

	}
}
function get_term_current_level_1(){
	$term_id = $_POST['id_level_1'];
	$taxonomy_name = 'product_cat';

	$args = array(
		'hierarchical' => 1,
		'show_option_none' => '',
		'hide_empty' => 0,
		'parent' => $term_id,
		'taxonomy' => $taxonomy_name
		);
	$subcats = get_categories($args);
	$return = '<option value=""> - اختيار موضوع - </option>';
	foreach ($subcats as $sc) {
		$return .= '<option value="'.$sc->term_id.'">' . $sc->name . '</option>';
	}
	wp_send_json_success( $return );
	die();
}
add_action( 'wp_ajax_nopriv_get_term_current_level_1', 'get_term_current_level_1' );
add_action( 'wp_ajax_get_term_current_level_1', 'get_term_current_level_1' );

function get_term_current_level_2(){
	$term_id = $_POST['id_level_2'];
	$taxonomy_name = 'product_cat';
	$args = array(
		'hierarchical' => 1,
		'show_option_none' => '',
		'hide_empty' => 0,
		'parent' => $term_id,
		'taxonomy' => $taxonomy_name
		);
	$subcats = get_categories($args);
	$return = '<option value=""> - حدد الصف - </option>';
	foreach ($subcats as $sc) {
		$return .= '<option value="'.$sc->term_id.'">' . $sc->name . '</option>';
	}
	wp_send_json_success( $return );
	die();
}
add_action( 'wp_ajax_nopriv_get_term_current_level_2', 'get_term_current_level_2' );
add_action( 'wp_ajax_get_term_current_level_2', 'get_term_current_level_2' );

//add_action('wp_head','hook_jquery');

function hook_jquery() {
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('select.cat_level_1').change(function(){
				var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
				var id_level_1 = $(this).val();
				var data = {
					'action': 'get_term_current_level_1',
					'id_level_1':id_level_1,
				};
				jQuery.post(ajaxurl, data, function(resp) {
					if( resp.success ) {
						$('.cat_level_2').html(resp['data']);     
					}
				});
			});
			$('select.cat_level_2').change(function(){
				var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
				var id_level_2 = $(this).val();
				var data = {
					'action': 'get_term_current_level_2',
					'id_level_2':id_level_2,
				};
				jQuery.post(ajaxurl, data, function(resp) {
					if( resp.success ) {
						$('.cat_level_3').html(resp['data']);     
					}
				});
			});
		});
	</script>
	<?php
}

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_checkout_shipping', 'woocommerce_checkout_payment',9999);

add_action('woocommerce_after_single_product_summary','author_other_products',11);
function author_other_products(){
	$author_id =  get_the_author_id();
	$author_info = get_userdata($author_id);
	$exclude_ids = array( get_the_ID );
	?>
	<div class="author-single-woo">
		<div class="author-sing-top">
			<a href="/store/?au_id=<?php echo $author_id; ?>"><img src="<?php $avatar = get_user_meta($author_id, 'ihc_avatar', true);$avatar_url = wp_get_attachment_image_src($avatar);
				if($avatar_url){
					echo $avatar_url[0]; 
				}else{
					echo get_avatar_url($author_id);
				}
				?>" /></a>
				<h2><a href="/store/?au_id=<?php echo $author_id; ?>"><?php echo $author_info->user_login; ?></a></h2>
			</div>
			<div class="author-sing-bot">
				<?php 
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => 4,
					'author'         => $author_id,
					'orderby'        => 'post_date',
					'order'          => 'DESC',
					'post_status' => 'publish',
					);
				$my_query = null;
				$my_query = new WP_Query($args);
				echo '<ul class="au_other_products">';
				$i=0;
				if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post();
            //if($i<2){
				?>
				<li>
					<a href="<?php the_permalink(); ?>">
						<?php if(!get_the_post_thumbnail()){
							echo '<img src="/wp-content/plugins/woocommerce/assets/images/placeholder.png">';
						}else{
							the_post_thumbnail(array(150,150));
						} ?>
						<h3><?php the_title(); ?></h3>
						<?php woocommerce_get_template( 'loop/price.php' ); ?>
					</a>
				</li>
				<?php
            //}
				$i++;
				endwhile; 
				else :
                // notthing
					endif;
				echo '</ul>';
				wp_reset_query();
				?>
			</div>
			<?php
			global $product;
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
				return;
			}
			$rating_count = $product->get_rating_count();
			$review_count = $product->get_review_count();
			$average      = $product->get_average_rating();
			if ( $rating_count > 0 ) : ?>

			<div class="woocommerce-product-rating move" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
				<a href="#tab-reviews" class="woocommerce-review-link" rel="nofollow">
					<div class="star-rating" title="<?php //printf( __( 'Rated %s out of 5', 'woocommerce' ), $average ); ?>">
						<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
							<strong itemprop="ratingValue" class="rating"><?php //echo esc_html( $average ); ?></strong> <?php //printf( __( 'out of %s5%s', 'woocommerce' ), '<span itemprop="bestRating">', '</span>' ); ?>
							<?php //printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'woocommerce' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
						</span>
					</div>
					<?php if ( comments_open() ) : ?><?php printf( _n( '%s', '%s', $review_count, 'woocommerce' ), '<span itemprop="reviewCount" class="count">(' . $review_count . ')</span>' ); ?><?php endif ?>
				</a>
			</div>

		<?php endif; ?>
	</div>
	<?php    
}  
remove_action( 'register_form', 'dokan_seller_reg_form_fields' );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	} 
}
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {   
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post, $woocommerce;
		$output = '<div class="imagewrapper">';

		if ( has_post_thumbnail() ) {               
			$output .= get_the_post_thumbnail( $post->ID, $size );              
		}elseif ( wc_placeholder_img_src() ) {
			$output .= wc_placeholder_img( $size );
		}                       
		$output .= '</div>';
		return $output;
	}
}
add_action( 'wp_ajax_add_file_type_option', 'add_file_type_option' );
add_action( 'wp_ajax_nopriv_add_file_type_option', 'add_file_type_option' );
function add_file_type_option(){
	$id = $_POST['id'];
	$variable_file_type = get_field('file_types', 'product_cat_'.$id);
	$data = '';
	foreach ($variable_file_type as $file_t) {
		if (empty($data)){
			$data = $file_t['file_type'];
		} else {
			$data = $data.','.$file_t['file_type'];
		}
	}
	wp_send_json_success($data);
	die();
}

add_action( 'wp_ajax_add_file_type_option_edit', 'add_file_type_option_edit' );
add_action( 'wp_ajax_nopriv_add_file_type_option_edit', 'add_file_type_option_edit' );
function add_file_type_option_edit(){
	$id_product = $_POST['id_product'];
	$id = $_POST['id'];
	$term_id = (int) $id;
	wp_set_object_terms( $id_product,$term_id, 'product_cat' );
	$args = array(
		'post_type'     => 'product_variation',
		'post_status'   => array( 'private', 'publish' ),
		'numberposts'   => -1,
		'orderby'       => 'menu_order',
		'order'         => 'asc',
		'post_parent'   => $id_product
		);

	$loop = 0;
	$variations = get_posts( $args );

	if ( $variations )  {
		foreach ( $variations as $variation ) {
			$variation_id = absint( $variation->ID );
			wp_delete_post( $variation_id );
		}

	}

	$variable_file_type = get_field('file_types', 'product_cat_'.$id);
    // $data = '<option value="">Select File</option>';
	$attr_values_name = array();
	foreach ($variable_file_type as $file_t) {
		$attr_values_name[] = $file_t["file_type"];
        // $data .= '<option value="'.$file_t["file_type"].'">'.$file_t["file_type"].'</option>';;
	}

	$attributes = array();

	$attribute_names = array('File type' );
	$attr_tax = $attr_pos = $attr_visible = $attr_variation = array();

	foreach ( $attribute_names as $key => $value ) {
		$attr_pos[$key]       = $key;
		$attr_visible[$key]   = 1;
		$attr_variation[$key] = 1;
		$attribute_values[$key] = $attr_values_name;
	}


	$attribute_visibility = $attr_visible;
	$attribute_variation = $attr_variation;
	$attribute_is_taxonomy = 0;
	$attribute_position = $attr_pos;
	$attribute_names_count = sizeof( $attribute_names );

	for ( $i=0; $i < $attribute_names_count; $i++ ) {
		if ( ! $attribute_names[ $i ] )
			continue;

		$is_visible     = isset( $attribute_visibility[ $i ] ) ? 1 : 0;
		$is_variation   = isset( $attribute_variation[ $i ] ) ? 1 : 0;
		$is_taxonomy    = $attribute_is_taxonomy[ $i ] ? 1 : 0;

		if ( $is_taxonomy ) {

			if ( isset( $attribute_values[ $i ] ) ) {

                // Select based attributes - Format values (posted values are slugs)
				if ( is_array( $attribute_values[ $i ] ) ) {
					$values = array_map( 'sanitize_title', $attribute_values[ $i ] );

                // Text based attributes - Posted values are term names - don't change to slugs
				} else {
					$values = array_map( 'stripslashes', array_map( 'strip_tags', explode( WC_DELIMITER, $attribute_values[ $i ] ) ) );
				}

                // Remove empty items in the array
				$values = array_filter( $values, 'strlen' );

			} else {
				$values = array();
			}

            // Update post terms
			if ( taxonomy_exists( $attribute_names[ $i ] ) )
				wp_set_object_terms( $id_product, $values, $attribute_names[ $i ] );

			if ( $values ) {
                // Add attribute to array, but don't set values
				$attributes[ sanitize_title( $attribute_names[ $i ] ) ] = array(
					'name'          => wc_clean( $attribute_names[ $i ] ),
					'value'         => '',
					'position'      => $attribute_position[ $i ],
					'is_visible'    => $is_visible,
					'is_variation'  => $is_variation,
					'is_taxonomy'   => $is_taxonomy
					);
			}

		} elseif ( isset( $attribute_values[ $i ] ) ) {

            // Text based, separate by pipe
			$values = implode( ' ' . WC_DELIMITER . ' ', array_map( 'wc_clean', array_map( 'stripslashes', $attribute_values[ $i ] ) ) );
            // $message['1'] = $values;
            // Custom attribute - Add attribute to array and set the values
			$attributes[ sanitize_title( $attribute_names[ $i ] ) ] = array(
				'name'          => wc_clean( $attribute_names[ $i ] ),
				'value'         => $values,
				'position'      => $attribute_position[ $i ],
				'is_visible'    => $is_visible,
				'is_variation'  => $is_variation,
				'is_taxonomy'   => $is_taxonomy
				);
		}

	}

	if ( ! function_exists( 'attributes_cmp' ) ) {
		function attributes_cmp( $a, $b ) {
			if ( $a['position'] == $b['position'] ) return 0;
			return ( $a['position'] < $b['position'] ) ? -1 : 1;
		}
	}
	uasort( $attributes, 'attributes_cmp' );

	update_post_meta( $id_product, '_product_attributes', $attributes );

	wp_send_json_success($data);

	die();
}

add_action( 'wp_ajax_select_all_price', 'select_all_price' );
add_action( 'wp_ajax_nopriv_select_all_price', 'select_all_price' );
function select_all_price(){
	$id = $_POST['id'];
	$id_product = $_POST['id_product'];
	$file_type = $_POST['file_type'];
	$variable_file_type = get_field('file_types', 'product_cat_'.$id);
    // update_post_meta( $id_product, '_regular_price', 5 );
    update_post_meta( $id_product, 'file-type', $file_type );

	update_post_meta( $id_product, 'attribute_file-type', $file_type );
	$data = '';
	foreach ($variable_file_type as $file_t) {
		if ($file_t['file_type'] === $file_type){
			$data .= '<option value="">حدد الأسعار</option>';
			foreach ($file_t['price'] as $key => $value) { 
				$data .= '<option value="'.$value["price"].'">'.$value["price"].'</option>';
			}
		}
	}
	echo $data;
	die();
}
add_action( 'wp_ajax_save_price_file', 'save_price_file' );
add_action( 'wp_ajax_nopriv_save_price_file', 'save_price_file' );
function save_price_file(){
	$id_product = $_POST['id_product'];
	$price_product = $_POST['price_product'];

	update_post_meta( $id_product, '_regular_price', $price_product );
	die();
}
add_action( 'wp_ajax_favorite_shop_fc', 'favorite_shop_fun' );
add_action( 'wp_ajax_nopriv_favorite_shop_fc', 'favorite_shop_fun' );
function favorite_shop_fun() {
	$useridf = $_POST['userid'];
	$userid = $_POST['userid'].",";
	$shopid = $_POST['shopid'];
	$check = explode(",",get_user_meta( $shopid, 'favorite', true ));
	if (in_array($useridf, $check)){
		update_user_meta($shopid, 'favorite', $userid);
		echo "1";
	}else{
		$valueu = get_user_meta( $shopid, 'favorite', true ).$userid;
		update_user_meta($shopid, 'favorite', $valueu);
		echo "0";
	}
	die();
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
	echo '<section id="main">';
}

function my_theme_wrapper_end() {
	echo '</section>';
}

add_theme_support( 'woocommerce' );

function hook_grade_taxonomy( $query ) {
	if (is_tax( 'grade' ) && !is_admin() && $query->is_main_query()){
		$query->set('post_type', 'product');
		$cat_cat = $_GET['product_cat'];
		$ctax_subject = $_GET['subject'];
		if (!empty($cat_cat)){
			$product_cat = array(
				'taxonomy' => 'product_cat',
				'field' => 'slug',
				'terms' => $cat_cat,
				);
		}
		if (!empty($ctax_subject)){
			$grade = array(
				'taxonomy' => 'subject',
				'field' => 'slug',
				'terms' => $ctax_subject,
				);
			array_push($product_cat, $grade);
		}
		$query->set('tax_query', array($product_cat) );
	}
}
add_action('pre_get_posts', 'hook_grade_taxonomy');

add_action('wp_logout','go_home');
function go_home(){
	wp_redirect( home_url() );
	exit();
}

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_company']);

//unset($fields['shipping']['shipping_company']);
	return $fields;
}
//change mail subject Wordpress
function ec_mail_name( $email ){
	$site_title = get_bloginfo( 'name' );
  return $site_title; // new email name from sender.
}
add_filter( 'wp_mail_from_name', 'ec_mail_name' );

add_action("gform_user_registered", "autologin", 10, 4);
function autologin($user_id, $config, $entry, $password) {
	wp_set_auth_cookie($user_id, false, '');
}


add_filter('gettext', 'remove_widget_links', 100, 3);
function remove_widget_links($translated, $text, $domain) {
	if ($text == 'Edit View' || $text == 'Edit') return '';
	return $translated;
}
add_action('init','abc');
function abc(){
	   global $post;


	global $woocommerce;
	$seller_id    = get_current_user_id();
	$order_status = isset( $_GET['order_status'] ) ? sanitize_key( $_GET['order_status'] ) : 'all';
	$paged        = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
	$limit        = 10;
	$offset       = ( $paged - 1 ) * $limit;
	$order_date   = isset( $_GET['order_date'] ) ? sanitize_key( $_GET['order_date'] ) : NULL;
	$user_orders  = dokan_get_seller_orders( $seller_id, $order_status, $order_date, $limit, $offset );
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
	}else{
		$_GET['user_id'] = $first_author_id;
	}
	$user_orders_byid  = dokan_get_seller_orders( $_GET['user_id'], $order_status, $order_date, $limit, $offset );
	foreach ($user_orders as $order) {
		$the_order = new WC_Order( $order->order_id );
		$order_items = $the_order->get_items( apply_filters( 'woocommerce_admin_order_item_types', array( 'line_item', 'fee' ) ) );
		foreach( $the_order->get_items() as $item ) {
			$product_id = $item['product_id'];
			if ($item['variation_id']) {
				$product_variation_ids[$item['variation_id']] = $item['variation_id'];
				$product_variation_ids_2[] = $item['variation_id'];
			}
		}
	}
	$loaibo_trungnhau = array_unique($product_variation_ids);
	$array_count_variable = array_count_values($product_variation_ids_2);
	foreach( $loaibo_trungnhau as $dem ) {
		update_post_meta($dem,'_text_field',$array_count_variable[$dem]);
	}
}

add_action( 'woocommerce_product_after_variable_attributes', 'variation_settings_fields', 10, 3 );
add_action( 'woocommerce_save_product_variation', 'save_variation_settings_fields', 10, 2 );
function variation_settings_fields( $loop, $variation_data, $variation ) {
	// Text Field
	woocommerce_wp_text_input( 
		array( 
			'id'          => '_text_field[' . $variation->ID . ']', 
			'label'       => __( 'الاختلافات إجمالي المبيعات', 'woocommerce' ), 
			'desc_tip'    => 'true',
			'description' => __( 'أدخل قيمة العرف هنا.', 'woocommerce' ),
			'value'       => get_post_meta( $variation->ID, '_text_field', true )
			)
		);
}

function save_variation_settings_fields( $post_id ) {
	$text_field = $_POST['_text_field'][ $post_id ];
	if( empty( $text_field ) ) {
		update_post_meta( $post_id, '_text_field', '0');
	}
}

add_filter( 'manage_product_posts_columns', 'set_custom_edit_product_columns' );

function set_custom_edit_product_columns($columns) {
    $new_columns = array(
       'status' => __('الحالة', 'ThemeName'),
    );
    unset( $columns['title'] );
  return array_merge($columns, $new_columns);
}
add_action( 'manage_product_posts_custom_column' , 'custom_report_column', 10, 2 );
function custom_report_column($column){
    global $post;
    if($column == 'status'){
    $_visibility        = get_post_meta( $post->ID, '_visibility', true );
    if($_visibility== 'hidden'){
    echo  '<span style="color:#ccc">مسودة</span>';
    }elseif($_visibility== 'visible'){
           echo  '<span style="color:#5cb85c">على الانترنت</span>';
    }
  }
}
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +
 
function woo_archive_custom_cart_button_text() {
 
        return __( 'أضف إلى السلة', 'woocommerce' );
 
}   

add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['reviews']['title'] = __( 'استعراض' );	// Rename the reviews tab
	return $tabs;

}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
 
function woo_custom_cart_button_text() {
 
        return __( 'أضف إلى السلة', 'woocommerce' );
 
}
add_filter( 'gettext', 'theme_sort_change', 20, 3 );
function theme_sort_change( $translated_text, $text, $domain ) {

    if ( is_woocommerce() ) {

        switch ( $translated_text ) {

            case 'Sort by newness' :

                $translated_text = __( 'فرز حسب حداثة', 'theme_text_domain' );
                break;                
            case 'Sort by average rating' :

                $translated_text = __( 'الترتيب حسب متوسط تقييم', 'theme_text_domain' );
                break;
            case 'Sort by popularity' :

                $translated_text = __( 'حسب الشهرة', 'theme_text_domain' );
                break;    
            case 'Default sorting' :

                $translated_text = __( 'الفرز الافتراضى', 'theme_text_domain' );
                break;   
            case 'Sort by price: low to high' :

                $translated_text = __( 'الترتيب حسب السعر: منخفض إلى مرتفع', 'theme_text_domain' );
                break;    
            case 'Sort by price: high to low' :

                $translated_text = __( 'الترتيب حسب السعر: من الاعلى الى الادنى', 'theme_text_domain' );
                break;     
        }

    }

    return $translated_text;
}

// WooCommerce Checkout Fields Hook
add_filter( 'woocommerce_checkout_fields' , 'hjs_wc_checkout_fields' ); 
function hjs_wc_checkout_fields( $fields ) {
    $fields['billing']['billing_first_name']['label'] = 'الإسم الأول';     
    $fields['billing']['billing_last_name']['label'] = 'الإسم الأخير'; 
    //$fields['billing']['billing_company']['label'] = 'الاسم الاول'; 
    $fields['billing']['billing_address_1']['label'] = 'العنوان';     
    $fields['billing']['billing_city']['label'] = 'المدينة / المدينة'; 
    $fields['billing']['billing_postcode']['label'] = 'الرمز البريدي / الرمز البريدي'; 
    $fields['billing']['billing_country']['label'] = 'الدولة'; 
    //$fields['billing']['billing_state']['label'] = 'الاسم الاول'; 
    $fields['billing']['billing_email']['label'] = 'البريد الإلكتروني'; 
    $fields['billing']['billing_phone']['label'] = 'رقم الهاتف'; 
    
    $fields['order']['order_comments']['label'] = 'ترتيب ملاحظات';
    $fields['order']['order_comments']['placeholder'] = 'ملاحظات حول النظام الخاص بك، على سبيل المثال، ملاحظات خاصة للتسليم.'; 
    return $fields;
}

add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' ); 
function woo_custom_order_button_text() {
    return __( 'أمر مكان', 'woocommerce' ); 
}

function change_product_removed_message( $meassage ){
	return __( "منتج مجاني 1 إزالة", 'yith-woocommerce-wishlist' );
}
add_filter( 'yith_wcwl_product_removed_text', 'change_product_removed_message' );

add_filter ( 'wc_add_to_cart_message', 'wc_add_to_cart_message_filter', 10, 2 );
function wc_add_to_cart_message_filter($message, $product_id = null) {
    $titles[] = get_the_title( $product_id );

    $titles = array_filter( $titles );
    $added_text = sprintf( _n( '%s تمت إضافة الى عربة التسوق.', '%s تمت إضافتها إلى عربة التسوق.', sizeof( $titles ), 'woocommerce' ), wc_format_list_of_items( $titles ) );

    $message = sprintf( '%s <a href="%s" class="button">%s</a>',
                    esc_html( $added_text ),                    
                    esc_url( wc_get_page_permalink( 'shop' ) ),
                    esc_html__( 'مواصلة التسوق', 'woocommerce' ));

    return $message;
}

 add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

 function add_my_currency_symbol( $currency_symbol, $currency ) {
      switch( $currency ) {
           case 'USD': $currency_symbol = 'KD '; break;
      }
      return $currency_symbol;
 }

add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab_cs' );
function woo_new_product_tab_cs( $tabs ) {
	
	// Adds the new tab
	
	$tabs['test_tab_new'] = array(
		'title' 	=> __( 'تحميلا تايمز', 'woocommerce' ),
		'priority' 	=> 60,
		'callback' 	=> 'woo_new_product_tab_content_cs'
	);

	return $tabs;

}
function woo_new_product_tab_content_cs() {
	global $product;
	// echo $product->id;
	// The new tab content
	echo get_post_meta( $product->id, 'total_sales', true );
	
}
add_action('wp_head','ddd');
function ddd(){
$user_id    = get_current_user_id();
$filters = array(
    'post_status' => 'wc-completed',
    'post_type' => 'shop_order',
    'posts_per_page' => -1,
    'order' => 'ASC',
);

$loop = new WP_Query($filters);
        //foreach($authorList as $author){

while ($loop->have_posts()) { $loop->the_post();
    $order = new WC_Order($loop->post->ID);
	$user_id_order = $order->user_id;
	//echo $user_id;
	if($user_id == $user_id_order ){
   	foreach ($order->get_items() as $key => $lineItem) {
       // echo 'Product ID : ' . $lineItem['product_id'] . '<br>'; ?>
	<style type="text/css">
	.postid-<?php echo $lineItem['product_id']; ?> .woocommerce-tabs .tabs .reviews_tab{
		display: inline-block !important;
	}
	</style>
     <?php   if ($lineItem['variation_id']) {
           // echo 'Product Type : Variable Product' . '<br>';
        } else {
           // echo 'Product Type : Simple Product' . '<br>';
        }
    }
}
}
}

add_action( 'woocommerce_order_button_text', 'my_custom_checkout_text' );
function my_custom_checkout_text() {
return "الدفع";
}

//Change a currency symbol
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
 switch( $currency ) {
  case 'USD': $currency_symbol = 'KD'; break;
 }
 return $currency_symbol;
}
//add_action('wp_head','get_price_cat');
add_action("wp_ajax_get_price_cat", "get_price_cat");
add_action("wp_ajax_nopriv_get_price_cat", "get_price_cat");

function get_price_cat(){
	$product_cat_id = 'term_'.$_POST['product_cat_id'];
	$file_type = $_POST['file_type'];	
	$get_price = get_field('file_types', $product_cat_id);
	$i=0;
	foreach ($get_price as $value){
		//var_dump($value);
		
		if ( $value['file_type'] == $file_type) {
			
			//echo $value['file_type'];
			$my_Arrays = $value['price'];
			foreach ($my_Arrays as $my_Array) {
				
				echo '<option class="level-'.$i.'" value="'.$my_Array['price'].'">KD'.$my_Array['price'].'</option>';   
				$i++;
			}
			
			
			break;
		}
		


	}
}