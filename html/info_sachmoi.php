<?php
	session_start();
	require_once "../model/setting.php";
	require_once "../model/Book.php";
	require_once "../model/User.php";
	require_once "../model/Author.php";
	$book_id	= $_REQUEST["id"];
	//$author_id	= $_REQUEST["id"];
	$user_id	= $_REQUEST["id"];
	if(isset($_SESSION["session_user_id"])){
	$user_id 	= $_SESSION["session_user_id"];
	$query		= "SELECT * FROM tbl_user WHERE id='$user_id'";
	$result		= mysql_query($query) or die ("Lay du lieu bi loi:".mysql_error());
	$row		= mysql_fetch_array($result);
	}
	if(isset($_POST["btn_comment"]))
	{
		$rate = $_POST["rate"];
		if(!(strlen($rate)>0)){
			$rate=false;
			$err_rate="PLease enter rate";
		}
		$comment = $_POST["comment"];
		if($user_id != ''){
			if($rate)
			{	
				$time = date("U");
				$query	= "INSERT INTO tbl_rate(book_id,user_id, rate,comment,time) VALUES('$book_id','$user_id','$rate','$comment','$time')";
				//echo $query;
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
	<title>Thu vien</title>
</head>
<body>
<div id="container">
	<!-- PHAN DAU WEB -->
		<?php 			
			include_once "header.php";
		?>
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
				<div class="prd-desc">
					<ul class="tabs">
						<?php 
							Book::descBook($book_id);
							$get_author = Book::getBookInfo($book_id);
							Author::descAuthor($get_author["author_id"]);
						?>
					</ul>
				</div>
				<div class="cmts_area">
					<div class="title-news">BÌNH LUẬN</div>
					<form action="<?php echo $_SERVER["PHP_SELF"]."?id=".$book_id;?>" method="post">
						<table>
						<tr>
							<?php User::displayUsercomment($user_id);?>
						</tr>
						<tr>
						<td><span>Đánh giá:</span></td>
						<td>
						<div class="rate_content">
							<?php Book::printRate();?>
						</div></td>
						</tr>
						<tr>
							<td><span>Bình luận:</span></td>
							<td><textarea name="comment" cols="15" rows="5" class="cmt_content" placeholder="Nhập bình luận của bạn"></textarea></td>
						</tr>
						<tr>
						<td colspan="2"><input name="btn_comment" type="submit" class="btn_comment" value="Bình luận"/></td>						
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
							$nocom = strlen($row["comment"]);
							if($nocom != ''){
							echo '
								<table>
								<tr>
								<td><div class="user_name">'.$user_f_name.' '.$user_l_name.'   '.$row["comment"].'</div></td>
								</tr>						
								<tr><td>'.date("H:i:s, d/m/Y", $row["time"]).'</td></tr>
								</table>
								';
							}							
						}
					
					?>			
			</div>
		</div>
		<!-- PHAN BEN PHAI WEB -->
		<?php include_once "right.php";?>
		</div>
	<!-- PHAN CHAN WEB -->
	<?php include_once "footer.php";?>
</div>
</body>
</html>