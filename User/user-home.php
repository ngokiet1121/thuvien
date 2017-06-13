<?php 
	session_start();
	require_once "../model/setting.php";
	require_once "../model/User.php";
	$user_id 	= $_SESSION["session_user_id"];
	$query		= "SELECT * FROM tbl_user WHERE id='$user_id'";
	$result		= mysql_query($query) or die ("Lay du lieu bi loi:".mysql_error());
	$row		= mysql_fetch_array($result);
	$f_name 	= $row["f_name"];
	$l_name		= $row["l_name"];
	$gender		= $row["gender"];
	$address	= $row["address"];
	$phone		= $row["phone"];
	$email		= $row["email"];
	$b_day		= $row["b_day"];
	$b_month	= $row["b_month"];
	$b_year		= $row["b_year"];
	$photo		= $row["photo"];
	$gender		= $row["gender"];
	$register_day	= $row["register_day"];
if(isset($_POST["btn_photo"]))
{
	$time		= date('U');
	$photo	= $_FILES["photo"]["name"];
	if($photo	!= "")
	{
		$check_query	= true;
		if($check_query	== true)
		{
			//$uploaddir	= "../images/";
			//$uploadfile	= $time."_".basename($photoimg);
			$uploadfile	= basename($photo);
			move_uploaded_file($_FILES["photo"]["tmp_name"], "../anh/".$uploadfile);
		}
		if($check_query==true)
		{
			//$photoimg		= "../images/".$time."_".basename($photoimg);
			$photo	= "../anh/".basename($photo);
			$query		= "UPDATE tbl_user SET photo='$photo' WHERE id='$user_id'";
			$result		= mysql_query($query) or die("Cap nhat bi loi:".mysql_error());
			if($result)
			{
				$msg = "Cập nhật thành công.";
			}
		}
	}
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
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Trang cá nhân</title>
</head>
<body>
<div id="container">
	<!-- PHAN DAU WEB -->
		<?php include_once "../html/header.php";?>
	<!--PHAN THAN WEB -->
	<div id="content">
		<!-- PHAN BEN TRAI WEB-->
		<?php include_once "left.php";?>
		<!-- PHAN CHINH GIUA WEB -->
		<!-- PHAN CHINH GIUA WEB -->
		<div class="center_user">
			<!-- PHAN NOI DUNG CHINH -->
			<div class="user_tit">
				<span>Bảng thông tin của tôi</span>
			</div>
			<div class="dashboard_welcome">
				<span>Xin chào, 
					<?php
					if($gender == 'female' )
						echo $l_name.' '.$f_name;
					else 
						echo $l_name.' '.$f_name;
					?>!
				</span>
			</div>
			<div class="acc_box">
				<div class="tit_acc">
					<span>Thông tin tài khoản</span>
				</div>
				<div  class="avarta_box">
				<form action="<?php echo $_SERVER["PHP_SELF"]."?id".$user_id?>" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>
							<?php 
								User::displayPhotoUser($user_id);
							?>
						</td>
					</tr>
					<tr>
						<td><input type="file" name="photo"/></td>
					</tr>
					<tr>
						<td><input type="submit" name="btn_photo" value="Them anh" /></td>
					</tr>
				</table>
				</form>
				</div>
				<?php 
					User::displayUserDetail($user_id);
				?>
			</div>
		</div>
	<!-- PHAN CHAN WEB -->
	<?php include_once "../html/footer.php";?>
</div>
</body>
</html>