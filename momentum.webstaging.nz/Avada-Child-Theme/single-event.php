<?php get_header(); $ID = 0; ?>
    <div id="content" class="full-width">
        <?php while ( have_posts() ) : the_post(); $ID = get_the_ID(); ?>
        <div class="event-single-content">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php echo avada_render_rich_snippets_for_pages(); ?>
                <div class="post-content">
                    <?php the_content(); ?>
                    <?php avada_link_pages(); ?>
                </div>
                <?php if ( ! post_password_required( $post->ID ) ) : ?>
                    <?php if ( Avada()->settings->get( 'comments_pages' ) ) : ?>
                        <?php wp_reset_query(); ?>
                        <?php comments_template(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
        <div class="event-single-sidebar">
            <h2>When</h2>
            <div class="event-sidebar-content">
                <div class="event-sidebar-content-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/when-icon.png"></div>
                <div class="event-sidebar-content-text"><?php echo tribe_get_start_date(null, true, 'l d F'); ?> to <?php echo tribe_get_end_date(null, true, 'l d F'); ?> from <?php echo tribe_get_start_date(null, true, 'g:ia'); ?> to <?php echo tribe_get_end_date(null, true, 'g:ia'); ?></div>
            </div>
            <h2>Time</h2>
            <div class="event-sidebar-content">
                <div class="event-sidebar-content-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/time-big-icon.png"></div>
                <div class="event-sidebar-content-text" style="margin-top: 17px;"><?php echo tribe_get_start_date(null, true, 'g:ia'); ?> - <?php echo tribe_get_end_date(null, true, 'g:ia'); ?></div>
            </div>
            <h2>Location</h2>
            <div class="event-sidebar-content">
                <div class="event-sidebar-content-img"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/location-big-icon.png"></div>
                <div class="event-sidebar-content-text"><?php echo tribe_get_address( $ID ); ?></div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .single-tribe_events #content{
            width: 100% !important;
        }
        .event-single-sidebar .event-sidebar-content img{
            vertical-align: middle;
            margin-right: 5px;
        }
        .event-single-content {
            width: 60%;
            float: left;
        }
        .event-single-sidebar {
            width: 40%;
            float: left;
            margin-top: 40px;
            padding-left: 40px;
            box-sizing: border-box;
        }
        .event-sidebar-content{
            width: 100%;
            float: left;
            border-bottom: 1px solid #cdcdcd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .event-sidebar-content:last-child{
            border-bottom: none;
        }
        .event-sidebar-content-img{
            float: left;
            width: 72px;
        }
        .event-sidebar-content-text{
            margin-left: 72px;
            width: calc(100% - 72px);
        }
    </style>
<?php get_footer();

// Omit closing PHP tag to avoid "Headers already sent" issues.
