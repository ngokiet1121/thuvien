<?php 
require_once "../model/setting.php";
$comment_id	= $_REQUEST["id"];
$query		= "DELETE FROM tbl_rate WHERE id='$comment_id'";
$result		= mysql_query($query) or die ("Loi xoa nguoi dung: ".mysql_error());
if($result)
{
	header("Location: admin-comment-xem.php");
}
else
{
	echo "Xoa that bai";
}
?>