<?php
require_once"../model/setting.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Danh sách tác giả</title>
</head>
<body>
	<!-- PHAN DAU WEB -->
<?php include_once "../admin/header.php";?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
<?php include_once "../admin-layout/left_author.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>DANH SÁCH TÁC GIẢ</span>
			</div>
			<div class="content-admin-pblsh">
			<table border="1">
			<?php
			//dat ten bien(query)
				$query = "SELECT * FROM tbl_author";
				$result = mysql_query($query) or die("Error select:".mysql_error());
				echo('
					<table border="1">
						<tr>
						<td>ID</td>
						<td>Name</td>
						<td>Nationality</td>
						<td>Type</td>
						<td>Descrition</td>
						<td>Action</td>
						</tr>');
				while($row=mysql_fetch_array($result))
				{
				echo('
					<tr>
						<td>'.$row['id'].'</td>
						<td>'.$row['fullname'].'</td>
						<td>'.$row['nationality'].'</td>
						<td>'.$row['type'].'</td>
						<td>'.substr($row["description"],0,60).'...</td>
						<td><a href="admin-update-author.php?id='.$row["id"].'">Update</a>
						<a href ="admin-delete-author.php?id='.$row["id"].'">Delete</a></td>
					</tr>
				');
				}	
			?>
			</table>
		</div>
	</div>
</div>
<!-- PHAN CHAN WEB -->
	<?php include_once "../admin-layout/footer.php"?>
</div>
</body>
</html>