<?php

require_once("settings.php");


mysql_connect($mysql_server, $mysql_user, $mysql_password) or die(mysql_error());
mysql_select_db($mysql_database) or die(mysql_error());

$id = mysql_real_escape_string($_GET['id']);
$current_name = $_GET['current_name'];
$update_name = $_GET['update_name'];
if ($update_name=="") { $update_name = "FREE"; }

$checksum = mysql_query("SELECT name FROM $mysql_hours_table WHERE id=$id");

if( mysql_numrows($checksum) == 0 ) { echo "ERROR. Please refresh the page."; } else {


if( mysql_result($checksum,0,"name") == stripslashes($current_name) ) {

$query = "UPDATE $mysql_hours_table SET `name`=\"$update_name\" WHERE `id`=$id";
$updation = mysql_query($query) or die ("ERROR. Please refresh the page.");
echo stripslashes($update_name);

} else {

echo "ERROR. Please refresh the page.";

}

}



?>