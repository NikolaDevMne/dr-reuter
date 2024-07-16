<?php
get_header();
$postPageId = get_option('page_for_posts');
$args = [
	"posts_per_page" => 7,
	"orderby" => "date",
	"order" => "DESC",
];
$getPosts = get_posts($args);
$latestPost = $getPosts[0];
$heroArgs = [
	'title' => get_the_title($postPageId),
	'img' => get_the_post_thumbnail_url(get_option('page_for_posts'), 'full')
]
?>

<?php get_template_part('template-parts/default-hero', null, $heroArgs); ?>

<?php get_template_part('template-parts/rankmath', 'breadcrumbs'); ?>

<secton class="posts-list container">
	<ul class="row g-4">
		<?php foreach ($getPosts as $post) :
			setup_postdata($post);
			$postId = $post->ID;
			$category = get_the_category()[0]->name;
			$title = $post->post_title;
			$date = $post->post_date;
			$desc = get_the_excerpt($postId) ?? '';
			$timestamp = strtotime($date);
			$formatted_date = date('F j, Y', $timestamp);
			$machineReadableDate = date('Y-m-d', strtotime($date));
			$featuredImage = wp_get_attachment_image_src(get_post_thumbnail_id($postId), 'full')[0] ?? '/wp-content/uploads/2024/04/dr-reuter-doctor-placeholder-image.png';
		?>
			<?php if ($post === $getPosts[0]) : ?>
				<li class="col-12">
					<article class="card w-100 flex-lg-row flex-column align-items-lg-center border-0 bg-white rounded-4 position-relative">
						<div class="col-lg-8 ps-lg-5 p-4">
							<header class="d-flex align-items-center mb-1">
								<h3 class="sub-title fs-6">
									<?= esc_html($category); ?>
								</h3>
								<div class="blog-divider mx-2">•</div>
								<time class="fs-6" datetime="<?= esc_attr($machineReadableDate) ?>">
									<?= esc_html($formatted_date) ?>
								</time>
							</header>
							<h2 class="mb-3">
								<?= esc_html($title) ?>
							</h2>
							<p class="col-lg-10">
								<?= truncateText($desc, 300) ?>
							</p>
						</div>
						<div class="col-lg-4 col-12">
							<img src="<?= esc_url($featuredImage) ?>" alt="" class="img-fluid h-100 w-100 rounded-4">
						</div>
						<a href="<?php the_permalink() ?>" class="stretched-link" aria-label="Go to the latest blog that tells you about: <?= $title ?>"></a>
					</article>
				</li>
			<?php elseif ($post != $getPosts[0]) : ?>
				<li class="col-lg-4 col-12">
					<article class="card card-small h-100 w-100 border-0 bg-white rounded-4 position-relative p-4 justify-content-between">
						<span>
							<header class="d-flex align-items-center mb-1">
								<h3 class="sub-title fs-7">
									<?= esc_html($category); ?>
								</h3>
								<div class="blog-divider mx-2">•</div>
								<time class="fs-7" datetime="<?= esc_attr($machineReadableDate) ?>">
									<?= esc_html($formatted_date) ?>
								</time>
							</header>
							<h2 class="mb-3 fs-4">
								<?= esc_html(truncateText($title, 50)) ?>
							</h2>
						</span>
						<p>
							<?= truncateText($desc, 100) ?>
						</p>
						<a href="<?php the_permalink() ?>" class=" stretched-link" aria-label="Go to the blog that tells you about <?= $title ?>">
						</a>
					</article>
				</li>
			<?php endif ?>
		<?php endforeach;
		wp_reset_postdata(); ?>
	</ul>
</secton>

<section class="container">
	<?php
	the_posts_pagination([
		'prev_text' => '<',
		'next_text' => '>',
	]);
	?>
</section>

<?php get_footer(); ?>