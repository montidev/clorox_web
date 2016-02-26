    </main>

    <footer class="bg-light-grey">
      

      <div class="logo text-center">
        <img class="img-responsive responsive-img" alt="Brand" src="<?php get_logo_uri(); ?>">
      </div>

      <div class="menu text-center">
        <?php display_primary_menu('list list-inline'); ?>
      </div>

      <div class="container-fuild clearfix">
        <div class="col-sm-2 col-sm-offset-5 change-language">
          <?php widget_languages_as_dropdown(); ?>
        </div>
      </div>

      <div class="text-center copyright">
        <p>&copy; 2016 Clorox - <a href="/policies">Política de Privacidad</a></p>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
