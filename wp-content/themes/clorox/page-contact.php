<?php get_header();?>
<section class="bg-green section " id="section-contacto">
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="container925">
		<div class='clearfix'>
			<div class="row bg-green">
				<div class="col-sm-offset-2 col-md-8">
					<h2 class="title white text-center"><?php echo esc_attr( get_option('contact_title') ); ?></h2>
					<p class="white text-contact">
						<?php echo esc_attr( get_option('contact_text') ); ?>
					</p>
				</div>
			</div>
			<div class="row bg-blue contactFormCont">
				<div class="col-md-7 bg-white overlaped contactForm">
			    <!-- formulario de contacto -->
			 		<h4 class="blue fontX24 semibold">Formulario de contacto</h4>
			 		<p class="grey fontX16 light">
			 			Completá los datos y envianos tu comentario
			 		</p>
			    <?php the_content(); ?>
			 		<!-- fin formulario -->
		 		</div>
		 		<div class="list col-md-4">
		 			<ul class='list-unstyled socialShare white'>
		 				<li>
		 					<a href="mailto:<?php echo esc_attr( get_option('email_contact') ); ?>" target="_blank" class="white"><i class="icon icon-email iconX40"></i> <?php echo esc_attr( get_option('email_contact') ); ?></a>
		 				</li>
		 				<li>
		 					<i class="icon icon-telephone iconX40"></i> <?php echo esc_attr( get_option('telephone_contact') ); ?>
		 				</li>
		 				<li>
		 					<a href="<?php echo esc_attr( get_option('fb_link') ); ?>" target="_blank" class="white"><i class="icon icon-fb-white iconX40"></i> /clorox</a>
		 				</li>
		 				<li>
		 					<a href="<?php echo esc_attr( get_option('yt_link') ); ?>" target="_blank" class="white"><i class="icon icon-yt-white iconX40"></i> /clorox</a>
		 				</li>
		 				
		 			</ul>
		 		</div>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</section>
<?php get_footer();?>
