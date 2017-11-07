{# src/Dur/PlatformBundle/Resources/views/Advert/index.php.twig #}

{% extends "DurPlatformBundle::layout.php.twig" %}

{% block title %}
	Accueil - {{ parent() }}
{% endblock %}

{% block durplatform_body %}

	<h1>Récemment :</h1>
	<ul>
		{% for article in listArticles %}
		<li><h3>
			{% if article.id is defined %}
			<a href="{{ path('dur_platform_view', {'id': article.id}) }}">
				{{ article.title }}
				<br>
				{% if article.image is not null %}
  					<img src="{{ asset(article.image.webPath) }}" alt="{{ article.image.alt }}" height=100><br>
				{% endif %}
			</a>
			{% else %}
				{{ article.title }}
				{{ article.content }}
			{% endif %}
			</h3>
			<i>Paru le {{ article.date|date('d/m/Y') }}</i><br>
		</li>
			{% else %}
		<li>
			Pas (encore !) d'annonces
		</li>
		{% endfor %}
	</ul>
	<ul class="pagination">
  		{# On utilise la fonction range(a, b) qui crée un tableau de valeurs entre a et b #}
  		{% for p in range(1, nbPages) %}
    		<li{% if p == page %} class="active"{% endif %}>
      			<a href="{{ path('dur_platform_home', {'page': p}) }}">{{ p }}</a>
    		</li>
  		{% endfor %}
	</ul>

{% endblock %}