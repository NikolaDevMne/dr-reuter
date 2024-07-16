<?php
get_header();
$heroArgs = [
    'title' => get_the_title(),
    'img' => get_the_post_thumbnail_url(get_the_ID(), 'full')
]
?>

<?php get_template_part('template-parts/default-hero', null, $heroArgs); ?>

<?php get_template_part('template-parts/rankmath', 'breadcrumbs'); ?>

<?php the_content(); ?>

<?php get_footer(); ?>