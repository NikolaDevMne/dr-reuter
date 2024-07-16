<?php
$heroTitle = $args['title'] ?? 'Dr Reuter';
$heroImg = $args['img'] ?? '';
$desc = $args['desc'] ?? '';
?>

<section class="w-100 default-hero position-relative d-flex justify-content-center align-items-md-center align-items-end text-md-center text-start">

    <img src="<?= esc_url($heroImg) ?>" alt="<?= esc_html($heroTitle) ?>" class="h-100 w-100 img-fluid position-relative z-n1">

    <span class="position-absolute p-x-0 px-4 d-flex flex-column justify-content-center align-items-md-center align-items-start pb-md-0 pb-6">
        <h1 class="text-white fw-bold mb-2">
            <?= esc_html($heroTitle) ?>
        </h1>
        <?php if ($desc != '') : ?>
            <p class="col-md-6 col-12 text-white">
                <?= wp_strip_all_tags($desc) ?>
            </p>
        <?php endif ?>
    </span>

</section>