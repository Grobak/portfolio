<?php

function input($id){
	$value = isset($_POST->$id) ? $_POST->$id : '' ;
	return "<input type='text' class='form-control' id='$id' name='$id' value='$value'>";
}

function textarea($id){
	$value = isset($_POST->$id) ? $_POST->$id : '' ;
	return "<textarea class='form-control' id='$id' name='$id'>$value</textarea>";
}

function select($id, $options = array()){
	$return = "<select class='form-control' id='$id' name='$id'>";

	foreach ($options as $k => $v) {
		$selected = '';
		//var_dump($_POST->category_id);
		if(isset($_POST->id) && $_POST->category_id == $k){
			$selected = "selected";
		}
		$return .= "<option value='$k' $selected>$v</option>";
	}

	$return .= "</select>";

	return $return ;
}

function checkbox($id){
	if(isset($_POST->published)){
		$value = 'checked=' ;
		if($_POST->published == 1){
			$value .='true';
		}else{
			$value .='false';
		}
	}
	return '<input type="checkbox" id="$id" value="checkbox" $value>';
}


