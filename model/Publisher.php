<?php
require_once "setting.php";
class Publisher{
	static function getPublisherInfo($publisher)
	{
		$query	= "SELECT * FROM tbl_publisher WHERE id='$publisher'";
		$result = mysql_query($query) or die("Error getPublisherInfo: ".mysql_error());
		$row	= mysql_fetch_array($result);
		return $row;
	}
	static function getNumberPublisher()
	{
		$query	= "SELECT * FROM tbl_publisher";
		$result = mysql_query($query) or die("Error getPublisherInfo: ".mysql_error());
		$num	= mysql_num_rows($result);
			echo $num;
	}
}
?>