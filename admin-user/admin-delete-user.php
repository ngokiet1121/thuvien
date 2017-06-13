<?php 
require_once "../model/setting.php";
$user_id	= $_REQUEST["id"];
$query		= "DELETE FROM tbl_user WHERE id='$user_id'";
$result		= mysql_query($query) or die ("Loi xoa nguoi dung: ".mysql_error());
if($result)
{
	header("Location: admin-user-xem.php");
}
else
{
	echo "Xoa that bai";
}
?>