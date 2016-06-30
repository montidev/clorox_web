<div class="content boxes environments clearfix categoryBoxCont">   
  <?php 
    $taxonomies = get_terms( 'product-class', array(
        'hide_empty' => false,
    ));
    ?>     
  <?php foreach ($taxonomies as $taxonomy): ?>
    <div class="col-lg-2 col-md-4 col-xs-4">
      <a class="load-class" href="/productos?class=<?php echo_safe($taxonomy->slug); ?>">
      <!-- <a class="load-class"> -->
        <article class="box box-white box-shadow border-x4-bottom border-blue categoryBox animate-scale">
          <div class="header">
            <div class="bg-image" style="background-image:url(<?php get_class_image_uri($taxonomy->term_id); ?>)"></div>
          </div>
          <div class="body text-center">
            <?php echo_safe($taxonomy->name); ?>
          </div>
        </article>
      </a>
    </div>
  <?php endforeach; ?>

</div>

