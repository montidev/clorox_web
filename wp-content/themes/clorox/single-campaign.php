<?php get_header('campaign');?>

<?php while ( have_posts() ) : the_post(); ?>

	<section class="featured-image" id="section-featured">
    <?php get_template_part('partials/campaign-featured-slider'); ?>
  </section>
  <!-- ./featuted-image -->
  <section class="bg-white" id="sectionCampaignDetail">
 		<div class="clearfix">
	  	<h2 class="title text-center">Nuevo <strong><?php the_title() ?></strong></h2>

	  	<div class="text-center">
	  		<?php the_content() ?>
	  	</div>

	  	<div class="container1060">
	  	
	  		<?php display_campaign_products(get_the_ID()) ?>
	  	

	 		
	  		<div class="videoContainer">
  		
      		<?php display_campaign_video(get_the_ID()); ?>
      	</div>
    	</div>
  	</div>
  </section>
  <!-- tips relacionados --> 
  <section class="bg-green" id="section-relateds-tips">
			
	    <h2 class="title fontX38 light white text-center">Tips Relacionados</h2>

	    <?php display_related_tips(get_the_ID()); ?>
	    
	    <?php //get_template_part('partials/grid', 'tips'); ?>
	</section>

  <!-- ./tips relacionados --> 

  <!-- productos relacionados -->
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


  <!-- formulario de contacto --> 
 	<section class="bg-white section" id="section-contactForm">



 		<div class="row bg-blue contactFormCont">
			<div class="col-md-9 bg-white overlaped contactForm">
		    <!-- formulario de contacto -->
		 		<h4 class="blue fontX24 semibold">¿Dudas? ¿Sugerencias?</h4>
		 		<p class="grey fontX16 light">
		 			Completá los datos y envianos tu comentario
		 		</p>
		    <?php echo do_shortcode( '[contact-form-7 id="71" title="Formulario de contacto"]' ); ?>
		 		<!-- fin formulario -->
	 		</div>
	 		<div class="list col-md-2">

	 			<ul class='list-unstyled socialShare white'>
	 				<li>
	 					<a target="_blank" class="white" href="<?php echo esc_attr( get_option('fb_link') ); ?>"><i class="icon icon-fb-white iconX50"></i> <span><?php echo esc_attr( get_option('fb_label_link') ); ?></span> </a> 
	 				</li>
	 				<li>
	 					<a target="_blank" class="white" href="<?php echo esc_attr( get_option('yt_link') ); ?>"><i class="icon icon-yt-white iconX50"></i> <span><?php echo esc_attr( get_option('yt_label_link') ); ?></span></a>
	 				</li>
	 			</ul>
	 		</div>
		</div>
 	</section>	
  <!-- ./formulario de contacto --> 





	<?php endwhile; ?>

<?php get_footer('nonenewsletter');?>
