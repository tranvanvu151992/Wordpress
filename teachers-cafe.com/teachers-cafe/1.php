<?php

global $wpdb;

$name = $_POST['name'];
$email = $_POST['email'];
$table_name = $wpdb->prefix . "user2";
$wpdb->insert( $table_name, array(
    'name' => $name,
    'email' => $email
) );

?>