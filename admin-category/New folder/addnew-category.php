<?php 
require_once "../model/setting.php";
if(isset($_POST["addnew"]))
{
	$name		= $_POST["name"];
	$description= $_POST["description"];
	//Kiem tra ten
	if(!(strlen($name)>0))
	{
		$name		= NULL;
		$err_name	= "<b>Please enter name of category</b>";
	}
	elseif(! preg_match('/[a-zA-Z]/',$name))
	{
		$err_name	= "<b>Please enter only alphabet</b>";
	}
	//Kiem tra description
	if(!(strlen($description)>0))
	{
		$description	= NULL;
		$err_desc		= "Please enter description";
	}
	//Ket noi csdl
	if($name && $description)
	{
		$query		= "INSERT INTO tbl_category(name, description) VALUES ('$name','$description')";
		$result		= mysql_query($query) or die("Them moi the loai bi loi:".mysql_error());
		if($result)
		{
			$msg	= "<b>Thêm mới thể lọai thành công!</b>";
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
	<link rel="stylesheet" type="text/css" href="../css/admin_style.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Thêm mới thể loại</title>
</head>
<body>
<!-- PHAN DAU WEB -->
<?php include_once "../admin-layout/header.php"?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>THÊM MỚI THỂ LOẠI</span>
			</div>
			<div class="content-admin-pblsh">
				<form action="addnew-category.php" method="post">
				<table>
					<tr>
						<td>
							<span>Tên thể loại</span>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" class="long-text" name="name" placeholder="Nhập thể loại"/>
						</td>
					</tr>
					<tr>	
						<td>
							<?php if(isset($err_name)) echo $err_name; ?>
						</td>
					</tr>
					<tr>
						<td>
							<span>Thông tin</span>
						</td>
					</tr>
						<td>
							<textarea rows="5" cols="20" name="description" class="text-area">
								<?php if(isset($_POST["addnew"])) echo $description; ?>
							</textarea>
						</td>
					</tr>
					<tr>
						<td>
							<?php if(isset($err_desc)) echo $err_desc;?>
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
				<table border="1">
					<?php
					//dat ten bien(query)
					if(isset($_POST["addnew"])) 
					{
						$query ="SELECT	* FROM tbl_category";
						//cho ket qua result
						$result =mysql_query($query) or die("Error:".mysql_error());
						//so luong the loai
						$num =mysql_num_rows($result);
						echo ('<h3>Number of category:'.$num.'</h3>');
						echo('
							<table border="1">
								<tr>
								<td>ID</td>
								<td>Name</td>
								<td>Description </td>
								<td>Action</td>
								</tr>');
						while($row=mysql_fetch_array($result))
						{
						echo('
							<tr>
								<td>'.$row['id'].'</td>
								<td>'.$row['name'].'</td>
								<td>'.$row['description'].'</td>
								<td><a href="admin-update-category.php?id='.$row["id"].'">Update</a>
								<a href ="admin-delete-category.php?id='.$row["id"].'">Delete</a></td>
							</tr>
						');
						}	
					}
					?>
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