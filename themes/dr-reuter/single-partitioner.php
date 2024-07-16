<?php
get_header();
$description      = get_field('description') ?? '';
$doctorTitle      = get_field('doctor_title') ?? '';
$department       = get_field('department') ?? '';
$vid              = get_field('video') ?? '';
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<section class="container mt-5 pt-md-5 pt-3 welcome-block">
    <div class="row gx-md-5 gx-0">
        <div class="col-md-6 col-12 mb-md-0 mb-3">
            <img class="img-fluid h-100 w-100 rounded-5" src="<?= $featured_img_url ?>" alt="">
        </div>
        <div class="col-md-6 col-12 d-flex flex-column justify-content-evenly bg-white section-default-style gap-3 p-md-5 p-4">
            <h2>
                About <?php the_title() ?>
            </h2>
            <span>
                <p>
                    <span class="text-black fw-bold">Designation:</span> <?= $doctorTitle ?>
                </p>
                <p class="mb-3">
                    <span class="text-black fw-bold">Department:</span> <?= $department ?>
                </p>
                <p>
                    <?= $description ?>
                </p>
            </span>
            <a href="<?= esc_url(get_page_link(27)) ?>">
                <button class="btn btn-default">
                    Book an appointment
                </button>
            </a>
        </div>
    </div>
</section>

<section class="doctors-paragraph container bg-white section-default-style p-md-5 p-4">
    <div class="row gy-3">
        <div class="col-12 mb-4">
            <h2>
                <?php the_title() ?> specializes in the following areas:
            </h2>
        </div>
        <?php
        if (have_rows('paragraphs')) : ?>
            <?php while (have_rows('paragraphs')) : the_row();
                $sub_value = get_sub_field('paragraph');
            ?>
                <div class="col-md-6 col-12 mb-md-0 mb-3">
                    <p>
                        <?= wrapTextInSpan($sub_value) ?>
                    </p>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </div>
</section>

<?php if ($vid) : ?>
    <section class="container p-0">
        <div class="row">
            <div class="col-12">
                <video class="rounded-4 w-100" controls aria-label="Video about <?php the_title() ?>" title="<?= esc_attr($vid['title']) ?>">
                    <source src="<?= esc_url($vid['url']) ?>" type="video/mp4">
                    Your browser does not support the video.
                </video>
            </div>
        </div>
    </section>
<?php endif ?>

<?php get_footer(); ?>