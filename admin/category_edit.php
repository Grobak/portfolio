<?php
include '../lib/includes.php';

if(isset($_POST['name']) && isset($_POST['slug'])){
	check_csrf();
	$slug = $_POST['slug'] ;

	if(preg_match('/^[a-z\0-9]+$/', $slug)){
		$name = $db->quote($_POST['name']);
		$slug = $db->quote($_POST['slug']);

		if(isset($_GET['id'])){
			$id = $db->quote($_GET['id']);
			$db->query('UPDATE categories SET name='.$name.', slug='.$slug.' WHERE id='.$id);	
		}else{
			$db->query('INSERT INTO categories SET name='.$name.', slug='.$slug);	
		}

		setFlash('La catégorie est ajoutée.');
		header('Location:category.php');
		die();
	}else{
		setFlash('Le slug n\'est pas valide', 'danger');
	}

}

if(isset($_GET['id'])){
	$id = $db->quote($_GET['id']);
	$select = $db->query('SELECT * FROM categories WHERE id='.$id);

	if($select->rowCount()==0){
		setFlash('Cette catégorie n\'existe pas.', 'danger');
		header('Location:category.php');
		die();
	}else{
		$_POST = $select->fetch();	
	}
}

include '../partials/admin_header.php';
?>

<h1>Modifier une catégorie</h1>

<br>

<form action="#" method="POST">
	<div class="form-group">
		<label for="name">Nom de la catégorie</label>
		<?php echo input('name') ; ?>
	</div>
	<div class="form-group">
		<label for="slug">Url de la catégorie</label>
		<?php echo input('slug') ; ?>
	</div>
	<?php echo csrf_input(); ?>
	<button type="submit" class="btn btn-default">Enregistrer</button>
</form>

<br>

<?php
include '../partials/footer.php';
?>