<?php
/**
 * @package bloggr
 */
?>
<div class="masonry-post">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    	<div class="entry-meta">
		<?php bloggr_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="quote-entry-content">
    	<a href="<?php the_permalink(); ?>"> 
		<?php the_title( '<h1 class="entry-title">&#34;', '&#34;</h1>' ); ?>
        </a>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php bloggr_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
</div>