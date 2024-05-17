<?php
/**
 * Ce fichier est utilisé pour afficher les commentaires sur une page ou un article WordPress.
 *
 * Ne pas supprimer les lignes en haut de ce fichier.
 */

// Vérifie si ce fichier est appelé directement et empêche l'accès direct.
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die('Ne pas télécharger cette page directement, merci !');
}

// Vérifie si un mot de passe est requis pour accéder aux commentaires.
if (!empty($post->post_password)) {
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
        // Si le mot de passe est incorrect, affiche un message et quitte le script.
        ?>
        <h2><?php _e('Protégé par mot de passe'); ?></h2>
        <p><?php _e('Entrer le mot de passe pour voir les commentaires'); ?></p>
        <?php return;
    }
}

/* Cette variable est utilisée pour alterner la couleur de fond des commentaires */
$oddcomment = 'alt';
?>

<div class="cadre_commentaires">
    <?php if ($comments) : ?>
        <!-- Affiche le titre et le nombre de commentaires s'il y en a. -->
        <h3 id="comments"><?php comments_number('Pas de commentaire', 'Un commentaire', '% commentaires'); ?> pour
            &#8220;<?php the_title(); ?>&#8221;</h3>
        <ol class="commentlist">
            <?php foreach ($comments as $comment) : ?>
                <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
                    <div class="commentmetadata">
                        <strong><?php comment_author_link() ?></strong>, <?php _e('le'); ?> <a
                                href="#comment-<?php comment_ID() ?>"
                                title=""><?php comment_date('j F, Y') ?><?php _e('&agrave;'); ?><?php comment_time() ?></a>
                        <?php _e('Said&#58;'); ?> <?php edit_comment_link('Edit Comment', '', ''); ?>
                        <?php if ($comment->comment_approved == '0') : ?>
                            <em><?php _e('Votre commentaire est en cours de modération'); ?></em>
                        <?php endif; ?>
                    </div>
                    <?php comment_text() ?>
                </li>
                <?php /* Change la classe de fond pour chaque commentaire */
                if ('alt' == $oddcomment) $oddcomment = '';
                else $oddcomment = 'alt';
                ?>
            <?php endforeach; /* fin de la boucle des commentaires */ ?>
        </ol>
    <?php else : // Cela s'affiche s'il n'y a pas encore de commentaires ?>
        <?php if ('open' == $post->comment_status) : ?>
            <!-- Si les commentaires sont autorisés, mais il n'y a pas encore de commentaires. -->
        <?php else : // Les commentaires sont fermés ?>
            <!-- Si les commentaires sont fermés. -->
            <p class="nocomments">Les commentaires sont fermés !</p>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php if ('open' == $post->comment_status) : ?>
    <h3 id="respond">Laissez un commentaire</h3>
    <?php if (get_option('comment_registration') && !$user_ID) : ?>
        <!-- Si l'inscription est requise pour commenter et que l'utilisateur n'est pas connecté. -->
        <p>Vous devez être <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">connecté</a> pour laisser un commentaire.</p>
    <?php else : ?>
        <!-- Formulaire de commentaire -->
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <?php if ($user_ID) : ?>
                <p>Connecté en tant que <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
                    <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Déconnecté de ce compte">Déconnexion &raquo;</a></p>
            <?php else : ?>
                <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1"/>
                    <label for="author"><small>Nom <?php if ($req) echo "(requis)"; ?></small></label></p>
                <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2"/>
                    <label for="email"><small>Email (ne sera pas publié) <?php if ($req) echo "(requis)"; ?></small></label></p>
                <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3"/>
                    <label for="url"><small>Site Web</small></label></p>
            <?php endif; ?>
            <!--<p><small><strong>XHTML:</strong> <?php _e('Vous pouvez utiliser ces tags&#58;'); ?> <?php echo allowed_tags(); ?></small></p>-->
            <p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>
            <p><input name="submit" type="submit" id="submit" tabindex="5" value="Envoyer"/>
                <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>"/>
            </p>
            <?php do_action('comment_form', $post->ID); ?>
        </form>
    <?php endif; ?>
<?php endif; ?>
