<?php

global $wpdb;


$query = "SELECT profile_iamge FROM wp_wp_eMember_members_tbl WHERE member_id=" . mysql_escape_string($_GET['member_id']); 
$r = mysql_fetch_row(mysql_query($query)); 
echo $r[0];

?>