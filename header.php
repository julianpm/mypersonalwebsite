<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php // Load our CSS ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header>
  <div class="container">

    <nav class="mainNav flex">      
        
        <ul class="mainMenu flex">
          
          <?php wp_nav_menu( array( "theme_location" => "primary", "container" => '', 'items_wrap'=> '%3$s' ) ); ?>
        
        </ul><!-- .menu -->

    </nav> <!-- END OF MAINNAV -->


  </div> <!-- /.container -->
</header><!--/.header-->

