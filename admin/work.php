<?php
include '../lib/includes.php';
include '../partials/admin_header.php';

/** 
*	Suppression de réalisations
**/
if(isset($_GET['delete'])){
	check_csrf();

	$id = $db->quote($_GET['delete']);
	$db->query('DELETE FROM works WHERE id = '.$id);

	setFlash('La réalisation a bien été supprimée');
	header('Location:work.php');
	die();
}


/**
*	Récupération des différentes réalisations
**/
$select = $db->query('SELECT * FROM works ORDER BY id ASC');
$works = $select->fetchAll();

?>

<h1>Mes réalisations</h1>
<br>

<p>
	<a href="work_edit.php" class="btn btn-success">Ajouter une nouvelle réalisation</a>
</p>

<br>

<table class="table table-hover table-bordered table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nom</th>
			<th>Contenu</th>
			<th>Catégorie</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($works as $work): ?>
			<tr>
				<td><?= $work->id;?></td>
				<td><?= $work->name;?></td>
				<td><?= $work->content;?></td>
				<td><?= $work->category_id;?></td>
				<td>
					<a href=<?php echo 'work_edit.php?id='.$work->id ; ?> class="btn btn-default">
						Modifier

					</a>
					<a href=<?php echo '?delete='.$work->id.'&'.csrf();?> class="btn btn-error" onclick="return confirm('Voulez-vous vraiment supprimer cette réalisation ?');">
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