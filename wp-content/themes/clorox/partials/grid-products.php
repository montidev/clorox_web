<?php get_products(); ?>

<?php global $total_products; ?>
<h3 class="white semibold">Encontramos <span class="fontX35"><?php echo $total_products; ?></span> productos que te pueden servir:</h3>

<div class="content boxes clearfix products">
  <?php while (have_posts()): the_post(); ?>
    <div class="col-md-2 product bg-transparent hover-white box-shadow-hover hover-border border-x4-bottom border-yellow">
      <a href="<?php the_permalink(); ?>">
        <article class="box">
          <div class="header">
            <div class="bg-image" style="background-image:url(<?php get_featured_image_uri(get_the_ID()); ?>)"></div>
          </div>
          <div class="body visible-on-hover">
            <h4 class="title blue light"><?php echo_safe(get_product_type(get_the_ID())); ?></h4>
            <h5 class="title blue light"><?php the_title(); ?></h5>
          </div>
        </article>
      </a>
    </div>
  <?php endwhile; ?>
</div>
<div class="text-center btn-more">
  <a href="<?php link_to('products'); ?>">
    <span class="icon iconX2 plus-icon"></span>
  </a>
</div>
