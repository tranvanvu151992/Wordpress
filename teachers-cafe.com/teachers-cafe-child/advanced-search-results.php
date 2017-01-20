<?php
/*
Template Name: Ad Search
*/
get_header(); ?>
<div class="page-content column-3">
  <div id="quicksearch">
    <?php 
// Get data from URL into variables
    $_country = $_GET['Country'] != '' ? $_GET['Country'] : '';
    $_authors = $_GET['Authors'] != '' ? $_GET['Authors'] : '';
    $_edu_type = $_GET['Education'] != '' ? $_GET['Education'] : '';
    $_subjects = $_GET['subjects'] != '' ? $_GET['subjects'] : '';
    $_grade = $_GET['Grade'] != '' ? $_GET['Grade'] : '';
    $_lesson = $_GET['Lesson'] != '' ? $_GET['Lesson'] : '';
    $_special = $_GET['Special'] != '' ? $_GET['Special'] : '';
    ?>

    <?php
    if( ! empty( $_grade ) || ! empty( $_country )|| ! empty( $_education )|| ! empty( $_subjects )|| ! empty( $_grade )|| ! empty( $_lesson )|| ! empty( $_special ) ){
//BUILDING ARRAY FOR TAX_QUERY RELATIONS
      $tax_query = array('relation' => 'OR');

        $tax_query[] =  array(
          'taxonomy' => 'edu-Country',
          'field' => 'id',
          'terms' => $_country
          );
   
         $tax_query[] =  array(
          'taxonomy' => 'edu-type',
          'field' => 'slug',
          'terms' => $_edu_type
          );


       $tax_query[] =  array(
          'taxonomy' => 'subjects',
          'field' => 'id',
          'terms' => $_subjects
          );
         $tax_query[] = array(
          'taxonomy' => 'grade',
          'field' => 'id',
          'terms' => $_grade
          );
        $tax_query[] =  array(
          'taxonomy' => 'disability-type',
          'field' => 'slug',
          'terms' => $_special
          );
      
    }
// Start the Query
    $v_args = array(
        'p'=>  $_lesson,
        'post_type'     =>  'product', // your CPT
        'author' =>   $_authors,
        'tax_query'   =>  $tax_query
    );
$SearchQuery = new WP_Query( $v_args );
//var_dump($SearchQuery);
?>
<script type="text/javascript">
    jQuery(document).ready(function($){
//Initiate your maosnry
$container = $('.products');
$container.imagesLoaded(function(){ 
    $container.masonry({
        itemSelector: '.grid-item',
    }); 
});

//and on ajax call use this to append or prepend
$container.append($data).imagesLoaded(function(){
    $container.masonry( 'appended', $data, true );
}); 
});
</script>
<ul class="products grid">
  <?php
  if( $SearchQuery->have_posts() ) :while($SearchQuery->have_posts() ) : $SearchQuery->the_post(); global $woocommerce; global $product;?>

  <li class="grid-item">
    <div class="author-title">
     <a href="#"><img src="<?php $avatar = get_user_meta(get_the_author_id(), 'ihc_avatar', true);$avatar_url = wp_get_attachment_image_src($avatar);
                    if($avatar_url){
                        echo $avatar_url[0]; 
                    } ?>" /></a> 
     <a href="#"><span><?php    the_author(); ?></span></a>
   </div>
   <?php if ( has_post_thumbnail() ) : ?>

    <a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="zoom" rel="thumbnails" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>"><?php echo get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_catalog' ) ) ?></a>

  <?php else : ?>

    <img src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />

  <?php endif; ?>

  <?php do_action('woocommerce_product_thumbnails'); ?>   
   <h3><a style="color:black;font-size: 17px;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <?php if ( $price_html = $product->get_price_html() ) : ?>
    <span class="price pricect"><?php echo $price_html; ?></span>
  <?php endif; ?></span>
</a>
<?php
echo apply_filters( 'woocommerce_loop_add_to_cart_link',
  sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s">%s</a>',
    esc_url( $product->add_to_cart_url() ),
    esc_attr( $product->id ),
    esc_attr( $product->get_sku() ),
    esc_attr( isset( $quantity ) ? $quantity : 1 ),
    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
    esc_attr( $product->product_type ),
    esc_html( $product->add_to_cart_text() )
    ),
  $product );

  ?>
</li>

<?php
endwhile;
else :
  _e( 'Nessuna Ricetta Trovata', 'whattodo' );
    //var_dump($tag);
endif;
wp_reset_postdata();
?>
</ul>
</div>
<?php get_sidebar('right'); ?>

</div>
<?php get_footer(); ?>