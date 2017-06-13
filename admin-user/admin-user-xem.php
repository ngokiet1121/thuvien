<?php
require_once "../model/setting.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Admin user</title>
</head>
<body>
<!-- PHAN DAU WEB -->
<?php include_once "../admin/header.php";?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left_user.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>DANH SÁCH NGƯỜI DÙNG</span>
			</div>
			<div class="content-admin-pblsh">
				<?php 
				$query = "SELECT * FROM tbl_user";
				$result = mysql_query($query) or die("Error select".mysql_error());
				echo('
				<table border="1">
					<tr>
						<td>ID</td>
						<td>Full name</td>
						<td>Email</td>
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
							<td>'.$row['l_name'].' '.$row['f_name'].'</td>
							<td>'.$row['email'].'</td>
							<td>'.$row['gender'].'</td>
							<td>'.$row['b_day'].'/'.$row['b_month'].'/'.$row['b_year'].'</td>
							<td>
								<a href="admin-update-user.php?id='.$row["id"].'">Update</a>
								<a href="admin-delete-user.php?id='.$row["id"].'">Delete</a>
							</td>
						</tr>
					');
				}
				echo('</table>');
				?>
		</div>
</div>
<div>
			<h2>TÌM KIẾM THEO TÊN THÀNH VIÊN</h2>
			<form action="admin-user-xem.php" method="post">
			<input type="text" name="search" value="" size="25px" />
			<input type="submit" name="btn_search" value="Tìm Kiếm" />
				<table border="1">
					<tr>
						<td>Stt</td>
						<td>User</td>
						<td>Email</td>
						<td>Address</td>
					</tr>
				<?php
					if(isset($_POST['btn_search'])){
						if($_POST['search']==""){
							echo "Vui lòng nhập từ khóa tìm kiếm!";    
						}else{
							$search 	= $_POST['search'];
						}    
					if($search){
						$query="SELECT * FROM tbl_user WHERE f_name LIKE '%$search%'";
						$result=mysql_query($query) or die("Error: ".mysql_error());
							if(mysql_num_rows($result)!=""){
							$stt=1;
							while($row=mysql_fetch_array($result)){
								$stt++;
								echo "<tr>";
								echo "<td>".$stt."</td>";
								echo "<td>".$row['f_name']." ".$row['l_name']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['address']."</td>";
								echo "</tr>";
								}
							}
							else{
							echo "<tr><td>Chưa có thành viên nào</td></tr>";
						}
					}
					}
					?>
				</table>
			</div>
</div>
<div>
<!-- PHAN CHAN WEB -->
	<?php include_once "../admin-layout/footer.php"?>
</div>
</body>
</html>