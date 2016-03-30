<?php get_header(); ?>

<section class="bg-green section " id="section-tips">
  <div class="title text-center">
    <h2>Todo para el <strong>control de tu casa</strong></h2>
  </div>
  <?php global $limit; $limit = 9; ?>
  <?php get_template_part('partials/grid-tips'); ?>

  <div class="text-center btn-more">
    <a class="paginate-ajax"
      href="<?php link_next_pagination(); ?>"
      data-container-append=".boxes"
      data-target=".tip">
        <span class="icon iconX2 plus-icon"></span>
    </a>
  </div>
</section>

<?php get_footer(); ?>
