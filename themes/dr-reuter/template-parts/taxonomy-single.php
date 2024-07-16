<?php
$isLastCat            = get_field('last_category');
$addons               = get_field('last_category_addons');
$addonsTitle          = $addons['title'] ?? $currentTax->name;
$addonsDescription    = $addons['description'] ?? '';
$addonsTabs           = $addons['tabs'] ?? [];
$addonsPartitioners   = $addons['partitioners'] ?? [];
$addonsBeforeAndAfter = $addons['before_and_after'] ?? [];
$thumbNailImage       = get_field("thumbnail_image", 'category_' . $currentTax->term_id) ?? null;
$i                    = 0;
?>

<section class="single-about section-default-style p-md-5 p-4 bg-white">
    <div class="row gx-5 gy-3">
        <div class="col-md-4 col-12">
            <img class="img-fluid w-100 h-100 rounded-4" src="<?= esc_url($thumbNailImage['url']) ?>" alt="">
        </div>
        <div class="col-md-8 d-flex flex-column justify-content-center gap-3">
            <h2 class="col-md-10 col-12">
                <?= esc_html($addonsTitle) ?>
            </h2>
            <p class="col-md-8 col-12">
                <?= $addonsDescription ?>
            </p>
            <a class="text-md-start text-center" href="<?= esc_url(get_page_link(27)) ?>">
                <button class="btn btn-default">
                    Book an appointment
                </button>
            </a>
        </div>
    </div>
</section>

<?php if ($isLastCat) : ?>

    <?php if ($addonsTabs) : ?>

        <?php foreach ($addonsTabs as $tabGroup) :
            $tab = $tabGroup['tab'];
            $subTitle = esc_html($tab['subtitle']);
            $title    = esc_html($tab['title']);
            $content  = $tab['content'];
            $i++;
            $isFirst = $i === 1;
        ?>

            <section class="accordion bg-white accordion-item section-default-style p-md-5 p-4 border-0">
                <header class="accordion-header">
                    <button class="accordion-button p-0 <?= $isFirst ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#tab-<?= $i ?>" aria-expanded="<?= $isFirst ? 'true' : 'false' ?>" aria-controls="tab-<?= $i ?>">
                        <span class="d-flex flex-column">
                            <h3 class="sub-title mb-1">
                                <?= $subTitle ?>
                            </h3>
                            <h2>
                                <?= $title ?>
                            </h2>
                        </span>
                    </button>
                </header>
                <div id="tab-<?= $i ?>" class="accordion-collapse collapse col-md-10 col-12 <?= $isFirst ? 'show' : '' ?>" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body p-0 pt-4">
                        <?= $content ?>
                    </div>
                </div>
            </section>

        <?php endforeach; ?>

    <?php endif; ?>

    <?php if ($addonsBeforeAndAfter) : ?>

        <section class="comparison-slider bg-white section-default-style p-md-5 p-4">
            <h2 class="mb-4">
                Before & after
            </h2>
            <img-comparison-slider class="w-100 rounded-4 h-100">
                <?php foreach ($addonsBeforeAndAfter as $index => $image) : ?>
                    <img class="w-100 img-fluid rounded-4" slot="<?= $index === 0 ? 'first' : 'second' ?>" src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt'] ?? 'Image description') ?>" />
                <?php endforeach ?>
            </img-comparison-slider>
        </section>

    <?php endif ?>

    <?php if ($addonsPartitioners) : ?>
        <section class="single-partitioners bg-white section-default-style p-md-5 p-4">
            <div class="row gy-md-3">
                <header class="col-12 mb-4">
                    <h2>
                        Consult our experts
                    </h2>
                    <p>
                        Our services are carefully designed to provide to your individual needs, offering a holistic
                        approach that addresses both physical and emotional well-being.
                    </p>
                </header>
                <?php foreach ($addonsPartitioners as $partitioner) :
                    $doctorTitle = get_field('doctor_title', $partitioner->ID);
                    $featuredImage = get_the_post_thumbnail_url($partitioner->ID);
                ?>
                    <article class="col-md-4 col-12 position-relative">
                        <img class="img-fluid rounded-4 mb-3" src="<?= esc_url($featuredImage) ?>" alt="<?= esc_attr($partitioner->post_title) ?>">
                        <h3>
                            <?= esc_html($partitioner->post_title) ?>
                        </h3>
                        <p>
                            <?= esc_html($doctorTitle) ?>
                        </p>
                        <a class="stretched-link" href="<?= get_permalink($partitioner->ID) ?>"></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif ?>

<?php endif ?>