<div class="content boxes clearfix products <?php echo (total_posts() < 5) ? 'text-center' : ''; ?> ">
  <?php while (have_posts()): the_post(); ?>
    <div class="product bg-transparent transition hover-white box-shadow-hover hover-border border-x4-bottom border-yellow">
      <a href="<?php the_permalink(); ?>">
        <article class="box">
          <div class="header">
            <div class="bg-image" style="background-image:url(<?php get_featured_image_uri(get_the_ID()); ?>)"></div>
          </div>
          <div class="body visible-on-hover text-left">
            <h4 class="title blue light"><?php echo_safe(get_product_type(get_the_ID())); ?></h4>
            <h5 class="title blue light"><?php the_title(); ?></h5>
          </div>
        </article>
      </a>
    </div>
  <?php endwhile; wp_reset_query(); ?>
</div>
