<?php
require_once"../model/setting.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<link rel="stylesheet" type="text/css" href="../css/admin_style.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Xem the loai</title>
</head>
<body>
	<!-- PHAN DAU WEB -->
	<?php include_once "../admin-layout/header.php"?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left.php"?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>DANH SÁCH THỂ LOẠI</span>
			</div>
			<div class="content-admin-pblsh">
			<table border="1">
			<?php
			//dat ten bien(query)
				$query ="SELECT * FROM tbl_category";
				$result =mysql_query($query) or die("Error:".mysql_error());
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