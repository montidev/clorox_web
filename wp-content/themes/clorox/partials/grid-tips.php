

<?php
global $limit; 
if($limit){
	get_tips($limit); 
} else {
	get_tips();
}?>

<div class="boxes clearfix" next-pagination='<?php link_next_pagination(); ?>'>
  <?php while (have_posts()): the_post(); ?>
    <div class="col-md-4 tip">
      <article class="box box-layered">
        <div class="header">
        	<?php if (has_post_thumbnail( get_the_ID() ) ): ?>
					  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
					  <div class="bg-image" style="background-image: url('<?php echo $image[0]; ?>'); ?>)"></div>					 
					<?php endif; ?>          
        </div>
        <div class="body bg-white animate-height">
          <h4 class="title"><?php the_title(); ?></h4>
          <div class="grey"><?php the_excerpt(); ?></div>
          <a class="link semibold underline" href="<?php the_permalink(); ?>">Seguir Leyendo</a>
        </div>
      </article>
    </div>
  <?php endwhile; ?>
</div>
