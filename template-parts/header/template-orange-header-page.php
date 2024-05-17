<?php get_header('orange'); ?>
<!-- MAIN -->
<main>
    <div class="container-fluid px-0" style="background-color: #F2EFF2 !important;">
        <section>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="article-full">
                    <?php the_content(); ?>
                </article>
            <?php endwhile; else : ?>
                <article>
                    <p>Désolé, aucune page trouvée!</p>
                </article>
            <?php endif; ?>
        </section>
    </div>
</main>
<?php get_footer('bouton-retour'); ?>
