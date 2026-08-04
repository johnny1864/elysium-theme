<?php
$post_id    = get_the_ID();
$post_url   = get_permalink($post_id);
$post_title = wp_strip_all_tags(get_the_title($post_id));
$post_image = get_the_post_thumbnail_url($post_id, 'full');

$encoded_url   = rawurlencode($post_url);
$encoded_title = rawurlencode($post_title);
$encoded_image = $post_image ? rawurlencode($post_image) : '';

$share_links = [
    'facebook' => [
        'label' => 'Facebook',
        'url'   => 'https://www.facebook.com/sharer/sharer.php?u=' . $encoded_url,
        'icon'  => '
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M13.5 22v-9h3l.5-3.5h-3.5V7.25c0-1 .28-1.75 1.78-1.75H17V2.38A23.4 23.4 0 0 0 14.5 2C12.03 2 10.3 3.5 10.3 6.3v3.2H7.5V13h2.8v9h3.2Z"/>
            </svg>',
    ],
    'x' => [
        'label' => 'X',
        'url'   => 'https://twitter.com/intent/tweet?url=' . $encoded_url . '&text=' . $encoded_title,
        'icon'  => '
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M18.9 2H22l-6.77 7.74L23.2 22h-6.24l-4.89-6.39L6.48 22H3.36l7.23-8.26L2.95 2h6.4l4.42 5.84L18.9 2Zm-1.1 17.84h1.73L8.41 4.05H6.56L17.8 19.84Z"/>
            </svg>',
    ],
    'linkedin' => [
        'label' => 'LinkedIn',
        'url'   => 'https://www.linkedin.com/sharing/share-offsite/?url=' . $encoded_url,
        'icon'  => '
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M6.5 8.25H3V21h3.5V8.25ZM4.75 3A2.05 2.05 0 1 0 4.75 7.1 2.05 2.05 0 0 0 4.75 3ZM21 13.69c0-3.84-2.05-5.63-4.79-5.63-2.2 0-3.19 1.21-3.74 2.06V8.25H9V21h3.47v-6.31c0-1.66.31-3.27 2.37-3.27 2.03 0 2.06 1.9 2.06 3.38V21H21v-7.31Z"/>
            </svg>',
    ],
    'tumblr' => [
        'label' => 'Tumblr',
        'url'   => 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . $encoded_url
            . '&title=' . $encoded_title,
        'icon'  => '
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M14.5 22c-4.14 0-5.75-2.57-5.75-5.44v-6.12H6.5V7.2c2.93-1.07 4.08-3.6 4.23-5.2h3.17v4.67h3.77v3.77H13.9v5.32c0 1.6.81 2.15 2.1 2.15.64 0 1.48-.22 1.93-.49L19 20.68c-.76.53-2.13 1.32-4.5 1.32Z"/>
            </svg>',
    ],
    'pinterest' => [
        'label' => 'Pinterest',
        'url'   => 'https://pinterest.com/pin/create/button/?url=' . $encoded_url
            . ($encoded_image ? '&media=' . $encoded_image : '')
            . '&description=' . $encoded_title,
        'icon'  => '
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18.98 2.46A9.2 9.2 0 0012.55 0C8.73 0 6.38 1.56 5.08 2.88a8.5 8.5 0 00-2.51 5.9c0 2.66 1.12 4.71 2.99 5.48.12.05.25.07.37.07.4 0 .71-.26.82-.67l.27-1.08c.14-.5.03-.74-.27-1.1-.54-.63-.8-1.39-.8-2.38a6 6 0 016.23-6.04c3.2 0 5.2 1.83 5.2 4.76 0 1.85-.4 3.56-1.13 4.82-.5.88-1.39 1.93-2.74 1.93-.6 0-1.12-.24-1.45-.67-.32-.4-.42-.9-.3-1.44.15-.6.34-1.24.53-1.85.35-1.11.67-2.16.67-3 0-1.44-.88-2.4-2.2-2.4C9.1 5.2 7.8 6.9 7.8 9.07c0 1.06.28 1.85.4 2.16-.2.89-1.45 6.19-1.7 7.18-.13.59-.95 5.2.41 5.56 1.54.42 2.91-4.07 3.05-4.58.12-.4.51-1.97.75-2.93.75.72 1.94 1.2 3.1 1.2a6.9 6.9 0 005.55-2.77 11.13 11.13 0 002.08-6.81c0-2.08-.89-4.13-2.45-5.62z"/></svg>',
    ],
    'vk' => [
        'label' => 'VK',
        'url'   => 'https://vk.com/share.php?url=' . $encoded_url
            . '&title=' . $encoded_title
            . ($encoded_image ? '&image=' . $encoded_image : ''),
        'icon'  => '
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12.79 18.25C5.95 18.25 2.05 13.56 1.9 5.75h3.43c.11 5.73 2.64 8.16 4.64 8.66V5.75h3.23v4.94c1.98-.21 4.06-2.47 4.76-4.94h3.23a9.54 9.54 0 0 1-4.39 6.23 9.87 9.87 0 0 1 5.14 6.27h-3.55c-.76-2.37-2.66-4.21-5.19-4.46v4.46h-.41Z"/>
            </svg>',
    ],
];

$email_subject = rawurlencode('Check out: ' . $post_title);
$email_body    = rawurlencode($post_title . "\n\n" . $post_url);

$email_icon = '
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21.86 21.43c.54 0 1-.18 1.4-.53l-6.8-6.8-.47.34c-.5.37-.92.67-1.24.87-.32.21-.74.43-1.27.65s-1.01.33-1.47.33H12c-.46 0-.95-.11-1.48-.33s-.95-.44-1.26-.65a30.78 30.78 0 01-1.71-1.21l-6.8 6.8c.4.35.86.53 1.4.53h19.72zM1.35 9.82C.85 9.48.4 9.09 0 8.65V19l6-6c-1.2-.83-2.75-1.9-4.65-3.18zM22.66 9.82c-1.82 1.23-3.37 2.3-4.65 3.19L24 19V8.65c-.38.43-.83.82-1.34 1.17z"/><path d="M21.86 2.57H2.14c-.68 0-1.21.23-1.58.7A2.7 2.7 0 000 5c0 .56.25 1.17.74 1.83S1.75 8 2.3 8.38a595.46 595.46 0 004.9 3.41l1.36.95.2.14.37.27.72.5.7.44c.27.16.53.28.77.36s.46.12.67.12H12c.2 0 .43-.04.67-.12.24-.08.5-.2.77-.36a13.88 13.88 0 001.42-.94 46.83 46.83 0 01.57-.41l1.36-.94c1.1-.78 2.74-1.91 4.9-3.42.66-.45 1.2-1 1.64-1.64S24 5.42 24 4.7c0-.58-.21-1.09-.64-1.5a2.07 2.07 0 00-1.5-.64z"/></svg>
';

$allowed_svg = [
    'svg' => [
        'viewbox'    => true,
        'aria-hidden' => true,
        'focusable'  => true,
    ],
    'path' => [
        'd' => true,
    ],
];
?>

<div class="single-post__post-share" aria-label="Share this post">
    <h4 class="single-post__post-share-title">Share this article</h4>

    <ul class="post-share__links">
        <?php foreach ($share_links as $network => $share) : ?>
            <li class="post-share__item">
                <a
                    class="post-share__link post-share__link--<?php echo esc_attr($network); ?>"
                    href="<?php echo esc_url($share['url']); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="<?php echo esc_attr('Share on ' . $share['label']); ?>"
                >
                    <?php echo wp_kses($share['icon'], $allowed_svg); ?>

                    <span class="screen-reader-text">
                        <?php echo esc_html($share['label']); ?>
                    </span>
                </a>
            </li>
        <?php endforeach; ?>

        <li class="post-share__item">
            <a
                class="post-share__link post-share__link--email"
                href="<?php echo esc_attr('mailto:?subject=' . $email_subject . '&body=' . $email_body); ?>"
                aria-label="Share by email"
            >
                <?php echo wp_kses($email_icon, $allowed_svg); ?>

                <span class="screen-reader-text">Email</span>
            </a>
        </li>
    </ul>
</div>