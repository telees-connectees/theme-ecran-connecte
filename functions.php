<?php

include_once 'inc/customizer/custom_colors.php';
include_once 'inc/customizer/custom_sidebar.php';
include_once 'inc/customizer/custom_schedule.php';
include_once 'inc/customizer/custom_footer.php';

add_filter('auto_update_plugin', '__return_true');
add_filter('auto_update_theme', '__return_true');

/*
function wp_maintenance_mode()
{
	if(!current_user_can('edit_themes') || !is_user_logged_in()) {
		wp_die('<h1 style="color:red">Site en maintenance</h1>
<br />Le site est en cours de maintenance, merci de bien patienter
<script src="/wp-content/themes/theme-ecran-connecte/assets/js/refresh.js"></script>');
	}
}
add_action('get_header', 'wp_maintenance_mode');
*/
add_action('admin_post_delete_user', 'handle_delete_user');

function handle_delete_user() {
    $user_id = isset($_GET['id']) ? $_GET['id'] : 0;
    $nonce = isset($_GET['_wpnonce']) ? $_GET['_wpnonce'] : '';

    if (!wp_verify_nonce($nonce, 'delete_user_' . $user_id)) {
        die('Opération non autorisée');
    }


    if (current_user_can('delete_users')) {

        wp_delete_user($user_id);
    } else {
        die('Vous n\'avez pas les droits nécessaires pour effectuer cette action.');
    }

    wp_redirect(admin_url('users.php'));
    exit;
}
function add_scripts()
{
  $current_user = wp_get_current_user();
  
  /**
  * Chargement conditionnel
  * Cette technique permet de charger les scripts et styles nécessaires à une page spéciale UNIQUEMENT à cette page,
  * pour améliorer les performances
  * @author Thomas Cardon
  */
  if (is_page('tablet-view')) {
    wp_enqueue_script('tablet_search', get_template_directory_uri() . '/assets/js/search.js');
    wp_enqueue_style( 'tablet_theme', get_template_directory_uri() . '/assets/css/tablet.css');
    return;
  }
    
  /**
  * Bootstrap
  * Mise-à-jour 2021: passage de Bootstrap 4.1.3 à Bootstrap 5
  * @author Thomas Cardon
  */
  wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
  wp_enqueue_script('bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), false, true);

  wp_enqueue_style('theme_style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'add_scripts');

/**
 * CSS for login page
 */
function my_login_stylesheet()
{
    wp_enqueue_style('login_css', get_stylesheet_directory_uri() . '/assets/css/login.css');
}
add_action('login_enqueue_scripts', 'my_login_stylesheet');

/**
 * Remove the wordpress bar
 */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

/**
 * Disable the url /wp-admin except for the admin
 */
function wpm_admin_redirection()
{
    if (is_admin() && !current_user_can('administrator')) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('init', 'wpm_admin_redirection');

/**
 * Change the url of the logo
 * @return mixed
 */
function my_login_logo_url()
{
    return $_SERVER['HTTP_HOST'];
}
add_filter('login_headerurl', 'my_login_logo_url');

/**
 * Change the title of the logo
 *
 * @return string
 */
function my_login_logo_url_title()
{
    return get_bloginfo('name');
}
add_filter('login_headertitle', 'my_login_logo_url_title');

// Register a new navigation menu
function add_Main_Nav()
{
    register_nav_menu('header-menu',__('Header Menu'));
}
add_action('init', 'add_Main_Nav');

$args = array(
    'flex-width'    => true,
    'width'         => 500,
    'flex-height'   => true,
    'height'        => 500,
    'default-image' => get_template_directory_uri() . '/assets/media/header.png',
);
add_theme_support('custom-header', $args);

//Met la bonne heure
global $wpdb;
date_default_timezone_set('Europe/Paris');
$wpdb->time_zone = 'Europe/Paris';

// All sidebars
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Header',
        'id' => 'sidebar-1',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Footer',
        'id' => 'sidebar-2',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer gauche',
        'id' => 'sidebar-3',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer droite',
        'id' => 'sidebar-4',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Colonne Gauche',
        'id' => 'sidebar-5',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Colonne Droite',
        'id' => 'sidebar-6',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
