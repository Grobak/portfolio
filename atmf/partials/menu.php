<h3>Menu</h3>
	<ul class="nav nav-pills nav-stacked">
		<li><a href="http://coryle-carreras.fr/atmf/index.php">Accueil</a></li>
			<?php if (!empty($_SESSION['Auth'] && $_SESSION['Auth']->username == 'administrateur')) { ?>
		<li><a href="{{ path('dur_platform_add') }}">Ajouter une annonce</a></li>
	<?php } ?>
	</ul>
<hr>
	<h4>Derniers articles publiés</h4>
	<ul class="nav nav-pills nav-stacked">
    <?php foreach($articles as $k => $v) { ?>
      <li>
        <a href="{{ path('dur_platform_view', {'id': article.id}) }}">
          <?php echo $v->title ; ?>
        </a>
      </li>
    <?php } ?>
  </ul>