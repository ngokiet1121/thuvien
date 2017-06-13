<?php

	require_once "../model/setting.php";
	require_once "../model/Author.php";
	require_once "../model/Publisher.php";
	require_once "../model/Translator.php";
	require_once "../model/Category.php";
	require_once "../model/Book.php";
	require_once "../model/User.php";
	require_once "../model/News.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Admin Home</title>
</head>
<body>
<?php include_once "header.php"?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "left.php" ?>
		<div class="right_ad">
			<div class="tit_general"><span>HOME ADMIN</span></div>
		<div class="box_form">
			<div class="box_info">
				<div class="tit_box">Số Lượng Sách</div>
				<div class="num_general" ><?php Book::numBook();?></div>
				<div class="link"><a href="../admin-book/admin-book-xem.php">Xem chi tiết</a></div>
			</div>
			<div class="box_info">
				<div class="tit_box">Số Lượng NXB</div>
				<div class="num_general"><?php Publisher::getNumberPublisher();?></div>
				<div class="link"><a href="../admin-publisher/admin-publisher-xem.php">Xem chi tiết</a></div>
			</div>
			<div class="box_info">
				<div class="tit_box">Số Lượng Tác/ Dich Giả</div>
				<div class="num_general"><?php Author::getNumberAuthor();?></div>
				<div class="link"><a href="../admin-author/admin-author-xem.php">Xem chi tiết</a></div>
			</div>
			<div class="box_info">
				<div class="tit_box">Số Lượng Thể Loại</div>
				<div class="num_general"><?php Category::numCategory();?></div>
				<div class="link"><a href="../admin-category/admin-category-xem.php">Xem chi tiết</a></div>
			</div>
			<div class="box_info">
				<div class="tit_box">Số Lượng Thành Viên</div>
				<div class="num_general"><?php User::numUser();?></div>
				<div class="link"><a href="../admin-user/admin-user-xem.php">Xem chi tiết</a></div>
			</div>
			<div class="box_info">
				<div class="tit_box">Số Lượng Comment/ Danh Gia</div>
				<div class="num_general"><?php 
					$query = "SELECT * FROM tbl_rate";
					$result = mysql_query($query) or die("Error rate:".mysql_error());
					$num	= mysql_num_rows($result);
					echo $num;
				?></div>
				<div class="link"><a href="../admin-comment/admin-comment.php">Xem chi tiết</a></div>
			</div>
			<div class="box_info">
				<div class="tit_box">Doi Ngu Nhan Vien</div>
				<div class="num_general"><?php User::numStaff();?></div>
				<div class="link"><a href="../admin-staff/admin-staff-xem.php">Xem chi tiết</a></div>
			</div>
			<div class="box_info">
				<div class="tit_box">Giới thiệu/ Liên Hệ</div>
				<div class="num_general"><?php News::numNews();?></div>
				<div class="link"><a href="../admin-news/addnew_infor.php">Xem chi tiết</a></div>
			</div>
		</div>
		</div>
</div>
<!-- PHAN CHAN WEB -->
	<?php include_once "../admin-layout/footer.php"?>
</div>
</body>
</html>