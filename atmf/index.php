<?php  	
	$auth = 0 ; 
	include 'lib/includes.php'; 
    include 'lib/image.php';

    if(!empty($_GET['page'])){
    	$page = $_GET['page'] ;
    }

	$index = AdvertController::indexAction($page, $db);
	$articles = $index['listArticles'];

	include 'partials/header.php'; 
?>

	<h1>Récemment publié :</h1>
	<ul> 
<?php 	foreach($articles as $k => $v) { ?>
			<h2><?php echo $v->title; ?></h2>
			<h4><?php echo $v->content; ?></h4>
		<?php } ?>
	</ul>

	<ul class="pagination">
  		<!-- On utilise la fonction range(a, b) qui crée un tableau de valeurs entre a et b -->
<?php   foreach (range(1, $nbPages) as $p) { 
			if($p != 0) { ?>
    		<li <?php if($p == $page) echo 'class="active"'; ?> >
      			<!-- <a href="{{ path('dur_platform_home', {'page': p}) }}">{{ p }}</a> -->
      			<a href="http://coryle-carreras.fr/atmf/index.php?page=<?php echo $p ; ?>"><?php echo $p ; ?></a>
    		</li>
<?php   	} 
		} ?>
	</ul>


<?php 
		include 'partials/footer.php' ;
?>