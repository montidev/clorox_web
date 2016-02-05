<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <section class="bg-green section" id="section-own history">
    <article class="container850">
      <div class="bg-image featured-image border-x4-bottom border-blue" style="background-image: url(<?php get_featured_image_uri(get_the_ID()); ?>)"></div>
      <div class="bg-white container content shadow">
        <?php the_content(); ?>
      </div>
    </article>
  </section>
<?php endwhile; ?>

<?php get_footer(); ?>
