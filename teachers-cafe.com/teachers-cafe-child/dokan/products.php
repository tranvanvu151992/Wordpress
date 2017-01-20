<?php
/**
 * Template Name: Dashboard
**/ 
get_header();
?>
 <div class="page-content">
<div class="main-content">
<?php
$action = isset( $_GET['action'] ) ? $_GET['action'] : 'listing';

if ( $action == 'edit' ) {
    include dirname( __FILE__ ) . '/product-edit.php';
} else {
    include dirname( __FILE__ ) . '/products-listing.php';
}
?>
</div>
        <?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>