<?php get_header(); ?>

	<section class="bg-blue section "id="section-products">
		<h3 class="white semibold text-center m-b-md">
  			Encontrá el producto indicado para tu necesidad		  
		</h3>
	  	<div class="container-fluid title text-center with-filters filters-new">
	    	<h2 class="clearfix">
	      		<div class="col-md-5 text-right label-filter"><?php echo_safe(get_option('page_products_title')); ?></div>
	      		<div class="col-md-3 text-left filter-category-prod <?php if(!is_home() && !is_category()) { echo 'disable'; } ?>"><?php get_filter_product_types_grid_form(); ?></div>
	      		<div id="filter-type-prod-label" class="col-md-1 text-center label-filter <?php if(!is_home() && !is_category()) { 	echo 'disable'; } ?>">mi</div>
	      		<div id="filter-type-prod" class="col-md-2 text-left filter-type-prod <?php if(!is_home() && !is_category()) { echo 'disable'; } ?>">	<?php get_filter_product_categories_form(); ?></div>
	    	</h2>
	  	</div>
    	<div class="container-fluid title text-center with-filters filters-new hidden class-text-filter">
      	<h2 class="clearfix">
        		<div class="col-md-5 text-right label-filter"><?php echo_safe(get_option('page_products_subtitle')); ?></div>
        		<div class="col-md-3 text-left filter-class-prod <?php if(!is_home() && !is_category()) { echo 'disable'; } ?>"><?php get_filter_product_class_grid_form(); ?></div>
      	</h2>
    	</div>
	  	<?php 
    		$cat = safe_GET('category');	
    		$class = safe_GET('class');
        $type = safe_GET('product_type');
    		if (!$cat) :
    	?>
    		<div class="title text-center class-title" id="p1">
    			<h3 class="white semibold text-center m-b-md product-class-title">
  					También podes buscar por tipo de producto:	  
				  </h3>
             
    		</div>

        <div class="row class-filter">
          <?php get_products_classes(); ?>
        </div>
    	<?php endif ; ?>

        <div class="container-products">
          <?php if ( $cat || $class || $type): ?>
  	    	  <?php display_grid_products(); ?>
            <div class="text-center btn-more">
              <a class="paginate-ajax"
                  href="<?php link_next_pagination(); ?>"
                  data-container-append=".boxes"
                  data-target=".product">
                  <span class="icon iconX2 plus-icon"></span>
              </a>
            </div>
          <?php endif; ?>
        </div>
    	
	</section>
<?php get_footer(); ?>
