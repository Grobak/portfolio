{# src/Dur/PlatformBundle/Resources/views/advert/view.php.twig #}

{% extends "DurPlatformBundle::layout.php.twig" %}

{% block title %}

  Lecture d'une annonce - {{ parent() }}

{% endblock %}



{% block durplatform_body %}

	<h2>
		{{ article.title }}
	</h2>
	{# On vérifie qu'une image soit bien associée à l'annonce #}
	{% if article.image is not null %}
  		<img src="{{ article.image.getUploadDir }}/{{ article.image.url }}" alt="{{ article.image.alt }}" height=200>
	{% endif %}<br>
	<i>
		Le {{ article.date|date('d/m/Y') }}
	</i>

	<div class="well">
		{{ article.content|raw }}
	</div>
	
	<p>
		<a href="{{ path('dur_platform_home') }}" class="btn btn-default">
			<i class="glyphicon glyphicon-chevron-left"></i>
			Retour à la liste
		</a>

		{# <a href="{{ path('dur_platform_add_comm', {'id': article.id}) }}" class="btn btn-default">
					<i class="glyphicon glyphicon-edit"></i>
					Commenter l'annonce
		</a> #}
		{% if is_granted('ROLE_AUTEUR') %}
				<a href="{{ path('dur_platform_edit', {'id': article.id}) }}" class="btn btn-default">
					<i class="glyphicon glyphicon-edit"></i>
					Modifier l'annonce
				</a>
				<a href="{{ path('dur_platform_delete', {'id': article.id}) }}" class="btn btn-danger">
					<i class="glyphicon glyphicon-trash"></i>
					Supprimer l'annonce
				</a>
		{% endif %}

		{# On vérifie qu'un commentaire est bien associée à l'annonce #}
		{% if listCommentaires is not empty %}
		<hr>
			<h4>
				Commentaires à  propos de cet article :
			</h4>
			{% for commentaire in listCommentaires %}
		  		<i>Par {{ commentaire.author }}, le {{ commentaire.date|date('d/m/Y') }}</i>
		  		<div class="well">
					{{ commentaire.content|raw }}
				</div>
			{% endfor %}
		{% endif %}
	</p>

{% endblock %}