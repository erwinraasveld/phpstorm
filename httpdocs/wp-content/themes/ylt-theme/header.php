<!doctype html>
<html lang="nl">

<head>
    <title><?php echo SITE_NAME; ?> <?php echo wp_title('&raquo;',true,'left'); ?></title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>/assets/css/style.min.css" />

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>





<nav class="container">


    <nav class="row">
        <div class="col-xs-12">
            <?php

            $args = array
            (
                'theme_location'        => 'main-menu',
                'container'             => false,
            );

            wp_nav_menu($args);

            ?>
        </div><!-- .col-xs-12 -->
    </nav><!-- .row -->


    <?php if(function_exists('bcn_display')): ?>
    <nav class="row breadcrumbs">
        <div class="col-xs-12" xmlns:v="http://rdf.data-vocabulary.org/#">
            <?php bcn_display(); ?>
        </div><!-- .col-xs-12 -->
    </nav><!-- .row -->
    <?php endif; ?>


</nav><!-- .container -->
