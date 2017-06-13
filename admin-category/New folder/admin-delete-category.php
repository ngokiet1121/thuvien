<?php 
require_once "../model/setting.php";
$cate_id	= $_REQUEST["id"];
$query		= "DELETE FROM tbl_category WHERE id='$cate_id'";
$result		= mysql_query($query) or die ("Xoa the loai bi loi:".mysql_error());
if($result)
{
	header("location:admin-category-xem.php");
}
else
{
	echo "Xoa bi loi!";
}
?>