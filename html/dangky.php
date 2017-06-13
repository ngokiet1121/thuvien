<?php 
require_once "../model/common.php";
require_once "../model/setting.php";
if (isset($_POST ["dang_ky"])){
	$l_name			= $_POST["l_name"];
	$f_name			= $_POST["f_name"];
	$email			= $_POST["email"];
	$re_email		= $_POST["re_email"];
	$password		= $_POST ["password"];
	$b_day			= $_POST ["b_day"];
	$b_month		= $_POST ["b_month"];
	$b_year			= $_POST ["b_year"];
	$gender			= $_POST ["gender"];
	$address		= $_POST ["address"];
	$phone 			= $_POST ["phone"];
	$status 		= "pending";
	$register_day	= date('U');
	//KIEM TRA TINH HOP LE
		//Kiem tra ten
	if(!(strlen($f_name)>0) && !(strlen($l_name)>0)){
		$f_name		= NULL;
		$l_name		= NULL;
		$error_name	=	'<b><span style="color: #4D4D4D">Please enter your first and last name</span></b>';
	}
	elseif(! preg_match('/[a-zA-Z]/', $f_name) && preg_match('/[a-zA-Z]/', $l_name))
	{
		$f_name		= false;
		$l_name		= false;
		$error_name	= '<b><span style="color: #4D4D4D">Please enter only alphabet.</span></b>';
	}
	else{
		$full_name	=	$l_name.' '.$f_name;
	}
		//Kiem tra sdt
	if (!(strlen($phone)>10)) 
	{
	$phone = NULL;
	$error_phone = '<b><span style="color:#FF4747">Please enter your phone number.</span></b>';
	}
		//Kiem tra email
	if (strlen($email)==0) 
	{
	$email = NULL;
	$error_email = '<b><span style="color:#FF4747">Please enter your email.</span></b>';
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
	$email = NULL;
	$error_email = '<b><span style="color:#FF4747">Please enter valid email.</span></b>';
	}
		//Kiem tra mat khau
	if (strlen($password)== 0)
	{
		$error_password = '<div class="msg">Please enter your password</div>';
	}
	//Ket noi CSDL, thuc hien them moi nguoi dung
	if($email && $password && $phone)
	{
		//Kiem tra email da ton tai hay chua
		$query 	= "SELECT *FROM tbl_user WHERE email ='$email'";
		$result = mysql_query($query) or die ("Them moi nguoi dung bi loi ".mysql_error());
		$num 	= mysql_num_rows($result);
		
		if ($num == 0)
		{
			//Them moi nguoi dung vao trong CSDL
			$type	= "user";
			$query	=  "INSERT INTO tbl_user(f_name, l_name, address, phone, email, password, b_day, b_month, b_year, gender,status,type, register_day)
						VALUES('$f_name','$l_name','$address','$phone','$email','$password','$b_day','$b_month','$b_year','$gender','$status','$type','$register_day')";
			$result = mysql_query($query) or die ("Loi them moi nguoi dung:".mysql_error());
			if($result)
			{
				$msg = '<div class="msg">Đăng kí tài khoản thành công</div>';
			}
		}
		else
		{
			$msg = '<div class="msg">Email đã tồn tại. Vui lòng nhập email khác!</div>';
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
	<title><?php echo 'Đăng ký';?></title>
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
		<div class="center">
			<!-- PHAN NOI DUNG CHINH -->
		<div class="menu-right">
					<div class="header-menu-right">
						<span>Đăng ký thành viên</span>
					</div>
					<div class="content-menu-right">
					<form action="dangky.php" method="post">
						<table>
							<tr>
								<td><input class="name" type="text" name="l_name" placeholder="Họ" value="<?php if(isset($_POST["dang_ky"])) echo $l_name; ?>"/>
								<input class="name" type="text" name="f_name" placeholder="Tên" value="<?php if(isset($_POST["dang_ky"])) echo $f_name; ?>"/></td>
							</tr>
							<tr>

								<td><input class="long" type="text" name="address" placeholder="Địa chỉ" value="<?php if (isset($_POST["dang_ky"])) echo $address; ?>"/></td>
							</tr>
							<tr>

								<td><input class="long" type="text" name="phone" placeholder="Số Điện Thoại" value="<?php if (isset($_POST["dang_ky"])) echo $phone; ?>"/></td>
							</tr>
							<tr>
								<td><input class="long" type="text" name="email" placeholder="Email" value="<?php if (isset($_POST["dang_ky"])) echo $email; ?>"/></td>
							</tr>
							<tr>

								<td><input class="long" type="text" name="re_email" placeholder="Nhập lại Email"/></td>
							</tr>
							<tr>

								<td><input class="long" type="password" name="password" placeholder="Mật khẩu"/></td>
							</tr>
							<tr>
								<td><span>Ngày sinh</span></td>
							</tr>
							<tr>
								<td>
										<!--  Ngày sinh -->
										<?php 
										if(isset($b_day))
											{
												common::dropb_day($b_day);
											}
										else{
												common::dropb_day('');
											}
										?>
										<!--  Tháng sinh -->
										<?php 
											if(isset($b_month))
											{
												common::dropb_month($b_month);
											}
										else{
												common::dropb_month('');
											}
										?>
										<!--  Năm sinh -->
										<?php
										if(isset($b_year))
											{
												common::dropb_year($b_year);
											}
										else{
												common::dropb_year('');
											}
										?>
								</td>
							</tr>
							<tr>
								<td><span>Giới tính</span></td>
							</tr>
							<tr>
								<td>
									<?php 
										if(isset($gender))
										{
											common::dropgender($gender);
										}
										else{
											common::dropgender('');
										}
								
									?>
									<!--<input class="sex" type="radio" name="gender" value="Male"/><span>Nam</span>
									<input class="sex" type="radio" name="gender" value="Female"/><span>Nữ</span>-->
								</td>
							</tr>
							<tr>
								<td><input class="submit" type="submit" name="dang_ky" value="Đăng ký"/></td>
							</tr>
							<tr>
								<td>
									<?php 
									if(isset($error_name)){
										echo ("$error_name<br>");
									}
									if(isset($error_email)){
										echo ("$error_email<br>");
									}
									if(isset($error_phone)){
										echo ("$error_phone<br>");
									}
									if(isset($msg))
									{ 
										echo $msg;
									}
									if(isset($error_password)) echo $error_password;
									?>
								</td>
							</tr>
						</table>
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