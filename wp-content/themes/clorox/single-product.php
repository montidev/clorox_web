<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <section class="bg-blue section" id="section-product">
    <div class="pull-left previous-history upper light">
      <?php link_to_back(); ?>
    </div>
    <article class="container850">
      <div class="clearfix">
        <div class="col-md-5">
          <div class="row">
            <div class="bg-image featured-image border-x4-bottom border-blue" style="background-image: url(<?php get_featured_image_uri(get_the_ID()); ?>)"></div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="row">
            <h2 class="title white"><?php echo_safe( get_product_type(get_the_ID()) ); ?></h2>
            <h1 class="title white"><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <div class="categories-container">
              <?php display_categories_of(get_the_ID()); ?>
            </div>
            <button type="button" class="btn btn-default btn-lg btn-clorox">
              <i class="icon icon-share"></i>
              <span>Compartir</span>
            </button>
          </div>
        </div>
      </div>
    </article>
  </section>
  <section class="bg-white section" id="section-characteristics">
    <article class="top-overlaped bg-white clearfix">
      <h2 class="title blue text-center">Características</h2>
      <div class="col-md-12 characteristics">
        <?php display_characteristics(get_the_ID()); ?>
      </div>
    </article>
    <article class="how-to-use clearfix">
      <h2 class="title blue text-center">Como se usa</h2>
      <div class="col-md-12 videoContainer">
        <?php display_product_video(get_the_ID()); ?>
      </div>
    </article>
  </section>
  <section class="bg-blue section" id="section-relateds">
    <article class="clearfix">
      <h2 class="title white text-center">Productos Relacionados</h2>
      <div class="container-products">
        <?php display_related_products(get_the_ID()); ?>
      </div>
    </article>
  </section>
<?php endwhile; ?>

<?php get_footer(); ?>
