<?php 
session_start();

if(!isset($auth)){
	//var_dump($_SESSION['Auth']);
	//die();
	if(!isset($_SESSION['Auth']->id)){
		header('Location:'.WEBROOT.'login.php');
		die();
	}
}

if(!isset($_SESSION['csrf']) ) {
	$_SESSION['csrf'] = md5(time() +  rand());
}

function csrf(){
	return 'csrf='.$_SESSION['csrf'];
}

function csrf_input(){
	return '<input type="hidden" value="'.$_SESSION['csrf'].'" name="csrf">';
}

function check_csrf(){
	if(isset($_SESSION['csrf'])){
		if(isset($_GET['csrf']) || isset($_POST['csrf'])){
			if($_GET['csrf'] == $_SESSION['csrf'] || $_POST['csrf'] == $_SESSION['csrf']){
				return true ; 
			}
		}
	}
	debug($_GET);
	debug($_SESSION);
	die();
		header('Location:'.WEBROOT.'csrf.php');
		die();
}

?>