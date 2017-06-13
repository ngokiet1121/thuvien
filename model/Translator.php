<?php
class Translator{
	static function getTranslatorInfo($translator){
		$query = "SELECT * FROM tbl_author WHERE id='$translator'";
		$result= mysql_query($query) or die("Error getTranslatorInfo:".mysql_error());
		$row   = mysql_fetch_array($result);
		return $row; 
	}
}
?>