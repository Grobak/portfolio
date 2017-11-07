{# src/Dur/PlatformBundle/Resources/views/Advert/addComm.php.twig #}

{% extends "DurPlatformBundle::layout.php.twig" %}


{% block title %}
	Ajouter un commentaire
{% endblock %}        	

{% block durplatform_body %}

	{% if is_granted("IS_AUTHENTICATED_REMEMBERED") %}
		<h2>Ecrire un commentaire</h2>
		<p>
			Ecrivez votre commentaire puis confirmez pour ajouter un commentaire.
			{{ include("DurPlatformBundle:Advert:formComm.php.twig") }}
		</p>
	{% else %}
		<p>Vous devez être connecté pour écrire un commentaire : <a href="{{ path('fos_user_security_login') }}">Connexion</a>
    		-
		    <a href="{{ path('fos_user_registration_register') }}">Inscription</a></p>
	{% endif %}
{% endblock %}

