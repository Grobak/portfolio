<?php
function debug($var){
	$debug = debug_backtrace();
	echo '<p><a href="#" onclick="$(this).parent().next(\'ol\').slideToggle(); return false;"><strong>'.$debug[0]['file'].' </strong> l.'.$debug[0]['line'].'</a></p>';
	echo '<ol style="display:none;">';
	foreach ($debug as $k => $v) { 
		if($k>0){
			echo '<li><strong>'.$v['file'].' </strong> l.'.$v['line'].'</li>';
		}
	}
	echo '</ol>';
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}

function getArticles($page, $perPage, $db){
	$firstResult = ($page-1)*$perPage ;

	$select = $db->query("SELECT * FROM articles WHERE published = 1 ORDER BY date DESC");
	$articles = $select->fetchAll();

	return $articles ;

	//return array(array('title' => 'Test article', 'content' => 'Contenu article'), array('title' => 'Test', 'content' => 'Contenu'));
}