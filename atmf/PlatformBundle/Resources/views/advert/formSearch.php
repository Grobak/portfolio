<div class="well research_form">

	<h3>Formulaire de recherche d'annonce</h3>

	<form method="post" {{ form_enctype(form) }}>

		{{ form_widget(form) }}

		<input type="submit" class="btn btn-primary" />

	</form>
</div>