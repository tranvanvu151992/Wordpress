         <script type="text/javascript">
          jQuery(document).ready(function($){
            var a = $('#hacknao').text();
            $('tr:first-child .dokan-order-status').text(a);
          });
        </script>
        <style type="text/css">
    table tr:nth-of-type(2n+2) {
        background: #dae5f4;
    }
</style>
<div class="dokan-dashboard-wrap">
  <?php //dokan_get_template( 'dashboard-nav.php', array( 'active_menu' => 'product' ) ); ?>

  <div class="dokan-dashboard-content dokan-product-listing">

    <?php //do_action( 'dokan_before_listing_product' ); ?>

    <article class="dokan-product-listing-area">
      <div class="product-listing-top dokan-clearfix">
        <?php //dokan_product_listing_status_filter(); ?>

                    <!--<span class="dokan-add-product-link">
                        <a href="<?php echo dokan_get_navigation_url( 'new-product' ); ?>" class="dokan-btn dokan-btn-theme dokan-right"><i class="fa fa-briefcase">&nbsp;</i> <?php _e( 'Add new product', 'dokan' ); ?></a>
                      </span>-->
                    </div>

                    <?php dokan_product_dashboard_errors(); ?>

                    <div class="dokan-w12">
                      <?php //dokan_product_listing_filter(); ?>
                    </div>

                    <table class="dokan-table table-striped">
                      <thead style=" background: #84c125; color:#fff;">
                        <tr>
                          <th style="vertical-align: top !important;" ><?php _e( 'عنوان الدرس', 'dokan' ); ?></th> 
                          <th style="vertical-align: top !important;" ><?php _e( 'تحميلا تايمز', 'dokan' ); ?></th>
                          <th style="vertical-align: top !important;"><?php _e( 'سعر الوحدة', 'dokan' ); ?></th>
                          <th style="vertical-align: top !important;"><?php _e( 'السعر الكلي', 'dokan' ); ?></th>
                          <th style="vertical-align: top !important;"><?php _e( 'صافي الربح', 'dokan' ); ?></th>
                          <th style="vertical-align: top !important;"><?php _e( 'إجمالي صافي<br> ربح', 'dokan' ); ?></th>
                          <th style="vertical-align: top !important;"><?php _e( 'التحويل المصرفي<br> تاريخ', 'dokan' ); ?></th>
                          <th style="vertical-align: top !important;"><?php _e( 'نقل<br> كمية', 'dokan' ); ?></th>
                          <th style="vertical-align: top !important;width:17%" ><?php _e( 'توازن', 'dokan' ); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                       // $pagenum      = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
                        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
                        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

                        $seller_id    = get_current_user_id();
                        $post_statuses = array('publish', 'draft', 'pending');
                        $args = array(
                          'post_type'      => 'product',
                          'post_status'    => $post_statuses,
                          'posts_per_page' => 10,
                          'author'         => get_current_user_id(),
                          'orderby'        => 'post_date',
                          'order'          => 'DESC',
                          'paged'          => $paged
                          );

                        if ( isset( $_GET['post_status']) && in_array( $_GET['post_status'], $post_statuses ) ) {
                          $args['post_status'] = $_GET['post_status'];
                        }
                        if( isset( $_GET['date'] ) && $_GET['date'] != 0 ) {
                          $args['m'] = $_GET['date'];
                        }

                        if( isset( $_GET['product_cat'] ) && $_GET['product_cat'] != -1 ) {
                          $args['tax_query']= array(
                            array(
                              'taxonomy' => 'product_cat',
                              'field' => 'id',
                              'terms' => (int)  $_GET['product_cat'],
                              'include_children' => false,
                              )
                            );
                        }

                        if ( isset( $_GET['product_search_name']) && !empty( $_GET['product_search_name'] ) ) {
                          $args['s'] = $_GET['product_search_name'];
                        }
                        $original_post = $post;
                        $wp_query = new WP_Query( apply_filters( 'dokan_product_listing_query', $args ) );
                        if ( $wp_query->have_posts() ) {
                          while ($wp_query->have_posts()) { $wp_query->the_post();
                            $tr_class = ($post->post_status == 'pending' ) ? ' class="danger"' : '';
                            $product = get_product( $post->ID );
                            $units_sold = get_post_meta( $product->id, 'total_sales', true );
                            if($units_sold > 0):
                              if( $product->is_type( 'simple' ) ){
                                ?>
                                <tr<?php echo $tr_class; ?>>
                                <td>
                                  <p><a href="<?php echo dokan_edit_product_url( $post->ID ); ?>"><?php echo $product->get_title(); ?></a></p>
                                </td>
                                <td>
                                  <?php echo $units_sold; ?>
                                  <?php //echo (int) get_post_meta( $post->ID, 'order_status', true ); ?>
                                </td>
                                <td>
                                  <?php
                                  if ( $product->get_price_html() ) {
                                    echo $product->get_price_html();
                                  } else {
                                    echo '<span class="na">&ndash;</span>';
                                  }
                                  ?>
                                </td>
                                
                                <td>
                                <?php
                                if ( $product->get_price_html() ) {
                                    $regular_simple_price =   $product->regular_price;
                                    $regular_simple_price = $regular_simple_price*$units_sold;
                                    echo '$'.sprintf('%0.2f',$regular_simple_price);
                                }
                                ?>
                                </td>
                                
                                <td>
                                <?php 
                                    if(is_user_logged_in()){    
                                        if(current_user_can('free_membership')){ 
                                          $net_profit= ($regular_simple_price*50)/100; 
                                          echo $net_profit;
                                        }elseif (current_user_can('basic_membership')){
                                         $net_profit= ($regular_simple_price*60)/100; 
                                         echo $net_profit;
                                       }elseif (current_user_can('premium_membership')) {
                                         $net_profit= ($regular_simple_price*70)/100; 
                                         echo $net_profit;
                                       }
                                    }                                
                                ?>
                                </td>
                                    
                                <td class="dokan-order-status">
                                    <?php $total_net_profit+=$net_profit;  ?>
                                </td>
                                
                                <td class="dokan-order-date">
                                    <?php echo '<span>'.get_field('blank_transfer_date','user_'.$seller_id).'</span>'; ?>

                                  </td>
                                  <td class="tranfered_amount">
                                   <?php echo '<span>'.get_field('transferred_amount','user_'.$seller_id).'</span>'; ?>
                                 </td>
                                 <td  class="dokan-order-action" >
                                   <?php echo '<span>'.get_field('balance','user_'.$seller_id).'</span>'; ?>
                                 </td>
                                
                              </tr>
                              <?php
                            } elseif( $product->is_type( 'variable' ) ){
                              global $wpdb;
                              $variations = $product->get_available_variations();
                              foreach ($variations as $value) {
                                $product_variation = new WC_Product_Variation($value['variation_id']);
                                        // echo "<pre>";
                                        // var_dump($value);
                                        // echo "</pre>";
                                $total_sale_attr = get_post_meta( $value['variation_id'], '_text_field', true );
                                        //$total_sale_attr;
                                if($total_sale_attr > 0 ) {
                                  foreach ($value['attributes'] as $key => $value2) {
                                    $valueText = $value2;
                                    $keyText = str_replace("attribute_","",$key);
                                                   //var_dump($value);
                                    ?>
                                    <tr<?php echo $tr_class ?>>
                                    <td>
                                      <p><?php echo $product->get_title().' '.$value2; ?></p>
                                    </td>
                                    <td>
                                      <?php echo  $total_sale_attr; ?>
                                    </td>
                                    <td>
                                      <?php echo $product_variation->get_price_html(); ?>
                                    </td>
                                    <td>
                                      <?php  
                                      $regular_variation_price =   $product_variation->regular_price;
                                      $regular_variation_price =$regular_variation_price*$total_sale_attr;
                                      echo '$'.sprintf('%0.2f',$regular_variation_price);
                                      ?>
                                    </td>
                                    <td>
                                      <?php    
                                      if(is_user_logged_in()){    
                                        if(current_user_can('free_membership')){ 
                                          $net_profit= ($regular_variation_price*50)/100; 
                                          echo $net_profit;
                                        }elseif (current_user_can('basic_membership')){
                                         $net_profit= ($regular_variation_price*60)/100; 
                                         echo $net_profit;
                                       }elseif (current_user_can('premium_membership')) {
                                         $net_profit= ($regular_variation_price*70)/100; 
                                         echo $net_profit;
                                       }
                                     }
                                     ?>
                                   </td>
                                   <td class="dokan-order-status">
                                     <?php $total_net_profit+=$net_profit;  ?>
                                   </td>
                                   <td class="dokan-order-date">
                                    <?php echo '<span>'.get_field('blank_transfer_date','user_'.$seller_id).'</span>'; ?>

                                  </td>
                                  <td class="tranfered_amount">
                                   <?php echo '<span>'.get_field('transferred_amount','user_'.$seller_id).'</span>'; ?>
                                 </td>
                                 <td  class="dokan-order-action" >
                                   <?php echo '<span>'.get_field('balance','user_'.$seller_id).'</span>'; ?>
                                 </td>
                               </tr>
                               <?php
                             }
                           }
                         }

                       }
                       ?>

                     <?php endif; ?>
                     <?php } ?>

                     <?php } else { ?>
                     <tr>
                      <td colspan="9"><?php _e( 'No product found', 'dokan' ); ?></td>
                    </tr>
                    <?php } ?>

                  </tbody>
                  <p id="hacknao" style="display:none;"><?php echo $total_net_profit; ?></p> 

                </table>
                <?php
                wp_reset_postdata();
                global $wp_query;
                $big = 999999999;
                echo '<div class="pagination pagi_review col-md-12">';
                echo '<ul>';
                echo paginate_links( array(
                  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'format' => '?paged=\%#%',
                  'prev_text'          => __('&lsaquo;&lsaquo;'),
                  'next_text'          => __('&rsaquo;&rsaquo;'),
                  'current' => max( 1, get_query_var('paged') ),
                  'total' => $wp_query->max_num_pages
                  ) );
                echo '</ul>';
                echo '</div>';
   // echo $product_query->max_num_pages;
                ?>
              </article>

              <?php do_action( 'dokan_after_listing_product' ); ?>
            </div><!-- #primary .content-area -->
</div><!-- .dokan-dashboard-wrap -->