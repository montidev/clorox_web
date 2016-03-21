<?php $slides = get_home_slides(get_the_ID()); ?>

<section class="bxslider">
  <?php foreach ($slides as $slide): ?>
    <article class="bxslide">
    	<a href="<?php echo $slide['link']; ?>">
	      <div class="bg-image" style="background-image:url(<?php echo $slide['url']; ?>);"></div>
	      <div class="bottom-left description box-blue">
	        <h3><?php echo_safe($slide['text']); ?></h3>
	      </div>
	    </a>
    </article>
  <?php endforeach; ?>
</section>

<div class="border-three-colors bottom"></div>
