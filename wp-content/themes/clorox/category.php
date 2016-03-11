<?php get_header(); ?>
	<section class="bg-blue section "id="section-products">
	  <div class="container-fluid title text-center with-filters">
	    <h2 class="clearfix">
	      <div class="col-md-5 text-right label-filter">Necesito un producto para</div>
	      <div class="col-md-3 text-left"><?php get_filter_product_types_form(); ?></div>
	      <div id="filter-type-prod-label" class="col-md-1 text-center label-filter">mi</div>
	      <div id="filter-type-prod" class="col-md-2 text-left"><?php get_filter_product_categories_form(); ?></div>
	    </h2>
	  </div>
	  <div class="container-products">
	    <?php display_grid_products(15); ?>
	  </div>
	</section>
<?php get_footer(); ?>
