<li>
    <article class="bg-white inner-padding rounded-4">
        <header class="mb-5">
            <h2 class="mb-1">
                <?= esc_html($child->name) ?>
            </h2>
            <p class="col-md-8 col-12">
                <?= $child->description ?>
            </p>
        </header>
        <ul class="row g-2">
            <?php foreach ($grandChildren as $grandChild) :
                $icon = get_field("category_icon", 'category_' . $grandChild->term_id);
                $icon = $icon ? $icon['url'] : '/wp-content/uploads/2024/04/dermatology-icon-dr-reuter.svg';
            ?>
                <li class="col-md-4 col-12">
                    <article class="card justify-content-center small-card-default position-relative">
                        <header class="card-head d-md-block d-flex align-items-center justify-content-center">
                            <figure class="d-flex align-items-center flex-md-row flex-column">
                                <span class="d-grid me-md-3 me-0 rounded-circle">
                                    <img class="img-fluid object-fit-contain" src="<?= esc_url($icon) ?>" alt="Icon">
                                </span>
                                <figcaption class="fw-bold">
                                    <?= esc_html($grandChild->name) ?>
                                </figcaption>
                            </figure>
                            <svg class="d-md-none d-block position-absolute archive-svg" xmlns="http://www.w3.org/2000/svg" width="35" height="34" viewBox="0 0 35 34" fill="none">
                                <path d="M25.7026 9.91667C25.7026 10.3417 25.561 10.625 25.2776 10.9083L11.111 25.075C10.5443 25.6417 9.6943 25.6417 9.12764 25.075C8.56097 24.5083 8.56097 23.6583 9.12764 23.0917L23.2943 8.925C23.861 8.35833 24.711 8.35833 25.2776 8.925C25.561 9.20833 25.7026 9.49166 25.7026 9.91667Z" fill="#ffe8ed" />
                                <path d="M25.7026 9.91664L25.7026 22.6666C25.7026 23.5166 25.1359 24.0833 24.2859 24.0833C23.4359 24.0833 22.8693 23.5166 22.8693 22.6666L22.8693 11.3333L11.5359 11.3333C10.6859 11.3333 10.1193 10.7666 10.1193 9.91665C10.1193 9.06665 10.6859 8.49998 11.5359 8.49998L24.2859 8.49998C25.1359 8.49998 25.7026 9.06664 25.7026 9.91664Z" fill="#ffe8ed" />
                            </svg>
                        </header>
                        <div class="card-content">
                            <p>
                                <?= truncateText($grandChild->description, 90) ?>
                            </p>
                        </div>
                        <a class="stretched-link" href="<?= esc_url('/treatment-category/' . $grandChild->slug) ?>" aria-label="Read more about"></a>
                    </article>
                </li>
            <?php endforeach ?>
        </ul>
    </article>
</li>