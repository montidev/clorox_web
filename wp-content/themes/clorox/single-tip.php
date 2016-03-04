<?php get_header();?>

<?php while ( have_posts() ) : the_post(); ?>
	<section class="bg-green section " id="section-tip">
		<div class="container850">
			<div class="pull-left previous-history upper light m-b-md">
	      <?php link_to_back(); ?>
	    </div>
	  </div>

	  <article class="container850 bottom-overlaped bg-white clearfix">
	 		<div class="clearfix">
      	<div class="videoContainer videoBlueBorder">
        	<?php display_tip_video(get_the_ID()); ?>
      	</div>
	      <div class="col-md-12">
	      	<div class="detailContainer">
		        <h1 class="title"><?php the_title(); ?></h1>
		        <div class="categories-container">
		          <?php display_categories_of(get_the_ID(), 'light-bg'); ?>
		        </div>
		        <?php the_content(); ?>
		        <div class="socialFunciones">
		        	<div class="likebtns pull-left blue fontX18 m-t-xss">
		        		<span class='pull-left'> ¿Te resultó interesante este tip?</span>
		        		<?php echo do_shortcode('[rating-system-posts]'); ?>

		        	</div>
		        	<div class="dropdown pull-right">
				        <button type="button" id="shareme" class="btn btn-default btn-lg btn-clorox btn-share pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    	</div>
    </article>   
	</section>

	<!-- productos relacionados -->
	<section class="bg-blue section" id="section-relateds">
    <article class="clearfix">
      <h2 class="title white text-center">Productos que te podrán ayudar</h2>
      <div class="container-products">
        <?php display_related_products(get_the_ID()); ?>
      </div>
    </article>
  </section>

  <!-- fin de productos relacionados --> 
	<?php endwhile; ?>
	<!-- fin tips relacionados --> 
	
	<section class="bg-green" id="section-relateds-tips">
			
	    <h2 class="title fontX38 light white text-center">Tips Relacionados</h2>
	    
	    <?php get_template_part('partials/grid', 'tips'); ?>
	</section>


 	<!-- fin tips relacionados --> 

<?php get_footer();?>