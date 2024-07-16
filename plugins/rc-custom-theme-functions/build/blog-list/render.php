<?php
$containerClasses = "container container-wide section-default-style bg-transparent shadow-none blog-list";
$args = [
	"posts_per_page" => 4,
	"orderby" => "date",
	"order" => "DESC",
];
$getPosts = get_posts($args);
$latestPost = $getPosts[0];
?>

<section <?= get_block_wrapper_attributes(["class" => $containerClasses]) ?>>
	<ul class="row g-4">
		<?php foreach ($getPosts as $post) :
			setup_postdata($post);
			$postId = $post->ID;
			$title = $post->post_title;
			$date = $post->post_date;
			$desc = get_the_excerpt($postId) ?? '';
			$url = get_permalink($postId);
			$category = get_the_category($postId)[0]->name;
			$timestamp = strtotime($date);
			$machineReadableDate = date('Y-m-d', strtotime($date));
			$formatted_date = date('F j, Y', $timestamp);
			$featuredImage = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'full')[0] ?? '/wp-content/uploads/2024/04/dr-reuter-doctor-placeholder-image.png';
		?>
			<?php if ($post === $getPosts[0]) : ?>
				<li class="col-12">
					<article class="card w-100 flex-lg-row flex-column align-items-lg-center border-0 bg-white rounded-4 position-relative">
						<div class="col-lg-8 ps-lg-5 p-4">
							<header class="d-flex align-items-center mb-1">
								<h3 class="sub-title fs-6">
									<?= esc_html($category) ?>
								</h3>
								<div class="blog-divider mx-2">•</div>
								<time class="fs-6" datetime="<?= esc_attr($machineReadableDate) ?>">
									<?= $formatted_date ?>
								</time>
							</header>
							<h2 class="mb-3">
								<?= $title ?>
							</h2>
							<p class="col-lg-10">
								<?= truncateText($desc, 300) ?>
							</p>
						</div>
						<div class="col-lg-4 col-12">
							<img src="<?= esc_url($featuredImage) ?>" alt="" class="img-fluid h-100 w-100 rounded-4">
						</div>
						<a href="<?= esc_url($url) ?>" class="stretched-link" aria-label="Go to the latest blog that tells you about: <?= $title ?>"></a>
					</article>
				</li>
			<?php elseif ($post != $getPosts[0]) : ?>
				<li class="col-lg-4 col-12">
					<article class="card card-small h-100 w-100 border-0 bg-white rounded-4 position-relative p-4 justify-content-between">
						<span>
							<header class="d-flex align-items-center mb-1">
								<h3 class="sub-title fs-7">
									<?= esc_html($category) ?>
								</h3>
								<div class="blog-divider mx-2">•</div>
								<time class="fs-7" datetime="<?= esc_attr($machineReadableDate) ?>">
									<?= $formatted_date ?>
								</time>
							</header>
							<h2 class="mb-3 fs-4">
								<?= truncateText($title, 50) ?>
							</h2>
						</span>
						<p>
							<?= truncateText($desc, 100) ?>
						</p>
						<a href="<?= esc_url($url) ?>" class="stretched-link" aria-label="Go to the blog that tells you about <?= $title ?>">
						</a>
					</article>
				</li>
			<?php endif ?>
		<?php endforeach;
		wp_reset_postdata(); ?>
	</ul>
	<div class="col-12 d-flex align-items-center justify-content-center mt-4">
		<a href="<?= get_permalink(get_option('page_for_posts')); ?>"><button class="btn btn-default">See all our blogs</button></a>
	</div>
</section>