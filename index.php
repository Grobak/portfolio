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
<div class="jumbotron jumbotron-fluid">
	<div class="container">
	<div class="row">
		<div class="col-sm-10">
		<h3>Mes réalisations</h3>
	   		<div class="row">
	   			<?php 
	   				$i = 0 ;
	   				foreach ($works as $work): 
	   				if($i > 1) {
	   					$i = 0 ;
	   					echo "<br>";
	   				}?>
	   				<div class="col-sm-5">
		   				<h2 class="card-row-title"><a href="<?php echo WEBROOT.'realisation/'.$work->slug; ?>"><?php echo $work->name; ?></a></h2>
		   				<?php if($work->image_name){?>
		   					<div class="card-row-image" data-background-image="<?php echo WEBROOT."img/works/".resizedName($work->image_name, 150, 150); ?>" style="background-image: url('<?php echo WEBROOT."img/works/".resizedName($work->image_name, 150, 150); ?>');">
							<div class="card-row-label"><a href="/listing?cid=3">Musée</a></div><!-- /.card-row-label --></div><!-- /.card-row-image -->
		   					<div class="min">
								<a href="<?php echo WEBROOT."img/works/".$work->image_name ; ?>" class="zoombox zgallery2">
								</a>
							</div>
	   					<?php } ?>
	   				</div>
	   			<?php 
	   				$i++ ;
	   				endforeach; ?>
	   		</div>
		</div>
	</div>
</div>
<?php /*<div class="cards-row">
	<div class="card-row">
		<div class="card-row-inner">
			
			<div class="card-row-body">
				<div class="card-row-content">Dotée de l’un des rares laboratoires encore en parfait état de conservation et ouvert à la visite. Son col de cygne et son fourneau en cuivre sont restés intacts ; l’arrière-boutique dispose encore de nombreux ouvrages de médecine et pharma...<br><br><a href="/listing/detail/apothicairerie-de-lhotel-dieu/2">En savoir plus</a></div><!-- /.card-row-content -->
			</div><!-- /.card-row-body -->
			<div class="card-row-properties">
				<dl>
					<dd>Catégorie</dd><dt><a href="listing?cid=3">Musée</a></dt>
					<dd>Ville</dd><dt>Bourg-en-Bresse</dt>
				<dd>Note</dd>
					<dt>
						<div class="card-row-rating"><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div><!-- /.card-row-rating -->
					</dt>
				</dl>
			</div><!-- /.card-row-properties -->
		</div><!-- /.card-row-inner -->
	</div><!-- /.card-row -->
</div> */?>
	<li class="has-mega-menu ">
        <a href="#">Catégories <i class="fa fa-chevron-down"></i></a>

        <ul class="mega-menu">		
		<li>
			<?php foreach($categories as $categ){ ?>
				<li><a href="<?php echo $path.$categ->slug ; ?>"><?php echo $categ->name; ?></a></li>
			<?php } ?>
    </li>
		<!-- <div class="col-sm-2">Catégories
			<ul>
				<?php // foreach($categories as $categ){ ?>
					<li> 
						<a href="<?php /* echo $path.$categ->slug ; ?>"><?php echo $categ->name; */ ?></a>
					</li>
				<?php } ?>
			</ul>
		</div> -->
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