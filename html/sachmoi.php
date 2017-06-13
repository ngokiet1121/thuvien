<?php
session_start();
require_once "../model/setting.php";
require_once "../model/Book.php";
require_once "../model/Category.php";
if(isset($_SESSION["session_user_id"])){
$user_id 	= $_SESSION["session_user_id"];
$query		= "SELECT * FROM tbl_user WHERE id='$user_id'";
$result		= mysql_query($query) or die ("Lay du lieu bi loi:".mysql_error());
$row		= mysql_fetch_array($result);
}
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
			if(isset($_SESSION["session_user_id"]))
				include_once "header.php";
			else
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
					$cate_name= "Sách Mới";
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
	<!-- PHAN CHAN WEB -->
	<?php include_once "footer.php";?>
</div>
</body>
</html>