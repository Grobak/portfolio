<?php
	include '../lib/includes.php';
    include '../lib/image.php';

    $condition = '';
    $category = false;
    $path = WEBROOT."categorie/";

	/** 
	*	Suppression de réalisations
	**/
	if(isset($_GET['delete'])){
		check_csrf();
	
		$id = $db->quote($_GET['delete']);
		$db->query('DELETE FROM works WHERE id = '.$id);
	
		setFlash('La réalisation a bien été supprimée');
		header('Location:'.WEBROOT.'admin');
		die();
	}

    if(isset($_GET['category'])){
    	$slug = $db->quote($_GET['category']);
    	$select = $db->query("SELECT * FROM categories WHERE slug = $slug");
    	if(!isset($_GET['category'])){
			header("HTTP/1.1 301 Moved Permanently");
			header('Location:'.WEBROOT);
			die();
    	}
    	$category = $select->fetch();
    	$condition = "WHERE works.category_id = '{$category->id}'";
    }
    $query = "	SELECT 	works.name, works.id, works.slug, images.name AS image_name
				FROM 	works 
				LEFT JOIN images ON images.id = works.image_id
				$condition";
	//die($query);
	$select = $db->query($query);
	$works = $select->fetchAll();

	$categories = $db->query('SELECT slug, name FROM categories')->fetchAll();

	if($category) { 
		$title = "Mes réalisations ".$category->name;
	}else{
		$title = "Bienvenue sur mon portfolio";
	}

	include '../partials/admin_header.php';
?>

<h1><?php echo $title; ?></h1>



<div class="row">
	<div class="col-sm-10">
   		<div class="row">
   			<?php foreach ($works as $work): ?>
   				<div class="col-sm-4">
   					<a href="<?php echo WEBROOT.'admin/work_edit.php?id='.$work->id; ?>">
	   					<h4><?php echo $work->name; ?></h4>
	   					<?php if($work->image_name){?>
   							<img src="<?php echo WEBROOT."img/works/".resizedName($work->image_name, 150, 150); ?>">
   						<?php } ?>
   					</a>
   					<a href=<?php echo '?delete='.$work->id.'&'.csrf();?> class="btn btn-error" onclick="return confirm('Voulez-vous vraiment supprimer cette réalisation ?');">
						Supprimer
					</a>
   				</div>
   			<?php endforeach; ?>
   		</div>
	</div>
	<div class="col-sm-2">
		<ul>
			<?php foreach($categories as $categ){ ?>
				<li> 
					<a href="<?php echo $path.$categ->slug ; ?>"><?php echo $categ->name; ?></a>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>

<?php /*
$sel = $db->query('SELECT * FROM users'); 
var_dump($sel->fetch());
 */
?>

<?php 
		//include 'lib/debug.php'; 
		include '../partials/footer.php';
?>