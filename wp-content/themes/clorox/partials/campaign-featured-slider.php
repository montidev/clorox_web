<?php $slides = get_campaign_slides(get_the_ID()); ?>


  <?php $slide = $slides[0] ?>
  <?php if($slide) { ?>  
  <div class="bg-image" style="background-image:url(<?php echo $slide['url']; ?>);"></div>
  <div class="bottom-left description box-blue">
    <h3><?php echo_safe($slide['text']); ?></h3>
  </div>
   <?php } ?>

<div class="border-three-colors bottom"></div>
