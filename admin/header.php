<?php
session_start();
require_once "../model/setting.php";
$user_id 	= $_SESSION["session_user_id"];
$query		= "SELECT * FROM tbl_user WHERE id='$user_id' AND type='staff'";
$result		= mysql_query($query) or die ("Lay du lieu bi loi:".mysql_error());
$row		= mysql_fetch_array($result);
$f_name 	= $row["f_name"];
$l_name		= $row["l_name"];
?>
<div id="header_ad">
	<div class="ad_logo">
		<img src="../anh/iconadmin.png" alt="iconadmin" />
	</div>
	<div class="header-right">
		<?php
			if(isset($_SESSION["session_user_id"])){
				echo '<span style="color: aliceblue;">Hi Admin '.$f_name.' '.$l_name.'</span>';
				echo'<a href="../admin/logout_admin.php">Thoát</a>';
			}
			else 
				echo '<a href="../html/home.php?cate=all">Thoát</a>';
		?>
		
	</div>
</div>
