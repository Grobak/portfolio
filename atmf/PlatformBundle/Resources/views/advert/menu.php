{# src/Dur/PlatformBundle/Resources/views/advert/menu.php.twig #}

{# Ce template n'hérite de personne, tout comme le template inclus avec {{ include() }}. #}

<ul class="nav nav-pills nav-stacked">
  {% for article in listArticles %}
    <li>
      <a href="{{ path('dur_platform_view', {'id': article.id}) }}">
        {{ article.title }}
      </a>
    </li>
  {% endfor %}
</ul>