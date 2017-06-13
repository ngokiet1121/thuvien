<div class="left_ad">
			<!--<div class="menu-left-title-ad"><a href="#"> DANH MỤC</a></div>-->
			<ul class="list-menu-left-ad">
				<li><a href="change-passwd.php">Đổi mật khẩu</a></li>
				<li><a href="../User/logout.php">Đăng xuất</a></li>
				<?php
					if($row["type"] == 'staff')
						echo '<li><a href="../admin/view-link-home.php">Admin Home</a></li>';
				?>
			</ul>
</div>