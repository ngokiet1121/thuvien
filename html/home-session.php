<?php
require_once "../model/setting.php";
require_once "../model/Book.php";
require_once "../model/Category.php";
require_once "../model/User.php";
$cate 	= $_REQUEST["cate"];
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
			include_once "../User/header.php";
		?>
	<!--PHAN THAN WEB -->
	<div id="content">
		<!-- PHAN BEN TRAI WEB-->
		<?php include_once "left.php";?>
		<!-- PHAN CHINH GIUA WEB -->
		<!-- PHAN CHINH GIUA WEB -->
		<div class="center">
			<!-- PHAN NOI DUNG CHINH -->
			<?php
				if($cate != "all"){
					$get_cate = Category::getCategoryInfo($cate);
					$cate_name= $get_cate["name"];
				}
				else{
					$cate_name= "TRANG CHỦ";
				}
				
			?>
			<div class="title-news"><?php echo strtoupper($cate_name);?></div>
			<div class="item-box">
				<?php 
					Book::displayListBookAtHome($cate);
				?>
				
			</div>			
		</div>
		<!-- PHAN BEN PHAI WEB -->
		<?php include_once "right.php";?>
		</div>
	<!-- PHAN CHAN WEB -->
	<?php include_once "footer.php";?>
</div>
</body>
</html>