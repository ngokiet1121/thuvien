<?php
session_start();
require_once "../model/setting.php";
if (isset($_POST ["submit"]))
{
	$email		= $_POST["email"];
	$password	= $_POST["password"];
	$type		= 'admin';
	$type		= 'staff';
	if(!(strlen($email)>0)){
		$email 			= NULL;
		$error_email 	= '<b>Please enter your email</b>';
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email		= NULL;
		$error_email = '<b>Please enter valid email</b>';
	}
	if($email && $password)
	{
		//$msg 	= '<span style="color:red">Congratulation!</span>';
		//header("Location:../html/home.php");
		//exit();
		$query 	= "SELECT * FROM tbl_staff WHERE email='$email' AND password = '$password'";
		$result = mysql_query($query) or die ("Error:".mysql_error());
		$num 	= mysql_num_rows($result);
		if($num > 0){
			$row = mysql_fetch_array($result);
			//Chuyen vao trang nguoi dung
			$_SESSION["session_user_id"] 		= $row["id"];
			$_SESSION["session_user_email"]		= $email;
			$_SESSION["session_user_passwd"]	= $password;
			$_SESSION["session_user_type"]		= $row["type"];
			if($row["type"] == "staff"){
				header("location:admin_staff.php");
			}
			if($row["type"] == "admin"){
				header("location:view-link-home.php");
			}
		}
	}
	else{
		$msg	= "Dang nhap ko thanh cong<br>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {margin:0; padding:0}
#content {width:600px; height:500px; margin:0 auto}
#head {width:600px; height:199px; background-color:#cccccc; border-bottom:1px solid #ffffff}
#head span {font-weight:bold; font-size:70px; text-align:center; position:relative}
#body {width:400px; height:200px; top:10%; left:17%; position:relative}
th {text-align:center; color: blue}
</style>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<body>
<div id="content">
	<div id="head">
		<span>Welcome</span>
	</div>
	<div id="body">
		<form action="dangnhap_admin.php" method="post">
			<table border="1">
				<tr>
					<th>Email</th>
					<td><input class="name" type="text" name="email" placeholder="Nhap email"/></td>
				</tr>
				<tr>
					<th>Password</th>
					<td><input class="name" type="text" name="password" placeholder="Nhap password"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input class="submit" type="submit" name="submit" value="danh nhap" /></td>
				</tr>
				<tr colspan="2">	
					<td></td>
					<th>
					<?php 
						if(isset($msg)) echo $msg;
					?>
					</th>
				</tr>
			</table>
		</form>
	</div>
</div>
</body>
</html>