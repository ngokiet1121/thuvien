<?php
require_once  "../model/setting.php";
require_once  "../model/common.php";
$author_id 			= $_REQUEST["id"];
$query 				= "SELECT * FROM tbl_author WHERE id='$author_id'";
$result   			= mysql_query($query) or die ("Error: ".mysql_error());
echo $result;
$row 				= mysql_fetch_array($result);
$fullname 			= $row["fullname"];
$nationality 		= $row["nationality"];
$type	 			= $row["type"];
$description 		= $row["description"];
if(isset($_POST["btmore"])){
$fullname 			= $_POST["fullname"];
$nationality		= $_POST["nationality"];
$type				= $_POST["type"];
$description		= $_POST["description"];
	if(!(strlen($fullname)>0)){
		$error_name	=	'<b><span style="color: #4D4D4D">Please enter author name</span></b>';
	}
	if(! preg_match('/[a-zA-Z]/', $fullname)){
		$error_name	= '<b><span style="color: #4D4D4D">Please enter only alphabet.</span></b>';
	}
	if($fullname)
	{
		//Them moi nguoi dung
		$query	= "UPDATE tbl_author SET fullname='$fullname',nationality='$nationality',type='$type',description='$description' WHERE id='$author_id'";
		echo $query;
		$result	=mysql_query($query) or die ("Cap nhat bi loi".mysql_error());
		if($result)
			{
				$msg	= "Cap nhat thanh cong";
				header("Location:admin-author-xem.php");
			}
		//}
	}	
	else
	{
		//Kiem tra fullname da ton tai hay chua
		$query 	= "SELECT *FROM tbl_auhtor WHERE fullname ='$fullname'";
		$result = mysql_query($query) or die ("Them moi nguoi dung bi loi ".mysql_error);
		$num 	= mysql_num_rows($result);
		
		if ($num == 0)
		{
			//Them moi tac gia vao trong CSDL
			$query	=  "UPDATE tbl_author SET fullname='$fullname',nationality='$nationality',type='$type',description='$description' WHERE id='$author_id'";
			$result = mysql_query($query) or die ("Loi cap nhat:".mysql_error());
			if($result)
			{
				$msg = "<b>Tao author thanh cong</b>";
			}
		}
		else
		{
			$msg = "fullname da ton tai. Vui long nhap fullname khac!";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Chỉnh sửa tác giả</title>
</head>
<body>
<?php include_once "../admin/header.php";?>
<div id="content_ad">
<?php include_once "../admin-layout/left_author.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>CHỈNH SỬA TÁC GIẢ</span>
			</div>
			<div class="content-admin-pblsh">
				<form action="<?php echo "admin-update-author.php?id=$author_id";?>" method="post">
					<table>
						<tr>
							<td><span>Tác giả / Dịch giả:</span></td>
						</tr>
						<tr>
							<td><input class="long-text" type="text" name="fullname" placeholder="Nhập tên tác giả/ dịch giả" value="<?php echo $fullname; ?>"/></td>
						</tr>
						<tr>
							<td><span>Quốc gia:</span></td>
						</tr>
						<tr>
							<td><input class="long-text" type="text" name="nationality" placeholder="Nhập tên quốc gia" value="<?php echo $nationality; ?>"/></td>
						</tr>
						<tr>
							<td><span>Loại:</span></td>
						</tr>
						<tr>
							<td>
								<?php
									common::dropAuthortype($type);
								?>
							</td>
						</tr>
						<tr>
							<td><span>Thông tin chi tiết</span></td>
						</tr>
						<tr colspan="2">
							<td><textarea name="description" rows="5" cols="20" placeholder="Nhập thông tin" class="text-area"></textarea></td>
						</tr>
						<tr>
							<td><input type="submit" name="btmore" value="Thêm" class="submit_addnew"/></td>
						</tr>
						<tr>
						<?php
							if(isset($error_name)) echo $error_name;
							if(isset($msg)) echo $msg;
						?>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<!-- PHAN CHAN WEB -->
	<?php include_once "../admin-layout/footer.php"?>
</div>
</body>
</html>