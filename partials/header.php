
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : 'Mon portfolio' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio de Coryle Carreras">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="../css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="../galeries/style.css" rel="stylesheet"> 
    <link type="text/css" href="../js/zoombox/zoombox.css" rel="stylesheet" media="screen" />
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/zoombox/zoombox.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
           jQuery(function($){
               //$('a.zoombox').zoombox();
               
               //Or You can also use specific options
               $('a.zoombox').zoombox({
                   theme       : 'zoombox',        //available themes : zoombox,lightbox, prettyphoto, darkprettyphoto, simple
                   opacity     : 0.8,              // Black overlay opacity
                   duration    : 800,              // Animation duration
                   animation   : true,             // Do we have to animate the box ?
                   width       : 600,              // Default width
                   height      : 400,              // Default height
                   gallery     : true,             // Allow gallery thumb view
                   autoplay : false                // Autoplay for video
               });
               
           });
    </script>

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
          <a class="navbar-brand" href="#">Mon portfolio</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="<?php echo WEBROOT."index.php" ;?>">Accueil</a>
            </li>
            <li>
              <a href="<?php echo WEBROOT."cv.php" ;?>" target="_blank">Mon CV</a>
            </li>
            <li>
              <a href="<?php echo WEBROOT."contact.php" ;?>">Me contacter</a>
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
    </nav>

    
    <div class="container">

      <?php 
          echo flash() ; 
      ?>