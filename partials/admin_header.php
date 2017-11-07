
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Administration</title>
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

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body role="document">

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Mon Portfolio : administration</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="<?php echo WEBROOT.'admin';?>">Accueil</a>
            </li>
            <li>
              <a href="<?php echo WEBROOT.'admin/category.php';?>">Catégories</a>
            </li>
            <li>
              <a href="<?php echo WEBROOT.'admin/work.php';?>">Réalisations</a>
            </li>
            <li>
              <a href="<?php echo WEBROOT.'logout.php';?>">Déconnexion</a>
            </li>
          </ul>
          <form method="get" action="search.php" class="navbar-form navbar-right">
              <div class="form-group">
                <?php echo input('search') ; ?>
              </div>
            <button type="submit" class="btn btn-success">Chercher</button>
          </form>
        </div>
      </div>
    </nav


    <div class="container">

      <?php 
          echo flash() ; 
      ?>