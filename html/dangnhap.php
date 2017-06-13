<?php 
session_start();
require_once "../model/setting.php";

if (isset($_POST ["dang_nhap"]))
{
	$email		= $_POST["email"];
	$password	= $_POST["password"];
	//KIEM TRA TINH HOP LE
	if(!(strlen($email) >= 0))
	{
		$email 		= false;
		$err_email 	='<div class="msg">Please enter your email.</div>';
	}
	if(!(strlen($password)>=6))
	{
		$password 		= false;
		$err_password 	= '<div class="msg">Please enter your password.</div>';
	}
	//KIEM TRA DU LIEU
	if($email && $password)
	{
		$query		= "SELECT * FROM tbl_user
						WHERE email='$email' AND password='$password'";
		echo $query;
		$result		= mysql_query($query) or die ("Kiem tra du lieu bi loi".mysql_error());
		$num 		= mysql_num_rows($result);
		if($num>0)
		{
			//LAY DU LIEU TRONG CSDL
			$row = mysql_fetch_array($result);
			//THIET LAP BIEN SESSION
			$_SESSION["session_user_id"]	= $row["id"];
			$_SESSION["session_user_email"]	= $email;
			$_SESSION["session_user_paswd"]	= $password;
			$_SESSION["session_user_type"]	= $row["type"];
			//Chuyen vao trang nguoi dung
			if($row["type"]	== "user")
			{
				header("location:../User/user-home.php");
			}
			if($row["type"]	== "staff")
			{
				header("location:../User/user-home.php");
			}
		}
		else
		{
			//Thong bao loi
			$msg 	= '<div class="msg">Đăng nhập không thành công</div>';
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
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title><?php echo 'Đăng nhập';?></title>
</head>
<body>
<div id="container">
	<!-- PHAN DAU WEB -->
		<?php include_once "header.php";?>
	<!--PHAN THAN WEB -->
	<div id="content">
		<!-- PHAN BEN TRAI WEB-->
		<?php include_once "left.php";?>
		<!-- PHAN CHINH GIUA WEB -->
		<!-- PHAN CHINH GIUA WEB -->
		<div class="center">
			<!-- PHAN NOI DUNG CHINH -->
		<div class="menu-right">
			<div class="header-menu-right">
				<span>Đăng Nhập</span>
			</div>
				<div class="content-menu-right">
				<form action="dangnhap.php" method="post">
					<table>
						<tr>
							<td>
							<span class="name-login">Email</span><br>
							<input class="long-nhap" type="text" name="email" placeholder="Email" 
							value="<?php if(isset($_POST["dang_nhap"])) echo $email; ?>"/>
							</td>
						</tr>
						<tr>
							<td>
							<span class="name-login">Password</span><br>
							<input class="long-nhap" type="password" name="password" placeholder="Mật khẩu"/>
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="rmb_user_btn" value="rmb_user"/>
								<span class="k_login">Duy trì đăng nhập</span>
							</td>
						</tr>
					<tr>
						<td><input class="submit-nhap" type="submit" name="dang_nhap" value="Đăng nhập"/></td>
					</tr>
					<tr>
						<td>
						<?php 
							if (isset($msg)) echo $msg;
							if(isset($err_password)) echo $err_password;
							if (isset($err_email)) echo $err_email;
						/*else
							echo ('<span>Your password: '.$password.'</span>');*/
						?>
						</td>
					</tr>
				<!--<tr>
					<td>
						<a href="#" class="fgt_password">Quên mật khẩu</a>
					</td>
				</tr>-->
				</table>
			</form>
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