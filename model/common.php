<?php
class common{
	//thiet lap b_day
	static function dropb_day($b_day){
		echo('<select class="day-time" name="b_day">)
		<option value="">Ngày</option>');
		for($i=1; $i<=31;$i++){
			if($b_day == $i){
				echo('<option value="'.$i.'" selected>'.$i.'</option>');
			}
			/*echo('<option value="'.$i.'">'.$i.'</option>');*/
			else 
				echo('<option value="'.$i.'">'.$i.'</option>');
		}
		echo('</select>');
	}
	//thiet lap b_month
	static function dropb_month($b_month){
		echo('<select class="day-time" name="b_month">
			<option value="">Tháng</option>');
		$month	=	array(1=>'Jan','Feb','Mar','Apr','May','June',
			'July','Aug','Sep','Nov','Dem');
		foreach($month	as	$value => $m_value){
			if($b_month==$value){
				echo('<option value="'.$value.'"selected>'.$m_value.'</option>');
			}
			else{
				echo('<option value="'.$value.'">'.$m_value.'</option>');
			}
		}
		echo('</select>');
	}
	//thiet lap b_year
	static function dropb_year($b_year){
		echo('<select class="day-time" name="b_year">
		<option value="">Năm</option>');
			$current_year		=  date('Y');
			$min_year			= $current_year - 16;
			$max_year			= $current_year - 80;
		for($i=$max_year;$i<=$min_year;$i++){
			if($b_year==$i){
				echo('<option value="'.$i.'"selected>'.$i.'</option>');
			}
		    else{
				echo('<option value="'.$i.'">'.$i.'</option>');
			}
		}
		echo('<select/>');
	}
	// thiet lap gioi tinh
	static function dropgender($gender){
		echo('<select class="gender" name="gender">
			<option value="">Giới Tính</option>');
		$arr_gender	=	array('male' => 'Nam', 'female' => 'Nữ');
		foreach($arr_gender	as	$value => $value_gender){
			if($gender==$value){
				echo('<option value="'.$value.'"selected>'.$value_gender.'</option>');
			}
			else{
				echo('<option value="'.$value.'">'.$value_gender.'</option>');
			}
		}
		echo('</select>');
		/* THIET LAP GIOI TINH DANG RADIO
			static function radioGender($gender)
			{
				$gender_arr		= array('male' => 'Nam', 'female' => 'Nu');
				foreach($gender_arr as $key => $value>){
					if($gender == $key)
						echo('<input type="radio" name="gender" value="'.$key.'" checked/>'.$value.');
					else 
						echo('<input type="radio" name="gender" value="'.$key.'" />'.$value.');
				}
			}
		*/
	}
	//THIET LAP HAM STATUS
	static function dropUserstatus($status)
	{
		echo ('<select class="gender" name="status">
					<option value="">--Trang thai--</option>');
		$status_arr = array('inactive'=>"INACTIVE",'active'=>'ACTIVE','closed'=>'CLOSED');
		foreach($status_arr as $key => $value)
		{
			if($status == $key)
				echo ('<option value="'.$key.'" selected>'.$value.'</option>');
			else
				echo ('<option value="'.$key.'">'.$value.'</option>');
		}
	}
	//THIET LAP AUTHORTYPE
	static function dropAuthortype($type){
		echo '<select name="type" class="gender">
				<option value="">---Type---</option>';
		$type_arr = array('author' => 'Tác Giả','translator' => 'Dịch Giả');
		foreach($type_arr as $key => $value){
			if($type == $key)
				{
				echo '<option value="'.$key.'"selected>'.$value.'</option>';
				}
			else
				{
				echo '<option value="'.$key.'">'.$value.'</option>';
				}
		}
		echo '</select>';
	}
	//THIET LAP AUTHORSTAFF
	static function dropStafftype($type){
		echo '<select name="type" class="gender">
				<option value="">---select---</option>';
		$type_arr = array('admin'=>'Admin', 'staff'=>'Staff');
		foreach($type_arr as $key => $value){
			if($type == $key)
				echo '<option value="'.$key.'"selected>'.$value.'</option>';
			else
				echo '<option value="'.$key.'">'.$value.'</option>';
		}
		echo '</select>';
	}
}
?>
