<?php get_header();?>
<section class="bg-green section " id="section-contacto">

	<?php while ( have_posts() ) : the_post(); ?>
	 <?php the_content(); ?>
	<?php endwhile; ?>
</section>
<?php get_footer();?>
