<?php
  global $limit;


	$types = get_terms('product-type', array('number' => 1, 'orderby' => 'term_order'));
	$types = $types[0]->slug;
	if(!is_home()){
		$cats = get_terms('category', array('number' => 1, 'orderby' => 'term_order'));
		$cats = $cats[0]->slug;
	}
	
  get_products($limit, array('categories' => $cats, 'product-types' => $types));
?>

<?php global $total_products; ?>
<h3 class="white semibold text-center">
  Encontramos
    <span class="fontX35"><?php echo_safe($total_products); ?></span>
  productos que te pueden servir:
</h3>

<?php get_template_part('partials/loop', 'products'); ?>
