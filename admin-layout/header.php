<?php
	/*session_start ();
	require_once "../model/setting.php";
	$user_id 	= $_SESSION["session_user_id"];
	$type 		= $_SESSION["session_user_type"];
	$query		= "SELECT * FROM tbl_user WHERE id='$user_id'";
	$result		= mysql_query($query) or die ("Lay du lieu bi loi:".mysql_error());
	$row		= mysql_fetch_array($result);
	$f_name 	= $row["f_name"];
	$l_name		= $row["l_name"];
	$gender		= $row["gender"];
	*/
?>
<div id="header_ad">
	<div class="ad_logo">
		<img src="../anh/iconadmin.png" alt="iconadmin" />
	</div>
	<div class="header-right">
		<a href="#">Hi</a>
		<a href="#">
		<?php 
			//if($gender	== "female")
			//	echo ''.$l_name.' '.$f_name.'</h2>';
			//else 
			//	echo ''.$l_name.' '.$f_name.'</h2>';
			
			?>				
		</a>		
		<a href="#">Thoát</a>
	</div>

</div>