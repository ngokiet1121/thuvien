<?php
require_once "setting.php";
class User{
	static function getUserInfo($user_id){
		//$user_id	= $_REQUEST["id"];
		$query 	= "SELECT * FROM tbl_user WHERE id='$user_id'";
		$result = mysql_query($query) or die("Error getUserInfo:".mysql_error());
		$row 	= mysql_fetch_array($result);
		return $row;
	}
	static function numUser(){
		$query 	= "SELECT * FROM tbl_user WHERE type='user'";
		$result = mysql_query($query) or die("Error getUserInfo:".mysql_error());
		$num = mysql_num_rows($result);
		echo $num;
	}
	static function numStaff(){
		$query 	= "SELECT * FROM tbl_user WHERE type='staff'";
		$result = mysql_query($query) or die("Error getUserInfo:".mysql_error());
		$num = mysql_num_rows($result);
		echo $num;
	}
	static function displayUserDetail($user_id){
		$query = "SELECT * FROM tbl_user WHERE id='$user_id'";
		$result = mysql_query($query) or die("Error displayUserDetail: ".mysql_error());
		while($row= mysql_fetch_array($result)){
			echo '
				<div class="tbl_detail_user">
						<table>
							<tr>
								<td><span>Ten hien thi:</span></td>
								<td>'.$row["f_name"].' '.$row["l_name"].'</td>
							</tr>
							<tr>
								<td><span>Dia chi:</span></td>
								<td>'.$row["address"].'</td>
							</tr>
							<tr>
								<td><span>So dien thoai:</span></td>
								<td>'.$row["phone"].'</td>
							</tr>
							<tr>
								<td><span>Email:</span></td>
								<td>'.$row["email"].'</td>
							</tr>
							<tr>
								<td><span>Ngay sinh:</span></td>
								<td>'.$row["b_day"].'/'.$row["b_month"].'/'.$row["b_year"].'</td>
							</tr>
							<tr>
								<td><span>Gioi tinh:</span></td>
								<td>'.$row["gender"].'</td>
							</tr>
							<tr>
								<td><span>Ngay dang ki:</span></td>
								<td>'.date("d/m/Y",$row["register_day"]).'</td>
							</tr>
							<tr>
								<td colspan="2" class="edit_profile"><a href="../User/update_user.php?id='.$row["id"].'">Chinh sua thong tin</a></td>
							</tr>
						</table>
					</div>
			';
		}
	}
	static function displayPhotoUser($user_id){
		$query 	= "SELECT * FROM tbl_user WHERE id='$user_id'"; 
		$result = mysql_query($query) or die("Error getUserInfo:".mysql_error());
		while($row 	= mysql_fetch_array($result)){
			echo '<img class="user_avatar" src="'.$row["photo"].'" alt=""/>';
		}
	}
	static function displayUsercomment($user_id){
		$query 	= "SELECT * FROM tbl_user WHERE id='$user_id'";
		$result = mysql_query($query) or die("Error getUserInfo:".mysql_error());
		while($row 	= mysql_fetch_array($result)){
			echo '
				<td><div class="user_img"><img src="'.$row["photo"].'" alt=""/></div></td>
				<td><div class="user_name">'.$row["f_name"].' '.$row["l_name"].'</div></td>
				';
		}
	}
}
?>