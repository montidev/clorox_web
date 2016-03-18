<?php
	$sfeed = get_social_feed();
	
	if(count($sfeed['facebook']) && count($sfeed['youtube']) && count($sfeed['facebook']) > 3 && count($sfeed['youtube']) > 2 ) {
	
?>

<!-- first feed column -->
<div class="col-md-4 first-column">
	<div class="row">
		<?php 
			$keySfeed = array_rand($sfeed['facebook']);
			$item = $sfeed['facebook'][$keySfeed];
			unset($sfeed['facebook'][$keySfeed]);
			$type = 'fb';
			$templateType = 'fb-text';
		?>
		<?php dislay_social_feed_item(1, $item, $type, $templateType)?>

		<article class="bg-white text-item title-feed">
      <div class="title content">
        <p>Para más info, tips y novedades <strong>encontranos en las redes</strong></p>
      </div>
    </article>
    <?php 
			$keySfeed = array_rand($sfeed['youtube']);
			$item = $sfeed['youtube'][$keySfeed];
			unset($sfeed['youtube'][$keySfeed]);
			$type = 'yt';
			$templateType = 'yt-text';
		?>
		<?php dislay_social_feed_item(2, $item, $type, $templateType)?>
	</div>
</div>

<!-- second feed column -->
<div class="col-md-5">
	<div class="row">		
		<?php 
			$keySfeed = array_rand($sfeed['youtube']);
			$item = $sfeed['youtube'][$keySfeed];
			unset($sfeed['youtube'][$keySfeed]);
			$type = 'yt';
			$templateType = 'yt-video';
		?>
		<?php dislay_social_feed_item(3, $item, $type, $templateType)?>

		<?php 
			$keySfeed = array_rand($sfeed['facebook']);
			$item = $sfeed['facebook'][$keySfeed];
			unset($sfeed['facebook'][$keySfeed]);
			$type = 'fb';
			$templateType = 'fb-text-image-horizontal';
		?>
		<?php dislay_social_feed_item(4, $item, $type, $templateType)?>
	</div>
</div>

<!-- second feed column -->
<div class="col-md-3">
	<div class="row">
		<!-- contemplamos un caso especial --> 
		<?php 
			$keySfeed = array_rand($sfeed['facebook']);
			$item = $sfeed['facebook'][$keySfeed];
			unset($sfeed['facebook'][$keySfeed]);
			$type = 'fb';
			$templateType = 'fb-text-image-vertical';
		?>
		<?php dislay_social_feed_item(5, $item, $type, $templateType)?>
	</div>
</div>

<?php 
}
?>


