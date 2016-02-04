<?php get_tips(); ?>

<div class="content boxes clearfix">
  <?php while (have_posts()): the_post(); ?>
    <div class="col-md-4 tip">
      <article class="box box-layered">
        <div class="header">
          <div class="bg-image" style="background-image:url(<?php get_image_uri('test-1.jpg'); ?>)"></div>
        </div>
        <div class="body bg-white animate-height">
          <h4 class="title"><?php the_title(); ?></h4>
          <p class="grey"><?php the_excerpt(); ?></p>
          <a class="link" href="<?php the_permalink(); ?>">Seguir Leyendo</a>
        </div>
      </article>
    </div>
  <?php endwhile; ?>
</div>
<div class="text-center btn-more">
  <a href="<?php link_to('tips'); ?>">
    <span class="icon iconX2 plus-icon"></span>
  </a>
</div>
