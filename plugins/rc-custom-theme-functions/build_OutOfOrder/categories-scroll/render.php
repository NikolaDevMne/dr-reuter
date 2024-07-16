<?php
$containerClasses = 'container container-wide inner-padding categories-scroll section-default-style';
$title            = isset($attributes['title']) ? esc_html($attributes['title']) : '';
$subTitle         = isset($attributes['subTitle']) ? esc_html($attributes['subTitle']) : '';
$description      = isset($attributes['description']) ? esc_html($attributes['description']) : '';
?>

<section <?= get_block_wrapper_attributes(['class' => $containerClasses,]); ?>>
	<div class="row gx-5">
		<article class="col-xl-4 col-12 d-flex flex-column gap-2 mb-xl-0 mb-5">
			<header>
				<h3 class="sub-title">
					<?= $subTitle ?>
				</h3>
			</header>
			<h2>
				<?= $title ?>
			</h2>
			<p>
				<?= $description ?>
			</p>
		</article>
		<aside class="col-xl-8 col-12">
			<ul class="row g-3">
				<?php
				$taxonomy = 'treatment-category';

				$services = get_terms([
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
					'parent'     => 0,
					'meta_key'   => 'order',
					'orderby'    => 'meta_value_num',
					'order'      => 'ASC'
				]);

				$isEven        = count($services) % 2 === 0;
				$cardClass     = 'col-lg-6';
				$lastCardClass = '';
				?>
				<?php foreach ($services as $service) :
					$categoryTitle = esc_html($service->name);
					$categoryDesc = esc_html($service->description);
					$categoryId = esc_html($service->term_id);
					$categorySlug = $service->slug;

					$categoryIcon    = get_field('category_icon', $taxonomy . '_' . $categoryId);
					$categoryIconUrl = $categoryIcon['url'] ?? '/wp-content/uploads/2024/04/dermatology-icon-dr-reuter.svg';
					$categoryIconAlt = $categoryIcon['alt'] ?? 'Dr reuter descriptive icon';
				?>
					<?php
					if (!$isEven && end($services) === $service) {
						$lastCardClass = ' col-lg-12 last-card';
					}
					?>
					<li class="<?= esc_attr($cardClass) . esc_attr($lastCardClass) ?> col-12">
						<article class="card small-card-default">
							<header class="card-head d-flex justify-content-between align-items-center">
								<figure class="d-flex align-items-center">
									<span class="d-grid me-3 rounded-circle">
										<img class="img-fluid object-fit-contain" src="<?= esc_url($categoryIconUrl) ?>" alt="<?= esc_html($categoryIconAlt) ?>">
									</span>
									<figcaption class="fw-bold"><?= $categoryTitle ?></figcaption>
								</figure>
								<svg class="d-md-none d-block" xmlns="http://www.w3.org/2000/svg" width="35" height="34" viewBox="0 0 35 34" fill="none">
									<path d="M25.7026 9.91667C25.7026 10.3417 25.561 10.625 25.2776 10.9083L11.111 25.075C10.5443 25.6417 9.6943 25.6417 9.12764 25.075C8.56097 24.5083 8.56097 23.6583 9.12764 23.0917L23.2943 8.925C23.861 8.35833 24.711 8.35833 25.2776 8.925C25.561 9.20833 25.7026 9.49166 25.7026 9.91667Z" fill="#ffe8ed" />
									<path d="M25.7026 9.91664L25.7026 22.6666C25.7026 23.5166 25.1359 24.0833 24.2859 24.0833C23.4359 24.0833 22.8693 23.5166 22.8693 22.6666L22.8693 11.3333L11.5359 11.3333C10.6859 11.3333 10.1193 10.7666 10.1193 9.91665C10.1193 9.06665 10.6859 8.49998 11.5359 8.49998L24.2859 8.49998C25.1359 8.49998 25.7026 9.06664 25.7026 9.91664Z" fill="#ffe8ed" />
								</svg>
							</header>
							<div class="card-content">
								<p>
									<?= truncateText($categoryDesc) ?>
								</p>
							</div>
							<a class="stretched-link" href="<?= esc_url('/treatment-category/' . $categorySlug) ?>" aria-label="Read more about <?= strtolower(esc_html($categoryTitle)) ?>">
							</a>
						</article>
					</li>
				<?php endforeach ?>
			</ul>
		</aside>
	</div>
</section>