<?php  	
	$auth = 0 ; 
	include 'lib/includes.php'; 
    include 'lib/image.php';

$search = false ; 

if(isset($_GET['search']) && $_GET['search'] != ''){
	$keys = explode(' ', $_GET['search']);
	
	foreach ($keys as $k => $v) {
		$keys[$k] = "%$keys[$k]%";
		$keys[$k] = $db->quote($keys[$k]);
	}
}else{
	setFlash('Vous n\'avez pas précisé de mots-clés !', 'danger');
	header('Location:'.WEBROOT);
	die();
}
$sql = "SELECT works.name, works.id, works.slug, works.content, images.name AS image_name 
		FROM works 
		LEFT JOIN images ON images.id = works.image_id
		LEFT JOIN categories ON categories.id = works.category_id
		";
$items = 0 ;
foreach ($keys as $k => $v) {
	if(strlen($v) > 3){
		if($items == 0){
			$sql .= "WHERE ";
		} else{
			$sql .= "OR ";
		}
		$sql .= "content LIKE $v ";
		
		$items++;
	}
}

//die($sql);
$select = $db->query($sql);

if($select->rowCount()==0){
	setFlash('Pas de résultats pour les mots recherchés.', 'danger');
	header('Location:'.WEBROOT);
	die();
}else if($select->rowCount()==1){
	setFlash('Un seul résultat à été trouvé :');
}else{
	setFlash($select->rowCount().' résultats ont été trouvés :');
}


?>
	
<style type="text/css">
	span.surlign1{font-style:italic; background-color:#ffff00;}
</style>

<?php

include 'partials/header.php'; 

?>

<div class="row">
	<div class="col-sm-10">
   		<div class="row">
   			<?php foreach ($select as $sel): ?>
   				<div class="col-sm-4">
   					<a href="<?php echo WEBROOT.'realisation/'.$sel->slug; ?>">
	   					<h4><?php echo $sel->name; ?></h4>
	   					<?php if($sel->image_name){?>
   							<img src="<?php echo WEBROOT."img/works/".resizedName($sel->image_name, 150, 150); ?>">
   						<?php } ?>
   					</a><br><br>
 					<?php 
 						$content = $sel->content;

 						/*$i = 1 ;
 						foreach ($keys as $k => $v) {
 							$content = str_ireplace($v, '<span class="surlign1">'.$v.'</span>', $content);
 							$i++ ;
 							if($i > 3) {
 								$i = 1 ;
 							}
 						}*/

 						echo /*'<span class="surlign1">'.*/$content/*.'</span>'*/; 
 					?>
   				</div>
   			<?php endforeach; ?>
   		</div>
	</div>
</div>