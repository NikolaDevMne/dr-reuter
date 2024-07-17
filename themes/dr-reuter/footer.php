<?php
$terms = get_terms([
    'taxonomy'   => 'treatment-category',
    'hide_empty' => false,
    'parent'     => 0,
    'number'     => 7,
    'meta_key'   => 'order',
    'orderby'    => 'meta_value_num',
    'order'      => 'ASC'
]);
?>
</main>

<footer class="py-5">
    <div class="container">
        <div class="row mb-3">
            <div class="footer-col col-md-3 col-12 d-flex flex-column gap-3 text-md-start text-center mb-md-0 mb-5">
                <h2>
                    <?php customString('Working hours:'); ?>
                </h2>
                <p>
                    <?php customString('Monday - Saturday'); ?> <br>
                    <?php customString('08:00am - 6:00pm'); ?>
                </p>
            </div>
            <div class="footer-col col-md-3 col-6 d-flex flex-column gap-3">
                <h2>
                    <?php customString('Pages'); ?>
                </h2>
                <nav>
                    <?php
                    wp_nav_menu([
                        'menu'       => 'Quick links',
                        'container'  => false,
                        'items_wrap' => '<ul class="d-flex flex-column gap-2">%3$s</ul>',
                    ])
                    ?>
                </nav>
            </div>
            <div class="footer-col col-md-3 col-6 d-flex flex-column gap-3">
                <h2>
                    <?php customString('Services'); ?>
                </h2>
                <nav>
                    <ul class="d-flex flex-column gap-2">
                        <?php foreach ($terms as $term) :
                            $term_title = $term->name;
                            $term_url = $term->slug;
                        ?>
                            <li>
                                <a href="<?= esc_url('/treatment-category/' . $term_url); ?>">
                                    <?= $term_title ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
            <div class="footer-col col-md-3 col-12 d-flex flex-column gap-3 mt-md-0 mt-5">
                <h2 class="ms-3">
                    <?php customString('Subscribe to our newsletter'); ?>
                </h2>
                <form>
                    <input placeholder="Enter your email address" class="mb-2 w-100" type="email" name="email" id="email" required>
                    <button class="btn btn-default w-100" type="submit">
                        <?php customString('Subscribe now'); ?>
                    </button>
                </form>
            </div>
        </div>
        <div class="row bottom-bar">
            <div class="social-media col-12 py-2 border-bottom d-flex justify-content-md-end justify-content-center align-items-center gap-2">
                <?php get_template_part('template-parts/social-media'); ?>
            </div>
            <div class="col-12 py-3 d-flex flex-md-row flex-column justify-content-between align-items-center">
                <span>
                    <a class="me-3" href="<?= esc_url(get_privacy_policy_url()) ?>">
                        <?php customString('Privacy policy'); ?>
                    </a>
                    <a href="<?= esc_url(get_privacy_policy_url()) ?>">
                        <?php customString('Terms of use'); ?>
                    </a>
                </span>
                <p class="my-md-0 my-3 text-md-start text-center">
                    <?php customString(get_field('licence', 'options')); ?>
                </p>
                <p>
                    <?php customString(get_field('footer_cr_label', 'options')); ?>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>