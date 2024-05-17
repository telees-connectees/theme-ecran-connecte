<?php get_header( 'tablet' ); ?>
    <?php get_sidebar('tablet'); ?>
    <section class="content">
      <header class="tablet">
        <div class="content">
          <div class="input-container">
            <div class="icon">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#sm-solid-search_svg__clip0)" fill-rule="evenodd" clip-rule="evenodd"><path d="M7.212 1.803a5.409 5.409 0 100 10.818 5.409 5.409 0 000-10.818zM0 7.212a7.212 7.212 0 1114.424 0A7.212 7.212 0 010 7.212z"></path><path d="M11.03 11.03a.901.901 0 011.275 0l3.43 3.432a.902.902 0 01-1.274 1.275l-3.431-3.431a.901.901 0 010-1.275z"></path></g><defs><clipPath id="sm-solid-search_svg__clip0"><path d="M0 0h16v16H0z"></path></clipPath></defs></svg>
            </div>
            <input id="search" name="search" type="text" placeholder="Recherchez des utilisateurs, des groupes" autoComplete="off" />
          </div>
          <ul class="searchbar-suggestions">
          </ul>
          <div class="no-suggestions" style="display: none;">
            <em>Aucune suggestion disponible.</em>
          </div>
          <!-- header -->
        </div>
      </header>
      <!-- Content ? -->
      <div class="container">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
          <h1 class="title">
            <?php the_title(); ?>
          </h1>
          <?php the_content(); ?>
        <?php endwhile; endif; ?>
      </div>
      <script>
        const HOST = location.protocol + '//' + location.hostname + '<?php echo URL_PATH ?>';
      </script>
    <?php get_footer('tablet'); ?>
