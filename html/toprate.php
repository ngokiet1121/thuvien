<?php
session_start();
require_once "../model/setting.php";
require_once "../model/Book.php";
require_once "../model/Category.php";
require_once "../model/User.php";
//$cate 	= $_REQUEST["cate"];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="demo-library"/>
	<meta name="keywords" content="library,online,books,collections..." />
	<meta name="author" content="programmer..." />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Thư viện online</title>
</head>
<body>
<div id="container">
	<!-- PHAN DAU WEB -->
		<?php
			include_once "header.php";
		?>
	<!--PHAN THAN WEB -->
	<div id="content">
		<!-- PHAN BEN TRAI WEB-->
		<?php include_once "left.php";?>
		<!-- PHAN CHINH GIUA WEB -->
		<!-- PHAN CHINH GIUA WEB -->
		<div class="center">
			<!-- PHAN NOI DUNG CHINH -->
			<div class="title-news">ĐÁNH GIÁ CAO NHẤT</div>
			<div class="item-box">
				<?php 
					Book::displayTopRate();
				?>			
			</div>			
		</div>
		<!-- PHAN BEN PHAI WEB -->
		<?php include_once "right.php";?>
	<!-- PHAN CHAN WEB -->
	<?php include_once "footer.php";?>
</div>
</body>
</html>