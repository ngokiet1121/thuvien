<?php 
$host		= "localhost";
$user 		= "root";
$password	= "usbw";
$db			= "thuvien";
$dbc  		= mysql_connect($host, $user, $password)
			or die("Ket noi bi loi: ".mysql_error());
mysql_select_db($db,$dbc)  or die('Khong tim thay db:'.mysql_error());
date_default_timezone_set("Asia/Ho_Chi_Minh");
?>