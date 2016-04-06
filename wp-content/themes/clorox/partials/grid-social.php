<?php
	//$sfeed = get_social_feed();
	function check_feed_exist($feed){
		if($feed['link'] && $feed['image'] && $feed['type']) {
			return true;
		} else {
			return false;
		}
	}
	
	$feed_1 = array('link' => get_option('feed_1_link'), 'image' => get_option('feed_1_image'), 'type' => get_option('feed_1_type'), 'text' => get_option('feed_1_text'));
	$feed_2 = array('link' => get_option('feed_2_link'), 'image' => get_option('feed_2_image'), 'type' => get_option('feed_2_type'), 'text' => get_option('feed_2_text'));
	$feed_3 = array('link' => get_option('feed_3_link'), 'image' => get_option('feed_3_image'), 'type' => get_option('feed_3_type'), 'text' => get_option('feed_3_text'));
	
	if(check_feed_exist($feed_1) && check_feed_exist($feed_2) && check_feed_exist($feed_3)){
  
?>

		<!-- first feed column -->
		<div class="col-xs-6 col-sm-6 col-md-3 first-column">
			<div class="row">			
				<?php dislay_social_feed_item($feed_1, false)?>
			</div>
		</div>

		<!-- second feed column -->
		<div class="col-xs-6 col-sm-6 col-md-3">
			<div class="row">						
				<?php dislay_social_feed_item($feed_2, false)?>
			</div>
		</div>

		<!-- second feed column -->
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="row">						
				<?php dislay_social_feed_item($feed_3, true)?>
			</div>
		</div>

<?php 
	}
?>


