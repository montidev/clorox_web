<?php

require_once(__DIR__ . '/includes/constants.php');
require_once(__DIR__ . '/includes/custom_post_types.php');
require_once(__DIR__ . '/includes/metaboxes.php');
require_once(__DIR__ . '/includes/styles_scripts.php');
require_once(__DIR__ . '/includes/actions_and_filters.php');
require_once(__DIR__ . '/includes/admin_configs.php');
require_once(__DIR__ . '/includes/social_stream.php');
require_once(__DIR__ . '/includes/social_feed_configs.php');


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
  var_dump($data);
  echo "</pre>";
  die();
}
function trim_add_ellipsis($s, $max_length, $strAdd = '...'){
	if (strlen($s) > $max_length)
	{
	    $offset = ($max_length - 3) - strlen($s);
	    $s = substr($s, 0, strrpos($s, ' ', $offset)) . $starAdd;
	}

	return $s;
} 

function link_to($path = "") {
  echo_safe($SERVER['HTTP_HOST'] . '/' . $path);
}

function link_to_back() {
  $prev_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
  if( !empty( $prev_url ) && strpos( $prev_url, get_blog_details()->domain ) !== false ) { ?>
    <a href="<?php echo_safe($prev_url); ?>" class="previous-history-link">
      <i class="icon icon-back"></i>
      <span class="white fontX20">Volver</span>
    </a>
  <?php };
}

function link_to_with_args($args = [], $url = null) {
  if( ! $url ) {
    $url = $SERVER['HTTP_HOST'];
  }
  echo esc_url( add_query_arg($args, $url) );
}

function echo_safe($text = "") {
  echo esc_html($text);
}

function get_logo_uri() {
  $logo =  get_option('logo');
  if($logo) {
  	echo $logo;
  } else {
  	echo get_template_directory_uri() . '/assets/img/logo.png';
  }
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

function get_category_image_uri($cat_id, $type = 'light-bg') {
  $images = get_term_meta($cat_id, CATEGORY_MB_IMAGES, true);
  if ( is_array($images) ) {
    $results = array_filter($images, function($e) use ($type) {
      return $e[CATEGORY_MB_IMAGES_TYPE] == $type;
    });

    if ( count($results) ) {
      $image = array_pop($results);
      $img_url = $image[CATEGORY_MB_IMAGES_IMAGE];
      echo esc_url( $img_url );
    }
  }
}

function display_primary_menu($classes = "") {
  $args = array( 'theme_location' => 'primary', 'menu_class' => $classes );
  return wp_nav_menu( $args );
}

function display_social_networks() {
  $fb_link = get_option('fb_link', '');
  $yt_link = get_option('yt_link', '');
  ob_start();
  ?>
  <ul class="nav navbar-nav navbar-right social-links">
    <li>
      <a href="<?php echo_safe($fb_link); ?>" target="_blank" class="icon">
        <img src="<?php get_image_uri('fb-icon-menu-x2.png'); ?>" alt="" />
      </a>
    </li>
    <li>
      <a href="<?php echo_safe($yt_link); ?>" target="_blank" class="icon">
        <img src="<?php get_image_uri('yt-icon-menu-x2.png'); ?>" alt="" />
      </a>
    </li>
  </ul>
  <?php
  return ob_end_flush();
}




function dislay_social_feed_item($pos, $item, $type, $templateType) {
	$link = $item->getLink();
	$description = trim_add_ellipsis($item->getDescription(), 135);
	$title = trim_add_ellipsis($item->getTitle(), 135);
	$imageUrl = $item->getImageUrl();


	ob_start();
	?>
		<article class="social-feed pos-<?php echo_safe($pos.' '.$templateType); ?>">
			<a href="<?php echo_safe($link); ?>" target="_blank">
				<?php if($title) {?>
				<div class="text">
					<?php if($type == 'yt' && $templateType == 'yt-text') { ?>
							<span class='play-btn-sm'></span>
					<?php } ?>
					<h4><?php echo_safe($title); ?></h4>
					<p>
						<?php if($type == 'yt') { ?>
							<?php echo_safe($description); ?>
						<?php } ?>

						<?php if($type == 'fb' && $templateType == 'fb-text' || $type == 'fb' && $templateType == 'fb-text-image-vertical') { ?>
							<span class='icon-fb'></span>
						<?php } ?>
					</p>
				</div>
				<?php } ?>
				<?php if($imageUrl) {?>
				<div class="image" style="background-image: url(<?php echo_safe($imageUrl); ?>);">
					<?php if($type == 'yt'){ ?>
						<!-- mostramos el play button -->
						<span class="play-btn"></span>
					<?php } ?>
				</div>
				<?php } ?>
			</a>
		</article>
	<?php
	return ob_end_flush();
}





function link_next_pagination() {
  global $wp_query;

  $current = max( 1, get_query_var('paged') );

  $args = array(
    'total'              => $wp_query->max_num_pages,
    'current'            => $current,
    'type'               => 'array'
  );

  $page_numbers = paginate_links( $args );

  $next_link = array_pop($page_numbers);

  preg_match('/^<a.*?href=(["\'])(.*?)\1.*$/', $next_link, $m);

  $link = count($m) ? array_pop($m) : "";

  echo_safe($link);
}

function get_filter_product_types_form() {

	$param = safe_GET('product_type', '-');
	
	$types = get_terms('product-type');

	if($param == '-'){
		// get the first 
		$param = get_terms('product-type', array('number' => 1, 'orderby' => 'term_order'));
		$param = $param[0]->slug;
	} 
  // retrive verb
  $value = get_product_type_verb_by_slug($param);
  
  ob_start();
  ?>
  <div class="dropdown filters md yellow" data-filter="product-type">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
      <span class="text light"><?php echo ($value) ? ucfirst($value) : '-'; ?></span>
    </button>
    <ul class="dropdown-menu">
      <?php foreach ($types as $type): ?>
        <?php $verb = get_product_type_verb($type->term_id); ?>
        <li class="text blue fontX20">
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
      $(this).closest('.dropdown').find('button>.text').html(text);
    })
  </script>
  <?php
  return ob_end_flush();
}

function get_filter_product_categories_form() {

  if(is_category()){
	  $cat = get_category_by_path(get_query_var('category_name'),false);
		$value = $cat->cat_name;
	} else {
		//esto es un slug
		$value = safe_GET('category', '-');
		
		if($value != '-'){
			$value = get_term_by('slug', $value, 'category');
			$value = $value->name;
		}
	}

	if($value == '-'){
		// get the first 
		$value = get_terms('category', array('number' => 1, 'orderby' => 'term_order'));
		$value = $value[0]->name;
	}
	
  $categories = get_categories();
  ob_start();
  ?>
  <div class="dropdown filters md yellow" data-filter="category">
    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
      <span class="text"><?php echo_safe(ucfirst($value)); ?></span>
    </button>
    <ul class="dropdown-menu">
      <?php foreach ($categories as $cat): ?>
        <li class="text blue fontX20">
          <?php $args = array( array('category' => $cat->slug) ); ?>
          <a class="ajax-load"
            href="<?php link_to_with_args($args); ?>"
            data-target=".container-products"
            data-container=".container-products">
            <?php echo_safe(ucfirst($cat->name)); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <script type="text/javascript">
    $('.ajax-load').click(function(e){
      e.preventDefault();
      var text = $(this).text().trim();
      $(this).closest('.dropdown').find('button>.text').html(text);
    })
  </script>
  <?php
  return ob_end_flush();
}

function widget_languages_as_dropdown() {
  $sites = wp_get_sites( $args );
  $blog_id = get_current_blog_id();
  $currentFlag = get_blog_option( $blog_id , 'country_flag' );
  $currentCountry = get_blog_option( $blog_id , 'site_country' );

  $sitesList = array();

  foreach ($sites as $country) {

  	array_push($sitesList, array('name' => get_blog_option($country['blog_id'], 'site_country'), 'flag' => get_blog_option($country['blog_id'], 'country_flag'), 'url' => get_blog_option($country['blog_id'], 'siteUrl')));
  }

  // $current = array_pop($current);

  $current = array(
    'flag' => $currentFlag,
    'name' => $currentCountry
  );
  ob_start();
  ?>

  <div class="dropdown flags md">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
      <span class="flag flag-icon flag-icon-<?php echo_safe($current['flag']); ?>"></span>
      <span class="text">
        <?php echo_safe($current['name']); ?>
      </span>
    </button>
    <ul class="dropdown-menu">
      <?php foreach ($sitesList as $t): ?>
        <li>
          <a href="<?php echo_safe($t['url']); ?>">
          	<span class="flag flag-icon flag-icon-<?php echo_safe($t['flag']); ?>"></span>

            <span class="text">
              <?php echo_safe($t['name']); ?>
            </span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php
  return ob_end_flush();
}

//  ===========================================================================
//  Home Helpers
//  ===========================================================================
//

function get_home_slides($id) {
  // Get slides
  $slides = get_post_meta( $id, HOMEPAGE_MB_SLIDER, true );

  // Convert into Human readable keys
  $slides_formated = array_map(function($slide) use ($key) {
    return array(
      'text' => $slide[HOMEPAGE_MB_SLIDER_TEXT],
      'url' => $slide[HOMEPAGE_MB_SLIDER_IMAGE],
      'link' => $slide[HOMEPAGE_MB_SLIDER_LINK],
    );
  }, $slides);

  return $slides_formated;
}


//  ===========================================================================
//  Campaign Helpers
//  ===========================================================================
//

function get_campaign_slides($id) {
  // Get slides
  $slides = get_post_meta( $id, CAMPAIGN_MB_SLIDER, true );
  if($slides){
	  // Convert into Human readable keys
	  $slides_formated = array_map(function($slide) use ($key) {
	    return array(
	      'text' => $slide[CAMPAIGN_MB_SLIDER_TEXT],
	      'url' => $slide[CAMPAIGN_MB_SLIDER_IMAGE],
	    );
	  }, $slides);

	  return $slides_formated;
	} else {
		return array();
	}
}


function display_campaign_video($campaign_id) {
  $video_embed = get_post_meta($campaign_id, CAMPAIGN_MB_VIDEO, true);
  echo wp_oembed_get($video_embed);
}
function display_campaign_products($campaign_id){
	get_campaign_products($campaign_id);
  ob_start();
  get_template_part('partials/loop', 'campaignProducts');
  return ob_end_flush();
}



//  ===========================================================================
//  Product Helpers
//  ===========================================================================
//

function display_categories_of($post_id, $type = 'dark-bg') {
  $args = array('fields' => 'ids');
  $categories = wp_get_post_categories( $post_id, $args );
  ob_start(); ?>

  <ul class="list-inline categories <?php echo_safe( $type ); ?>">
    <?php foreach ( $categories as $cat_id ): ?>
      <li>
        <a href="<?php echo_safe( get_category_link($cat_id) ); ?>"
          class="bg-image"
          style="background-image:url(<?php get_category_image_uri( $cat_id, $type ); ?>)">
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php
  return ob_end_flush();
}

function display_grid_products($total = 5) {
  global $limit;
  $limit = $total;
  ob_start();
  get_template_part('partials/grid', 'products');
  return ob_end_flush();
}
function check_and_get_related($product_id, $limit = 5){

  $ret = get_related_products($product_id, $limit);
  
  if(have_posts()) {
  	return true;
  } else {
  	get_products(5);
  	//traigo 5 aleatorios
  	return false;
  }
	
}


function display_related_products($product_id, $limit = 5) {
  

  ob_start();
  get_template_part('partials/loop', 'products');
  return ob_end_flush();
}

function has_characteristics($product_id) {
	$chars = get_characteristics($product_id);
	if(empty($chars)) {
		return false;
	} else {
		return true;
	}
}

function display_characteristics($product_id) {
  $chars = get_characteristics($product_id);
  ob_start();
  ?>
    <?php foreach ($chars as $c): ?>
      <div class="col-md-4">
        <div class="characteristic">
          <div class="bg-image" style="background-image:url(<?php echo_safe($c[PRODUCT_MB_CHARAC_IMAGE]); ?>)"></div>
          <p class="fontX16 grey"><?php echo_safe($c[PRODUCT_MB_CHARAC_TEXT]); ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  <?php
  return ob_end_flush();
}

function has_video($product_id){
	$video_embed = get_post_meta($product_id, PRODUCT_MB_VIDEO, true);
	if($video_embed){
		return true;
	} else {
		return false;
	}
}

function display_product_video($product_id) {
  $video_embed = get_post_meta($product_id, PRODUCT_MB_VIDEO, true);
  echo wp_oembed_get($video_embed);
}


//	===========================================================================
//  Tip helpers
//  ===========================================================================
//

function display_tip_video($product_id) {
  $video_embed = get_post_meta($product_id, TIP_MB_VIDEO, true);
  echo wp_oembed_get($video_embed);
}

function display_related_tips($tip_id, $limit = 3) {
  get_related_tips($tip_id, $limit);
  ob_start();
  get_template_part('partials/grid', 'tips');
  return ob_end_flush();
}

//  ===========================================================================
//  Queries
//  ===========================================================================
//

function total_posts() {
  global $wp_query;
  return $wp_query->post_count;
}

function get_characteristics($product_id) {
  $chars = get_post_meta( $product_id, PRODUCT_MB_CHARACS, false);
  return (count($chars) > 0) ? $chars[0] : [];
}

function get_product_type_verb($term_id) {
  return get_term_meta( $term_id, PRODUCT_TYPE_MB_VERB, true);
}

function get_product_type_verb_by_slug($term_slug) {
  $product_type = get_term_by('slug', $term_slug, 'product-type');
  return get_product_type_verb( $product_type->term_id);
}

function get_campaign_products($campaign_id){
	$ids = get_post_meta($campaign_id, CAMPAIGN_MB_PRODUCTS, true);
	$ids = preg_split("/[\s,]+/",$ids);
	for ($i=0; $i < count($ids); $i++) {
		$ids[$i] = (int) $ids[$i];
	}
	$limit = 3;
	$args = array('fields' => 'slugs');
  $filters = array(
    'args' => array(
      'post__not_in' => array($product_id),
      'post__in' => $ids
    )
  );

  get_products($limit, $filters);
}

function get_tips($limit = 3) {
  wp_reset_query();
  global $wp_query;
  global $total_products;
  $paged = get_query_var('paged', 1);
  $args = array(
    'post_type' => 'tip',
    'posts_per_page' => $limit,
    'paged' => $paged
  );
  query_posts($args);
  return $wp_query->posts;
}

function get_products($limit = 5, $filters = array()) {
  wp_reset_query();

  global $wp_query;
  global $total_products;

  $total_products = 0;

  $paged = get_query_var('paged', 1);

  $args = array(
    'post_type' => 'product',
    'posts_per_page' => $limit,
    'paged' => $paged
  );

  $types = safe_GET('product_type');
  $cats = safe_GET('category');


  if(!$cats && is_category()){
  	//solamente para template categoría
  	$cat = get_category_by_path(get_query_var('category_name'),false);
		$cats = $cat->cat_name;
  }
  if ( !$types && array_key_exists('product-types', $filters) ) {
    $types = $filters['product-types'];
  } else {
    if ( ! empty($types) ) {
      $types = array($types);
    }
  }

  if ( !$cats && array_key_exists('categories', $filters) ) {
    $cats = $filters['categories'];
  } else {
    if ( ! empty($cats) ) {
      $cats = array($cats);
    }
  }

  if ( !empty($types) ) {
    $args['tax_query'][] = array(
      'taxonomy' => 'product-type',
      'field' => 'slug',
      'terms' => $types
    );
  }

  if ( !empty($cats) ) {
    $args['tax_query']['relation'] = 'AND';
    $args['tax_query'][] = array(
      'taxonomy' => 'category',
      'field' => 'slug',
      'terms' => $cats
    );
  }

  if ( array_key_exists('args', $filters) ) {
    $args = array_merge($args, $filters['args']);
  }

  // dd($args);

  query_posts($args);

  $total_products = $wp_query->post_count;

  return $wp_query->posts;
}

function get_product_type($post_id) {
  $args = array('fields' => 'all');
  $types = wp_get_post_terms( $post_id, 'product-type', $args );
  if ( count($types) ) {
    $type = array_pop($types);
    return $type->name;
  }
}

function get_related_products($product_id, $limit = 5) {
  $args = array('fields' => 'slugs');
  $product_types = wp_get_post_terms( $product_id, 'product-type', $args );
  $categories = wp_get_post_categories( $product_id, $args );

  $filters = array(
    'product-types' => $product_types,
    'categories' => $categories,
    'args' => array(
      'post__not_in' => array($product_id)
    )
  );

  get_products($limit, $filters);
}


function get_related_tips($tip_id, $limit = 3) {
  $args = array('fields' => 'slugs');
  $categories = wp_get_post_categories( $tip_id, $args );

  $filters = array(
    'categories' => $categories,
    'args' => array(
      'post__not_in' => array($tip_id)
    )
  );

  get_tips($limit, $filters);
}
