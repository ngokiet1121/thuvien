
		<div id="banner"> 
			<a href="home.php"><img src="../anh/banner.jpg" alt=""/></a>
		</div>

		<div id="header-nav">
			<ul class="nav-btn">
				<li>
					<a href="../html/home.php?cate=all"> Trang chủ </a>
				</li>
				<li>
					<a href="../html/news.php?type=gioithieu">Giới thiệu</a>
				</li>
				<li>
					<a href="../html/news.php?type=lienhe">Liên hệ</a>
				</li>
				
				<?php
					if(isset($_SESSION["session_user_id"]))
					{
						echo '
						<li>
							<a href="../User/user-home.php">Trang ca nhan</a>
						</li>
						<li>
							<a href="../html/logout.php">Thoát</a>
						</li>
						';
					}
					else
						echo '
						<li>
							<a href="../html/dangnhap.php">Đăng nhập</a>
						</li>
						<li>
							<a href="../html/dangky.php">Đăng kí</a>
						</li>';
				?>
			</ul>
		</div>