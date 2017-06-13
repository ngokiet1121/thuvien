<?php
require_once "setting.php";
class Author{
	static function getAuthorInfo($author)
	{
		$query	= "SELECT * FROM tbl_author WHERE id='$author'";
		$result = mysql_query($query) or die("Error getAuthorInfo: ".mysql_error());
		$row	= mysql_fetch_array($result);
		return $row;
	}
	static function getNumberAuthor()
	{
		$query	= "SELECT * FROM tbl_author";
		$result = mysql_query($query) or die("Error getAuthorInfo: ".mysql_error());
		$num	= mysql_num_rows($result);
			echo $num;
	}
	static function descAuthor($author_id){
		$query	= "SELECT * FROM tbl_author WHERE type='author' AND id='$author_id'";
		$result = mysql_query($query) or die("Error getAuthorInfo: ".mysql_error());
		$row= mysql_fetch_array($result);	
		echo '
			<li>
			  <input type="radio" name="tabs" id="tab2"/>
			  <label for="tab2">Thong tin tac gia</label>
			  <div id="tab-content2" class="tab-content animated fadeIn" style="word-wrap: break-word;">'.$row["description"].'</div>
			</li>
			';
	}
}
?>