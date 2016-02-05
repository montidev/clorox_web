<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php bloginfo('title'); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,200,200italic,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <header>
      <nav class="navbar navbar-fixed-top navbar-default navbar-custom border-x2-top border-blue">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-top-collapse" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo_safe(site_url()); ?>">
              <img class="img-responsive responsive-img" alt="Brand" src="<?php get_logo_uri(); ?>">
            </a>
          </div>
          <!-- ./navbar-header -->
          <div class="collapse navbar-collapse" id="nav-top-collapse">
            <?php display_social_networks(); ?>
            <?php display_primary_menu('nav navbar-nav navbar-right'); ?>
          </div>
          <!-- ./navbar-collapse -->
        </div>
        <!-- ./container-fluid -->
      </nav>
    </header>

    <main id="main-wrapper">
