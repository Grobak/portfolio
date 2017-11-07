 <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ path('dur_platform_home') }}">ATMF SENS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <?php if(0) { ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bonjour {{ app.user.username }} !<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="NavigationItem-link" href="{{ path('fos_user_profile_show') }}">Profil</a></li>

                <li role="separator" class="divider"></li>

                <li><a class="NavigationItem-link" href="{{ path('fos_user_security_logout') }}">Déconnexion</a></li>
              </ul>
            </li>
          <?php } else { ?>
              <li><a href="{{ path('fos_user_security_login') }}">Connexion</a></li>

              <li><a href="{{ path('fos_user_registration_register') }}">Inscription</a></li>

          <?php } ?>

            <li class="active"><a href="{{ path('home') }}">Accueil</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catégories <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li><a href="{{ path('search') }}">Accéder à un article</a></li>
            <li><a href="#about">À propos</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>