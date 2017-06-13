<?php
require_once "../model/setting.php";
$staff_id	= $_REQUEST["id"];
$query		= "DELETE FROM tbl_staff WHERE id='$staff_id' AND type='staff'";
$result		= mysql_query($query) or die ("Loi xoa nguoi dung: ".mysql_error());
if($result)
{
	header("Location: admin-staff-xem.php");
}
else
{
	echo "Xoa that bai";
}
?>
