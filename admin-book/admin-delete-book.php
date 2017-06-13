
<?php 
require_once "../model/setting.php";
$book_id	= $_REQUEST["id"];
$query		= "DELETE FROM tbl_book WHERE id='$book_id'";
$result		= mysql_query($query) or die ("Xoa the loai bi loi:".mysql_error());
if($result)
{
	header("location:admin-book-xem.php");
}
else
{
	echo "Xoa bi loi!";
}
?>
