<?php
require_once "../model/setting.php";
require_once "../model/collection.php";
//require_once "../model/Image.php";
$book_id	= $_REQUEST["id"];
$query		= "SELECT * FROM tbl_book WHERE id='$book_id'";
$result		= mysql_query($query) or die ("Loi lay du lieu: ".mysql_error());
$row		= mysql_fetch_array($result);
$title 				= $row["title"];
$author 			= $row["author_id"];
$translator 		= $row["translator_id"];
$publisher 			= $row["publisher_id"];
$description 		= $row["description"];
$category 			= $row["category_id"];
$language 			= $row["language"];
$status 			= $row["status"];
$pages				= $row["pages"];
$size				= $row["size"];
$quantity			= $row["quantity"];
$available_book		= $row["available_book"];
$pub_day	 		= $row["pub_day"];
$pub_month   		= $row["pub_month"];
$pub_year			= $row["pub_year"];
if(isset($_POST["submit"])){
$title 				= $_POST["title"];
$author 			= $_POST["author"];
$translator 		= $_POST["translator"];
$publisher 			= $_POST["publisher"];
$description 		= $_POST["description"];
$category 			= $_POST["category"];
$language 			= $_POST["language"];
$status 			= $_POST["status"];
$pages				= $_POST["pages"];
$size				= $_POST["size"];
$quantity			= $_POST["quantity"];
$available_book		= $_POST["available_book"];
$pub_day	 		= $_POST["pub_day"];
$pub_month   		= $_POST["pub_month"];
$pub_year			= $_POST["pub_year"];
if(!(strlen($title) >= 0)){
	$title 			= false;
}
if(!(strlen($pages) >= 0)){
	$pages 			= false;
}
if(!(strlen($size) >= 0)){
	$size 			= false;
}
if(!(strlen($quantity) >= 0)){
	$quanlity 			= false;
}
if(!(strlen($available_book) >= 0)){
	$available_book 	= false;
}
if($title && $author && $translator && $publisher && $category && $pages && $size && $quantity && $available_book){
	$query 			= "UPDATE tbl_book SET title='$title', author_id='$author', translator_id='$translator', publisher_id='$publisher',
						description='$description', category_id='$category',language='$language',status='$status' ,
						pages='$pages', size='$size', quantity='$quantity', available_book='$available_book',
						pub_day='$pub_day',pub_month='$pub_month',pub_year='$pub_year' WHERE id='$book_id'";					
	$result 		= mysql_query($query) or die("Error: ".mysql_error());
	if($result){
		$msg 		= 'Cap nhap Thanh cong';
		//header("location:admin-book-xem.php");
	}
}
else 
		$msg 		= '<span>Cap nhap that bai</span>';
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="LTV8.4" />
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
	<link rel="icon" type="text/ico" href="../anh/icon.ico"/>
	<title>Cập nhật sách</title>
</head>
<body>
<?php include_once "../admin/header.php";?>
<div id="content_ad">
		<!-- PHAN BEN TRAI WEB -->
		<?php include_once "../admin-layout/left_book.php" ?>
		<div class="right_ad">
			<div class="adnw-pblsh">
					<span>THÊM MỚI SÁCH</span>
			</div>
			<div class="content-admin-pblsh">
			<form action="<?php echo "admin-update-book.php?id=$book_id";?>" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>
							<span>Tên sách:</span>
						</td>
						<td colspan="2">
							<input type="text" name="title" class="name-sh-book" placeholder="Tên sách" 
							value="<?php echo $title;?>"/>
						</td>
						<td><span>Số trang:</span></td>
						<td><input type="text" placeholder="Nhập số trang" class="name-short" name="pages"
						value="<?php echo $pages;?>"/></td>
					</tr>
					<tr>
						<td>
							<span>Thể loại:</span>
						</td>
						<td colspan="2">
							<?php
								if(isset($category)) collection::dropBookcategory($category);
								else collection::dropBookcategory('');
							?>
						</td>
						<td><span>Kích thước:</span></td>
						<td><input type="text" placeholder="Nhập kích thước" class="name-short" name="size"
						value="<?php echo $size;?>"/></td>
					</tr>
					<tr>
						<td>
							<span>Tác giả:</span>
						</td>
						<td colspan="2">
							<?php
								if(isset($author)) collection::dropBookauthor($author);
								else collection::dropBookauthor('');
							?>
							<?php
								if(isset($translator)) collection::dropBooktranslator($translator);
								else collection::dropBooktranslator('');
							?>
						</td>
						<td><span>NXB:</span></td>
						<td>
							<?php
								if(isset($pub_day)) collection::droppub_day($pub_day);
								else collection::droppub_day('');
								if(isset($pub_month)) collection::droppub_month($pub_month);
								else collection::droppub_month('');
								if(isset($pub_year)) collection::droppub_year($pub_year);
								else collection::droppub_year('');
							?>
						</td>
						
					</tr>
					<tr>
						<td>
							<span>Nhà xuất bản:</span>
						</td>
						<td colspan="2">
							<?php
								if(isset($publisher)) collection::dropBookpublisher($publisher);
								else collection::dropBookpublisher('');
							?>
						</td>
						<td><span>Số lượng:</span></td>
						<td><input type="text" placeholder="Số lượng sách" class="name-short" name="quantity"
							value="<?php echo $quantity; ?>"/></td>
					</tr>
					<tr>
						<td>
							<span>Tình trạng:</span>
						</td>
						<td colspan="2">
							<?php
								if(isset($status)) collection::dropBookstatus($status);
								else collection::dropBookstatus('');
							?>
						</td>
						<td><span>Hiện có:</span></td>
						<td><input type="text" placeholder="Số lượng hiện có" class="name-short" name="available_book"
						value="<?php echo $available_book;?>"/></td>
					</tr>
					<tr>
						<td>
							<span>Ngôn ngữ:</span>
						</td>
						<td colspan="2">
							<?php
								if(isset($language)) collection::dropBooklanguage($language);
								else collection::dropBooklanguage('');
							?>
						</td>
					<tr>
						<td>
							<span>Thông tin:</span>
						</td>
						<td colspan="4"><textarea name="description" rows="5" cols="20"  class="text-area-long" ><?php echo $description; ?></textarea></td>
				    </tr>
					<tr>
						<td colspan="5" >
							<input type="submit" name="submit" value="Thêm" class="addnew_btn"/>
						</td>
					</tr>
					<tr>
						<td colspan="5"><?php if(isset($msg)) echo $msg; ?></td>
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