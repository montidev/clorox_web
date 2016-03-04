<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <section class="bg-blue section" id="section-policies">
    <article class="container850 onlyText">
      <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
    </article>
  </section>
<?php endwhile; ?>

<?php get_footer('nonenewsletter');?>
