<?php
/**
 * Ce code génère la structure HTML de l'en-tête d'une page web, ainsi que le contenu principal.
 * Il inclut la déclaration DOCTYPE, les balises <head>, le corps de la page, l'en-tête de la navigation (pour certains utilisateurs),
 * et un pied de page personnalisé ("bouton-retour").
 */

// Début du document HTML.
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?></title>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Inclusion d'une feuille de style CSS externe -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/assets/css/secretary-header.css' ?>">

        <?php wp_head(); ?>
    </head>

    <!-- BODY -->
<?php
// Récupération de l'utilisateur actuel.
$current_user = wp_get_current_user();

// Vérification du rôle de l'utilisateur pour déterminer la classe CSS du corps de la page.
if (in_array('television', $current_user->roles)) :
    ?>
<body class="body_television_ecran" <?php body_class(); ?>>
<?php else: ?>
<body <?php body_class(); ?>>
<?php endif; ?>

    <!-- HEADER -->
<?php
$current_user = wp_get_current_user();

// Vérification du rôle de l'utilisateur pour déterminer l'affichage de l'en-tête.
if (!in_array('television', $current_user->roles)) :

    // Récupération du titre de la page actuelle.
    $current_page_title = get_the_title();

    // Définition de titres personnalisés pour certaines pages.
    $custom_titles = [
        'secretary-welcome' => 'Menu',
        'homepage' => 'Page D Accueil',
        'year-student-schedule' => 'Emploi du Temps',
        'main-menu' => 'Menu',
        'all-years-schedule' => 'Emploi du Temps pour toutes les Années',
        'weekly-computer-room-schedule' => 'Horaires Salles Informatiques',
        'secretary-config' => 'Configuration',
        'config-schedule' => 'Configuration Emploi du Temps'
    ];

    // Utilisation du titre personnalisé s'il existe, sinon utilisation du titre de la page.
    $custom_title = isset($custom_titles[$current_page_title]) ? $custom_titles[$current_page_title] : $current_page_title;
    ?>

    <header>
        <div class="header-bg">
            <div class="header-content blue">
                <img src="https://iut.univ-amu.fr/themes/amu/amu_iut/logo.svg" alt="logo-iut" id="img-iut">
                <script>
                    document.getElementById("img-iut").onclick = function() {
                        window.location.href = "/secretary/welcome/";
                    };
                </script>
                <h1 id="titre"><?php echo $custom_title; ?></h1>
            </div>
        </div>
    </header>
    <main>
        <?php the_content(); ?>
    </main>

<?php endif; ?>

    <!-- Inclusion d'un pied de page personnalisé appelé "bouton-retour". -->
<?php get_footer('bouton-retour'); ?>