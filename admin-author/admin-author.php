<?php
require_once  "../model/setting.php";
require_once  "../model/common.php";
if(isset($_POST["btmore"])){
$fullname 			= $_POST["fullname"];
$nationality		= $_POST["nationality"];
$type				= $_POST["type"];
$description		= $_POST["description"];
	if(!(strlen($fullname)>0)){
		$error_name	=	'<b><span style="color: #4D4D4D">Please enter author name</span></b>';
	}
	elseif(! preg_match('/[a-zA-Z]/', $fullname)){
		$error_name	= '<b><span style="color: #4D4D4D">Please enter only alphabet.</span></b>';
	}
	if(!(strlen($description)>0)){
		$description 	= false;
		$error_description		= 'Chua co thong tin';
	}
	if($fullname)
	{
		//kiem tra fullname da ton tai hay chua
		$query 	= "SELECT * FROM tbl_author WHERE fullname = '$fullname'";
		$result = mysql_query($query) or die('Error :'.mysql_error()); 
		$num 	= mysql_num_rows($result);
		if($num == 0){
			$query	=  "INSERT INTO tbl_author(fullname,nationality,type,description)
						VALUES ('$fullname','$nationality','$type','$description')";
			$result =	mysql_query($query) or die('Loi them moi author :'.mysql_error());
			header("location:admin-author-xem.php");
			if($result)
			{
				$msg = 'them author thanh cong';
			}
		}
		else{
			$msg = 'author da ton tai. Vui long nhap author khac';
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
	<title>Thêm mới tác giả</title>
</head>
<body>
<!-- PHAN DAU WEB -->
<?php include_once "../admin/header.php";?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left_author.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>THÊM MỚI TÁC GIẢ</span>
			</div>
			<div class="content-admin-pblsh">
			<form action="admin-author.php" method="post">
				<table>
					<tr>
						<td>
							<span>Tên tác giả</span>
						</td>
					</tr>
					<tr>
						<td><input class="long-text" type="text" name="fullname" placeholder="Nhập tên tác giả/ dịch giả"/></td>
					</tr>
					<tr>
						<td>
							<span>Tên quốc gia</span>
						</td>
					</tr>
					<tr>
						<td><input class="long-text" type="text" name="nationality" placeholder="Nhập tên quốc gia"/></td>
					</tr>
					<tr>
						<td><span>Loại:</span></td>
					</tr>
					<tr>
						<td>
							<?php
								if(isset($type))
								{
									common::dropAuthortype($type);
								}
								else
								{
									common::dropAuthortype('');
								}
							?>
						</td>
					</tr>
					<tr>
						<td><span>Thông tin chi tiết</span></td>
					</tr>
					<tr>
						<td><textarea name="description" rows="5" cols="20" placeholder="Nhập thông tin" class="text-area"></textarea></td>
					</tr>
					<tr>
						<td><input type="submit" name="btmore" value="Thêm" class="submit_addnew"/></td>
					</tr>
					<tr>
					<?php
						if(isset($error_name)) echo $error_name;
						if(isset($error_description)) echo $error_description;
						if(isset($msg)) echo $msg;
					?>
					</tr>
				</table>
				<?php
				if(isset($_POST["btmore"]))
				{
					$query	="SELECT * FROM tbl_author";
					$result =mysql_query($query) or die ("ERROR:".mysql_error());
					$num	=mysql_num_rows($result);
					echo ('<h3>Number of authors: '.$num.'</h3>');
					echo('
						<table border="1">
					<tr>
						<td>id</td>
						<td>fullname</td>
						<td>nationality</td>
						<td>type</td>
						<td>description</td>
						<td>action</td>
					</tr>		
					');
					while($row=mysql_fetch_array($result))
					{
						echo('
							<tr>
								<td>'.$row['id'].'</td>
								<td>'.$row['fullname'].'</td>
								<td>'.$row['nationality'].'</td>
								<td>'.$row['type'].'</td>
								<td>'.$row['description'].'</td>
								<td><a href="admin-update-author.php?id='.$row["id"].'">update</a>
									<a href ="admin-delete-author.php?id='.$row["id"].'">delete</a></td>
						</tr>
						');
					}
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