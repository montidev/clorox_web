<?php
  global $limit;

  
		
	
	get_products($limit);
	
?>

<?php global $total_products; ?>


<?php get_template_part('partials/loop', 'products'); ?>
