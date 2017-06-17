<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "tw";

$connect = mysql_connect("$host", "$user", "$password");
$data = mysql_select_db("$db", $connect);
if ($data) {
 
 echo "Database  Ada";
 
}else {
 
 echo "Database Tidak Ada";
 
}
?>