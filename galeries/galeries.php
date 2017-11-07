<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Liste des exemples de galeries d'image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio de Coryle Carreras">
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

  </head>
<body>

<div class="container">

<h1>La liste des exemples disponibles :</h1>

<h2>Les exemples ne sont qu'à titre indicatif, les liens ne fonctionnent pas.
    <br>Pour essayer le résultat final, il faut aller sur le site de l'original.
</h2>


<table>
    <thead>
        <tr>
            <th style="width:30%">Thème utilisé</th>
            <th style="width:30%">Exemple</th>
            <th style="width:40%">Original</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:30%">Ismail Yildirim</td>
            <td style="width:30%"><a href="galerie1.php">Exemple</a></td>
            <td style="width:40%"><a href="http://www.ismail-yildirim.com/peintures.php">Original</a></td>
        </tr>
        <tr>
            <td style="width:30%">Thème "Zoombox"</td>
            <td style="width:30%"><a href="galerie2.php">Exemple</a></td>
            <td style="width:40%">Je n'ai pas d'original pour cette galerie car je l'ai créé à partir d'un tutoriel (<a href="https://www.youtube.com/watch?v=UDYOlFgtF0o">La vidéo</a>)</td>
        </tr>
    </tbody>
</table>

</div> <!-- /container -->

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://getbootstrap.com/assets/js/vendor/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script src="http://getbootstrap.com/assets/js/docs.min.js"></script>
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
    

    <script src=<?php echo WEBROOT."js/jquery.js"; ?> ></script>
  </body>
</html>
