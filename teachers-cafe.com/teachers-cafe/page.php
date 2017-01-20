<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package bloggr
 */
get_header(); ?>
<div class="grid grid-pad">
    <aside id="sidebar" class="column-left">
        <?php dynamic_sidebar( 'sidebar-home-left' ); ?>
	</aside>
	<div class="col-9-12">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'page' ); ?>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
                <?php endwhile; // end of the loop. ?>
                <h3 style="margin-left:5px;">Premium Members</h3>
                <?php
                global $wpdb;
                $sql= 'SELECT  member_id, user_name, country,profile_image FROM wp_wp_eMember_members_tbl ORDER BY RAND()
                LIMIT 6';
                $result   =   mysql_query($sql);
                 while($row = mysql_fetch_array($result))
                {
                    echo'<div id="container-3">';
                    echo'<div id="box-3-3" class="box">';
                    echo '<img src="http://www.teachers-cafe.com/wp-content/uploads/emember/'.$row["profile_image"].'" width="100px;"/>';
                    echo'</div>';
                    echo'<div id="box-3-2" class="box">';
                    echo '' . $row['user_name'] .'';
                    echo '</div>';
                    echo'<div id="box-3-4" class="box">';
                    echo '' . $row['country'] .'';
                    echo '</div>';
                    echo'<div id="box-3-6" class="box">';
                    echo "<a style='color:red'; href='http://www.teachers-cafe.com/edit?member_id=".$row['member_id']."'>View Details</a>";
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </main><!-- #main -->
        </div><!-- #primary -->
	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>