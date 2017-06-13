<?php
require_once "setting.php";
class Language{
	static function getLanguageInfo($language)
	{
		$query	= "SELECT * FROM tbl_book WHERE id='$language'";
		$result = mysql_query($query) or die("Error getLanguageInfo: ".mysql_error());
		$row	= mysql_fetch_array($result);
		return $row;
	}
}
?>