<?php $slides = get_campaign_slides(get_the_ID()); ?>

<section class="bxslider">
  <?php foreach ($slides as $slide): ?>
    <article class="bxslide">
      <div class="bg-image" style="background-image:url(<?php echo $slide['url']; ?>);"></div>
      <div class="bottom-left description box-blue">
        <h3><?php echo_safe($slide['text']); ?></h3>
      </div>
    </article>
  <?php endforeach; ?>
</section>

<div class="border-three-colors bottom"></div>
