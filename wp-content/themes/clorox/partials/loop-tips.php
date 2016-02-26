<div class="content boxes clearfix">
  <?php while (have_posts()): the_post(); ?>
    <div class="col-md-4 tip">
      <article class="box box-layered">
        <div class="header">
          <div class="bg-image" style="background-image:url(<?php get_image_uri('test-1.jpg'); ?>)"></div>
        </div>
        <div class="body bg-white animate-height">
          <h4 class="title"><?php the_title(); ?></h4>
          <div class="grey"><?php the_excerpt(); ?></div>
          <a class="link semibold underline" href="<?php the_permalink(); ?>">Seguir Leyendo</a>
        </div>
      </article>
    </div>
  <?php endwhile; ?>
</div>
