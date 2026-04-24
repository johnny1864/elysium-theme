<?php
$heading = get_sub_field('heading');
$subtext = get_sub_field('subtext');
$content = get_sub_field('content');
$dropdowns = get_sub_field('dropdown');
$cta = get_sub_field('cta'); // Add this field if needed
?>

<section class="industry-solutions">
    <div class="container">

        <div class="industry-solutions__header">
            <?php if ($subtext): ?>
                <p class="industry-solutions__eyebrow">
                    <?php echo esc_html($subtext); ?>
                </p>
            <?php endif; ?>

            <?php if ($heading): ?>
                <h2 class="industry-solutions__title">
                    <?php echo esc_html($heading); ?>
                </h2>
            <?php endif; ?>

            <?php if ($content): ?>
                <div class="industry-solutions__description">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($dropdowns): ?>
            <div class="industry-solutions__accordion">
                <?php foreach ($dropdowns as $index => $item): ?>
                    <?php
                    $title = $item['title'] ?? '';
                    $body = $item['content'] ?? '';
                    ?>

                    <div class="industry-solutions__item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <button class="industry-solutions__trigger" type="button">
                            <?php if ($title): ?>
                                <span class="industry-solutions__label">
                                    <?php echo esc_html($title); ?>
                                </span>
                            <?php endif; ?>

                            <span class="industry-solutions__icon">+</span>
                        </button>

                        <?php if ($body): ?>
                            <div class="industry-solutions__content">
                                <?php echo wp_kses_post($body); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($cta): ?>
            <div class="industry-solutions__cta">
                <a href="<?php echo esc_url($cta['url']); ?>" class="btn btn--pink"
                    target="<?php echo esc_attr($cta['target'] ?: '_self'); ?>">
                    <?php echo esc_html($cta['title']); ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>