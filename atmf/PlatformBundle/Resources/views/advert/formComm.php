{# src/Dur/PlatformBundle/Resources/views/Advert/form.php.twig #}

{% block head %}
  <script type="text/javascript" src="http://localhost/Symfony/web/ckeditor/ckeditor.js"></script>
{% endblock %}

<div class="well">
  	{{ form_start(form, {'attr': {'class': 'form-horizontal'}}) }}

    {# Les erreurs générales du formulaire. #}
    {{ form_errors(form) }}

    {# Idem pour un autre champ. #}
    <div class="form-group">
    <b>Commentaire</b>
        {{ form_label(form.content, " ", {'label_attr': {'class': 'col-sm-3  control-label'}}) }}
        {{ form_errors(form.content) }}
          {{ form_widget(form.content, {'attr': {'class': 'form-control'}}) }}
    </div>

    <div class="form-group">
        {{ form_label(form.date, " ", {'label_attr': {'class': 'col-sm-3  control-label'}}) }}
        {{ form_errors(form.date) }}
    </div>
	
  	{# Pour le bouton, pas de label ni d'erreur, on affiche juste le widget #}
  	{{ form_widget(form.save, {'attr': {'class': 'btn btn-primary'}}) }}
	
  	{# Génération automatique des champs pas encore écrits.
  	   Dans cet exemple, ce serait le champ CSRF (géré automatiquement par Symfony !)
  	   et tous les champs cachés (type « hidden »). #}
  	{{ form_rest(form) }}
  	
  	{# Fermeture de la balise <form> du formulaire HTML #}
  	{{ form_end(form) }}
</div>

{% block javascripts %}
<script type="text/javascript">
  CKEDITOR.replace( 'dur_platformbundle_application[content]' );
</script>
{% endblock %}