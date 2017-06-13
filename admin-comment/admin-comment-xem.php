<?php
require_once "../model/setting.php";
require_once "../model/Author.php";
require_once "../model/Book.php";
require_once "../model/User.php"
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Danh sách bình luận</title>
</head>
<body>
<!-- PHAN DAU WEB -->
<?php include_once "../admin-layout/header.php"?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>DANH SÁCH BÌNH LUẬN</span>
			</div>
			<div class="content-admin-pblsh">
				<?php 
					$query ="SELECT * FROM tbl_rate";
					$result =mysql_query($query) or die("Error:".mysql_error());
				echo('
				<table border="1">
					<tr>
						<td>ID</td>
						<td>Book</td>
						<td>User</td>
						<td>Rate</td>
						<td>Comment</td>
						<td>Time</td>
						<td>Action</td>
					</tr>
				');
				while ($row=mysql_fetch_array($result))
				{
					$get_book	= Book::getBookInfo($row["book_id"]);
					$book_title	= $get_book["title"];
					$get_user = User::getUserInfo($row["user_id"]);
					$user_fname= $get_user["f_name"];
					$user_lname= $get_user["l_name"];
					$user_name	= $user_fname.' '.$user_lname;
					echo('
						<tr>
							<td>'.$row['id'].'</td>
							<td>'.$book_title.'</td>
							<td>'.$user_name.'</td>
							<td>'.$row['rate'].'</td>
							<td>'.$row["comment"].'</td>
							<td>'.date("d/m/Y",$row["time"]).'</td>
							<td>
								<a href="admin-update-comment.php?id='.$row["id"].'">Update</a>
								<a href="admin-delete-comment.php?id='.$row["id"].'">Delete</a>
							</td>
						</tr>
					');
				}
				echo('</table>');
				?>
		</div>
</div>
<div>
<!-- PHAN CHAN WEB -->
	<?php include_once "../admin-layout/footer.php"?>
</div>
</body>
</html>