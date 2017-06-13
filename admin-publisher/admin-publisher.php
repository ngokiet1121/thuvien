<?php
require_once "../model/setting.php";
if (isset($_POST ["addnew"])){
	$name				= $_POST["name"];
	$country			= $_POST["country"];
	$information		= $_POST["information"];
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
	if($name && $country && $information)
	{
		$query	=  "INSERT INTO tbl_publisher(name, country, information)
					VALUES('$name','$country','$information')";
		$result = mysql_query($query) or die ('Loi them moi NXB:'.mysql_error());
		if($result)
		{
			$msg = "<b>Thêm mới thành công</b>";
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
					<span>THÊM MỚI NHÀ XUẤT BẢN</span>
			</div>
			<div class="content-admin-pblsh">
				<form action="admin-publisher.php" method="post">
				<table>
					<tr>
						<td>
							<span>Nhà xuất bản</span>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" class="long-text" name="name" placeholder="Nhập tên NXB"/>
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
							<input type="text" class="long-text" name="country" placeholder="Nhập quốc gia"/>
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
							<textarea rows="5" cols="20" name="information" class="text-area">
								<?php if(isset($_POST["addnew"])) echo $information; ?>
							</textarea>
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
				<?php 
				if(isset($_POST["addnew"]))
				{
				$query	= "SELECT * FROM tbl_publisher";
				$result = mysql_query($query) or die ("Error: ".mysql_error());
				$num	= mysql_num_rows($result);
				echo('<h3>Number of publishers: '.$num.'</h3>');
				echo('
				<table border="1">
					<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Information</td>
						<td>Country</td>
						<td>Action</td>
					</tr>
				');
				while ($row=mysql_fetch_array($result))
				{
					echo('
						<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['name'].'</td>
							<td>'.$row['information'].'</td>
							<td>'.$row['country'].'</td>
							<td>
								<a href="admin-update-publisher.php?id='.$row["id"].'">Update</a>
								<a href="admin-delete-publisher.php?id='.$row["id"].'">Delete</a>
							</td>
						</tr>
					');
				}
				print('</table>');
				}
				?>
				</form>
			</div>
		</div>
</div>
<!-- PHAN CHAN WEB -->
	<?php include_once "../admin-layout/footer.php"?>
</div>
</body>
</html>