<?php ?>
<!-- FOOTER -->
<style>
    body{
        overflow-x: hidden;
    }

    main{
        display: flex;
        flex-direction: column;
    }

    #fleche-icon {
        max-width: 3vw;
    }

    .container-retour {
        display: flex;
        justify-content: space-between;
        padding-bottom: 5%;
        width: 80vw;
        margin: 0 auto;
    }

    .texte{
        color: #0b0e11;
    }

    a{
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        transition: all 0.2s;
    }

    a:hover{
        transform: scale(1.1);
    }

</style>
<div class="container-retour">
    <a href="<?php echo home_url("/secretary/config"); ?>">
        <img id="fleche-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/option.png">
        <h6 class="texte"> OPTION </h6>
    </a>
    <a onclick="history.back()">
        <img id="fleche-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/en-arriere.png">
        <h6 class="texte"> RETOUR </h6>
    </a>
</div>
</footer>
<?php wp_footer(); ?>
