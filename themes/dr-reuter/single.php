<?php
get_header();

$featuredImgUrl = get_the_post_thumbnail_url(get_option('page_for_posts'), 'full');
$date = get_the_date('F j, Y');
$heroArgs = [
    'title' => get_the_title(),
    'img' => get_the_post_thumbnail_url(get_option('page_for_posts'), 'full')
];

$doctors = get_field('choose_partitioners');


$categories = get_the_category();
$categoryId = $categories[0]->cat_ID;

$args = [
    'category__in' => [$categoryId],
    'post__not_in' => [get_the_ID()],
    'posts_per_page' => 3,
];

$relatedPosts = new WP_Query($args);
?>

<?php get_template_part('template-parts/default-hero', null, $heroArgs); ?>

<?php get_template_part('template-parts/rankmath', 'breadcrumbs'); ?>

<section class="container d-flex flex-column gap-3">

    <div class="date-author-container d-flex align-items-center flex-md-row flex-column">
        <time class="d-block">
            <?= $date ?>
        </time>
        <?php if (!empty($doctors)) : ?>
            <p class="mx-1">
                - Written by:
            </p>
            <?php foreach ($doctors as $i => $author) : ?>
                <a class="text-body <?= $i === 0 ? 'first-link' : '' ?>" target="_blank" href="<?= esc_url(get_permalink($author->ID)) ?>" aria-label="Read more about the author, <?= esc_attr($author->post_title) ?>">
                    <?= esc_html($author->post_title) ?>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <?php the_content() ?>

</section>

<?php
if ($relatedPosts->have_posts()) : ?>
    <section class="related-posts container container-wide">
        <header class="text-center mb-3">
            <h2>
                Related posts
            </h2>
        </header>
        <ul class="row gy-md-0 gy-3">
            <?php while ($relatedPosts->have_posts()) : $relatedPosts->the_post(); ?>
                <li class="col-lg-4 col-12">
                    <article class="card card-small h-100 w-100 border-0 bg-white rounded-4 position-relative p-4">
                        <span>
                            <header class="d-flex align-items-center mb-1">
                                <h3 class="sub-title fs-7">
                                    <?= get_the_category(get_the_ID())[0]->name ?>
                                </h3>
                                <div class="blog-divider mx-2">•</div>
                                <time class="fs-7" datetime="<?= get_the_date() ?>">
                                    <?= get_the_date() ?>
                                </time>
                            </header>
                            <h2 class="mb-3 fs-4">
                                <?php the_title() ?>
                            </h2>
                        </span>
                        <p>
                            <?= truncateText(get_the_excerpt(), 100) ?>
                        </p>
                        <a href="<?= esc_url(the_permalink()) ?>" class="stretched-link" aria-label="Go to the blog that tells you about <?= the_title() ?>">
                        </a>
                    </article>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>
<?php endif; ?>




<?php get_footer() ?>