<?php
/*
Template Name:After Loged (Home)
*/

/* other PHP code here */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet">
<link href="<?php bloginfo('template_url'); ?>/dashbord.css" rel="stylesheet">



<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
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
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bloggr' ); ?></a>

<header id="masthead" class="site-header" role="banner">
<div class="search2">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">

<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
<input type="submit" id="searchsubmit" value="Search" />

</form>
</div>

<div class="grid grid-pad no-top header-overflow">



<div class="site-branding">




<?php if ( get_theme_mod( 'bloggr_logo' ) ) : ?>
<div class="site-logo">
<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'bloggr_logo' ) ); ?>' <?php if ( get_theme_mod( 'logo_size' ) ) : ?>width="<?php echo get_theme_mod( 'logo_size' ); ?>"<?php endif; ?> alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
</div><!-- site-logo -->
<?php else : ?>
<hgroup>
<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
</hgroup>
<?php endif; ?>

</div><!-- .site-branding -->

<div class="navigation-container">

<nav id="site-navigation" class="main-navigation" role="navigation">



<ul>
<li>
<div id="acontent"> <a href="#"><?php echo wp_eMember_get_user_details("profile_picture");?></a></div>
<div id="asidebar"><a href="#"><?php echo wp_eMember_get_user_details("user_name");?>&#9662;</a></div>
<ul class="dropdown">

      <li><a href="#">My Account &#9662</a>
        <ul>
                <li><a href="<?php echo wp_eMember_get_user_details("user_profile");?> "> My Profile</a></li>
                <li><a href="http://www.teachers-cafe.com/edit-profile/">Edit Profile</a></li>
                <li><a href="#">Change Password</a></li>
                
</ul>
</li>

                <li><a href="http://www.teachers-cafe.com/author-upload/">Upload Files</a></li>
                <li><a href="">Transaction History</a></li>
                <li><a href="http://www.teachers-cafe.com/member-login/?emember_logout=true">Log Out</a></li>
</ul>


</nav><!-- #site-navigation -->
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

































<div id="quicksearch">
<form method="get" id="advanced-searchform" role="search" action="http://www.teachers-cafe.com/">

  
<P class="quick">Quick Search</p>
    <!-- PASSING THIS TO TRIGGER THE ADVANCED SEARCH RESULT PAGE FROM functions.php -->
    <input type="hidden" name="search" value="advanced">

<table width="100%" border="1">
  <tr>
    <td width="14%">Country</td>
    <td width="14%">Author</td>
    <td width="14%">Educational Content</td>
    <td width="14%">Subject</td>
    <td width="14%">Grade</td>
    <td width="14%">Lesson Title</td>
    <td width="14%">Special Needs (Disability)</td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="">
      <label for="Country"></label>
      <select name="Country" id="Country"  style="width:121px;">
      <option value="">Select...</option>
      </select>
    </form></td>
    <td><form id="form2" name="form2" method="post" action="">
      <label for="Author"></label>
      <select name="Author" id="Author"  style="width:121px;">
      <option value="">Select...</option>
      </select>
    </form></td>
    <td><form id="form3" name="form3" method="post" action="">
      <label for="Education"></label>
      <select name="Education" id="Education"  style="width:121px;">
      <option value="">Select...</option>
      </select>
    </form></td>
    <td><form id="form4" name="form4" method="post" action="">
      <label for="subject"></label>
      <select name="subject" id="subject"  style="width:121px;">
      <option value="">Select...</option>
      </select>
    </form></td>
    <td><form id="form5" name="form5" method="post" action="">
      <label for="Grade"></label>
      <select name="Grade" id="Grade"  style="width:121px;">
      <option value="">Select...</option>
      </select>
    </form></td>
    <td><form id="form6" name="form6" method="post" action="">
      <label for="Lesson"></label>
      <select name="Lesson" id="Lesson"  style="width:121px;">
      <option value="">Select...</option>
      </select>
    </form></td>
    <td><form id="form7" name="form7" method="post" action="">
      <label for="Special"></label>
      <select name="Special" id="Special" style="width:121px;">
      <option value="">Select...</option>
      </select>
    </form></td>
  </tr>
</table>
	

<input type="submit" id="searchsubmit" value="Filter Results" class="btn" style="background-color:#83c124;color:white;width:180px; height:36px; float:right;margin-right:30px;" />
</form>
</div>
</div>
<?php get_footer(); ?>