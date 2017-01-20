<?php

/**
* Template Name: Form Page
*/

acf_form_head();

get_header(); ?>

<div id="primary">
<div id="content" role="main">

<?php the_post(); ?>

<?php acf_form( $options ); ?>

</div>
</div>

<?php
/*
Template Name: Post publish form
*/

?>
<?php
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == "new_post") {

// Do some minor form validation to make sure there is content
if (isset ($_POST['title'])) {
$title = $_POST['title'];
} else {
echo 'aaa';
}
if (isset ($_POST['description'])) {
$description = $_POST['description'];
} else {
echo 'fggfdgdf';
}

$tags = $_POST['post_tags'];

// ADD THE FORM INPUT TO $new_post ARRAY
$new_post = array(
'post_title' => $title,
'post_content' => $description,
'post_category' => array($_POST['product_cat']), // Usable for custom taxonomies too
'tags_input' => array($tags),
'post_status' => 'publish', // Choose: publish, preview, future, draft, etc.
'post_type' => 'product', //'post',page' or use a custom post type if you want to
'_product'=>$fproduct
);

//SAVE THE POST
$pid = wp_insert_post($new_post);

//KEEPS OUR COMMA SEPARATED TAGS AS INDIVIDUAL
wp_set_post_tags($pid, $_POST['post_tags']);

//REDIRECT TO THE NEW POST ON SAVE
//wp_redirect( '/publikation/' );

//ADD OUR CUSTOM FIELDS
add_post_meta($fproduct, '_product', true);

//INSERT OUR MEDIA ATTACHMENTS
if ($_FILES) {
foreach ($_FILES as $file => $array) {
$newupload = insert_attachment($file,$pid);
// $newupload returns the attachment id of the file that
// was just uploaded. Do whatever you want with that now.
}

} // END THE IF STATEMENT FOR FILES

} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM

//POST THE POST YO
do_action('wp_insert_post', 'wp_insert_post');

?>
<div id="content" role="main">

<div class="form-content">

<div class="wpcf7">
<form id="new_post" name="new_post" method="post" action="" class="wpcf7-form" enctype="multipart/form-data">
<fieldset name="name">
<label for="title">Tittle</label>
<input type="text" id="title" value="" tabindex="5" name="title" />
</fieldset>

<fieldset class="category">
<label for="cat">Cate</label>
<?php wp_dropdown_categories( 'tab_index=10&taxonomy=category&hide_empty=0' ); ?>
</fieldset>

<fieldset class="content">
<label for="description"></label>
<textarea id="description" tabindex="15" name="description" cols="80" rows="10"></textarea>
</fieldset>

<fieldset class="_product">
<label for="description">des</label>
<input type="text" id="fproduct" value="" tabindex="5" name="fproduct" />

</fieldset>
<fieldset class="tags">
<label for="post_tags">Tags</label>
<input type="text" value="" tabindex="35" name="post_tags" id="post_tags" />
</fieldset>

<fieldset class="submit">
<input type="submit" value="update to" tabindex="40" id="submit" name="submit" />
</fieldset>

<input type="hidden" name="action" value="new_post" />
<?php wp_nonce_field( 'new-post' ); ?>
</form>
</div> 

</div>
</div>