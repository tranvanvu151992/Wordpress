<?php
/**
 * Template Name: Edit Product form
**/ 
get_header(); ?>
<div class="grid grid-pad">
    <aside id="sidebar" class="column-left col-2-12">
        <?php 
             if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-home-left')):
             endif;
        ?>
	</aside>
    <?php 
        $post_id = $GET['p_id']; 
        $key_1_values = get_post_meta( get_the_ID(), 'key_1' );
        //update_post_meta($post_id, $meta_key, $meta_value, $prev_value); 
    ?>
    
	<div class="col-8-12">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <form id="upload-product" action="#" method="post">
                    <ul>
                        <li>
                            <label>Title Product:</label>
                            <input type="text" name="title-product"  /> 
                        </li>
                        <li>
                            <label>Content Product:</label>
                            <textarea name="content-product"></textarea>
                        </li>
                        <li>
                            <select name="product-type" id="product-type">
                                <option value="simple">Simple product</option>
                                <option value="variable">Variable product</option>
                            </select>
                        </li>
                        <li>
                            <label>Price:</label>
                            <input type="text" name="price-product"  /> 
                        </li>
                    </ul>
                    <input type="submit" value="Save" />    
                </form>  
            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>