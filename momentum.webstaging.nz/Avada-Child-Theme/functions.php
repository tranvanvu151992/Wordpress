<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'avada-parent-stylesheet', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'avada-child-stylesheet', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

function hh_list_events( $atts ) {
    global $post;
    $a = shortcode_atts( array(
        'posts_per_page' => -1,
        ), $atts );
    ob_start();
    $paged = get_query_var( 'tribe_paged' )
    ? get_query_var( 'tribe_paged' )
    : 1;
    if( $paged == 1 ){
        $paged = get_query_var( 'paged' )
        ? get_query_var( 'paged' )
        : 1;
    }
    $nextLink = add_query_arg(['tribe_paged' => (int)$paged+1], get_the_permalink($post->id));
    $prevLink = add_query_arg(['tribe_paged' => (int)$paged-1], get_the_permalink($post->id));
    $args = array(
        'post_status' => 'publish',
        'post_type' => array(TribeEvents::POSTTYPE),
        'meta_key'=>'_EventStartDate',
        'orderby'=>'_EventStartDate',
        'eventDisplay'=>'list',
        'order'=>'DESC',
        'posts_per_page' => $a['posts_per_page'],
        'eventDate' => date( 'Y-m-d', current_time( 'timestamp' ) ),
        'paged' => $paged
        );
    $events = new WP_Query($args);
    add_filter( 'excerpt_length', 'hh_excerpt_length', 999 );
    add_filter( 'tribe_is_month', 'hh_event_view', 999)
    ?>
    <h2 class="event-title-list"><span class="event-arrow-left"> < </span><?php tribe_events_title() ?> <span class="event-arrow-right"> > </span></h2>
    <?php
    if($events->have_posts()) : while($events->have_posts()) : $events->the_post(); ?>
    <?php
    $startDate = tribe_get_start_date(null, true, 'd-m');
    $endDate = tribe_get_end_date(null, true, 'd-m');
    ?>
    <div class="fusion-one-half fusion-layout-column fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;">
        <div class="events-date">
            <?php if( $startDate == $endDate ): ?>
                <h2><?php echo tribe_get_start_date(null, true, 'd'); ?></h2>
                <p><?php echo tribe_get_start_date(null, true, 'M'); ?></p>
            <?php else: ?>
                <h2><?php echo tribe_get_start_date(null, true, 'd'); ?> - <?php echo tribe_get_end_date(null, true, 'd'); ?></h2>
                <p><?php echo tribe_get_start_date(null, true, 'M'); ?> <span>-</span> <?php echo tribe_get_end_date(null, true, 'M'); ?></p>
            <?php endif; ?>
        </div>
        <div class="events-thumbnail">
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
        </div>
    </div>
    <div class="fusion-one-half fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;">
        <h2 class="events-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <div class="events-time">
            <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/location-icon.png"> <?php echo tribe_get_address( get_the_ID() ); ?></p>
            <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time-icon.png"> <?php echo tribe_get_start_date(null, true, 'g:ia'); ?> - <?php echo tribe_get_end_date(null, true, 'g:ia'); ?></p>
        </div>
        <div class="events-description"><?php the_excerpt(); ?></div>
        <a class="events-read-more" href="<?php the_permalink() ?>">Read more</a>
    </div>
    <?php
    endwhile;
    endif;
    remove_filter( 'excerpt_length', 'hh_excerpt_length', 999 );
    remove_filter( 'tribe_is_month', 'hh_event_view', 999 );
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode( 'list_events', 'hh_list_events' );

function hh_excerpt_length( $length ) {
    return 20;
}
function hh_event_view($view){
    $view = true;
    return $view;
}


add_filter( 'template_include', 'hh_single_event', 999 );

function hh_single_event( $template ) {

    if ( is_singular( 'tribe_events' )  ) {
        $new_template = locate_template( array( 'single-event.php' ) );
        if ( '' != $new_template ) {
            return $new_template ;
        }
    }

    return $template;
}
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'image-farvorite', 300,225,true ); // 300 pixels wide (and unlimited height)
        add_image_size( 'banner-farvorite', 970,300,true ); // 300 pixels wide (and unlimited height)

    }
    add_shortcode('our_favorite','our_favorite');
    function our_favorite($atts, $content = null){
        ob_start();
        $args = array(
            'post_type' => 'our_favourites',
            'posts_per_page' => -1
            );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            echo  '<div class="owl-favorite owl-theme">';
            while ( $loop->have_posts() ) : $loop->the_post();
            echo '<div class="item" data-id="'.get_the_ID().'">';
            echo get_the_post_thumbnail( $post_id, 'image-farvorite' );
            echo '<div class="item-content">';
            echo '<h3>'.get_the_title().'</h3>';
            echo '<p>'.wp_trim_words( get_the_content(), 30, '...' ).'</p>';
            echo '</div>';
            echo   '</div>';
            endwhile;
            echo '</div>';
            wp_reset_postdata();
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    }