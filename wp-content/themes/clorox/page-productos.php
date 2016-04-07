<?php get_header(); ?>

	<section class="bg-blue section "id="section-products">
		<h3 class="white semibold text-center m-b-md">
  			Encontrá el producto indicado para tu necesidad
		    <!-- <span class="fontX35"><?php echo_safe($total_products); ?></span> -->
		  
			</h3>
	  <div class="container-fluid title text-center with-filters filters-new">
	    <h2 class="clearfix">
	      <div class="col-md-5 text-right label-filter"><?php echo_safe(get_option('page_products_title')); ?></div>
	      <div class="col-md-3 text-left filter-category-prod <?php if(!is_home() && !is_category()) { echo 'disable'; } ?>"><?php get_filter_product_types_grid_form(); ?></div>
	      <div id="filter-type-prod-label" class="col-md-1 text-center label-filter <?php if(!is_home() && !is_category()) { echo 'disable'; } ?>">mi</div>
	      <div id="filter-type-prod" class="col-md-2 text-left <?php if(!is_home() && !is_category()) { echo 'disable'; } ?>"><?php get_filter_product_categories_form(); ?></div>
	    </h2>
	  </div>
	  <div class="container-products">
	  	
	    <?php display_grid_products(-1); ?>
	  </div>
	</section>
<?php get_footer(); ?>
