<?php
$auth = 0 ;
require '../lib/includes.php';
require '../partials/header.php';
$ext_array = array('jpg', 'png', 'gif');

if(!empty($_FILES)){
	require 'imgClass.php';
	//debug($_FILES);
	//die();


	/*
	*	Array
	*	(
	*	    [img] => Array
	*	        (
	*	            [name] => logo_atmf_495x214.png
	*	            [type] => image/png
	*	            [tmp_name] => /tmp/php3UrhUb
	*	            [error] => 0
	*	            [size] => 50384
	*	        )
	*	
	*	)
	*/
	$img = $_FILES['img'];


	$name = $img['name'];
	$type = $img['type'];
	$tmp_name = $img['tmp_name'];
	$error = $img['error'];
	$size = $img['size'];

	$extension = strtolower(substr($name, -3)) ;
	if(in_array($extension, $ext_array)){
		// Sauvegarde de l'image
		move_uploaded_file($tmp_name, 'images/'.$name);
		// Création d'une miniature
		Img::creerMin('images/'.$name, 'images/miniatures/', $name, 215, 112);
		Img::convertirJPG('images/'.$name);
	}
	else{
		$msg = "Le fichier n'est pas une image au format valide.<br>Les formats pris en charge sont : ";
		foreach ($ext_array as $k => $v) {
			$msg .= ' '.$v ;
		}
	}
	if($msg){
		echo $msg ;
	}
}

?>
<html>
	<head>
	</head>
	
	<body>

		<h1>Essais de galeries.</h1>
		<h3>
			Ici tu peux insérer l'image de ton choix dans le formulaire ci-dessous.<br>
			L'image sera enregistrée sur le serveur puis affichée sur la page actuelle.
		</h3>
		<form method="post" action="galerie2.php" enctype="multipart/form-data">
			<input type="file" name="img">
			<br>
			<br>
			<br>
			<input type="submit" value="Envoyer la photo">
		</form>
		
		<?php 
		
		$dos = "images/miniatures" ;
		$dir = opendir($dos);

		while ($file = readdir($dir)){
			$extension = strtolower(substr($file, -3)) ;
			if(in_array($extension, $ext_array)){ 
				?>
					<div class="min">
						<a href="images/<?php echo $file ; ?>" class="zoombox zgallery2">
							<img src="images/miniatures/<?php echo $file; ?>">
							<h3><?php echo $file ; ?></h3>
						</a>
					</div>
				<?php	
			}
		}

require '../partials/footer.php';
