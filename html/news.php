<?php
session_start();
require_once "../model/setting.php";
require_once "../model/Book.php";
require_once "../model/Category.php";
require_once "../model/User.php";
$type	= $_REQUEST["type"];
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
		<?php include_once "../html/left.php";?>
		<!-- PHAN CHINH GIUA WEB -->
		<!-- PHAN CHINH GIUA WEB -->
		<div class="center">
			<!-- PHAN NOI DUNG CHINH -->
			
			<div class="title-news">
			<?php
				if($type == "gioithieu") echo "GIỚI THIỆU";
				else echo "LIÊN HỆ";
			?></div>
			<div class="item-box">
				<?php
					$query = "SELECT * FROM tbl_news WHERE type='$type'";
					$result= mysql_query($query)or die("Error News: ".mysql_error());
					$row   = mysql_fetch_array($result);
					echo $row["content"];
				?>
				
			</div>			
		</div>
		<!-- PHAN BEN PHAI WEB -->
		<?php include_once "../html/right.php";?>
	<!-- PHAN CHAN WEB -->
	<?php include_once "../html/footer.php";?>
</div>
</body>
</html>