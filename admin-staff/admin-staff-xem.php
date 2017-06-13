<?php
require_once "../model/setting.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Xem staff</title>
</head>
<body>
<!-- PHAN DAU WEB -->
<?php include_once "../admin/header.php";?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left_staff.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>DANH SÁCH STAFF</span>
			</div>
			<div class="content-admin-pblsh">
				<?php 
				$query = "SELECT * FROM tbl_user WHERE type='staff'";
				$result = mysql_query($query) or die("Error select:".mysql_error());
				echo('
				<table border="1">
					<tr>
						<td>ID</td>
						<td>First name</td>
						<td>Last name</td>
						<td>Email</td>
						<td>Phone</td>
						<td>Gender</td>
						<td>Birthday</td>
						<td>Action</td>
					</tr>
				');
				while ($row=mysql_fetch_array($result))
				{
					echo('
						<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['f_name'].'</td>
							<td>'.$row['l_name'].'</td>
							<td>'.$row['email'].'</td>
							<td>'.$row['phone'].'</td>
							<td>'.$row['gender'].'</td>
							<td>'.$row['b_day'].'/'.$row['b_month'].'/'.$row['b_year'].'</td>
							<td>
								<a href="admin-update-staff.php?id='.$row["id"].'">Update</a>
								<a href="admin-delete-staff.php?id='.$row["id"].'">Delete</a>
							</td>
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