<?php
get_header();

$currentTax    = get_queried_object();
$featuredImage = get_field("featured_image", $currentTax);

$childTaxonomies = get_terms([
	"taxonomy"   => $currentTax->taxonomy,
	"parent"     => $currentTax->term_id,
	"hide_empty" => false,
	'meta_key'   => 'order',
	'orderby'    => 'meta_value_num',
	'order'      => 'ASC'
]);

set_query_var('currentTax', $currentTax);

$heroArgs = [
	'title' => $currentTax->name,
	'img'   => $featuredImage["url"] ?? '',
	'desc'  => $currentTax->description
];
?>

<?php get_template_part('template-parts/default-hero', null, $heroArgs); ?>

<section class="taxonomy-main-content position-relative mt-n3 rounded-4 py-5">
	<div class="container">

		<?php get_template_part('template-parts/custom-breadcrumbs'); ?>

		<ul class="row gap-4 taxonomy-list">

			<?php if (!empty($childTaxonomies)) : ?>
				<?php foreach ($childTaxonomies as $child) :
					$grandChildren = get_terms([
						"taxonomy"   => $child->taxonomy,
						"parent"     => $child->term_id,
						"hide_empty" => false,
						'meta_key'   => 'order',
						'orderby'    => 'meta_value_num',
						'order'      => 'ASC'
					]);
					$termId        = $child->term_id;

					set_query_var('child', $child);
					set_query_var('grandChildren', $grandChildren);
					$thumbNailImage = get_field("thumbnail_image", 'category_' . $termId) ?? null;
					$childrenArgs   = [
						'thumbnailUrl' => $thumbNailImage['url'] ?? '',
					];
				?>

					<?php if (!empty($grandChildren)) : ?>

						<?php get_template_part('template-parts/taxonomy', 'grand-children'); ?>

					<?php else : ?>

						<?php get_template_part('template-parts/taxonomy', 'children', $childrenArgs); ?>

					<?php endif; ?>
				<?php endforeach; ?>

			<?php else : ?>

				<?php get_template_part('template-parts/taxonomy', 'single'); ?>

			<?php endif; ?>
		</ul>
	</div>
</section>
<?php get_footer(); ?>