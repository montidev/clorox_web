<?php $slides = get_home_slides(get_the_ID()); ?>
		<!-- <div style="width: 1000px; height: 500px;"
		  data-vide-bg="mp4: <?php //echo_safe(get_template_directory_uri()."/assets/sample/sample.mp4"); ?>, poster: /wp-content/uploads/2016/01/cleaning.jpgr"
		  data-vide-options="posterType: jpg, loop: true, muted: false, position: 0% 0%">
		</div> -->
<section class="bxslider">
	<!-- <article class="bxslide">
		<div id="big-video-wrap" data-video="<?php //echo_safe(get_template_directory_uri()."/assets/sample/sample.mp4") ?>">
		</div>
	</article> -->
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


