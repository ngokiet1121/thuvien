<?php
class collection{
//thiet lap status book
	static function dropBookstatus($status){
		echo '<select name="status" class="select-general">
			  <option  value="">--Tinh trang--</option>';
		$status_arr = array('Còn' => 'Còn', 'Đã cho mượn' => 'Đã cho mượn', 'Đang về' => 'Đang về');
		foreach($status_arr as $key => $value){
			if($status == $key)
				echo '<option value="'.$key.'"selected>'.$value.'</option>';
			else
				echo '<option value="'.$key.'">'.$value.'</option>';
		}
		echo '</select>';
	}
//thiet lap tac gia
	static function dropBookauthor($author){
		$query	= "SELECT * FROM tbl_author WHERE type='author'";
		$result	= mysql_query($query);
		echo'
				<select name="author" class="select-short">
					<option value="">--Tac gia--</option>
		';
		while($row=mysql_fetch_array($result))
		{
			if($row["id"] == $author)
				echo('<option value="'.$row["id"].'"selected>'.$row["fullname"].'</option>');
			else
				echo ('<option value="'.$row["id"].'">'.$row["fullname"].'</option>');
			
		}
		echo'</select>';
	}
//thiet lap dich gia
	static function dropBooktranslator($translator){
		$query	= "SELECT * FROM tbl_author WHERE type='translator'";
		$result	= mysql_query($query);
		echo('
				<select name="translator" class="select-short">
					<option value="">--Dich gia--</option>
		');
		while($row=mysql_fetch_array($result))
		{
			if($row["id"] == $translator)
				echo('<option value="'.$row["id"].'"selected>'.$row["fullname"].'</option>');
			else
				echo ('<option value="'.$row["id"].'">'.$row["fullname"].'</option>');
		}
		echo('</select>');
	}
//thiet lap the loai
	static function dropBookcategory($category){
		$query	= "SELECT * FROM tbl_category";
		$result	= mysql_query($query);
		echo('
				<select name="category" class="select-general">
					<option value="">--The Loai--</option>
		');
		while($row=mysql_fetch_array($result))
		{
		if($row["id"] == $category)
			echo('<option value="'.$row["id"].'"selected>'.$row["name"].'</option>');
		else
			echo ('<option value="'.$row["id"].'">'.$row["name"].'</option>');
		}
		echo('</select>');
	}
//thiet lap nha xuat ban
	static function dropBookpublisher($publisher){
		$query	= "SELECT * FROM tbl_publisher";
		$result	= mysql_query($query);
		echo('
				<select name="publisher" class="select-general">
					<option value="">--Nha Xuat Ban--</option>
		');
		while($row=mysql_fetch_array($result))
		{
		if($row["id"] == $publisher)
			echo('<option value="'.$row["id"].'"selected>'.$row["name"].'</option>');
		else
			echo ('<option value="'.$row["id"].'">'.$row["name"].'</option>');
		}
		echo('</select>');
	}
//thiet lap ngon ngu
	static function dropBooklanguage($language){
		$language_arr 	= array('Việt Nam'=> 'Việt Nam', 'English'=> 'English', 'Japan'=>'Japan','French'=> 'French');
		echo '<select name="language" class="select-general">
				<option value="">--Ngôn Ngữ--</option>';
		foreach($language_arr as $key => $value){
			if($language == $key)
				echo '<option value="'.$key.'"selected>'.$value.'</option>';
			else
				echo '<option value="'.$key.'">'.$value.'</option>';
		}
		echo '</select>';
	}
//thiet lap tk nang kao
	/*static function dropTKbook($book){
		$query 	= "SELECT * FROM tbl_book";
		$result = mysql_query($query);
		echo '<select name="title" class="select-general">
				<option value="">--Tên Sách--</option>';
		while($row=mysql_fetch_array($result))
		{
		if($row["id"] == $book)
			echo '<option value="'.$row["id"].'"selected>'.$row["name"].'</option>';
		else
			echo ('<option value="'.$row["id"].'">'.$row["name"].'</option>');
		}
		echo '</select>';
		
	}*/
	//thiet lap pub_day
	static function droppub_day($pub_day){
		echo('<select class="day-time" name="pub_day">)
		<option value="">Ngày</option>');
		for($i=1; $i<=31;$i++)
		{
			if($pub_day == $i){
				echo('<option value="'.$i.'"selected>'.$i.'</option>');
			}
			else 
				echo('<option value="'.$i.'">'.$i.'</option>');
		}
		echo('</select>');
	}
	//thiet lap b_month
	static function droppub_month($pub_month){
		echo('<select class="day-time" name="pub_month">
			<option value="">Tháng</option>');
		$month	=	array(1=>'Jan','Feb','Mar','Apr','May','June',
			'July','Aug','Sep','Nov','Dem');
		foreach($month	as	$value => $m_value){
			if($pub_month==$value){
				echo('<option value="'.$value.'"selected>'.$m_value.'</option>');
			}
			else{
				echo('<option value="'.$value.'">'.$m_value.'</option>');
			}
		}
		echo('</select>');
	}
	//thiet lap b_year
	static function droppub_year($pub_year){
		echo('<select class="day-time" name="pub_year">
		<option value="">Năm</option>');
			$current_year		=  date('Y');
			$min_year			= $current_year + 0;
			$max_year			= $current_year - 100;
		for($i=$max_year;$i<=$min_year;$i++){
			if($pub_year==$i){
				echo('<option value="'.$i.'"selected>'.$i.'</option>');
			}
		    else{
				echo('<option value="'.$i.'">'.$i.'</option>');
			}
		}
		echo('<select/>');
	}
}
?>












