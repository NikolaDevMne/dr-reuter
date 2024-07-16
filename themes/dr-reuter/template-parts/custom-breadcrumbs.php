<?php
function custom_breadcrumbs() {
    $separator = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
    <path d="M8.59 7.41L13.17 12L8.59 16.59L10 18L16 12L10 6L8.59 7.41Z" fill="black"/>
    </svg>';
    $home_title = 'Home';

    echo '<nav class="breadcrumbs d-flex align-items-center mb-5 flex-wrap">';
    echo '<a href="' . get_home_url() . '">' . $home_title . '</a>';

    if (is_category() || is_tag() || is_tax()) {
        echo $separator;
        $current_term = get_queried_object();
        $taxonomy = $current_term->taxonomy;
        $term_id = $current_term->term_id;

        $ancestors = get_ancestors($term_id, $taxonomy);
        $ancestors = array_reverse($ancestors);

        foreach ($ancestors as $ancestor) {
            $ancestor_term = get_term($ancestor, $taxonomy);
            echo '<a href="' . get_term_link($ancestor_term) . '">' . $ancestor_term->name . '</a>' . $separator;
        }

        echo '<span class="fw-bold">' . $current_term->name . '</span>';
    }

    echo '</nav>';
}

custom_breadcrumbs();