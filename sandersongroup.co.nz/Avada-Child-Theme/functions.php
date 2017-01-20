<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );
add_filter( 'wp_nav_menu_items	', 'avada_add_banner' );
function avada_add_banner() {
	/* Use file in Avada-Child-Theme */
	//include (TEMPLATEPATH . '-Child-Theme/above-header.php');
	echo 'dfdsf';

}