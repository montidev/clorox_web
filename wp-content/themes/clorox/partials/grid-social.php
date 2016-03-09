
<?php  $sfeed = get_social_feed(); ?>

<div class="col-md-4 first-column">
  <div class="row">
  	<?php if($sfeed['facebook'][0]){ ?>
    <article class="bg-blue text-item pos-1">
    	<a href="<?php echo $sfeed['facebook'][0]->getLink(); ?>" target="_blank">
      <div class="content facebook">
        <p class="white">
        	
          <?php echo $sfeed['facebook'][0]->getTitle(); ?>
        </p>
      </div>
      <div class="footer text-right text-bottom">
        <span class="icon icon-fb"></span>
      </div>
    	</a>
    </article>
    <?php } ?>
    <article class="bg-white text-item title-feed">
      <div class="title content">
        <p>Para más info, tips y novedades <strong>encontranos en las redes</strong></p>
      </div>
    </article>

    <?php if($sfeed['youtube'][0]) { ?>
    <article class="bg-red text-item pos-2">
    	<a href="<?php echo $sfeed['youtube'][0]->getLink() ?>" target="_target">
      <div class="text-center">
        <span class="play-btn-sm"></span>
      </div>
      <div class="content youtube">
        <p class="text-center">
          <strong><?php echo $sfeed['youtube'][0]->getTitle(); ?></strong>
          <p>
            <?php echo $sfeed['youtube'][0]->getDescription(); ?>
          </p>
        </p>
      </div>
    	</a>
    </article>
    <?php } ?>
  </div>
</div>

<div class="col-md-5">
  <div class="row">
  	<?php if($sfeed['youtube'][1]) { ?>  	
  	
    <article class="text-item video-item pos-3">
    	<a href="<?php echo $sfeed['youtube'][1]->getLink() ?>" target="_blank">
	      <div class='yt-video' style="background-image: url(<?php echo $sfeed['youtube'][1]->getImageUrl() ?>)" alt="">
	      	<span class="play-btn"></span>
	        
	      </div>
      </a>
    </article>
  	    
    <?php } ?>
  
  <?php if($sfeed['facebook'][1]) { ?>
  
  	<article class="img-item pos-4 horizontal-photo-text">
  	<a href="<?php echo $sfeed['facebook'][1]->getLink() ?>" target="_blank">
	    <div class="image-item" style="background-image: url(<?php echo $sfeed['facebook'][1]->getImageUrl() ?>)">
	    	
	    </div>
	    <div class="text-item">	
		      <div class="content">		        
		          <p class="text-center">
		            <?php echo $sfeed['facebook'][1]->getTitle(); ?>
		          </p>		        
		      </div>		    
	    </div>
	  	</a>
  	</article>
  </div>
  <?php } ?>
</div>
<div class="col-md-3">
	<div class='row'>
  <?php if($sfeed['facebook'][4]) { ?>
  	
  	<article class="bg-blue vertical-photo-text pos-5">
  		<a href="<?php echo $sfeed['facebook'][4]->getLink() ?>" target="_blank">
	  		<div class="text-item">	    	    
		      <div class="content facebook">
		        <p class="white">
		        	
		          <?php echo $sfeed['facebook'][4]->getTitle(); ?>
		        </p>
		      </div>
		      <div class="footer text-right text-bottom">
		        <span class="icon icon-fb"></span>
		      </div>
	    	</div>
		    <div class="image-item" style="background-image: url(<?php echo $sfeed['facebook'][4]->getImageUrl() ?>)">
		    	
		    </div>
	    </a>
    </article>
  	
  <?php } ?>
	</div>
</div>
