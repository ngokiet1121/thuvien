<?php
require_once "../model/setting.php";
if(isset($_POST["btn_submit"])){
	$type		=$_POST["type"];
	$content	=$_POST["content"];
	$content	= mysql_real_escape_string(trim($content));
	if($type	&&	$content){
		$query	="INSERT INTO tbl_news(type,content)
				VALUES('$type','$content')";
		$result=mysql_query($query) or die ("Loi...!".mysql_error());
		if($result){
			$msg	="Thanh Cong";
		}
		else{
			$msg="Khong Thanh Cong";
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
	<script src="ckeditor.js"></script>
	<title>Thư mục giới thiệu</title>
</head>
<body>
<!-- PHAN DAU WEB -->
<?php include_once "../admin/header.php";?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left_news.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>THƯ MỤC GIỚI THIỆU</span>
			</div>
			<div class="content-admin-pblsh">
			<form action="addnew_infor.php" method="post">
				<table>
					<tr>
						<td><span>Loai:</span></td>
					</tr>
					<tr>
						<td>
						<select class="gender" name="type">
							<option value="">--Chọn loại--</option>
							<option value="gioithieu">Giới thiệu</option>
							<option value="lienhe">Liên hệ</option>
						</select>
						</td>
					</tr>
					<tr><td><span>Nội dung:</span></td></tr>
					<tr>
						<td>
							<textarea name="content" id="editor1" rows="10" cols="500">
								This is my textarea to be replaced with CKEditor.
							</textarea>
							<script>
								// Replace the <textarea id="editor1"> with a CKEditor
								// instance, using default configuration.
								CKEDITOR.replace( 'editor1' );
							</script>
						</td>
					</tr>
					<tr>
						<td><input class="submit" type="submit" name="btn_submit" value="Đăng bài"/></td>
					</tr>
					<tr>
						<td>
							<?php
								if(isset($msg))
								echo $msg;
							?>
						</td>
					</tr>
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