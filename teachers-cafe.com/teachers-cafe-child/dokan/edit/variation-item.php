<?php
$allprice = get_option('new_price');
$all_price = explode('|', $allprice);
$all_price = array_filter(array_map('trim', $all_price));
if (empty($all_price)){
    $all_price = array('100','200','300','400','500','600','700','800','900','1000');
}
$product_cat_id = wp_get_post_terms( $post_id, 'product_cat', array( 'fields' => 'ids') );
$variable_file_type = get_field('file_types', 'product_cat_'.$product_cat_id[0]);
//var_dump($all_price);

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<td>
    <input type="checkbox" name="variable_enabled[<?php echo $loop; ?>]" value="yes" <?php checked( $variation_post_status, 'publish' ); ?>>
</td>
<td style="width:30% !important;">
    <?php
        foreach ( $parent_data['attributes'] as $attribute ) {
            // Only deal with attributes that are variations
            if ( ! $attribute['is_variation'] ) {
                continue;
            }

            // Get current value for variation (if set)
            $variation_selected_value = isset( $variation_data[ 'attribute_' . sanitize_title( $attribute['name'] ) ][0] ) ? $variation_data[ 'attribute_' . sanitize_title( $attribute['name'] ) ][0] : '';

            // Name will be something like attribute_pa_color
            echo '<select id="prize_'.$loop.'"  style="width:100%;" name="attribute_' . sanitize_title( $attribute['name'] ) . '[' . $loop . ']" class="control_price dokan-w3 dokan-form-control"><option value="">' . __( 'Select', 'dokan' ) . ' ' . esc_html( wc_attribute_label( $attribute['name'] ) ) . '&hellip;</option>';

            // Get terms for attribute taxonomy or value if its a custom attribute
            if ( $attribute['is_taxonomy'] ) {
                
                $post_terms = wp_get_post_terms( $parent_data['id'], $attribute['name'] );
                foreach ( $post_terms as $term ) {
                    echo '<option ' . selected( $variation_selected_value, $term->slug, false ) . ' value="' . esc_attr( $term->slug ) . '">11' . apply_filters( 'woocommerce_variation_option_name', esc_html( $term->name ) ) . '</option>';
                }
                // foreach ($variable_file_type as $file_t) {
                //     echo '<option ' . selected( sanitize_title( $variation_selected_value ), sanitize_title( $file_t['file_type'] ), false ) . ' value="' . esc_attr( sanitize_title( $file_t['file_type'] ) ) . '">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $file_t['file_type'] ) ) . '</option>';
                // }

            } else {
            
                $options = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
                foreach ( $options as $option ) {
                    echo '<option ' . selected( sanitize_title( $variation_selected_value ), sanitize_title( $option ), false ) . ' value="' . esc_attr( sanitize_title( $option ) ) . '">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
                }

            }

            echo '</select>';
        }
    ?>

    <input type="hidden" name="variable_post_id[<?php echo $loop; ?>]" value="<?php echo esc_attr( $variation_id ); ?>" />
    <input type="hidden" class="variation_menu_order" name="variation_menu_order[<?php echo $loop; ?>]" value="<?php echo $loop; ?>" />
</td>
<td style="width:30% !important;">
    <!-- <input type="number" min="0" step="any" size="5" name="variable_regular_price[<?php echo $loop; ?>]" value="<?php if ( isset( $_regular_price ) ) echo esc_attr( $_regular_price ); ?>" class="dokan-form-control" placeholder="<?php _e( '0.00', 'dokan' ); ?>" size="10"/> -->
    <select id="item_prize_<?php echo $loop; ?>" class="dokan-w3 dokan-form-control save_price_file" name="variable_regular_price[<?php echo $loop; ?>]" style="width:100%">
        <option value="">Select Price</option>
        <?php
        foreach ( $parent_data['attributes'] as $attribute ) {
            $variation_selected_value = isset( $variation_data[ 'attribute_' . sanitize_title( $attribute['name'] ) ][0] ) ? $variation_data[ 'attribute_' . sanitize_title( $attribute['name'] ) ][0] : '';
            foreach ($variable_file_type as $file_t) {
                if ($file_t['file_type'] === $variation_selected_value){
                    foreach ($file_t['price'] as $key => $value) {
                        if ( $_regular_price ===  $value["price"] ) { $selected = 'selected'; } else { $selected = '';}
                        echo '<option  '.$selected.' value="'.$value["price"].'">'.$value["price"].'</option>';
                    }
                } else if ($file_t['file_type'] === ''){ }
            }
        }
        ?>
        <?php foreach ($all_price as $key => $value) { ?>
            <option <?php if ( $_regular_price ===  $value ) echo 'selected' ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
        <?php } ?>
    </select>
</td>
<td style="width:20% !important; display:none;">
    <?php if ( wc_product_sku_enabled() ) : ?>
        <input type="text" size="5" class="dokan-form-control" name="variable_sku[<?php echo $loop; ?>]" value="<?php if ( isset( $_sku ) ) echo esc_attr( $_sku ); ?>" placeholder="<?php echo esc_attr( $parent_data['sku'] ); ?>" size="10"/>
    <?php else : ?>
        <input type="hidden" name="variable_sku[<?php echo $loop; ?>]" value="<?php if ( isset( $_sku ) ) echo esc_attr( $_sku ); ?>" />
    <?php endif; ?>
</td>
<td style="width:20% !important;">
    <a title="Upload File" id="ize_<?php echo $loop; ?>" href="#variation-edit-popup" class="dokan-btn dokan-btn-theme edit_variation"><i class="fa fa-arrow-up"></i></a>
    <a id="size_<?php echo $loop; ?>" class="dokan-btn dokan-btn-theme remove_variation" data-variation_id=<?php echo $variation_id; ?>><i class="fa fa-trash-o"></i></a>
</td>