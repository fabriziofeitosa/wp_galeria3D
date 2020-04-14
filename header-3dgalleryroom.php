<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/3DGalleryRoom/css/default.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/3DGalleryRoom/css/component.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/3DGalleryRoom/css/modal.css" />
        <script src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/3DGalleryRoom/js/modernizr.custom.js"></script>

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Cutive+Mono&display=swap');
        </style>

        <title><?= get_bloginfo('name') ?> | <?= the_title() ?></title>

        <?php //wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>