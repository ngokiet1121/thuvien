<?php
require_once "../model/setting.php";
require_once "../model/Publisher.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Danh sách nhà xuất bản</title>
</head>
<body>
<!-- PHAN DAU WEB -->
<?php include_once "../admin/header.php";?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left_publisher.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>DANH SÁCH NHÀ XUẤT BẢN</span>
			</div>
			<div class="content-admin-pblsh">
				<?php 
				$query ="SELECT * FROM tbl_publisher";
				$result =mysql_query($query) or die("Error:".mysql_error());
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
				$get_publisher = Publisher::getPublisherInfo($row["id"]);
				$publisher_name= $get_publisher["name"];
					echo('
						<tr>
							<td>'.$row['id'].'</td>
							<td>'.$publisher_name.'</td>
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
				?>
			</div>
		</div>
</div>
<!-- PHAN CHAN WEB -->
	<?php include_once "../admin-layout/footer.php"?>
</div>
</body>
</html>