<div class="content boxes environments clearfix">
  <?php $categories = get_categories(array('number' => 6)); ?>
  <?php foreach ($categories as $category): ?>
    <div class="col-md-2">
      <article class="box box-white box-shadow border-x4-bottom border-blue animate-scale">
        <div class="header">
          <div class="bg-image" style="background-image:url(<?php get_category_image_uri($category->term_id); ?>)"></div>
        </div>
        <div class="body text-center">
          <a href="<?php echo_safe(get_category_link($category->cat_ID)); ?>">
            <?php echo_safe($category->name); ?>
          </a>
        </div>
      </article>
    </div>
  <?php endforeach; ?>
</div>
