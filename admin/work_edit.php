<?php
include '../lib/includes.php';

/**
*	SAUVEGARDE
**/
if(isset($_POST['name']) && isset($_POST['slug'])){
	//debug($_POST);die();
	check_csrf();
	$slug = $_POST['slug'] ;
	$published = false ;
	if(isset($_POST['published']) && $_POST['published'] == true){
		$published = true ;
	}

	if(preg_match('/^[a-z\0-9]+$/', $slug)){
		$name = $db->quote($_POST['name']);
		$slug = $db->quote($_POST['slug']);
		$content = $db->quote($_POST['content']);
		$category_id = $db->quote($_POST['category_id']);

		/**
		*	SAUVEGARDE DU TRAVAIL REALISE
		**/
		if(isset($_GET['id'])){
			$id = $db->quote($_GET['id']);
			//debug($_POST);die();
			$query = "UPDATE works SET name=$name, slug=$slug, content=$content, category_id=$category_id "; 
			if($published){
				$query .= "published = 1 " ;
			}
			$query .= "WHERE id=$id";
			//debug($query);die();
			$db->query($query);	
		}else{
			//debug($_POST);die();
			$query = "INSERT INTO works SET name = $name, slug = $slug, content = $content, category_id = $category_id " ;
			
			if($published == 1){
				$query .= "published = 1" ;
			}

			//debug($query);die();
			$db->query($query);	
			$_GET['id'] = $db->lastInsertId();
		}

		/**
		*	SAUVEGARDE DES IMAGES (si il y en a)
		**/
		require '../lib/image.php';
		
		$work_id = $db->quote($_GET['id']);
		$files = $_FILES['images'];
		$images = array();

		foreach ($files['tmp_name'] as $k => $v) {
			$image = array(	
						'name' => $files['name'][$k],
						'tmp_name' => $files['tmp_name'][$k]
					);
			$extension = pathinfo($image['name'], PATHINFO_EXTENSION);

			if(in_array($extension, array('jpg', 'png'))){
				$db->query("INSERT INTO images SET work_id = $work_id");		
				$image_id = $db->lastInsertId();		
				$image_name = $image_id.'.'.$extension ;
				move_uploaded_file($image['tmp_name'], '../'.IMAGES.DS.'works'.DS.$image_name);

				resizeImage('../'.IMAGES.DS.'works'.DS.$image_name, 150, 150);
//				die(IMAGES.DS.'works'.DS.$image_name);
				$image_name = $db->quote($image_name);
				$db->query("UPDATE images SET name = $image_name WHERE id = $image_id");
			}
		}
		

	//debug($_FILES);
		//die();

		setFlash('L\'article est ajouté.');
		header('Location:work.php');
		die();
	}else{
		setFlash('Le slug n\'est pas valide', 'danger');
	}

}

/**
*	RECUPERATION DU TRAVAIL
**/
if(isset($_GET['id'])){
	$id = $db->quote($_GET['id']);

	$select = $db->query('SELECT id, name, slug, content, category_id, published FROM works WHERE id='.$id);

	if($select->rowCount()==0){
		setFlash('Cet article n\'existe pas.', 'danger');
		header('Location:work.php');
		die();
	}else{
		$_POST = $select->fetch();	
	}
}

/**
*	Suppression d'une image
**/
if(isset($_GET['delete_image'])){
	check_csrf();
	$id = $db->quote($_GET['delete_image']);
	$select = $db->query("SELECT name, work_id FROM images WHERE id=$id");
	$image = $select->fetch();

	$images = glob(IMAGES.'/works/'.pathinfo($image->name, PATHINFO_FILENAME).'_*x*.*');
	if(is_array($images)){
		foreach ($images as $v) {
			unlink($v);
		}
	}
	
	unlink(IMAGES.DS.'works'.DS.$image->name);
	$db->query("DELETE FROM images WHERE id=$id");
	setFlash('L\'image est supprimée', 'danger');
	header('Location:work_edit.php?id='.$image->work_id);
	die();
}

/**
*	Mise en avant d'une image
**/
if(isset($_GET['highlight_image'])){
	check_csrf();
	$work_id = $db->quote($_GET['id']);
	$image_id = $db->quote($_GET['highlight_image']);
	$db->query("UPDATE works SET image_id = $image_id WHERE id = $work_id");
	
	setFlash('L\'image est mise à la une');
	header('Location:work_edit.php?id='.$_GET['id']);
	die();
}

/**
*	Récupération des catégories
**/
$select = $db->query('SELECT id, name FROM categories ORDER BY name ASC');
$categories = $select->fetchAll();
$list_categories = array();
foreach ($categories as $category) {
	$list_categories[$category->id] = $category->name;
}

/**
*	Récupération des images liées
**/
if(isset($_GET['id'])){
	$work_id = $db->quote($_GET['id']);
	$select = $db->query('SELECT id, name FROM images WHERE work_id='. $work_id);
	$images = $select->fetchAll();	
}else{
	$images = array();
}

include '../partials/admin_header.php';
?>

<h1>Modifier une réalisation</h1>

<br>


<div class="row">
	<form action="#" method="POST" enctype="multipart/form-data">
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">Nom de la réalisation</label>
				<?php echo input('name') ; ?>
			</div>
			<div class="form-group">
				<label for="slug">Url de la réalisation</label>
				<?php echo input('slug') ; ?>
			</div>
			<div class="form-group">
				<label for="content">Contenu de la réalisation</label>
				<?php echo textarea('content') ; ?>
			</div>
			<div class="form-group">
				<label for="category_id">Catégorie de la réalisation</label>
				<?php echo select('category_id', $list_categories) ; ?>
			</div>
			<div class="form-group">
				Publier l'article ?
				<label for="cbox1" class="checkbox-inline">oui </label> 
				<?php echo checkbox('cbox1') ; ?>
			</div>
			<?php echo csrf_input(); ?>
			<button type="submit" class="btn btn-default">Enregistrer</button>
	</div>
	<div class="col-md-6">
			<?php foreach ($images as $k => $image): ?>
				<p>
					<img src="<?php echo WEBROOT.'img/works/'.$image->name ; ?>" width=100 class="img-thumbnail">
					<a href="?delete_image=<?php echo $image->id ; ?>&<?php echo csrf(); ?>" onclick="return confirm('Sur de vouloir supprimer cette image ?')">
						Supprimer l'image
					</a> / 
					<a href="?highlight_image=<?php echo $image->id ; ?>&id=<?php echo $_GET['id']; ?>&<?php echo csrf(); ?>">
						Mettre à la une
					</a>
				</p>
			<?php endforeach; ?>
			<div class="form-group">
				<input type="file" name="images[]">
				<input type="file" name="images[]" class="hidden" id="duplicate">
			</div>
			<p>
				<a href="#" class="btn btn-success" id="duplicate_btn">Ajouter une image</a>
			</p>
	</div>
		</form>
</div>

<br>

<?php 	ob_start(); ?>
          	<script src=<?php echo WEBROOT."js/tinymce/tinymce.min.js"; ?> ></script>
          	<script>
          		(function($){
          			$('#duplicate_btn').click(function(e){
          				e.preventDefault();
          				var $clone = $('#duplicate').clone().attr('id', '').removeClass('hidden');
          				$('#duplicate').before($clone)
          			})
          		})(jQuery);


	              tinyMCE.init({
	                  // General options
	                  mode : "textareas"
	              });
			</script>
<?php $script = ob_get_clean(); ?>

<?php include '../partials/footer.php'; ?>