<?php
$walker_args = [
    'theme_location' => 'header-menu',
    'walker' => new Custom_Walker_Menu(),
    'container' => "",
    'menu_class' => "d-flex align-items-xl-center align-items-stary ms-auto navbar-nav pt-xl-0 pt-4",
    'show_caret' => true
];
$additionalClasses = is_tax() ? null : 'd-flex flex-column gap-5';
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel='icon' href='favicon.ico' type='image/x-icon' />
    <?php wp_head(); ?>
</head>

<body <?php body_class(['d-flex', 'flex-column']); ?>>

    <header class="navbar navbar-expand-xl py-3 bg-white fixed-top">

        <div class="container">
            <a href="/">
                <img class="img-fluid company-logo" width="308" height="47" src="/wp-content/uploads/2024/04/dr-reuter-company-logo.png" alt="Company logo">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <?= custom_hamburger_icon() ?>
            </button>
            <nav class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php wp_nav_menu($walker_args); ?>
                <span class="mobile-menu d-xl-none d-block text-center">
                    <div class="divider w-100 my-3"></div>
                    <ul class="w-100 d-flex align-items-center justify-content-center gap-3 mb-5">
                        <?php get_template_part('template-parts/social-media'); ?>
                    </ul>
                    <h3 class="sub-title mb-1">
                        Working hours
                    </h3>
                    <p class="mb-1">
                        <?php customString(get_field('working_days', 'options')); ?>
                    </p>
                    <p class="mb-1">
                        <?php customString(get_field('working_hours', 'options')); ?>
                    </p>
                    <a href="<?= get_permalink(27) ?>">
                        <button class="btn btn-default">Get in touch</button>
                    </a>
                </span>
            </nav>
        </div>

        <?php get_template_part('template-parts/mega-menu'); ?>

    </header>

    <main class="flex-grow-1 <?= $additionalClasses ?>">