<li class="no-children-card-wrapper">
    <article class="no-children-card align-items-center bg-white gap-3 p-3 rounded-4 position-relative">
        <img class="img-fluid col-md-4 col-12 rounded-4" src="<?= esc_url($args['thumbnailUrl']) ?>" alt="">
        <span>
            <h2>
                <?= esc_html($child->name) ?>
            </h2>
            <p class="col-md-8 col-12">
                <?= wp_strip_all_tags($child->description) ?>
            </p>
        </span>
        <button class="btn btn-default d-md-none d-block">
            READ MORE
        </button>
        <a class="stretched-link" href="<?= esc_url('/treatment-category/' . $child->slug) ?>"></a>
    </article>
</li>