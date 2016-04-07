<?php
  global $limit;

  if(is_home() || is_category()){
		$types = get_terms('product-type', array('number' => 1, 'orderby' => 'term_order'));
		$types = $types[0]->slug;
		if(!is_home()){
			$cats = get_terms('category', array('number' => 1, 'orderby' => 'term_order'));
			$cats = $cats[0]->slug;
		}
	  get_products($limit, array('categories' => $cats, 'product-types' => $types));
	} else {		
		get_products($limit);
	}
?>

<?php global $total_products; ?>


<?php get_template_part('partials/loop', 'products'); ?>
