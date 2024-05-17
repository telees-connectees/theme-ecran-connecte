  <?php ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php 
      add_filter('show_admin_bar', '__return_false');
      wp_head();
    ?>
</head>
<!-- BODY -->
<?php $current_user = wp_get_current_user(); ?>
<body>
  <main class="main dark">
