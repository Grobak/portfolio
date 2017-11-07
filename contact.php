<?php  	
	$auth = 0 ; 
	include 'lib/includes.php'; 
    include 'lib/image.php';

$title = "Coryle Carreras";
	
//	include'lib/debug.php';

	if(isset($_POST['content'])) {
		if(!empty($_POST['content']) && !empty($_POST['nom']) && !empty($_POST['sujet'])){

			$nom = $_POST['nom'] ;
			$sujet = $_POST['sujet'] ;
						
			$content = 	$nom." vous a envoyé un mail à propos de \"".$sujet."\" : \r\n".$_POST['content'] ; 
		
			$headers = 'MIME-Version: 1.0\r\n';
			$headers .= 'Content-type: text/plain; charset=iso-8859-1\r\n' ;

			if(!empty($_POST['mail'])){
				$mail = $_POST['mail'] ;

				$headers .= 'From: '.$nom.' <'.$mail.'>\r\nReply-to : '.$nom.' <'.$mail.'>\nX-Mailer:PHP' ;
				$content .= "\r\n Vous pouvez répondre à ce mail à l'adresse : \r\n".$mail.".";
			}
			else{
				$headers .= 'From: '.$nom.' \r\nReply-to : '.$nom.' \nX-Mailer:PHP' ;
				$content .= "\r\n Vous ne pouvez répondre à ce mail.";
			}

			$destination = 'c-carreras@hotmail.fr' ;
			if(mail($destination, $sujet, $content, $headers)){
				setFlash('Votre message a été envoyé.');

				header('Location:'. WEBROOT.'index.php');
				die();
			}
			else{
				echo 'Une erreur est survenue, le message n\'a pas été envoyé...';
			}

		}
		else{
			setFlash('Vous n\'avez pas rempli tout les champs requis', 'danger');
			header('Location:'.WEBROOT.'contact.php');
			die();
		}
	} 

	$title = "Me contacter" ;

	include 'partials/header.php'; 
?>

<h1><?php echo $title; ?></h1>


<form action="#" method="POST">
	<div class="jumbotron">
	    <div class="form-group">
			<label for="nom">Vos noms et prénoms</label>
			<?php echo input('nom') ; ?>
		</div>
	      	<hr>
		<div class="form-group">
			<label for="mail">Votre adresse mail</label>
			<?php echo input('mail') ; ?>
		</div>
	      	<hr>
		<div class="form-group">
			<label for="sujet">Sujet</label>
			<?php echo input('sujet') ; ?>
		</div>
	      	<hr>
		<div class="form-group">
			<label for="content">Message</label>
			<?php echo textarea('content') ; ?>
		</div>
	      	<hr>
		<button type="submit" class="btn btn-default">Envoyer</button>
	</div>
</form>


<?php include '../partials/footer.php'; ?>