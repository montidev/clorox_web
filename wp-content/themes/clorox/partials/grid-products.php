<?php
  global $limit;
  get_products($limit);
?>

<?php global $total_products; ?>
<h3 class="white semibold text-center">
  Encontramos
    <span class="fontX35"><?php echo_safe($total_products); ?></span>
  productos que te pueden servir:
</h3>

<?php get_template_part('partials/loop', 'products'); ?>
