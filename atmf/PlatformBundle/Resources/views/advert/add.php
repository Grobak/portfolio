{# src/Dur/PlatformBundle/Resources/views/Advert/add.php.twig #}

{% extends "DurPlatformBundle::layout.php.twig" %}


{% block title %}
	Ajouter un article
{% endblock %}        	

{% block durplatform_body %}

	{% if is_granted('ROLE_AUTEUR') %}
		<h2>Nouvel article</h2>
		<p>
			Remplissez le formulaire puis confirmez pour ajouter un article.
			{{ include("DurPlatformBundle:Advert:form.php.twig") }}
		</p>
	{% else %}
		<h3>Vous n'avez pas les droits nécessaires pour accéder à cette page</h3>
	{% endif %}
{% endblock %}

