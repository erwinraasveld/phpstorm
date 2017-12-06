<!doctype html>
<html lang="nl">

<head>
    <title><?php echo SITE_NAME; ?> <?php echo wp_title('&raquo;',true,'left'); ?></title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <link rel="stylesheet" href="https://use.typekit.net/fzh4emn.css">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>/assets/css/style.min.css" />

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<nav class="container">


    <nav class="row">

        <div class="col-xs-12">
            <div class="logo">
                <?php
                printf('<a href="%s">%s</a>',HOME_URL,file_get_contents(TEMPLATE_DIR.'/assets/img/logo.svg'));
                ?>
            </div>
            <div class="hoofdmenu">
	            <?php
	            $args = array
	            (
		            'theme_location'        => 'main-menu',
		            'container'             => false,
	            );

	            wp_nav_menu($args);

	            ?>
            </div>
        </div>
    </nav>
</nav>


<?php include_once 'templates/header-banner.php'; ?>