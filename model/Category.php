<?php
require_once "../model/setting.php";
class Category{
	//
	static function getCategoryInfo($category){
		$query 		= "SELECT * FROM tbl_category WHERE id='$category'";
		$result 	= mysql_query($query) or die("Error getCategoryInfo:".mysql_error());
		$row 		= mysql_fetch_array($result);
		return 	$row;
	}
	//
	static function numCategory(){
		$query 		= "SELECT * FROM tbl_category";
		$result 	= mysql_query($query) or die("Error getCategoryInfo:".mysql_error());
		$num 		= mysql_num_rows($result);
		echo $num;
	}
	//
	static function printCategoryLeftMenu(){
		$query 		= "SELECT * FROM tbl_category";
		$result 	= mysql_query($query) or die("Error printCategoryLeftMenu:".mysql_error());
		echo '<ul class="list-menu-left">';
		while($row=mysql_fetch_array($result))
		{
			echo '<li><a href="home.php?cate='.$row["id"].'"><img src="../anh/icon.png" alt="icon" />'.$row["name"].'</a></li>';
		}
		echo	'</ul>';
	}
	//
	static function getCateByBookID($book){
		$query 		= "SELECT c.name FROM tbl_category AS c, tbl_book AS b 
						WHERE b.id='$book' AND c.id=b.category_id";
		$result 	= mysql_query($query) or die("Error getCategoryInfo:".mysql_error());
		$row 		= mysql_fetch_array($result);
		return 	$row;
	}
}
?>