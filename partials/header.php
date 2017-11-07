<head>
<style type="text/css"> .gm-style .gm-style-mtc label, .gm-style .gm-style-mtc div{font-weight:400}</style><link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"><style type="text/css">.gm-style .gm-style-cc span, .gm-style .gm-style-cc a,.gm-style .gm-style-mtc div{font-size:10px}</style><style type="text/css"> @media print { .gm-style .gmnoprint, .gmnoprint {    display:none  }} @media screen {  .gm-style .gmnoscreen, .gmnoscreen { display:none  }}</style><style type="text/css">.gm-style-pbc{transition:opacity ease-in-out;background-color:rgba(0,0,0,0.45);text-align:center}.gm-style-pbt{font-size:22px;color:white;font-family:Roboto,Arial,sans-serif;position:relative;margin:0;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}</style>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 
    
    <!-- Chargement des fichiers CSS -->  
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="/assets/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/colorbox.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/superlist.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/styles.css" rel="stylesheet">    



---------------------




<!DOCTYPE html>
<html lang="en">
  <head>
  <style type="text/css"> .gm-style .gm-style-mtc label, .gm-style .gm-style-mtc div{font-weight:400}</style><link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"><style type="text/css">.gm-style .gm-style-cc span, .gm-style .gm-style-cc a,.gm-style .gm-style-mtc div{font-size:10px}</style><style type="text/css"> @media print { .gm-style .gmnoprint, .gmnoprint {    display:none  }} @media screen {  .gm-style .gmnoscreen, .gmnoscreen { display:none  }}</style><style type="text/css">.gm-style-pbc{transition:opacity ease-in-out;background-color:rgba(0,0,0,0.45);text-align:center}.gm-style-pbt{font-size:22px;color:white;font-family:Roboto,Arial,sans-serif;position:relative;margin:0;top:50%;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}</style>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 
    <title><?= isset($title) ? $title : 'Mon portfolio' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio de Coryle Carreras">
    <meta name="author" content="">

    <!-- Fichiers CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="/assets/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/colorbox.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/superlist.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/styles.css" rel="stylesheet">
    
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