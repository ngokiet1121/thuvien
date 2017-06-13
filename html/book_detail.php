<?php
	session_start();
	require_once "../model/setting.php";
	require_once "../model/Book.php";
	require_once "../model/Category.php";
	require_once "../model/Author.php";
	require_once "../model/User.php";
	$book_id 	= $_REQUEST["id"];
	$user_id 	= $_SESSION["session_user_id"];
	$query		= "SELECT * FROM tbl_user WHERE id='$user_id'";
	$result		= mysql_query($query) or die ("Lay du lieu bi loi:".mysql_error());
	$row		= mysql_fetch_array($result);
	if(isset($_POST["btn_comment"]))
	{
		$rate = $_POST["rate"];
		if(strlen($rate)==0){
			$rate=false;
			$err_rate='<div class="msg">PLease enter rate</div>';
		}
		$comment = $_POST["comment"];
		if($user_id != ''){
			if($rate && $comment)
			{	
				$time = date("U");
				$query	= "INSERT INTO tbl_rate(book_id,user_id, rate, comment,time) VALUES('$book_id','$user_id','$rate','$comment','$time')";
				$result = mysql_query($query) or die("Error InsertComment: ".mysql_error());
			}
		}
		else
			header("location:dangnhap.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="demo-library"/>
	<meta name="keywords" content="library,online,books,collections..." />
	<meta name="author" content="programmer..." />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Tư duy nhanh và chậm</title>
</head>
<body>
<div id="container">
	<!-- PHAN DAU WEB -->
		<?php include_once "header.php";?>
	<!--PHAN THAN WEB -->
	<div id="content">
		<!-- PHAN BEN TRAI WEB-->
		<?php include_once "left.php";?>
		<!-- PHAN CHINH GIUA WEB -->
		<!-- PHAN CHINH GIUA WEB -->
		<div class="center">
			<!-- PHAN NOI DUNG CHINH -->
			<?php 
				$get_cate = Category::getCateByBookID($book_id);
				$cate_name= $get_cate["name"];
			?>
			<div class="title-news"><?php echo strtoupper($cate_name);?></div>
			<?php 
				Book::displayBookDetail($book_id);
			?>
			<div class="cmts">
					<span>BINH LUAN</span>
				<form action="<?php echo $_SERVER["PHP_SELF"]."?id=".$book_id;?>" method="post">
				<table>
					<tr>
						<td>Danh gia: </td>
						<td>
							<?php Book::printRate();?>
						</td>
					</tr>
					<tr>
						<td>Binh luan: </td>
						<td>
							<textarea cols="30" rows="5" name="comment"></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="btn_comment" value="Comment"/>
						</td>
					</tr>
				</table>
				</form>
			</div>
			<?php 
				$query = "SELECT * FROM tbl_rate WHERE book_id='$book_id' GROUP BY id DESC";
				$result= mysql_query($query) or die("Error DisplayComment: ".mysql_error());
				while($row=mysql_fetch_array($result))
				{
					$get_user = User::getUserInfo($user_id);
					$user_f_name= $get_user["f_name"];
					$user_l_name= $get_user["l_name"];
					echo '<tr><td>'.$user_f_name.' '.$user_l_name.'</td><td>'.$row["comment"].'</td></tr>
						<tr><td>'.date("H:i:s, d/m/Y", $row["time"]).'</td></tr>';
				}
			?>			
		</div>
		<!-- PHAN BEN PHAI WEB -->
		<?php include_once "right.php";?>
	<!-- PHAN CHAN WEB -->
	<?php include_once "footer.php";?>
</div>
</body>
</html>