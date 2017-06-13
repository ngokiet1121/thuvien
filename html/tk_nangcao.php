<?php
session_start();
require_once "../model/setting.php";
require_once "../model/collection.php";
require_once "../model/Author.php";
require_once "../model/Publisher.php";
require_once "../model/Translator.php";
require_once "../model/Category.php";
require_once "../model/Book.php";
if(isset($_POST["btn_search"])){
	$key = $_POST["search"];
}
?>
<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="demo-library"/>
	<meta name="keywords" content="library,online,books,collections..." />
	<meta name="author" content="programmer..." />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title><?php echo 'Tìm kiếm nâng cao';?></title>
</head>
<body>
<div id="container">
<!-- PHAN DAU WEB -->
		<?php include_once "header.php";?>
	<!--PHAN THAN WEB -->
	<div id="content">
		<!-- PHAN BEN TRAI WEB-->
		<?php include_once "left.php";?>
		<!-- PHAN CHINH GIUA WEB -->
		<div class="center">
			<!-- PHAN NOI DUNG CHINH -->
			<div class="menu-right">
				<div class="header-menu-right">
					<span>Tìm kiếm nâng cao</span>
				</div>
				<div class="content_fsearch">
					<form action="tk_nangcao.php" method="post">
						<table>
							<tr>
								<td><span>Tên sách:</span></td>
								<td>
									<input class="name-sh-book" type="text" name="book" placeholder="Nhập tên sách" value="<?php if(isset($key)) echo $key;?>"/>
								</td>
							</tr>
							<tr>
								<td><span>Thể loại:</span></td>
								<td>
									<?php
										if(isset($category)) collection::dropBookcategory($category);
										else collection::dropBookcategory('');
									?>
								</td>
							</tr>
							<tr>
								<td>
									<span>Tác giả:</span>
								</td>
								<td>
									<?php
										if(isset($author)) collection::dropBookauthor($author);
										else collection::dropBookauthor('');
									?>
								</td>
							</tr>
							<tr>
								<td>
									<span>Dịch giả:</span>
								</td>
								<td>
									<?php
										if(isset($translator)) collection::dropBooktranslator($translator);
										else collection::dropBooktranslator('');
									?>
								</td>
							</tr>
							<tr>
								<td><span>Nhà xuất bản:</span></td>
								<td>
									<?php
										if(isset($publisher)) collection::dropBookpublisher($publisher);
										else collection::dropBookpublisher('');
									?>
								</td>
							</tr>
							<tr>
								<td><span>Ngôn ngữ:</span></td>
								<td>
									<?php
										if(isset($status)) collection::dropBooklanguage($language);
										else collection::dropBooklanguage('');
									?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" name="submit-nhap" class="submit-nhap" value="Tìm kiếm"/>
								</td>
							</tr>
						</table>
					</form>
					<?php 
						if(isset($_POST["submit-nhap"]))
						{
							$book		= $_POST["book"];
							$category	= $_POST["category"];
							$author		= $_POST["author"];
							$translator	= $_POST["translator"];
							$publisher	= $_POST["publisher"];
							$language	= $_POST["language"];
							Book::searchBook($book,$category,$author,$translator,$publisher,$language);
						}
						if(isset($key)){
							Book::searchBook($key,'','','','','');
						}
					?>
				</div>
			</div>
		</div>
		<!-- PHAN BEN PHAI WEB -->
			<?php //include_once "right.php";?>
	<!-- PHAN CHAN WEB -->
	<?php include_once "footer.php";?>
</div>
</body>
</html>