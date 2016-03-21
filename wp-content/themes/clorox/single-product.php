<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <section class="bg-blue section" id="section-product">
    <div class="pull-left previous-history upper light">
      <?php link_to_back(); ?>
    </div>
    <article class="container850">
      <div class="clearfix">
      	<div class="row">
	      	<div class="col-xs-12 md-hide">
	      		<h2 class="title white"><?php echo_safe( get_product_type(get_the_ID()) ); ?></h2>
	            <h1 class="title white"><?php the_title(); ?></h1>
	      	</div>
	      </div>
        <div class="col-md-5">
          <div class="row">
            <div class="bg-image featured-image border-x4-bottom border-blue" style="background-image: url(<?php get_featured_image_uri(get_the_ID()); ?>)"></div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="row">
            <h1 class="title white xs-hide"><?php the_title(); ?></h1>
            <div class="detail">
            	<?php the_content(); ?>
            </div>
            <div class="categories-container">
              <?php display_categories_of(get_the_ID()); ?>
            </div>
            
            <div class="dropdown pull-left">
            	<button type="button" class="btn btn-default btn-lg btn-clorox"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              <i class="icon icon-share"></i>
	              <span>Compartir</span>
	            </button>			        
			        <ul class="dropdown-menu" aria-labelledby="dLabel">
			        	<li class="text-center"><?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { 
								    ADDTOANY_SHARE_SAVE_KIT( array( 'use_current_page' => true ) );
								} ?>
								</li>					        
  						</ul>				
		  			</div>
          </div>
        </div>
      </div>
    </article>
  </section>
  <?php 
  	$haschar = has_characteristics(get_the_ID()); 
  	$hasvid = has_video(get_the_ID());
  ?>
  <?php if($hasvid || $haschar) { ?>
  <section class="bg-white section" id="section-characteristics">
  	<?php if($haschar) { ?>
    <article class="top-overlaped bg-white clearfix">
      <h2 class="title blue text-center">Características</h2>
      <div class="col-md-12 characteristics">
        <?php display_characteristics(get_the_ID()); ?>
      </div>
    </article>
    <?php } ?>

    <?php if($hasvid) { ?>
    <article class="how-to-use clearfix">
      <h2 class="title blue text-center">Como se usa</h2>
      <div class="col-md-12 videoContainer">
        <?php display_product_video(get_the_ID()); ?>
      </div>
    </article>

    <?php } ?>
  </section>
  <?php } ?>
  <section class="bg-blue section" id="section-relateds">
    <article class="clearfix">
      <h2 class="title white text-center">
      	<?php if(check_and_get_related(get_the_ID())){ ?> 
      		Productos Relacionados 
      	<?php } else {?>  
      		Productos que te pueden servir 
      	<?php } ?>
      </h2>
      <div class="container-products">
        <?php display_related_products(get_the_ID()); ?>
      </div>
    </article>
  </section>
<?php endwhile; ?>

<?php get_footer(); ?>
