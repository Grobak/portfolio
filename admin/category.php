<?php
include '../lib/includes.php';
include '../partials/admin_header.php';

/** 
*	Suppression de catégories
**/
if(isset($_GET['delete'])){
	check_csrf();

	$id = $db->quote($_GET['delete']);
	$db->query('DELETE FROM categories WHERE id = '.$id);

	setFlash('La catégorie a bien été supprimée');
	header('Location:'.WEBROOT.'admin/category.php');
	die();
}


/**
*	Récupération des différentes catégories
**/
$select = $db->query('SELECT * FROM categories ORDER BY id ASC');
$categories = $select->fetchAll();

?>

<h1>Les Catégories</h1>
<br>

<p>
	<a href="category_edit.php" class="btn btn-success">Ajouter une nouvelle catégorie</a>
</p>

<br>

<table class="tablet tablet-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($categories as $category): ?>
			<tr>
				<td><?= $category->id;?></td>
				<td><?= $category->name;?></td>
				<td>
					<a href=<?php echo 'category_edit.php?id='.$category->id ; ?> class="btn btn-default">
						Modifier

					</a>
					<a href=<?php echo '?delete='.$category->id.'&'.csrf();?> class="btn btn-error" onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
						Supprimer
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br><br>



<?php
include '../partials/footer.php';
?>