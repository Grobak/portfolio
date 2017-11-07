<div class="row">
      		<div id="menu" class="col-md-3">
        		<h3>Menu</h3>
        		<ul class="nav nav-pills nav-stacked">
          			<li><a href="{{ path('dur_platform_home') }}">Accueil</a></li>
          			<?php if (0) { ?>
  						<li><a href="{{ path('dur_platform_add') }}">Ajouter une annonce</a></li>
  					<?php } ?>
        		</ul>
        	<hr>
        		<h4>Derniers articles</h4>
        		<ul class="nav nav-pills nav-stacked">
              {% for article in listArticles %}
                <li>
                  <a href="{{ path('dur_platform_view', {'id': article.id}) }}">
                    {{ article.title }}
                  </a>
                </li>
              {% endfor %}
            </ul>
        	<!--	{{ render(controller("DurPlatformBundle:Advert:menu", {'limit': 3})) }}	-->
      		</div>
	      	<div id="content" class="col-md-9">
		        <?php require 'body.php' ; ?>
	      	</div>
    	</div>

	<?php require 'footer.php' ; ?>