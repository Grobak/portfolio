{# src/OC/PlatformBundle/Resources/views/Advert/delete.php.twig #}

{% extends "DurPlatformBundle::layout.php.twig" %}

{% block title %}
  Supprimer une annonce - {{ parent() }}
{% endblock %}

{% block durplatform_body %}


  {% if is_granted('ROLE_AUTEUR') %}
  <h2>Supprimer une annonce</h2>
  <p>
    Etes-vous certain de vouloir supprimer l'annonce "{{ article.title }}" ?
  </p>

  {# On met l'id de l'annonce dans la route de l'action du formulaire #}
  <form action="{{ path('dur_platform_delete', {'id': article.id}) }}" method="post">
    <a href="{{ path('dur_platform_view', {'id': article.id}) }}" class="btn btn-default">
      <i class="glyphicon glyphicon-chevron-left"></i>
      Retour à l'annonce
    </a>
    {# Ici j'ai écrit le bouton de soumission à la main #}
    <input type="submit" value="Supprimer" class="btn btn-danger" />
    {# Ceci va générer le champ CSRF #}
    {{ form_rest(form) }}
  </form>
  {% else %}
    <h2>Vous n'avez pas les droits nécessaires pour accéder à cette page</h2>
  {% endif %}

{% endblock %}