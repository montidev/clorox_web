<div class="content boxes clearfix products">
  <?php while (have_posts()): the_post(); ?>
    <div class=" product bg-transparent transition hover-white box-shadow-hover hover-border border-x4-bottom border-yellow">
      <a href="<?php the_permalink(); ?>">
        <article class="box">
          <div class="header">
            <div class="bg-image" style="background-image:url(<?php get_featured_image_uri(get_the_ID()); ?>)"></div>
          </div>
          <div class="body blue">

            <h5 class="title blue text-center"><?php the_title(); ?></h5>
          </div>
        </article>
      </a>
    </div>
  <?php endwhile; wp_reset_query(); ?>
</div>
