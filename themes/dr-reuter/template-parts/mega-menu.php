<?php
$parentTerms = get_terms([
	'taxonomy'   => 'treatment-category',
	'hide_empty' => false,
	'parent'     => 0,
	'meta_key'   => 'order',
	'orderby'    => 'meta_value_num',
	'order'      => 'ASC'
]);
?>

<section class="mega-menu w-100 position-absolute overflow-hidden">
	<div class="container">
		<div class="links-container row position-relative">
			<ul class="main-links col-md-4 bg-white px-0">
				<?php foreach ($parentTerms as $parent) :
					$parentTitle = esc_html($parent->name);
					$parentUrl   = esc_url('/treatment-category/' . $parent->slug);
					$childTerms  = get_terms([
						'taxonomy'   => 'treatment-category',
						'hide_empty' => false,
						'parent'     => $parent->term_id,
						'meta_key'   => 'order',
						'orderby'    => 'meta_value_num',
						'order'      => 'ASC'
					]);
				?>
					<li class="main-link-container">

						<a class="mail-link-button d-flex justify-content-between align-items-center py-4 ps-3 pe-4"
							href="<?= $parentUrl ?>">
							<button class="btn ps-0 fs-6 fw-bold">
								<?= $parentTitle ?>
							</button>
							<svg xmlns="http://www.w3.org/2000/svg" width="10" height="16" viewBox="0 0 10 16"
								fill="none">
								<path d="M8.71497e-07 1.88L6.18084 8L3.36469e-07 14.12L1.90283 16L10 8L1.90283 -3.53938e-07L8.71497e-07 1.88Z"
									fill="white" />
							</svg>
						</a>

						<?php if (! empty($childTerms)) : ?>
							<div class="sub-links test-class col-md-9 position-absolute px-5 py-4 d-flex flex-wrap flex-column gap-3">
								<ul>
									<?php foreach ($childTerms as $child) :
										$childTitle = $child->name;
										$childUrl   = esc_url('/treatment-category/' . $child->slug);

										$grandChildTerms   = get_terms([
											'taxonomy'   => 'treatment-category',
											'hide_empty' => false,
											'parent'     => $child->term_id,
											'meta_key'   => 'order',
											'orderby'    => 'meta_value_num',
											'order'      => 'ASC'
										]);
									?>
										<li>
											<a class="primary-color fw-bold fs-5" href="<?= $childUrl ?>">
												<?= $childTitle ?>
											</a>
										</li>
										<?php if (! empty($grandChildTerms)) : ?>
											<?php foreach ($grandChildTerms as $grandChild) :
												$grandChildTitle = $grandChild->name;
												$grandChildUrl = esc_url('/treatment-category/' . $grandChild->slug);

											?>
												<li class="grand-child-link">
													<a href="<?= $grandChildUrl ?>">
														<?= $grandChildTitle ?>
													</a>
												</li>
											<?php endforeach ?>
										<?php endif ?>
									<?php endforeach ?>
								</ul>
							</div>
						<?php endif ?>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</section>