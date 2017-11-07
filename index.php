<?php  	
	$auth = 0 ; 
	include 'lib/includes.php'; 
    include 'lib/image.php';

    $condition = '';
    $category = false;
    $path = WEBROOT."categorie/";
    if(isset($_GET['category'])){
    	$slug = $db->quote($_GET['category']);
    	$select = $db->query("SELECT * FROM categories WHERE slug = $slug");
    	if(!isset($_GET['category'])){
			header("HTTP/1.1 301 Moved Permanently");
			header('Location:'.WEBROOT);
			die();
    	}
    	$category = $select->fetch();
    	$condition = "AND works.category_id = '{$category->id}'";
    }
    $query = "	SELECT 	works.name, works.id, works.slug, images.name AS image_name
				FROM 	works 
				LEFT JOIN images ON images.id = works.image_id
				WHERE works.published = 1 
				$condition";
	//die($query);
	$select = $db->query($query);
	$works = $select->fetchAll();

	$categories = $db->query('SELECT slug, name FROM categories')->fetchAll();

	if($category) { 
		$title = "Mes réalisations ".$category->name;
		if($category->name == "Autres réalisations"){
			$title = $category->name;
		}
	}else{
		$title = "Coryle Carreras";
	}

	include 'partials/header.php'; 
?>

<h1><b><?php echo $title; ?></b><br>Bienvenue sur mon portfolio</h1>

<div class="row">
	<div class="col-sm-10">
	<h3>Mes réalisations</h3>
   		<div class="row">
   			<?php 
   				$i = 0 ;
   				foreach ($works as $work): 
   				if($i > 2) {
   					$i = 0 ;
   					echo "<br>";
   				}?>
   				<div class="col-sm-4">
   					<a href="<?php echo WEBROOT.'realisation/'.$work->slug; ?>">
	   					<h4><?php echo $work->name; ?></h4>
   					</a>
	   				<?php if($work->image_name){?>
	   					<div class="min">
							<a href="<?php echo WEBROOT."img/works/".$work->image_name ; ?>" class="zoombox zgallery2">
								<img src="<?php echo WEBROOT."img/works/".resizedName($work->image_name, 150, 150); ?>" class="img-thumbnail">
							</a>
						</div>
   					<?php } ?>
   				</div>
   			<?php 
   				$i++ ;
   				endforeach; ?>
   		</div>
	</div>
	<div class="col-sm-2">Catégories
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
		include 'partials/footer.php'  
?>