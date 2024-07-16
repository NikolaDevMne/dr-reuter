<?php
$containerClasses = 'container container-wide location-display';
$args = [
	'post_type' => 'medical-center',
	'posts_per_page' => -1,
];
$getMedicalCentersPosts = new WP_Query($args);
?>

<section id="our-locations" <?= get_block_wrapper_attributes(['class' => $containerClasses,]); ?>>
	<ul class="row justify-content-center">
		<?php while ($getMedicalCentersPosts->have_posts()) :
			$getMedicalCentersPosts->the_post();
			$getDoctors = get_field('choose_partitioneres');
		?>
			<li class="col-lg-6 col-12">
				<article class="card text-center border-0 py-4 px-3 d-flex flex-column align-items-center gap-3 rounded-5 bg-white">
					<?php if (has_post_thumbnail()) : ?>
						<img class="img-fluid rounded-4 w-100" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
					<?php endif; ?>
					<header>
						<h3 class="mb-1">
							<?php the_title() ?>
						</h3>
						<p>
							<?php the_field('address'); ?>
						</p>
					</header>
					<div class="card-body p-0">
						<h3 class="mb-1">
							Our medical team:
						</h3>
						<ul class="d-flex flex-column align-items-center gap-10">
							<?php foreach ($getDoctors as $doctor) :
								$doctorName = $doctor->post_title;
								$doctorId = $doctor->ID;
								$doctorUrl = get_permalink($doctorId);
								$doctorTitle = get_field('doctor_title', $doctorId);
								$doctorContent = "$doctorName - $doctorTitle";
							?>
								<li class="d-flex align-items-center">
									<a href="<?= $doctorUrl ?>" class="accent-color"><?= $doctorContent ?></a>
								</li>
							<?php endforeach ?>
						</ul>
					</div>
					<a target="_blank" rel="noopener" href="<?php the_field('google_maps_link') ?>" aria-label="Find on google maps">
						<button class="btn btn-default">
							Find us on google maps
						</button>
					</a>
				</article>
			</li>
		<?php endwhile;
		wp_reset_postdata(); ?>
	</ul>
</section>