<?php
ob_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'teachers_mrhaman');
define('DB_PASSWORD', 'LNpzlRr2JJrD');
define('DB_DATABASE', 'teachers_db-teachers-cafe');
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
?>