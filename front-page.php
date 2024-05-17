<?php
/**
 * Ce code est utilisé pour afficher la structure principale d'une page web, y compris l'en-tête, le contenu principal et le pied de page.
 */

// Inclusion de l'en-tête de la page (header.php) via la fonction WordPress get_header().
get_header();
?>

    <!-- MAIN -->
    <main>
        <?php
        // Récupération de l'utilisateur actuel.
        $current_user = wp_get_current_user();

        // Vérification si l'utilisateur a le rôle 'etudiant' ou 'television'.
        if(in_array('etudiant', $current_user->roles) || in_array('television', $current_user->roles)) :
        ?>
        <!-- Affichage d'une structure de colonne pour les utilisateurs avec les rôles 'etudiant' ou 'television'. -->
        <div class="row">
            <div class="container col-md-7 order-md-2 text-center text-md-left pr-md-5">
                <?php else: ?>
                <!-- Affichage d'une structure de conteneur pour les autres utilisateurs. -->
                <div class="container">
                    <?php endif; ?>

                    <?php
                    // Vérification si un plugin nommé 'plugin-ecran-connecte/amu-ecran-connecte.php' est actif.
                    if(is_plugin_active('plugin-ecran-connecte/amu-ecran-connecte.php')) :
                        // Appel de la fonction schedule_render_callback() pour afficher son contenu.
                        echo schedule_render_callback();
                    endif;
                    ?>
                </div>

                <?php
                // Vérification du rôle de l'utilisateur et inclusion de la barre latérale si nécessaire.
                if(in_array('etudiant', $current_user->roles) || in_array('television', $current_user->roles)) :
                    get_sidebar();
                endif;
                ?>

                <?php
                // Fermeture de la structure de colonne si l'utilisateur a les rôles 'etudiant' ou 'television'.
                if(in_array('etudiant', $current_user->roles) || in_array('television', $current_user->roles)) :
                ?>
            </div>
        </div>
    <?php else: ?>
        <!-- Fermeture de la structure de conteneur pour les autres utilisateurs. -->
        </div>
    <?php endif; ?>
    </main>

<?php
// Inclusion du pied de page (footer.php) via la fonction WordPress get_footer().
get_footer();
?>