<?php 
require_once "../model/setting.php";
$pub_id		= $_REQUEST["id"];
$query		= "DELETE FROM tbl_publisher WHERE id='$pub_id'";
$result		= mysql_query($query) or die ("Loi xoa NXB:".mysql_error());
if($result)
{
	header("location:admin-publisher-xem.php");
}
else
{
	echo "Xoa that bai!";
}
?>