<?php get_header(); ?>

  <section class="featured-image" id="section-featured">
    <?php get_template_part('partials/home-featured-slider'); ?>
  </section>
  <!-- ./featuted-image -->

  <section class="bg-white section " id="section-environment">
    <div class="title text-center">
      <h2>¿Qué ambiente <strong>me necesita</strong>?</h2>
    </div>
    <?php get_template_part('partials/grid', 'categories'); ?>
  </section>
  <!-- #/section-environment -->

  <section class="bg-green section " id="section-tips">
    <div class="title text-center">
      <h2>Todo para el <strong>control de tu casa</strong></h2>
    </div>
    <?php get_template_part('partials/grid', 'tips'); ?>
    <div class="text-center btn-more">
      <a href="<?php link_to('tips'); ?>">
        <span class="icon iconX2 plus-icon"></span>
      </a>
    </div>
  </section>
  <!-- #/section-control -->

  <section class="section clearfix" id="section-social">
    <?php get_template_part('partials/grid-social'); ?>
  </section>
  <!-- #/section-stream -->

  <section class="bg-blue section "id="section-products">
    <div class="title text-center with-filters">
      <h2 class="clearfix">
        <div class="col-md-7 text-right label-filter">Necesito un producto para</div>
        <div class="pull-left text-left"><?php get_filter_product_types_form(); ?></div>
      </h2>
    </div>
    <div class="container-products">
      <?php display_grid_products(); ?>
    </div>
    <div class="text-center btn-more">
      <a href="<?php link_to('products'); ?>">
        <span class="icon iconX2 plus-icon"></span>
      </a>
    </div>
  </section>
  <!-- #/section-products -->

<?php get_footer(); ?>
