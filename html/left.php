<?php 
require_once "../model/Category.php";
?>
<div class="left">
			<div class="menu-left-title"><a href="#"> DANH MỤC SÁCH</a></div>
			<?php 
				Category::printCategoryLeftMenu();
			?>
		</div>