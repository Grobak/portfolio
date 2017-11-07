<?php  	
	$auth = 0 ; 
	include 'lib/includes.php'; 
    include 'lib/image.php';

	if(!isset($_GET['slug'])){
		header("HTTP/1.1 301 Moved Permanently");
		header('Location:index.php');
		die();
	}
	$slug = $db->quote($_GET['slug']);

	
	$select = $db->query("SELECT * FROM works WHERE slug = $slug");
	if($select->rowCount() == 0){
		header("HTTP/1.1 301 Moved Permanently");
		header('Location:index.php');
		die();
	}
	$work = $select->fetch();
	if($work->published != 1){
		header("HTTP/1.1 301 Moved Permanently");
		header('Location:index.php');
		die();
	}
	$work_id = $work->id;


	$select = $db->query("SELECT * FROM images WHERE work_id = $work_id");
	$images = $select->fetchAll();

	$title = "$work->name";

	include 'partials/header.php'; 
?>

	<div class="jumbotron">
        <h1>
        	<?php echo $work->name ;?>
        </h1>
        <hr>
        <p>
        	<?php echo $work->content ; ?>
        </p>
        <?php    foreach ($images as $k => $image) {?>
			<p>
        		<hr>
				<img class="img-thumbnail" src="<?php echo WEBROOT.'img/works/'.$image->name;?>" width="100%">
    		</p>
    	<?php } ?> 
    </div>


<?php 
		//include 'lib/debug.php'; 
		include 'partials/footer.php'  
?>