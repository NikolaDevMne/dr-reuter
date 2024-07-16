<?php
$addedContainerClasses = 'swiper home-hero frontend-view position-relative';

$frontImageId = isset($attributes['frontImageId']) ? esc_attr($attributes['frontImageId']) : '';

$frontImage =  wp_get_attachment_image($frontImageId, ['967', '370'], false, ['class' => 'img-fluid object-fit-contain d-md-block d-none']);

$imageArray = isset($attributes['backgroundImageArray']) ? $attributes['backgroundImageArray'] : ['FAILED'];
?>

<section <?= get_block_wrapper_attributes(['class' => $addedContainerClasses,]); ?>>
	<div class="swiper-wrapper">
		<?php foreach ($imageArray as $image) : ?>
			<div class="swiper-slide">
				<img class="img-fluid h-100 w-100" src="<?= esc_url($image['url']) ?>" alt="<?= esc_attr($image['alt']) ?>">
			</div>
		<?php endforeach ?>
	</div>
	<div class="homepage-hero-overlay position-absolute inset-0 h-100 w-100 text-center">
		<div class="backdrop"></div>
		<?= $frontImage ?>
		<h2 class="col-md-6">
			<?= get_bloginfo('description') ?>
		</h2>
	</div>
</section>