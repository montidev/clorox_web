<?php

require_once(__DIR__ . '/includes/constants.php');
require_once(__DIR__ . '/includes/custom_post_types.php');
require_once(__DIR__ . '/includes/metaboxes.php');
require_once(__DIR__ . '/includes/styles_scripts.php');
require_once(__DIR__ . '/includes/actions_and_filters.php');
// require_once(__DIR__ . '/includes/social_stream.php');

//  ===========================================================================
//  Helpers
//  ===========================================================================
//

function safe_GET($key, $default = "") {
  if ( !isset($_GET) || !array_key_exists($key, $_GET)) {
    return $default;
  }
  return filter_var($_GET[$key], FILTER_SANITIZE_STRING);
}

function dd($data){
  echo "<pre>";
  print_r($data);
  echo "</pre>";
  die();
}

function link_to($path = "") {
  echo $SERVER['HTTP_HOST'] . '/' . $path;
}

function link_to_with_args($args = [], $url = null) {
  echo esc_url( add_query_arg($args, $url) );
}

function echo_safe($text = "") {
  echo esc_html($text);
}

function get_logo_uri() {
  echo get_template_directory_uri() . '/assets/img/logo.png';
}

function get_image_uri($name, $echo = true) {
  $uri = get_template_directory_uri() . '/assets/img/' . $name;
  if ( !$echo ) {
    return $uri;
  }
  echo $uri;
}

function get_featured_image_uri($post_id) {
  $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
  echo_safe($feat_image);
}

function get_meta_KEY($key) {
  return PREFIX . $key;
}

function get_category_image_uri($cat_id) {
  $name = PREFIX . 'metabox_category_image';
  $uri = get_term_meta($cat_id, $name, true);
  echo $uri;
}

function display_primary_menu($classes = "") {
  $items = wp_get_nav_menu_items( 'primary' );
  ?>
    <ul class="<?php echo_safe($classes); ?>">
      <?php foreach ($items as $item) { ?>
        <li>
          <a href="<?php echo_safe($item->url); ?>">
            <?php echo_safe($item->title); ?>
          </a>
        </li>
      <?php } ?>
    </ul>
<?php
}

function get_filter_product_types_form() {
  $param = safe_GET('product_type', 'desinfección');
  // retrive verb
  $value = get_product_type_verb_by_slug($param);
  $args = array();
  $types = get_terms('product-type', $args);
  ob_start();
  ?>
  <div class="dropdown filters md yellow" data-filter="product-type">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
      <span class="text semibold"><?php echo_safe(ucfirst($value)); ?></span>
    </button>
    <ul class="dropdown-menu">
      <?php foreach ($types as $type): ?>
        <?php $verb = get_product_type_verb($type->term_id); ?>
        <li class="text blue fontX20 semibold">
          <?php $args = array( array('product_type' => $type->slug) ); ?>
          <a class="ajax-load"
            href="<?php link_to_with_args($args); ?>"
            data-target=".container-products"
            data-container=".container-products">
            <?php echo_safe(ucfirst($verb)); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <script type="text/javascript">
    $('.ajax-load').click(function(e){
      e.preventDefault();
      var text = $(this).text().trim();
      console.log(text);
      $(this).closest('.dropdown').find('button>.text').html(text);
    })
  </script>
  <?php
  return ob_end_flush();
}

function widget_languages_as_dropdown() {
  // $sites = wp_get_sites( $args );
  // $blog_id = get_current_blog_id();
  // $blog_details = get_blog_details( $blog_id );
  // dd($blog_details);
  //
  // $translations = pll_the_languages(array('raw'=>1));
  // $current = array_filter($translations, function($t){
  //   if ($t['current_lang']) {
  //     return $t;
  //   }
  // });
  // $current = array_pop($current);
  $translations = array();
  $current = array(
    'flag' => get_image_uri('flag-arg.png', false),
    'name' => 'Argentina'
  );
  ?>

  <div class="dropdown flags md">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
      <span class="flag">
        <img src="<?php echo_safe($current['flag']); ?>" alt="" />
      </span>
      <span class="text">
        <?php echo_safe($current['name']); ?>
      </span>
    </button>
    <ul class="dropdown-menu">
      <?php foreach ($translations as $t): ?>
        <li>
          <a href="<?php echo_safe($t->url); ?>">
            <span class="flag">
              <img src="<?php echo_safe($t['flag']); ?>" alt="<?php echo_safe($t['name']); ?>" />
            </span>
            <span class="text">
              <?php echo_safe($t['name']); ?>
            </span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php
}

//  ===========================================================================
//  Home Helpers
//  ===========================================================================
//

function get_home_slides($id) {
  $key = get_meta_key('homepage_metabox_slider');
  // Get slides
  $slides = get_post_meta( $id, $key, true );

  // Convert into Human readable keys
  $slides_formated = array_map(function($slide) use ($key) {
    return array(
      'text' => $slide[$key.'_text'],
      'url' => $slide[$key.'_image'],
    );
  }, $slides);

  return $slides_formated;
}

//  ===========================================================================
//  Queries
//  ===========================================================================
//

function get_product_type_verb($term_id) {
  $key = get_meta_KEY('metabox_product_type_verb');
  return get_term_meta( $term_id, $key, true);
}

function get_product_type_verb_by_slug($term_slug) {
  $product_type = get_term_by('slug', $term_slug, 'product-type');
  return get_product_type_verb( $product_type->term_id);
}

function get_tips($limit = 5) {
  wp_reset_query();
  $args = array(
    'post_type' => 'tip',
    'posts_per_page' => $limit
  );
  query_posts($args);
}

function get_products($limit = 5) {
  wp_reset_query();
  $paged = get_query_var('paged', 1);
  $type = safe_GET('product_type', 'desinfección');
  $args = array(
    'post_type' => 'product',
    'posts_per_page' => $limit,
    'paged' => $paged,
    'tax_query' => array(
			array(
				'taxonomy' => 'product-type',
				'field' => 'slug',
				'terms' => array($type)
			)
		)
  );

  query_posts($args);

  global $wp_query;
  global $total_products;
  $total_products = $wp_query->post_count;
}

function get_product_type($post_id) {
  $args = array('fields' => 'all');
  $types = wp_get_post_terms( $post_id, 'product-type', $args );
  if ( count($types) ) {
    $type = array_pop($types);
    return $type->name;
  }
}
