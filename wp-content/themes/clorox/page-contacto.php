<?php get_header();?>
<section class="bg-green section " id="section-contacto">
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="container925">
		<div class='clearfix'>
			<div class="row bg-green">
				<div class="col-sm-offset-2 col-md-8">
					<h2 class="title white text-center">Siempre estamos con ganas de charlar</h2>
					<p class="white text-contact">
						Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. 
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
		 					<a href="mailto:info@clorox.com" target="_blank" class="white"><i class="icon icon-email iconX40"></i> info@clorox.com</a>
		 				</li>
		 				<li>
		 					<i class="icon icon-telephone iconX40"></i> 0-800-333-9487
		 				</li>
		 				<li>
		 					<a href="http://facebook.com/clorox" target="_blank" class="white"><i class="icon icon-fb-white iconX40"></i> /clorox</a>
		 				</li>
		 				<li>
		 					<a href="http://youtube.com/clorox" target="_blank" class="white"><i class="icon icon-yt-white iconX40"></i> /clorox</a>
		 				</li>
		 				<li>
		 					<a href="http://twitter.com/clorox" target="_blank" class="white"><i class="icon icon-tw-white iconX40"></i> @clorox</a>
		 				</li>
		 			</ul>
		 		</div>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
</section>
<?php get_footer();?>
