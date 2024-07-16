<?php
/* 
Template Name: Our Team Template
*/
get_header();
$args = [
    'post_type' => 'partitioner',
    'posts_per_page' => -1,
    'orderby'        => 'meta_value_num',
    'meta_key'       => 'custom_order',
    'order'          => 'ASC'
];
$getDoctorPosts = new WP_Query($args);
$heroArgs = [
    'title' => get_the_title(),
    'img' => get_the_post_thumbnail_url(get_the_ID(), 'full')
]
?>

<?php get_template_part('template-parts/default-hero', null, $heroArgs); ?>

<?php get_template_part('template-parts/rankmath', 'breadcrumbs'); ?>

<?php the_content(); ?>

<section class="container">
    <ul class="row gy-3">
        <?php while ($getDoctorPosts->have_posts()) : $getDoctorPosts->the_post(); ?>
            <li class="col-md-3 col-12">
                <article class="position-relative">
                    <img class="img-fluid rounded-4 default-ratio h-100 w-100 mb-2" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <h3 class="fw-normal fs-5">
                        <?php the_title() ?>
                    </h3>
                    <a class="stretched-link z-3" href="<?php the_permalink(); ?>" aria-label="Read more about <?php the_title() ?>"></a>
                    <p>
                        <?php the_field('doctor_title'); ?>
                    </p>
                </article>
            </li>
        <?php endwhile;
        wp_reset_postdata(); ?>
    </ul>
</section>

<?php get_footer(); ?>