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
			<div class="title-news">SÁCH MỚI</div>
			<div class="item-box">
				<div class="news-item">
						<a href="#"><img src="../anh/3.jpg" alt="3"/></a>
						<div class="intro-item">
							<a class="title-item" href="#">Luyện Nói Tiếng Anh Như Người Bản Ngữ</a>
							<br><span class="date-post">30/5/2014</span>
							<br><span class="info-item">Cuốn sách sẽ mang đến cho các bạn nhiều điều thú vị, hơn thế nữa
							là mang đến cho bạn nguồn thông tin chính thống, đầy đủ nhất về phương pháp học nổi tiếng mà 
							rất nhiều người đã được biết đến hiện nay.“Một thách thức lớn của Việt Nam: 
							Hội nhập quốc tế & Cải cách giáo dục. Tuy hai là một, tuy một mà hai.</span>
							<div class="more-info">
							<a href="#">Xem thêm</a>
							</div>
						</div>
				</div>
				<div class="news-item">
						<a href="#"><img style="" src="../anh/4.jpg" alt="4"/></a>
						<div class="intro-item">
							<a class="title-item" href="#">Cà Phê Cùng Tony</a>
							<br><span class="date-post">30/5/2014</span>
							<br><span class="info-item">Cà phê cùng Tony là sự tập hợp các bài viết trên trạng mạng xã hội
							của tác giả Tony Buổi Sáng (TnBS) về những bài học, câu chuyện anh đã trải nghiệm trong cuộc sống.
							Đó có thể là cách anh chia sẻ với các bạn trẻ về những chuyện to tát như khởi nghiệp,đạo đức kinh doanh,
							học tập đến những việc nhỏ nhặt như ăn mặc, giao tiếp, vệ sinh cơ thể… sao cho văn minh, lịch sự.</span>
							<div class="more-info">
							<a href="#">Xem thêm</a>
							</div>
						</div>
				</div>
			</div>
		</div>
		<!-- PHAN BEN PHAI WEB -->
		<?php include_once "right.php";?>
	<!-- PHAN CHAN WEB -->
	<?php include_once "footer.php";?>
</div>
</body>
</html>