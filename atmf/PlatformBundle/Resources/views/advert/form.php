{# src/Dur/PlatformBundle/Resources/views/Advert/form.php.twig #}

{% block head %}
  <script type="text/javascript" src="http://localhost/Symfony/web/ckeditor/ckeditor.js"></script>
{% endblock %}

<div class="well">
  	{{ form_start(form, {'attr': {'class': 'form-horizontal'}}) }}

    {# Les erreurs générales du formulaire. #}
    {{ form_errors(form) }}

    <div class="form-group">
      	{# Génération du label. #}
      	{{ form_label(form.title, "Titre de l'article", {'label_attr': {'class': 'col-sm-3 control-label'}}) }}

      	{# Affichage des erreurs pour ce champ précis. #}
      	{{ form_errors(form.title) }}

      	<div class="col-sm-4">
        	{# Génération de l'input. #}
        	{{ form_widget(form.title, {'attr': {'class': 'form-control'}}) }}
      	</div>
    </div>

    {# Idem pour un autre champ. #}
    <div class="form-group">
    <b>Contenu de l'article</b>
        {{ form_label(form.content, " ", {'label_attr': {'class': 'col-sm-3  control-label'}}) }}
        {{ form_errors(form.content) }}
          {{ form_widget(form.content, {'attr': {'class': 'form-control'}}) }}
    </div>

    <div class="form-group">
        {{ form_label(form.image.file, "Image d'illustration", {'label_attr': {'class': 'col-sm-3  control-label'}}) }}
        {{ form_errors(form.image) }}
        <div class="col-sm-4">
          {{ form_widget(form.image.file, {'attr': {'class': 'form-control'}}) }}
        </div>
    </div>

  	{# Génération du label + error + widget pour un champ #}


	   {#  {{ form_row(form.date) }} #}

    <div class="form-group">
      {# Génération du label. #}
      {{ form_label(form.date, "Date de publication", {'label_attr': {'class': 'col-sm-3 control-label'}}) }}

        <div class="col-sm-4">
          {# Génération de l'input. #}
          {{ form_widget(form.date, {'attr': {'class': 'form-control'}}) }}
        </div>
    </div>

  	{# {{ form_row(form.published) }} #}

    <div class="form-group">
      {# Génération du label. #}
      {{ form_label(form.published, "Afficher l'article", {'label_attr': {'class': 'col-sm-3 control-label'}}) }}

        <div class="col-sm-4">
          {# Génération de l'input. #}
          {{ form_widget(form.published, {'attr': {'class': 'form-control'}}) }}
        </div>
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
  CKEDITOR.replace( 'dur_platformbundle_advert[content]' );
</script>
{% endblock %}