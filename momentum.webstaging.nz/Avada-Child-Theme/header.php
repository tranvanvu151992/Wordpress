<!DOCTYPE html>
<?php global $woocommerce; ?>
<html class="<?php echo ( Avada()->settings->get( 'smooth_scrolling' ) ) ? 'no-overflow-y' : ''; ?>" <?php language_attributes(); ?>>
<head>
	<?php if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( false !== strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) ) ) : ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<?php endif; ?>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<?php
	if ( ! function_exists( '_wp_render_title_tag' ) ) {
		function avada_render_title() {
			?>
			<title><?php wp_title( '' ); ?></title>
			<?php
		}
		add_action( 'wp_head', 'avada_render_title' );
	}
	?>

	<!--[if lte IE 8]>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/html5shiv.js"></script>
	<![endif]-->

	<?php $isiPad = (bool) strpos( $_SERVER['HTTP_USER_AGENT'],'iPad' ); ?>

	<?php
	$viewport = '';
	if ( Avada()->settings->get( 'responsive' ) && $isiPad ) {
		$viewport = '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
	} else if ( Avada()->settings->get( 'responsive' ) ) {
		if ( Avada()->settings->get( 'mobile_zoom' ) ) {
			$viewport .= '<meta name="viewport" content="width=device-width, initial-scale=1" />';
		} else {
			$viewport .= '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
		}
	}

	$viewport = apply_filters( 'avada_viewport_meta', $viewport );
	echo $viewport;
	?>

	<?php wp_head(); ?>

	<?php

	$object_id = get_queried_object_id();
	$c_pageID  = Avada::c_pageID();
	?>

	<!--[if lte IE 8]>
	<script type="text/javascript">
	jQuery(document).ready(function() {
	var imgs, i, w;
	var imgs = document.getElementsByTagName( 'img' );
	for( i = 0; i < imgs.length; i++ ) {
		w = imgs[i].getAttribute( 'width' );
		imgs[i].removeAttribute( 'width' );
		imgs[i].removeAttribute( 'height' );
	}
	});
	</script>

	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/excanvas.js"></script>

	<![endif]-->

	<!--[if lte IE 9]>
	<script type="text/javascript">
	jQuery(document).ready(function() {

	// Combine inline styles for body tag
	jQuery('body').each( function() {
		var combined_styles = '<style type="text/css">';

		jQuery( this ).find( 'style' ).each( function() {
			combined_styles += jQuery(this).html();
			jQuery(this).remove();
		});

		combined_styles += '</style>';

		jQuery( this ).prepend( combined_styles );
	});
	});
	</script>

	<![endif]-->


	<script type="text/javascript">
		var doc = document.documentElement;
		doc.setAttribute('data-useragent', navigator.userAgent);
	</script>

	<?php echo Avada()->settings->get( 'google_analytics' ); ?>

	<?php echo Avada()->settings->get( 'space_head' ); ?>
</head>
<?php
$wrapper_class = '';


if ( is_page_template( 'blank.php' ) ) {
	$wrapper_class  = 'wrapper_blank';
}

if ( 'modern' == Avada()->settings->get( 'mobile_menu_design' ) ) {
	$mobile_logo_pos = strtolower( Avada()->settings->get( 'logo_alignment' ) );
	if ( 'center' == strtolower( Avada()->settings->get( 'logo_alignment' ) ) ) {
		$mobile_logo_pos = 'left';
	}
}

?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/owl.carousel.js'?>"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() .'/css/owl.theme.default.css'?>">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() .'/css/owl.theme.default.min.css'?>">
<script>
	jQuery(document).ready(function() {
		var owl = jQuery('.owl-favorite');
		owl.owlCarousel({
			margin: 20,
			nav: true,
			loop: true,
			mouseDrag:false,
			stagePadding: 18,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 5
				}
			}
		});
		jQuery('.owl-favorite .item').click(function(){
			var id = jQuery(this).attr('data-id');
			//alert(id);
			jQuery('#popup-tools').fadeIn("slow");
			jQuery('#popup-tools .item_popup').hide();
			jQuery('#popup-tools .item_popup.link_'+id).show();
			jQuery('body').append('<div id="over"></div>');
			jQuery('#over').fadeIn(300);
		});
		jQuery('#over').click(function(){
			jQuery('#popup-tools').hide();
			jQuery('#popup-tools .item_popup').hide();
			jQuery(this).hide();
		});
		jQuery('.closesxxx').click(function(){
			jQuery('#popup-tools').hide();
			jQuery('#popup-tools .item_popup').hide();
			jQuery('#over').hide();
		});

	});
</script>
<body <?php body_class(); ?>>
	<div id="over"></div>
	<?php 
	$args=array(
		'post_type' => 'our_favourites',
		'posts_per_page' => -1

		);
	$query= new WP_Query($args);
	?>    
	<div id="popup-tools" class="login" style="display: none;">
		<span class="closesxxx">X</span>

		<?php     
		if ($query->have_posts()) : while ($query->have_posts()) :$query->the_post(); ?> 
		<div class="item_popup link_<?php the_ID();?>">

			<?php 
			if(get_the_post_thumbnail()){
				echo get_the_post_thumbnail( $post_id, 'banner-farvorite' );
			}?>        
			<div class="body" style="margin-top: 15px;">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			</div>                    
		</div>
	<?php endwhile;  wp_reset_postdata();  endif;  ?>
</div>

<?php do_action( 'avada_before_body_content' ); ?>
<?php $boxed_side_header_right = false; ?>
<?php if ( ( ( 'Boxed' == Avada()->settings->get( 'layout' ) && ( 'default' == get_post_meta( $c_pageID, 'pyre_page_bg_layout', true ) || '' == get_post_meta( $c_pageID, 'pyre_page_bg_layout', true ) ) ) || 'boxed' == get_post_meta( $c_pageID, 'pyre_page_bg_layout', true ) ) && 'Top' != Avada()->settings->get( 'header_position' ) ) : ?>
	<?php if ( Avada()->settings->get( 'slidingbar_widgets' ) && ! is_page_template( 'blank.php' ) && ( 'Right' == Avada()->settings->get( 'header_position' ) || 'Left' == Avada()->settings->get( 'header_position' ) ) ) : ?>
		<?php get_template_part( 'slidingbar' ); ?>
		<?php $boxed_side_header_right = true; ?>
	<?php endif; ?>
	<div id="boxed-wrapper">
	<?php endif; ?>
	<div id="wrapper" class="<?php echo $wrapper_class; ?>">
		<div id="home" style="position:relative;top:1px;"></div>
		<?php if ( Avada()->settings->get( 'slidingbar_widgets' ) && ! is_page_template( 'blank.php' ) && ! $boxed_side_header_right ) : ?>
			<?php get_template_part( 'slidingbar' ); ?>
		<?php endif; ?>
		<?php if ( false !== strpos( Avada()->settings->get( 'footer_special_effects' ), 'footer_sticky' ) ) : ?>
			<div class="above-footer-wrapper">
			<?php endif; ?>

			<?php avada_header_template( 'Below' ); ?>
			<?php if ( 'Left' == Avada()->settings->get( 'header_position' ) || 'Right' == Avada()->settings->get( 'header_position' ) ) : ?>
				<?php avada_side_header(); ?>
			<?php endif; ?>

			<div id="sliders-container">
				<?php
				if ( is_search() ) {
					$slider_page_id = '';
				} else {
					$slider_page_id = '';
					if ( ! is_home() && ! is_front_page() && ! is_archive() && isset( $object_id ) ) {
						$slider_page_id = $object_id;
					}
					if ( ! is_home() && is_front_page() && isset( $object_id ) ) {
						$slider_page_id = $object_id;
					}
					if ( is_home() && ! is_front_page() ) {
						$slider_page_id = get_option( 'page_for_posts' );
					}
					if ( class_exists( 'WooCommerce' ) && is_shop() ) {
						$slider_page_id = get_option( 'woocommerce_shop_page_id' );
					}

					if ( ( 'publish' == get_post_status( $slider_page_id ) && ! post_password_required() ) || ( current_user_can( 'read_private_pages' ) && in_array( get_post_status( $slider_page_id ), array( 'private', 'draft', 'pending' ) ) ) ) {
						avada_slider( $slider_page_id );
					}
				} ?>
			</div>
			<?php if ( get_post_meta( $slider_page_id, 'pyre_fallback', true ) ) : ?>
				<div id="fallback-slide">
					<img src="<?php echo get_post_meta( $slider_page_id, 'pyre_fallback', true ); ?>" alt="" />
				</div>
			<?php endif; ?>
			<?php avada_header_template( 'Above' ); ?>

			<?php if ( has_action( 'avada_override_current_page_title_bar' ) ) : ?>
				<?php do_action( 'avada_override_current_page_title_bar', $c_pageID ); ?>
			<?php else : ?>
				<?php avada_current_page_title_bar( $c_pageID ); ?>
			<?php endif; ?>

			<?php if ( is_page_template( 'contact.php' ) && Avada()->settings->get( 'recaptcha_public' ) && Avada()->settings->get( 'recaptcha_private' ) ) : ?>
				<script type="text/javascript">var RecaptchaOptions = { theme : '<?php echo Avada()->settings->get( 'recaptcha_color_scheme' ); ?>' };</script>
			<?php endif; ?>

			<?php if ( is_page_template( 'contact.php' ) && Avada()->settings->get( 'gmap_address' ) && Avada()->settings->get( 'status_gmap' ) ) : ?>
				<?php
				$map_popup             = ( ! Avada()->settings->get( 'map_popup' ) )          ? 'yes' : 'no';
				$map_scrollwheel       = ( Avada()->settings->get( 'map_scrollwheel' ) )    ? 'yes' : 'no';
				$map_scale             = ( Avada()->settings->get( 'map_scale' ) )          ? 'yes' : 'no';
				$map_zoomcontrol       = ( Avada()->settings->get( 'map_zoomcontrol' ) )    ? 'yes' : 'no';
				$address_pin           = ( Avada()->settings->get( 'map_pin' ) )            ? 'yes' : 'no';
				$address_pin_animation = ( Avada()->settings->get( 'gmap_pin_animation' ) ) ? 'yes' : 'no';
				?>
				<div id="fusion-gmap-container">
					<?php echo Avada()->google_map->render_map( array(
						'address'                  => Avada()->settings->get( 'gmap_address' ),
						'type'                     => Avada()->settings->get( 'gmap_type' ),
						'address_pin'              => $address_pin,
						'animation'                => $address_pin_animation,
						'map_style'                => Avada()->settings->get( 'map_styling' ),
						'overlay_color'            => Avada()->settings->get( 'map_overlay_color' ),
						'infobox'                  => Avada()->settings->get( 'map_infobox_styling' ),
						'infobox_background_color' => Avada()->settings->get( 'map_infobox_bg_color' ),
						'infobox_text_color'       => Avada()->settings->get( 'map_infobox_text_color' ),
						'infobox_content'          => htmlentities( Avada()->settings->get( 'map_infobox_content' ) ),
						'icon'                     => Avada()->settings->get( 'map_custom_marker_icon' ),
						'width'                    => Avada()->settings->get( 'gmap_dimensions', 'width' ),
						'height'                   => Avada()->settings->get( 'gmap_dimensions', 'height' ),
						'zoom'                     => Avada()->settings->get( 'map_zoom_level' ),
						'scrollwheel'              => $map_scrollwheel,
						'scale'                    => $map_scale,
						'zoom_pancontrol'          => $map_zoomcontrol,
						'popup'                    => $map_popup
						) ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_page_template( 'contact-2.php' ) && Avada()->settings->get( 'gmap_address' ) && Avada()->settings->get( 'status_gmap' ) ) : ?>
					<?php
					$map_popup             = ( ! Avada()->settings->get( 'map_popup' ) )          ? 'yes' : 'no';
					$map_scrollwheel       = ( Avada()->settings->get( 'map_scrollwheel' ) )    ? 'yes' : 'no';
					$map_scale             = ( Avada()->settings->get( 'map_scale' ) )          ? 'yes' : 'no';
					$map_zoomcontrol       = ( Avada()->settings->get( 'map_zoomcontrol' ) )    ? 'yes' : 'no';
					$address_pin_animation = ( Avada()->settings->get( 'gmap_pin_animation' ) ) ? 'yes' : 'no';
					?>
					<div id="fusion-gmap-container">
						<?php echo Avada()->google_map->render_map( array(
							'address'                  => Avada()->settings->get( 'gmap_address' ),
							'type'                     => Avada()->settings->get( 'gmap_type' ),
							'map_style'                => Avada()->settings->get( 'map_styling' ),
							'animation'                => $address_pin_animation,
							'overlay_color'            => Avada()->settings->get( 'map_overlay_color' ),
							'infobox'                  => Avada()->settings->get( 'map_infobox_styling' ),
							'infobox_background_color' => Avada()->settings->get( 'map_infobox_bg_color' ),
							'infobox_text_color'       => Avada()->settings->get( 'map_infobox_text_color' ),
							'infobox_content'          => htmlentities( Avada()->settings->get( 'map_infobox_content' ) ),
							'icon'                     => Avada()->settings->get( 'map_custom_marker_icon' ),
							'width'                    => Avada()->settings->get( 'gmap_dimensions', 'width' ),
							'height'                   => Avada()->settings->get( 'gmap_dimensions', 'height' ),
							'zoom'                     => Avada()->settings->get( 'map_zoom_level' ),
							'scrollwheel'              => $map_scrollwheel,
							'scale'                    => $map_scale,
							'zoom_pancontrol'          => $map_zoomcontrol,
							'popup'                    => $map_popup
							) ); ?>
						</div>
					<?php endif; ?>
					<?php
					$main_css      = '';
					$row_css       = '';
					$main_class    = '';

					if ( Avada()->layout->is_hundred_percent_template() ) {
						$main_css = 'padding-left:0px;padding-right:0px;';
						if ( Avada()->settings->get( 'hundredp_padding' ) && ! get_post_meta( $c_pageID, 'pyre_hundredp_padding', true ) ) {
							$main_css = 'padding-left:' . Avada()->settings->get( 'hundredp_padding' ) . ';padding-right:' . Avada()->settings->get( 'hundredp_padding' );
						}
						if ( get_post_meta( $c_pageID, 'pyre_hundredp_padding', true ) ) {
							$main_css = 'padding-left:' . get_post_meta( $c_pageID, 'pyre_hundredp_padding', true ) . ';padding-right:' . get_post_meta( $c_pageID, 'pyre_hundredp_padding', true );
						}
						$row_css    = 'max-width:100%;';
						$main_class = 'width-100';
					}
					do_action( 'avada_before_main_container' );
					?>
					<div id="main" class="clearfix <?php echo $main_class; ?>" style="<?php echo $main_css; ?>">
						<?php if( is_singular( 'tribe_events' ) ): ?>
							<div class="fusion-fullwidth fullwidth-box fusion-fullwidth-1  fusion-parallax-none nonhundred-percent-fullwidth" style="margin-left: -30px;margin-right: -30px ;border-color:#eae9e9;border-bottom-width: 0px;border-top-width: 0px;border-bottom-style: solid;border-top-style: solid;padding-bottom:20px;padding-top:230px;padding-left:0px;padding-right:0px;background-color:rgba(255,255,255,0);background-position:center center;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;-ms-filter: &quot;progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/images/single-event-banner.jpg', sizingMethod='scale')&quot;;background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/single-event-banner.jpg);">
								<style type="text/css" scoped="scoped">
									.fusion-fullwidth-1 {
										padding-left: 0px !important;
										padding-right: 0px !important;
									}
								</style>
								<div class="fusion-row">
									<div class="fusion-one-full fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;">
										<div class="fusion-column-wrapper">
											<div class="fusion-title title fusion-sep-none fusion-title-center fusion-title-size-two fusion-border-below-title" style="margin-top:0px;margin-bottom:31px;">
												<h2 class="title-heading-center" data-fontsize="18" data-lineheight="27">
													<p style="color: #fff; font-size: 60px; line-height: 1em; margin-bottom: 0px;"><strong><?php the_title(); ?></strong></p>
												</h2>
											</div>
											<div class="fusion-clearfix"></div>
										</div>
									</div>
									<div class="fusion-clearfix"></div>
								</div>
							</div>
						<?php endif; ?>
						<div class="fusion-row" style="<?php echo $row_css; ?>">