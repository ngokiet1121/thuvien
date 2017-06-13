<?php 
require_once "../model/setting.php";
$cate_id	= $_REQUEST["id"];
$query		= "SELECT * FROM tbl_category WHERE id='$cate_id'";
$result		= mysql_query($query) or die ("Loi sua the loai: ".mysql_error());
$row		= mysql_fetch_array($result);
$name		= $row["name"];
$description= $row["description"];
if(isset($_POST ["addnew"]))
{
	$name			= $_POST["name"];
	$description 	= $_POST["description"];
	//KIEM TRA TINH HOP LE DU LIEU
		//Kiem tra ten
	if(!strlen($name)>0)
	{
		$name		= NULL;
		$err_name 	= "Please enter name of category";
	}
	elseif(! preg_match('/[a-zA-Z]/', $name))
	{
		$error_name	= 'Please enter only alphabet.';
	}
	if(!strlen($description)>0)
	{
		$description	= NULL;
		$err_desc		= "Please enter description";
	}
	if($name && $description)
	{
		$query	= "INSERT INTO tbl_category(name, description) VALUES('$name','$description')";
		$result	= mysql_query($query) or die ("Loi:".mysql_error());
		if($result)
		{
		$msg	= '<b>Thêm mới thành công</b>';
		}
	}
	else
	{
		//Kiem tra the loai da ton tai hay chua
		$query 	= "SELECT *FROM tbl_category";
		$result = mysql_query($query) or die ("Error ".mysql_error());
		$num 	= mysql_num_rows($result);
		
		if ($num == 0)
		{
			//Them moi the loai vao trong CSDL
			$query	=  "UPDATE tbl_category SET name='$name',description='$description' WHERE id='$category_id'";
			$result = mysql_query($query) or die ("Loi cap nhat:".mysql_error());
			if($result)
			{
				$msg = "<b>Tao category thanh cong</b>";
			}
		}
		else
		{
			$msg = "The loai da ton tai. Vui long nhap the loai khac!";
		}
	}
	//Ket noi csdl, them moi nguoi dung
	/*if($name && $description)
	{
		$query	= "SELECT *FROM tbl_category";
		$result	= mysql_query($query) or die ("Loi cap nhat the loai:".mysql_error());
		$num 	= mysql_num_rows($result);
		if($num >1 )
		{
		
		}
	}*/
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<link rel="stylesheet" type="text/css" href="../css/admin_style.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Chỉnh sửa thể loại</title>
</head>
<body>
<!-- PHAN DAU WEB -->
	<?php include_once "../admin-layout/header.php"?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left.php"?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>Update category</span>
			</div>
			<div class="content-admin-pblsh">
				<form action=<?php echo "admin-update-category.php?id=$cate_id"; ?> method="post">
				<table>
					<tr>
						<td>
							<span>Ten the loai<span>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" class="long-text" name="name" placeholder="Nhập tên the loai"/>
						</td>
					</tr>
					<tr>
						<td>
						<?php
						if(isset($err_name)) echo $err_name;
						?>
						</td>
					</tr>
					<tr>
						<td>
							<span>Thông tin</span>
						</td>
					</tr>
						<td>
							<textarea rows="5" cols="20" name="description" class="text-area"></textarea>
						</td>
					</tr>
					<tr>
						<td>
						<?phpif(isset($err_desc)) echo $err_desc;?>
						</td>
					</tr>
					<tr>
						<td>
						<input type="submit" class="submit_addnew" name="addnew" value="Chinh sua"/>
						</td>
					</tr>
					<tr>
						<td>
						<?php if(isset($msg)) echo $msg;?>
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