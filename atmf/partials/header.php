
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="http://getbootstrap.com/examples/theme/theme.css">
      <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">


      <title>ATMF Sens</title>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ATMF Sens</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <?php if(!empty($_SESSION['Auth'])) { ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bonjour <?php echo $_SESSION['Auth']->name; ?> ! <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="NavigationItem-link" href="http://coryle-carreras.fr/atmf/user/panel.php">Profil</a></li>

                <li role="separator" class="divider"></li>

                <li><a class="NavigationItem-link" href="http://coryle-carreras.fr/atmf/logout.php">Déconnexion</a></li>
              </ul>
            </li>
          <?php } else { ?>
              <li><a href="http://coryle-carreras.fr/atmf/login.php">Connexion</a></li>

              <li><a href="http://coryle-carreras.fr/atmf/register.php">Inscription</a></li>

          <?php } ?>

            <li class="active"><a href="http://coryle-carreras.fr/atmf/index.php">Accueil</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li><a href="{{ path('search') }}">Accéder à un article</a></li>
            <li><a href="#about">À propos</a></li>
            
          </ul>
        </div>
      </div>
    </nav>   
    <div class="row">
      <div class="col-sm-2">
        <?php require 'menu.php' ; ?>
      </div>
      <div class="col-sm-8">
        <div class="container">
          <div id="header" class="jumbotron"> 
          <br>
            <img src="http://www.atmf.org/wp-content/uploads/2015/12/CaptureLogo-300x130.png"><h1>ATMF - Sens</h1>
            <p> 
            <ul>
                L’Association des Travailleurs Maghrébins de France est une association loi 1901,  créée en 1961 par Medhi Ben Barka, après plusieurs phases successives (voir rubrique la Charte de l’ATMF).<br><br>
  
            Née des mouvements de la gauche marocaine, son histoire fait d’elle une association pionnière dans la défense des droits des migrants marocains d’abord, puis progressivement des droits des migrants avec et sans-papiers venus du monde entier. Depuis plus de cinquante ans, elle les défend, à travers ses actions de soutien sur le terrain, et de mobilisation politique.<br><br>
  
            Association laïque par excellence elle s'inscrit résolument dans la défense des droits humains. L'association est aussi engagée dans la lutte contre le racisme, la xénophobie et l'antisémitisme. Son statut lui permet de se porter partie civile pour tout acte avéré de racisme ou d'antisémitisme.<br><br>
  
            L'association c'est aussi des activités culturelles chaque année avec l'organisation d'une quinzaine culturelle en partenariat avec la MJC, des ateliers d'éveil pour les enfants, un atelier femmes citoyennes, médiation entre familles et écoles et accueil du public en grande difficulté pour l'aider et l'orienter vers des institutions specialisées.<br>
                      
            </ul>
            </p>
          </div> 
        </div>
      </div>
    </div>
      
    <body>
      <?php flash(); ?>