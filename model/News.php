<?php
require_once "setting.php";
class News{
	static function numNews(){
		$query = "SELECT * FROM tbl_news";
		$result= mysql_query($query) or die("Error displayNews".mysql_error());
		$num = mysql_num_rows($result);
		echo $num;
	}
}
?>