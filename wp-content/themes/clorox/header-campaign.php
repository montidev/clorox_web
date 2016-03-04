<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('title'); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,200,200italic,300italic,400italic,600,600italic,700,700italic,900' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> id="campaign">

    <header>
      <nav class="navbar navbar-fixed-top navbar-default navbar-custom border-x2-top border-blue navbar-campaign">
        <div class="container-fluid">
          <div class="navbar-header">
            
            <a class="navbar-brand" href="<?php echo_safe(site_url()); ?>">
              <img class="img-responsive responsive-img" alt="Brand" src="<?php get_logo_uri(); ?>">
            </a>
          </div>
          <!-- ./navbar-header -->
          
          <!-- ./navbar-collapse -->
        </div>
        <!-- ./container-fluid -->
      </nav>
    </header>

    <main id="main-wrapper">
