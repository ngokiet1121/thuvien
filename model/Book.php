<?php
require_once "setting.php";
require_once "Author.php";
require_once "Publisher.php";
require_once "Translator.php";
require_once "Category.php";
class Book{
	//
	static function getBookInfo($book)
	{
		$query = "SELECT * FROM tbl_book WHERE id='$book'";
		$result= mysql_query($query) or die("Error getBookInfo: ".mysql_error());
		$row   = mysql_fetch_array($result);
		return $row;
	}
	static function numBook()
	{
		$query  = "SELECT * FROM tbl_book";
		$result = mysql_query($query) or die("Error getBookInfo: ".mysql_error());
		$num 	= mysql_num_rows($result);
		echo $num;
	}
	//
	static function displayListBookAtHome($cate)
	{
		if($cate == "all") 
			$cate_cond ="true";
		else	
			$cate_cond ="category_id='$cate'";
		$query = "SELECT * FROM tbl_book WHERE $cate_cond ORDER BY id DESC";
		$result = mysql_query($query) or die("Error select: ".mysql_error());
		while($row=mysql_fetch_array($result))
		{
			$len = strlen($row["description"]);
			if($len <= 150)
			echo '<div class="news-item">
					<a href="info_sachmoi.php?id='.$row["id"].'"><img src="'.$row["img"].'" alt=""/></a>
					<div class="intro-item">
						<a class="title-item" href="info_sachmoi.php?id='.$row["id"].'">'.$row["title"].'</a>
						<br><span class="date-post">'.date("d/m/y",$row["time"]).'</span>
						<br><span class="info-item">'.$row["description"].'</span>
						<div class="more-info">
						<a href="info_sachmoi.php?id='.$row["id"].'">Xem them</a>
						</div>
					</div>
			</div>';
			else
				echo '<div class="news-item">
					<a href="info_sachmoi.php?id='.$row["id"].'"><img src="'.$row["img"].'" alt=""/></a>
					<div class="intro-item">
						<a class="title-item" href="info_sachmoi.php?id='.$row["id"].'">'.$row["title"].'</a>
						<br><span class="date-post">'.date("d/m/y",$row["time"]).'</span>
						<br><span class="info-item">'.substr($row["description"],0,150).'...</span>
						<div class="more-info">
						<a href="info_sachmoi.php?id='.$row["id"].'">Xem them</a>
						</div>
					</div>
			</div>';
		}
	}
	//
	static function displayBookDetail($book_id)
	{
		$query	= "SELECT * FROM tbl_book WHERE id='$book_id'";
		$result = mysql_query($query) or die("Error displayBookDetail: ".mysql_error());
		$row	= mysql_fetch_array($result);
		$get_author		= Author::getAuthorInfo($row["author_id"]);
		$author			= $get_author["fullname"];
		$get_publisher 	= Publisher::getPublisherInfo($row["publisher_id"]);
		$publisher 		= $get_publisher["name"];
		$get_category	= Category::getCategoryInfo($row["category_id"]);
		$category		= $get_category["name"];
		echo '
			<div class="info-item-box">
				<div class="item-img">
					<img src="'.$row["img"].'" alt="" />
				</div>
				<table class="detail-tbl">
					<tr><td colspan="2"><div class="item-name">'.$row["title"].'</div></td>
					</tr>
					<tr>
						<td><b>Tac gia:</b></td><td>'.$author.'</td>
					</tr>
					<tr>
						<td><b>Nha XB:</b></td><td>'.$publisher.'</td>
					</tr>
					<tr>
						<td><b>Ngay XB:</b></td><td>'.$row["pub_day"].'/'.$row["pub_month"].'/'.$row["pub_year"].'</td>
					</tr>
					<tr>
						<td><b>So trang:</b></td><td>'.$row["pages"].'</td>
					</tr>
					<tr>
						<td><b>Kich thuoc:</b></td><td>'.$row["size"].'</td>
					</tr>
					<tr>
						<td><b>Ngon ngu:</b></td><td>'.$row["language"].'</td>
					</tr>
					<tr>
						<td><b>Danh muc:</b></td><td><a href="#" class="category">'.$category.'</a></td>
					</tr>
					<tr>
						<td><b>So luong:</b></td><td>'.$row["quantity"].'</td>
					</tr>
					<tr>
						<td><b>Hien co:</td><td>'.$row["available_book"].'</td>
					</tr>
					<tr>
						<td><b>Tinh trang:</b></td><td>'.$row["status"].'</td>
					</tr>
				</table>
		';
	}
	//
	static function printRate()
	{
		for($i=1;$i<=10;$i++)
		{
			echo '<input type="radio" name="rate" value="'.$i.'"/>'.$i.'';
		}
	}
	//
	static function printTopBookRate()
	{
		$query	= "SELECT * , AVG(rate) AS book_rate, b.img AS book_img FROM tbl_rate r, tbl_book b, tbl_author a 
					WHERE b.author_id = a.id AND r.book_id = b.id GROUP BY book_id ORDER BY book_rate DESC LIMIT 0,6";
		$result	= mysql_query($query) or die("Error printTopBookRate: ".mysql_error());
		while($row=mysql_fetch_array($result))
		{
			$get_author = Author::getAuthorInfo($row["author_id"]);
			$author		= $get_author["fullname"];
			$get_book	= Book::getBookInfo($row["book_id"]);
			$book_name	= $get_book["title"];
			echo '<div class="demo-new-book">
						<img src="'.$row["book_img"].'" alt="'.$row["book_img"].'"/>
						<div class="list-menu-right">
							<a class="newest-book" href="info_sachmoi.php?id='.$row["book_id"].'">'.$book_name.'</a>
							<br><span class="right-author">'.$author.'</span>
							<br><span class="right-views">Danh gia: '.$row["book_rate"].'</span>
						</div>
					</div>';
		}
	}
	static function displayTopRate()
	{
		$query	= "SELECT * , AVG(rate) AS book_rate, b.img AS book_img FROM tbl_rate r, tbl_book b, tbl_author a 
					WHERE b.author_id = a.id AND r.book_id = b.id  GROUP BY book_id ORDER BY book_rate DESC LIMIT 0,6";
		$result	= mysql_query($query) or die("Error printTopBookRate: ".mysql_error());
		while($row=mysql_fetch_array($result))
		{
			$len = strlen($row["description"]);
			if($len <= 150)
			echo '<div class="news-item">
					<a href="info_sachmoi.php?id='.$row["id"].'"><img src="'.$row["book_img"].'" alt="'.$row["book_img"].'"/></a>
					<div class="intro-item">
						<a class="title-item" href="info_sachmoi.php?id='.$row["book_id"].'">'.$row["title"].'</a>
						<br><span class="date-post">'.date("d/m/y",$row["time"]).'</span>
						<br><span class="info-item">'.$row["description"].'</span>
						<div class="more-info">
						<a href="info_sachmoi.php?id='.$row["book_id"].'">Xem them</a>
						</div>
					</div>
			</div>';
			else
				echo '<div class="news-item">
					<a href="info_sachmoi.php?id='.$row["id"].'"><img src="'.$row["book_img"].'" alt="'.$row["book_img"].'"/></a>
					<div class="intro-item">
						<a class="title-item" href="info_sachmoi.php?id='.$row["book_id"].'">'.$row["title"].'</a>
						<br><span class="date-post">'.date("d/m/y",$row["time"]).'</span>
						<br><span class="info-item">'.substr($row["description"],0,150).'...</span>
						<div class="more-info">
						<a href="info_sachmoi.php?id='.$row["book_id"].'">Xem them</a>
						</div>
					</div>
			</div>';
		}
	}
	static function descBook($book_id){
		$query	= "SELECT * FROM tbl_book WHERE id='$book_id'";
		$result = mysql_query($query) or die("Error displayBookDetail: ".mysql_error());
		$row	= mysql_fetch_array($result);		
		echo '<li>
				  <input type="radio" checked name="tabs" id="tab1"/>
				  <label for="tab1">Gioi thieu sach</label>
					<div id="tab-content1" class="tab-content animated fadeIn" style="word-wrap: break-word;">'.$row["description"].'</div>
				</li>';
	}
	static function searchBook($book,$category,$author,$translator,$publisher,$language){
		if($book != "")$book_cond = "title LIKE '%$book%'";
		else $book_cond ='true';
		if($category != "")$cate_cond = "category_id LIKE '%$category%'";
		else $cate_cond = 'true';
		if($author != "")$author_cond = "author_id LIKE '%$author%'";
		else $author_cond = 'true';
		if($translator != "") $translator_cond = "translator_id LIKE '%$translator%'";
		else $translator_cond ='true';
		if($publisher != "") $publisher_cond = "publisher_id LIKE '%$publisher%'";
		else $publisher_cond ='true';
		if($language != "") $language_cond = "language LIKE '%$language%'";
		else $language_cond ='true';
		$query	= "SELECT *FROM tbl_book
					WHERE $book_cond AND $publisher_cond AND $cate_cond AND $author_cond AND $translator_cond AND $language_cond";
		//echo $query;
		$result	= mysql_query($query) or die ("Loi".mysql_error());
		$num 	= mysql_num_rows($result);
		echo('<h3>Ket qua: '.$num.'</h3>');
		echo('<table border="1">
			<tr>
				<td>ID</td>
				<td>Sach</td>
				<td>The Loai</td>
				<td>NXB</td>
				<td>Tac gia</td>
				<td>Dich gia</td>
				<td>Language</td>
			</tr>');
		while ($row=mysql_fetch_array($result))
		{
			$get_author		= Author::getAuthorInfo($row["author_id"]);
			$author			= $get_author["fullname"];
			$get_publisher 	= Publisher::getPublisherInfo($row["publisher_id"]);
			$publisher 		= $get_publisher["name"];
			$get_category	= Category::getCategoryInfo($row["category_id"]);
			$category		= $get_category["name"];
			$get_author		= Author::getAuthorInfo($row["translator_id"]);
			$translator		= $get_author["fullname"];
			echo('
			<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["title"].'</td>
				<td>'.$category.'</td>
				<td>'.$publisher.'</td>
				<td>'.$author.'</td>
				<td>'.$translator.'</td>
				<td>'.$row["language"].'</td>
			</tr>');
		}
		echo('</table>');	
	}
}
?>