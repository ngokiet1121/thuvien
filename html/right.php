<?php
	require_once "../model/Book.php";

?>
<div class="right">
				<div class="title-right">TÌM KIẾM NHANH</div>
					<div class="search-form">
					<form action="tk_nangcao.php" method="post">
						<input type="text" name="search" class="quick-search" placeholder="Nhập từ cần tìm">
						<input type="submit" name="btn_search" class="search-btn" value="Tìm">
					</form>
						<a href="tk_nangcao.php">Tìm kiếm nâng cao</a>
					</div>
				<div class="title-right">ĐÁNH GIÁ CAO NHẤT</div>
				<div class="new-book"> 
					<?php
						Book::printTopBookRate();
					?>
					<div class="see-more">
						<a href="toprate.php">Xem tất cả</a>
					</div>
				</div>
</div>