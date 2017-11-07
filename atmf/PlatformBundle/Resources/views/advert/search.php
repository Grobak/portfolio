{% extends "YCRYcrBundle::layout.html.twig" %}

{% block content %}

<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="utf-8" />
        <title>Rechercher une annonce</title>

        <link href="stylesheets/style.css" rel="stylesheet" type="text/css" />
		<link href="stylesheets/colour.css" rel="stylesheet" type="text/css" />
    </head>
        <body onload="b = setInterval('clear()', 0);">

            <div class="topDiv">
                <!--<H2>Search for a Job</H2>--> 
                <div class="searchform">
    <form id="formsearch" name="p" method="get" action="index.php">
          <span>

          <input name="Search_term" class="editbox_search" id="editbox_search"          maxlength="80" value="<?php $this; ?>" type="text" />
          </span>
              <input type="image" name="button_search" src="images/search.gif"     class="button_search" alt="" />
        </form>
                <br/>          
                <div id="search_results">

                </div>
            </div>

            <!-- </div>-->

            <script type="text/javascript" src="http://code.jquery.com/jquery-    1.7.2.min.js"></script><!--javascript jquery library-->
            <script type="text/javascript" src="../View/scripts/Script.js"></script>         


{% endblock %}