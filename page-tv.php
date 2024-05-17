<?php get_header('tv'); ?>
    <!-- MAIN -->
    <main>
      <div class="px-0 container-fluid" style="background-color: #F2EFF2 !important;">
        <div class="flex-row my-4 position-sticky col col-9 d-flex align-items-center" style="z-index:1000;background-color: #F2EFF2;top: 0;">
          <img style="padding-left: 3.5rem;" src="<?php echo get_template_directory_uri(); ?>/assets/images/aixmarseille.png" width="auto" height="70px" alt="Logo Aix-Marseille" />

          <span id="time">00:00</span>
          <span id="date" class="ps-2 text-muted">Jeudi<br />1er Janvier 1970</span>
        </div>
        <div class="row flex-nowrap">
            <section class="px-5 py-5 col col-9">
              <?php the_content(); ?>
              <?php the_widget('WidgetAlert'); ?>
            </section>
            <?php get_sidebar('tv'); ?>
        </div>
      </div>
    </main>
<?php get_footer('tv'); ?>
