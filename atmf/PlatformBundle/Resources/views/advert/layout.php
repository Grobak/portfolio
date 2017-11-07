{# src/Dur/PlatformBundle/Resources/views/layout.php.twig #}

{% extends "::layout.php.twig" %}

{% block title %}
  Annonces - {{ parent() }}
{% endblock %}

{% block body %}

  {# On définit un sous-titre commun à toutes les pages du bundle, par exemple #}
  <h1>Annonces</h1>

  <hr>

  {# On définit un nouveau bloc, que les vues du bundle pourront remplir #}
  {% block durplatform_body %}
  {% endblock %}

{% endblock %}