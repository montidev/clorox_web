<?php $slides = get_home_slides(get_the_ID()); ?>

<section class="bxslider" >
  <?php foreach ($slides as $slide): ?>

    <article class="bxslide">
    	<a href="<?php echo $slide['link']; ?>" target="_blank">
	      <div class="bg-image" style="background-image:url(<?php echo $slide['url']; ?>);" <?php if($slide['video_mp4']): ?> data-video="<?php echo_safe($slide['video_mp4']); ?>"<?php endif; ?>  <?php if($slide['video_webm']): ?>  data-video-webm="<?php echo_safe($slide['video_webm']); ?>" data-poster="<?php echo_safe($slide['url']); ?>" <?php endif; ?>></div>
	      <?php if($slide['text']): ?>
	      <div class="bottom-left description box-blue">
	        <h3><?php echo_safe($slide['text']); ?></h3>
	      </div>
	      <?php endif; ?>
	    </a>
    </article>
  <?php endforeach; ?>
</section>

<div class="border-three-colors bottom"></div>


