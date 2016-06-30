<?php get_header(); ?>

  <section class="featured-image" id="section-featured">
    <?php get_template_part('partials/home-featured-slider'); ?>
  </section>
  <!-- ./featuted-image --> 
  <section class="bg-white section " id="section-environment">
    <div class="title text-center">
      <h2><?php echo_safe(get_post_meta( get_the_ID(), HOMEPAGE_MB_TITLE_CATEGORIES, true )); ?></h2>
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
  <?php 
  if(get_option('socialfeed_active')){
  ?>
  <section class="section clearfix" id="section-social">
    <?php get_template_part('partials/grid-social'); ?>
  </section>
  <?php
	}
	?>
  <!-- #/section-stream -->

  <!-- <section class="bg-blue section "id="section-products">
  	<h3 class="white semibold text-center m-b-md">
			  Encontrá el producto indicado para tu necesidad -->
			    <!-- <span class="fontX35"><?php echo_safe($total_products); ?></span> -->
			  
			<!-- </h3>
    <div class="title text-center with-filters">

      <h2 class="clearfix text-center">
        <span class="label-filter"><?php echo_safe(get_option('page_home_products_title')); ?></span>
        <span class="filter-category-prod">
        <?php get_filter_product_types_form(); ?>
      	</span>
      </h2>

    </div>
    <div class="container-products">
      <?php display_grid_products(); ?>
    </div>
    <div class="text-center btn-more">
      <a href="<?php link_to('productos'); ?>">
        <span class="icon iconX2 plus-icon"></span>
      </a>
    </div>
  </section> -->
  <!-- #/section-products -->

<?php get_footer(); ?>
