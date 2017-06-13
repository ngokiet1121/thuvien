 
<?php 
require_once "../model/common.php";
require_once "../model/setting.php";
$user_id	= $_REQUEST["id"];
$query		= "SELECT * FROM tbl_user WHERE id='$user_id'";
$result		= mysql_query($query) or die ("Loi lay du lieu: ".mysql_error());
$row		= mysql_fetch_array($result);
$f_name		= $row["f_name"];
$l_name		= $row["l_name"];
$email		= $row["email"];
$b_day		= $row["b_day"];
$b_month	= $row["b_month"];
$b_year		= $row["b_year"];
$address	= $row["address"];
$phone 		= $row ["phone"];
$status 	= $row["status"];
if (isset($_POST ["dang_ky"])){
	$l_name			= $_POST["l_name"];
	$f_name			= $_POST["f_name"];
	$email			= $_POST["email"];
	//$password		= $_POST ["password"];
	$b_day			= $_POST ["b_day"];
	$b_month		= $_POST ["b_month"];
	$b_year			= $_POST ["b_year"];
	$gender			= $_POST ["gender"];	
	$address		= $_POST ["address"];
	$phone 			= $_POST ["phone"];
	$photo			= "pending";
	$status 		= $_POST ["status"];
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
	$error_phone = '<b><span style="color:#FF4747">Please enter phone number.</span></b>';
	}
		//Kiem tra email
	if (strlen($email)==0) 
	{
	$email = NULL;
	$error_email = '<b><span style="color:#FF4747">Please enter email.</span></b>';
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
	$email = NULL;
	$error_email = '<b><span style="color:#FF4747">Please enter valid email.</span></b>';
	}
		//Kiem tra mat khau
	if (strlen($password)== 0)
	{
		$error_password = "Please enter password";
	}
	//Ket noi CSDL, thuc hien them moi nguoi dung
	if($email)
	{
		//if($email == $new_email){
		//Them moi nguoi dung
		$time	=  date('U');
		$query	= "UPDATE tbl_user SET f_name='$f_name', l_name='$l_name', email='$email', b_day='$b_day', b_month='$b_month', 
		b_year='$b_year', gender='$gender', address='$address', phone='$phone', status='$status' WHERE id='$user_id'";
		echo $query;
		$result	= mysql_query($query) or die ("Cap nhat bi loi".mysql_error());
		if($result)
			{
				$msg	= "Cap nhat thanh cong";
			}
		//}
	}
	
	else
	{
		//Kiem tra email da ton tai hay chua
		$query 	= "SELECT *FROM tbl_user WHERE email ='$email'";
		$result = mysql_query($query) or die ("Them moi nguoi dung bi loi ".mysql_error);
		$num 	= mysql_num_rows($result);
		
		if ($num == 0)
		{
			//Them moi nguoi dung vao trong CSDL
			$type	= "user";
			$query	=  "UPDATE tbl_user SET f_name='$f_name', l_name='$l_name',email='$email',b_day='$b_day',b_month='$b_month',
			b_year='$b_year',gender='$gender',address='$address',phone='$phone',status='$status' WHERE id='$user_id'";
			$result = mysql_query($query) or die ("Loi cap nhat:".mysql_error());
			if($result)
			{
				$msg = "<b>Dang ki tai khoan thanh cong</b>";
			}
		}
		else
		{
			$msg = "Email da ton tai. Vui long nhap email khac!";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Thêm mới user</title>
</head>
<body>
<!-- PHAN DAU WEB -->
<?php include_once "../admin/header.php";?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left_user.php" ?>
		<div class="right_ad">
			<div class="header-menu-right">
				<span>Update user</span>
			</div>
			<div class="content-menu-right">
			<form action="<?php echo "admin-update-user.php?id=$user_id"; ?>" method="post">
				<table>
					<tr>
						<td><input class="name" type="text" name="l_name" placeholder="Họ" value="<?php  echo $l_name; ?>"/>
						<input class="name" type="text" name="f_name" placeholder="Tên" value="<?php  echo $f_name; ?>"/></td>
					</tr>
					<tr>

						<td><input class="long" type="text" name="address" placeholder="Địa chỉ" value="<?php echo $address; ?>"/></td>
					</tr>
					<tr>

						<td><input class="long" type="text" name="phone" placeholder="Số Điện Thoại" value="<?php  echo $phone; ?>"/></td>
					</tr>
					<tr>
						<td><input class="long" type="text" name="email" placeholder="Email" value="<?php echo $email; ?>"/></td>
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
						<td><span>Trang thai<span></td>
					</tr>
					<tr>
						<td>
							  
							<?php
								common::dropUserStatus($status);
							?>
						</td>
					</tr>
					<tr>
						<td><input class="submit" type="submit" name="dang_ky" value="Đăng ký"/></td>
					</tr>
					<tr>
						<td>
							<?php 
							if(isset($error_name)) echo ("$error_name<br>");
							if(isset($error_email)) echo ("$error_email<br>");
							if(isset($error_phone)) echo ("$error_phone<br>");
							if(isset($msg)) echo $msg;
							if(isset($error_password)) echo $error_password;
							if(isset($err_gender)) echo $err_gender;
							?>
						</td>
					</tr>
				</table>
			</form>
			</div>
		</div>
</div>
<!-- PHAN CHAN WEB -->
	<?php include_once "../admin-layout/footer.php"?>
</div>
</body>
</html>