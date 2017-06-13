<?php
require_once "../model/setting.php";
require_once "../model/Author.php";
require_once "../model/Publisher.php";
require_once "../model/Translator.php";
require_once "../model/Category.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Danh sách sách</title>
</head>
<body>
<!-- PHAN DAU WEB -->
<?php include_once "../admin/header.php";?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left_book.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>DANH SÁCH SÁCH</span>
			</div>
			<div class="content-admin-pblsh">
				<?php 
					$query ="SELECT * FROM tbl_book";
					$result =mysql_query($query) or die("Error:".mysql_error());
				echo('
				<table border="1">
					<tr>
						<td>ID</td>
						<td>Title</td>
						<td>Author</td>
						<td>Translator</td>
						<td>Publisher</td>
						<td>Description</td>
						<td>Category</td>
						<td>Language</td>
						<td>Time</td>
						<td>Pages</td>
						<td>Size</td>
						<td>Pub-day</td>
						<td>Quantity</td>
						<td>Available_book</td>
						<td>Action</td>
					</tr>
				');
				while ($row=mysql_fetch_array($result))
				{
					$get_author	= Author::getAuthorInfo($row["author_id"]);
					$author_name= $get_author["fullname"];
					$get_publisher = Publisher::getPublisherInfo($row["publisher_id"]);
					$publisher_name= $get_publisher["name"];
					$get_translator	= Translator::getTranslatorInfo($row["translator_id"]);
					$translator_name= $get_translator["fullname"];
					$get_category	= Category::getCategoryInfo($row["category_id"]);
					$category_name= $get_category["name"];
					echo('
						<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['title'].'</td>
							<td>'.$author_name.'</td>
							<td>'.$translator_name.'</td>
							<td>'.$publisher_name.'</td>
							<td>'.substr($row["description"],0,30).'...</td>
							<td>'.$category_name.'</td>
							<td>'.$row['language'].'</td>
							<td>'.date("d/m/Y",$row["time"]).'</td>
							<td>'.$row["pages"].'</td>
							<td>'.$row["size"].'</td>
							<td>'.$row["pub_day"].'/'.$row["pub_month"].'/'.$row["pub_year"].'</td>
							<td>'.$row["quantity"].'</td>
							<td>'.$row["available_book"].'</td>
							<td>
								<a href="admin-update-book.php?id='.$row["id"].'">Update</a>
								<a href="admin-delete-book.php?id='.$row["id"].'">Delete</a>
							</td>
						</tr>
					');
				}
				echo('</table>');
				?>
		</div>
</div>
<div>
<!-- PHAN CHAN WEB -->
	<?php include_once "../admin-layout/footer.php"?>
</div>
</body>
</html>