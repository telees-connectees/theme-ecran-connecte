<?php ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <main><?php the_content(); ?></main>
    <footer style="position: absolute; background-color: rgba(0,0,0,0.9); width: 100%; height: 12vh; left: 0; bottom: 0">

    </footer>
</body>
</html>


