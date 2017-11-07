<?php

	$auth = 0 ; 
	include 'lib/includes.php'; 
    include 'lib/image.php';

	$nom= "Carreras" ;		
	$prenom= "Coryle";	

	ob_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>'Mon CV'</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CV de Coryle Carreras">
    <meta name="author" content="">

    <!-- Le styles -->
	<link href="<?= WEBROOT; ?>css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="<?= WEBROOT; ?>css/bootstrap-responsive.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/grid/grid.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/jumbotron/jumbotron.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/theme/theme.css" rel="stylesheet">
    <link href="http://getbootstrap.com/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/examples/theme/theme.css" rel="stylesheet">

    <style type="text/css">
      table{border-collapse:collapse;width:100%; font-size:12pt; font-family:helvetica; line-height:6mm;}
      strong{color:#000;}
      em{font-size:9pt; color:#000;}
      i{font-size:8pt; color:#717375;}
      table.edge1{border:1px; color:#727;}
      table.edge2{border:1px; color:#272;}
      table.edge3{border:1px; color:#277;}
      td.right{text-align:right;}
      td.left{text-align:left;}
      td.justify{text-align:justify; font-style:italic;}
      div.bg{background-color:#28A569;}
      hr.straight{background:#717375; height:2px; border:none; margin-bottom:40mm;}
      h2{text-align: center;}
    </style>

<body>

 	<table class="" style="vertical-align:bottom;">
 		<tr>
 			<td class="left" style="width:50%;">
 				<h1>Coryle Carreras</h1>
				<h3>Développeur web</h3>
				Persévérant et désireux d'apprendre de nouvelles choses,
				je m'adapte pour répondre aux besoins demandés.<br>
			</td>
			<td class="right" style="width:50%;">
				3a Rue Louise Michel<br>
				91350 Grigny<br>
				<a href="mailto:c-carreras@hotmail.fr">c-carreras@hotmail.fr</a><br>
				06.09.83.28.25<br>
			</td>
		</tr>
 		<tr>
			<td>
				&nbsp;
			</td>
		</tr>
	</table>
	<h2>Expérience</h2>
	<table class="">
        <tr>
            <td style="width: 50%; text-align: left">
                <h4>Création de site web web - <br><a href="sculptures-ugo-guttadoro.fr">sculptures-ugo-guttadoro.fr</a></h4>
            </td>
            <td style="width: 50%; text-align: right">
                <h4>Création d'un portfolio - <br><a href="coryle-carreras.fr">coryle-carreras.fr</a></h4>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left">
                <h4>Création de site web web - <br><a href="ugoguttadoro.wordpress.com">ugoguttadoro.wordpress.com</a></h4>
            </td>
            <td style="width: 50%; text-align: right">
                <h4>Création de site web web - <br><a href="atmf-sens.fr">atmf-sens.fr</a></h4>
            </td>
        </tr>
        <tr>
            <td style="width: 50%; text-align: left">
                <h4>BTS - Projet informatique</h4>
            </td>
            <td style="width: 50%; text-align: right">
                <h4>BTS - Stage en entreprise - site intranet</h4>
            </td>
        </tr>
	</table><hr><br>
	<h2>Formations</h2>
	<table class="">
        <tr>
            <td style="width: 50%; text-align: left">
				BTS IRIS<br>
				Septembre 2013 - Juin 2015<br>
				Lycée Catherine et Raymond Janot, Sens<br>
            </td>
            <td style="width: 50%; text-align: right">
				Bac STIDD option SIN<br>
				Septembre 2010 - Juin 2013 <br>
				Lycée Catherine et Raymond Janot, Sens<br>
            </td>
        </tr>
	</table>
	<br><br>
	<h2>Compétences</h2>
	<table style="margin-top:20px; vertical-align:bottom;">
		<thead>
			<tr>
				<th style="width:50%">Compétences</th>
				<th style="width:50%">Niveau</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="width:50%">Php</td>
				<td class="justify" 	style="width:50%">Avancé</td>
			</tr>
			<tr>
				<td style="width:50%">Html et Css</td>
				<td class="justify" style="width:50%">Bon</td>
			</tr>
			<tr>
				<td style="width:50%">Gestion de BDD</td>
				<td class="justify" style="width:50%">Bon</td>
			</tr>
			<tr>
				<td style="width:50%">Javascript</td>
				<td class="justify" style="width:50%">Moyen</td>
			</tr>
		</tbody>
	</table><br><br>
	<h2>Langues</h2>
	<table class="" style="margin-top:20px; vertical-align:bottom;">
		<thead>
			<tr>
				<th style="width:50%">Langues</th>
				<th style="width:50%">Utilisation</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="width:50%">Anglais</td>
				<td class="justify" style="width:50%">Couramment</td>
			</tr>
			<tr>
				<td style="width:50%">Français</td>
				<td class="justify" style="width:50%">Langue maternelle</td>
			</tr>
		</tbody>
	</table>

</body>
<?php 
    //die($content);
    $content = ob_get_clean();

    // convert to PDF
    require_once('html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('test.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }