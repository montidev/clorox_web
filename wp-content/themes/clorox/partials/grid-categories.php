<div class="content boxes environments clearfix categoryBoxCont">
  <?php $categories = get_categories(array('number' => 6, 'orderby' => 'term_order')); ?>
  <?php foreach ($categories as $category): ?>
    <div class="col-lg-2 col-md-4 col-xs-4">
      <a href="<?php echo_safe(get_category_link($category->cat_ID)); ?>">
        <article class="box box-white box-shadow border-x4-bottom border-blue categoryBox animate-scale">
          <div class="header">
            <div class="bg-image" style="background-image:url(<?php get_category_image_uri($category->term_id); ?>)"></div>
          </div>
          <div class="body text-center">
            <?php echo_safe($category->name); ?>
          </div>
        </article>
      </a>
    </div>
  <?php endforeach; ?>
</div>
