<?php 

function flash(){
	if(isset($_SESSION['Flash'])){
		$type = isset($_SESSION['Flash']['type']) ? $_SESSION['Flash']['type'] : 'success' ;
		$message = $_SESSION['Flash']['message'] ;

		$html = '<div class="alert alert-'.$type.'">'.$message.'</div>';

      	unset($_SESSION['Flash']);

		return $html;
	}
}

function setFlash($message, $type = 'success'){
	$_SESSION['Flash']['message'] = $message ; 
	$_SESSION['Flash']['type'] = $type ;

}

function isLogged(){
	if(!empty($_SESSION['Auth'])){
		return 1 ;
	}
	return 0 ;
}