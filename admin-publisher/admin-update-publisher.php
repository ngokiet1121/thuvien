<?php 
require_once "../model/setting.php";
$pub_id			= $_REQUEST["id"];
$query			= "SELECT * FROM tbl_publisher WHERE id='$pub_id'";
$result			= mysql_query($query) or die ("Loi lay du lieu: ".mysql_error());
$row			= mysql_fetch_array($result);
$name			= $row["name"];
$information	= $row["information"];
$country		= $row["country"];
if (isset($_POST ["addnew"])){
	$name			= $_POST["name"];
	$country		= $_POST["country"];
	$information	= $_POST["information"];
	//KIEM TRA TINH HOP LE
		//Kiem tra ten
	if(!(strlen($name)>0)){
		
		$err_name	=	'<b>Please enter publisher name</b>';
	}
	elseif(! preg_match('/[a-zA-Z]/', $name)){
		$err_name	= '<b>Please enter only alphabet.</b>';
	}
	//Kiem tra quoc gia 
	if(!(strlen($country)>0))
	{
		$err_country	= "<b>Please enter name of country</b>";
	}
	//Kiem tra thong tin 
	if(!(strlen($information)>0))
	{
		$err_inform		= "<b>Please enter information</b>";
	}
	//Ket noi CSDL, thuc hien them moi nguoi dung
	if($name && $country && $information)
	{
		//Them moi nguoi dung
		$query	= "UPDATE tbl_publisher SET name='$name', country='$country', information='$information' WHERE id='$pub_id'";
		echo $query;
		$result	= mysql_query($query) or die ("Cap nhat bi loi".mysql_error());
		if($result)
		{
			$msg	= "Cap nhat thanh cong";
		}
	}
	
	else
	{
		//Kiem tra ten NXB da ton tai hay chua
		$query 	= "SELECT *FROM tbl_publisher WHERE name ='$name'";
		$result = mysql_query($query) or die ("Them moi NXB bi loi ".mysql_error);
		$num 	= mysql_num_rows($result);
		
		if ($num == 0)
		{
			//Them moi NXB vao trong CSDL
			$query	=  "UPDATE tbl_publisher SET name='$name', country='$country',information='$information' WHERE id='$pub_id'";
			$result = mysql_query($query) or die ("Loi cap nhat:".mysql_error());
			if($result)
			{
				$msg = "<b>Them moi NXB thanh cong</b>";
			}
		}
		else
		{
			$msg = "NXB da ton tai. Vui long nhap ten NXB khac!";
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
	<title>Thêm mới NXB</title>
</head>
<body>
<!-- PHAN DAU WEB -->
<?php include_once "../admin/header.php";?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left_publisher.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>CHỈNH SỬA NHÀ XUẤT BẢN</span>
			</div>
			<div class="content-admin-pblsh">
				<form action="<?php echo "admin-update-publisher.php?id=$pub_id"; ?>" method="post">
				<table>
					<tr>
						<td>
							<span>Nhà xuất bản</span>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" class="long-text" name="name" placeholder="Nhập tên NXB" value="<?php echo $name; ?>"/>
						</td>
					</tr>
					<tr>	
						<td>
							<?php if(isset($err_name)) echo $err_name; ?>
						</td>
					</tr>
					<tr>
						<td>
							<span>Quốc Gia</span>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" class="long-text" name="country" placeholder="Nhập quốc gia" value="<?php echo $country; ?>"/>
						</td>
					</tr>
					<tr>
						<td>
							<?php if(isset($err_country)) echo $err_country; ?>
						</td>
					</tr>
					<tr>
						<td>
							<span>Thông tin</span>
						</td>
					</tr>
						<td>
							<textarea rows="5" cols="20" name="information" class="text-area" ><?php echo $information ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<?php if(isset($err_inform)) echo $err_inform;?>
						</td>
					</tr>
					<tr>
						<td>
						<input type="submit" class="submit_addnew" name="addnew" value="Thêm"/>
						</td>
					</tr>
					<tr>
						<td>
						<?php 
						if(isset($msg)) echo $msg;
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