{# src/Dur/PlatformBundle/Resources/views/Advert/edit.php.twig #}

{% extends "DurPlatformBundle::layout.php.twig" %}

{% block title %}
	Modifier l'annonce - {{ parent() }}
{% endblock %}

{% block durplatform_body %}

  {% if is_granted('ROLE_AUTEUR') %}

    <h2>Modifier un article</h2>

    {{ include("DurPlatformBundle:Advert:formEdit.php.twig") }}

    <p>
      Vous éditez un article déjà existant, merci de ne pas changer
      l'esprit générale de l'article déjà publié.
    </p>

    <p>
      <a href="{{ path('dur_platform_view', {'id': id}) }}" 
        class="btn btn-default">
        <i class="glyphicon glyphicon-chevron-left"></i>
          Retour à l'article
      </a>
    </p>
  {% else %}
    <h3>Vous n'avez pas les droits nécessaires pour accéder à cette page</h3>
  {% endif %}
  
{% endblock %}