<?php get_header() ?>
<section class="d-flex flex-column justify-content-center align-items-center position-relative">
    <h1 class="fw-bold text-white mb-2 position-relative z-2">
        404 page
    </h1>
    <p class="text-white mb-3 position-relative z-2">
        Sorry, we were unable to find that page
    </p>
    <a href="<?= get_home_url() ?>" class="position-relative z-2">
        <button class="btn btn-default">
            See our front page
        </button>
    </a>
</section>
<?php get_footer() ?>
