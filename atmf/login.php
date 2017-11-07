<?php  	
		$auth = 0 ;
		include 'lib/includes.php'; 

	//var_dump($_POST);

/**
*	TRAITEMENT DU FORMULAIRE DE CONNEXION
**/
	
	if(isset($_POST['username']) && !empty($_POST['password'])){
		$username = $db->quote($_POST['username']);
		$password = sha1($_POST['password']);
		$select = $db->query("SELECT * FROM users WHERE name = $username AND password = '$password'");

		if($select->rowCount() > 0){
			$_SESSION['Auth'] = $select->fetch();

			setFlash('Vous êtes bien connecté');

			header('Location:index.php');
			die();
		}else{
			setFlash('Identifiants incorrects', 'danger');
		}
	}

/**
*	INCLUSION DU HEADER
**/
		include 'partials/header.php'; 

?>

<form action="#" method="POST">
	<div class="form-group">
		<label for="username">Nom d'utilisateur</label>
		<?php echo input('username') ; ?>
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="password" name="password" >
	</div>
	<button type="submit" class="btn btn-default">Connexion</button>
</form>


<?php 
	//	include 'lib/debug.php' ; 
		include 'partials/footer.php' ; 
?> 