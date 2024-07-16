<?php
$containerClasses = 'container container-wide inner-padding section-default-style d-flex flex-column align-items-xl-start align-items-center gap-5 position-relative google-reviews';
$apiKey = 'AIzaSyCLmzI3dvE9HwvG5chP9SW6EclTSUAFJGg';
$place_id = 'ChIJxxBArfZrXz4R5UZ-53Ls8xw';
$url = "https://maps.googleapis.com/maps/api/place/details/json?fields=name,rating,reviews&place_id=$place_id&key=$apiKey";
$response = wp_remote_get($url);
$body = json_decode(wp_remote_retrieve_body($response), true);
$title = isset($attributes['title']) ? esc_html($attributes['title']) : '';
$subTitle = isset($attributes['subTitle']) ? esc_html($attributes['subTitle']) : '';
$buttonText = isset($attributes['button']) ? esc_html($attributes['button']) : '';

$fallbackReviews = [
	[
		'author_name' => 'John Doe',
		'profile_photo_url' => '/path/to/default/photo1.png',
		'rating' => 5,
		'text' => 'Absolutely fantastic service! Highly recommend.'
	],
	[
		'author_name' => 'Jane Smith',
		'profile_photo_url' => '/path/to/default/photo2.png',
		'rating' => 5,
		'text' => 'Wonderful experience from start to finish.'
	],
	[
		'author_name' => 'Emily Johnson',
		'profile_photo_url' => '/path/to/default/photo3.png',
		'rating' => 5,
		'text' => 'Very professional, thorough, and caring.'
	]
];

if ($body && isset($body['result']['reviews'])) {
	$fiveStarReviews = array_filter($body['result']['reviews'], function ($review) {
		return $review['rating'] == 5;
	});

	// dd($fiveStarReviews);

	if (count($fiveStarReviews) >= 3) {
		$reviewsToShow = array_slice($fiveStarReviews, 0, 3);
	} else {
		$reviewsToShow = array_merge($fiveStarReviews, array_slice($premadeReviews, 0, 3 - count($fiveStarReviews)));
	}
} else {
	$reviewsToShow = array_slice($fallbackReviews, 0, 3);
}
?>


<section <?= get_block_wrapper_attributes(['class' => $containerClasses,]); ?>>
	<article class="reviews-marker d-flex flex-column align-items-center gap-2 p-3 rounded-4 text-center">
		<img src="/wp-content/uploads/2024/04/google-logo-dr-reuter-reviews.png" alt="Google logo">
		<h3 class="fs-6 text-regular">
			Google rating
		</h3>
		<h3 class="gold-color">
			<?= esc_html($body['result']['rating']) ?>
		</h3>
		<span class="d-flex align-items-center gap-1">
			<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="#F7BE37" viewBox="0 0 16 16">
				<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
			</svg>
			<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="#F7BE37" viewBox="0 0 16 16">
				<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
			</svg>
			<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="#F7BE37" viewBox="0 0 16 16">
				<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
			</svg>
			<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="#F7BE37" viewBox="0 0 16 16">
				<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
			</svg>
			<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="#F7BE37" viewBox="0 0 16 16">
				<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
			</svg>
		</span>
	</article>
	<header class="row">
		<h3 class="sub-title col-12 mb-2">
			<?= $subTitle ?>
		</h3>
		<h2 class="col-xl-7 col-lg-6 col-12">
			<?= $title ?>
		</h2>
	</header>
	<ul class="row gy-xxl-0 gy-3">
		<?php foreach ($reviewsToShow as $review) :
			$name = esc_html($review['author_name']);
			$profilePhoto = esc_url($review['profile_photo_url']);
			$rating = esc_html($review['rating']);
			$reviewContent = esc_html($review['text']);
		?>
			<li class="col-xl-4 col-12">
				<article class="text-center d-flex flex-column gap-3 align-items-center shadow-sm rounded-4 p-4">
					<img height="105" width="105" class="rounded-circle" src="<?= $profilePhoto ?>" alt="">
					<h3 class="text-regular">
						<?= $name ?>
					</h3>
					<blockquote class="text-regular" cite="https://www.google.com/search?client=firefox-b-d&q=dr+reuter+dubai#lrd=0x3e5f6bf6ad4010c7:0x1cf3ec72e77e46e5,1">
						<?= truncateText($reviewContent, 350) ?>
					</blockquote>
					<span class="d-flex justify-content-center align-items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F7BE37" class="bi bi-star-fill" viewBox="0 0 16 16">
							<title>1 star rating</title>
							<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
						</svg>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F7BE37" class="bi bi-star-fill" viewBox="0 0 16 16">
							<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
						</svg>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F7BE37" class="bi bi-star-fill" viewBox="0 0 16 16">
							<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
						</svg>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F7BE37" class="bi bi-star-fill" viewBox="0 0 16 16">
							<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
						</svg>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#F7BE37" class="bi bi-star-fill" viewBox="0 0 16 16">
							<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
						</svg>
					</span>
				</article>
			</li>
		<?php endforeach ?>
	</ul>
	<div class="col-12 d-flex justify-content-center align-items-center">
		<a class="d-flex justify-content-center align-items-center" target="_blank" href="https://www.google.com/search?client=firefox-b-d&q=dr+reuter+dubai#lrd=0x3e5f6bf6ad4010c7:0x1cf3ec72e77e46e5,1,,,," aria-label="View all google reviews">
			<button class="btn btn-default py-3" rel="noopener">
				<?= $buttonText ?>
			</button>
		</a>
	</div>
</section>