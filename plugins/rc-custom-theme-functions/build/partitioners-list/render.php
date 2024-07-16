<?php
$containerClasses = 'container container-wide inner-padding section-default-style partitioners-list';

$args = [
	'post_type' => 'partitioner',
	'posts_per_page' => -1,
	'orderby'        => 'meta_value_num',
	'meta_key'       => 'custom_order',
	'order'          => 'ASC'
];
$getDoctorPosts = new WP_Query($args);
$title = $attributes['title'] ?? '';
$subTitle = $attributes['subTitle'] ?? '';
$description = $attributes['description'] ?? '';
?>

<section <?= get_block_wrapper_attributes(['class' => $containerClasses,]); ?>>
	<div class="row">
		<article class="col-xl-4 col-12 mb-xl-0 mb-5 h-100 d-flex flex-column gap-2">
			<header>
				<h3 class="sub-title">
					<?= esc_html($subTitle) ?>
				</h3>
			</header>
			<h2>
				<?= esc_html($title) ?>
			</h2>
			<p>
				<?= esc_html($description) ?>
			</p>
			<a href="<?= get_permalink(15) ?>">
				<button class="btn btn-default">
					View all
				</button>
			</a>
		</article>
		<aside class="col-xl-8 col-12">
			<ul class="row g-3">
				<?php while ($getDoctorPosts->have_posts()) : $getDoctorPosts->the_post(); ?>
					<li class="col-md-6 col-12">
						<figure class="card border-0 bg-transparent position-relative rounded-4">
							<?php if (has_post_thumbnail()) : ?>
								<img width="300" height="390" class="img-fluid rounded-4" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							<?php endif; ?>
							<span class="position-absolute w-100 h-100 d-flex flex-column justify-content-end py-5 px-4 z-3">
								<figcaption class="text-white fs-5">
									<?php the_title() ?>
								</figcaption>
								<p class="text-white">
									<?php the_field('doctor_title'); ?>
								</p>
							</span>
							<a class="stretched-link z-3" href="<?php the_permalink(); ?>" aria-label="Read more about <?php the_title() ?>"></a>
						</figure>
					</li>
				<?php endwhile;
				wp_reset_postdata(); ?>
			</ul>
		</aside>
	</div>
</section>