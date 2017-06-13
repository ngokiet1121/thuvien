<?php 
session_start();
require_once "../model/setting.php";
if(isset($_SESSION["session_user_id"])){
$user_id 	= $_SESSION["session_user_id"];
	$query		= "SELECT * FROM tbl_user WHERE id='$user_id'";
	$result		= mysql_query($query) or die ("Lay du lieu bi loi:".mysql_error());
	$row		= mysql_fetch_array($result);
	}
if(isset($_POST["dang_ky"]))
{
	$old_passwd		= $_POST["old_passwd"];
	$new_passwd		= $_POST["new_passwd"];
	$re_newpasswd	= $_POST["re_newpasswd"];
	//KIEM TRA TINH HOP LE
	if (strlen($old_passwd)==0) 
	{
	$old_passwd 		= false;
	$err_old_passwd 	= '<b><span style="color:#FF4747">Nhập mật khẩu.</span></b>';
	}
	if (strlen($new_passwd)==0) 
	{
	$new_passwd 		= false;
	$err_new_passwd 	= '<b><span style="color:#FF4747">Nhập mật khẩu mới.</span></b>';
	}
	if($new_passwd != $re_newpasswd){
		$new_passwd = false;
		$error_pass	= "Passwords are not match!";
	}
	if($old_passwd && $new_passwd)
	{
		//Kiem tra mat khau co ton tai hay ko
		$query	= "SELECT * FROM tbl_user WHERE id='$user_id' AND password='$old_passwd'";
		$result	= mysql_query($query) or die("Loi password cu: ".mysql_error());
		$num	= mysql_num_rows($result);
		if($num==0)
		{
			$msg = "Password sai!";
		}
		else
		{
			$query	= "UPDATE tbl_user SET password='$new_passwd' WHERE id='$user_id'";
			$result = mysql_query($query) or die("Cap nhat password moi: ".mysql_error());
			if($result)
			{
				$msg = '<b><span style="color:#FF4747">Cập nhật password thành công.</span></b>';
			}
			else
			{
				$msg = "Cập nhật không thành công";
			}
		}
	}
	else
	{
		$msg = "Cap nhat that bai!";
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
	<title><?php echo 'Update password';?></title>
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
		<div class="center">
			<!-- PHAN NOI DUNG CHINH -->
		<div class="menu-right">
					<div class="header-menu-right">
						<span>Update password</span>
					</div>
					<div class="content-menu-right">
					<form action="<?php echo "change-passwd.php?id=$user_id"; ?>" method="post">
						<table>
							<tr>
								<td>
									<span>Mật khẩu cũ: </span>
								</td>
							</tr>
							<tr>
								<td>
									<input class="long" type="password" name="old_passwd" placeholder="Mật khẩu cũ"/>
								</td>
							</tr>
							<tr>
								<td>
									<span>Mật khẩu mới: </span>
								</td>
							</tr>
							<tr>
								<td>
									<input class="long" type="password" name="new_passwd" placeholder="Mật khẩu mới"/>
								</td>
							</tr>
							<tr>
								<td>
									<span>Nhập lại mật khẩu mới: </span>
								</td>
							</tr>
							<tr>
								<td>
									<input class="long" type="password" name="re_newpasswd" placeholder="Nhập lại mật khẩu mới"/>
								</td>
							</tr>
							<tr>
								<td><input class="submit" type="submit" name="dang_ky" value="Đổi"/></td>
							</tr>
							<tr>
								<td>
									<?php 
									if(isset($err_old_passwd )) echo ("$err_old_passwd <br>");
									if(isset($err_new_passwd)) echo ("$err_new_passwd<br>");
									if(isset($error_pass)) echo ("$error_pass<br>");
									if(isset($msg)) echo ("$msg<br>");
									?>
								</td>
							</tr>
						</table>
					</form>
					</div>
			</div>
		</div>
		<!-- PHAN BEN PHAI WEB -->
	<!-- PHAN CHAN WEB -->
	<?php include_once "footer.php";?>
</div>
</body>
</html>