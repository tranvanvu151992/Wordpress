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

<script src="<?php bloginfo( 'stylesheet_directory' ) ?>/js/masonry.js" type="text/javascript"></script>

<script type="text/javascript">

    jQuery(document).ready(function($){

        $container = $('.products');

        $container.imagesLoaded(function(){ 

            $container.masonry({

                itemSelector: '.product',

            }); 

        });   

    });

</script>

<div class="page-content">

    <div class="main-content">

        <h1 class="page-title"><?php //the_title(); ?></h1>
        <div class="breakcrum">
        <?php
            $cat = get_term_by('slug', $_GET['product_cat'], 'product_cat');
            $subject = get_term_by('slug', $_GET['subject'], 'subject');
            $grade_slug = get_query_var('grade');
            $grade = get_term_by('slug', $grade_slug, 'grade');
            $product_cat_slug = get_query_var('product_cat');
            $product_cat = get_term_by('slug', $product_cat_slug, 'product_cat');
            $subject_slug = get_query_var('subject');
            if($grade_slug){                
        ?>
            <p><span><a href="<?php echo home_url(); ?>">الصفحة الرئيسية </a> > </span>
                <?php if($_GET['product_cat']){ ?>
                <span><a href="/product-cat/<?php echo $_GET['product_cat']; ?>"><?php echo $cat->name; ?></a> > </span>
                <?php } ?>
                <?php if($_GET['subject']){ ?>
                <span><a href="/subject/<?php echo $_GET['subject']; ?>/?product_cat=<?php echo $_GET['product_cat']; ?>&subject=<?php echo $_GET['subject']; ?>"><?php echo $subject->name; ?></a > ></span>
                <?php } ?>
                <span><?php echo $grade->name; ?></span>
            </p>
        <?php }else if($subject_slug){ ?>
            <p><span><a href="<?php echo home_url(); ?>">الصفحة الرئيسية </a> > </span>
                <?php if($_GET['product_cat']){ ?>
                <span><a href="/product-cat/<?php echo $_GET['product_cat'].'/?product_cat='.$_GET["product_cat"]; ?>"><?php echo $cat->name; ?></a> > </span>
                <?php } ?>
                <span><?php echo $subject->name; ?></span>
            </p>
        <?php }else if($product_cat_slug){ ?>
            <p><span><a href="<?php echo home_url(); ?>">الصفحة الرئيسية </a> > </span>
                <span><?php echo $product_cat->name; ?></span>
            </p>
        <?php } ?>
        </div>
        <div class="post-content">
            <?php 
                if($grade_slug){
            ?>
            <style>
                .page-title{
                    display:none !important;
                }
                .page-title.grade-title{
                    display: block !important;
                }
            </style>
            <h1 class="page-title grade-title"><?php echo $grade->name; ?></h1>
            <?php        
                }
            ?>
            <?php woocommerce_content(); ?>
        </div>

        <?php //echo premium_member(); ?>

    </div>

    <?php 

    if(!is_singular('product')){

        get_sidebar('right'); 

    }
    ?>

</div>

<?php get_footer(); ?>