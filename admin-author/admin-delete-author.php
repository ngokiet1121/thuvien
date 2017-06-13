<?php
require_once "../model/setting.php";
$author_id	= $_REQUEST["id"];
$query		= "DELETE FROM tbl_author WHERE id='$author_id'";
$result		= mysql_query($query) or die ("Xoa the loai bi loi:".mysql_error());
if($result)
{
	header("location:admin-author-xem.php");
}
else
{
	echo "Xoa bi loi!";
}
?>