<?php
try{
	$db = new PDO('mysql:host=db618992572.db.1and1.com;dbname=db618992572', 'dbo618992572', 'tr8pab48txpz');
	$db->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	$db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch(Exception $e){
	echo 'Impossible de se connecter à la BDD : <br>';
//	echo $e->getMessage();
	die();
}

?>