<?php global $global, $site_logo;
    $footer = get_field('footer', 'option');

    if(!empty($footer['site_logo'])) $site_logo = getIMG( $footer['site_logo']['ID'], 'md', false, array('alt' => get_bloginfo( 'name' ), 'lazy' => false));
?>

</main>

<footer class="gfooter">
    <div class="gfooter__content">
        <div class="container">
            <div class="row">
                <div class="col col--left">
                    <div class="gfooter-content">
                        <?php if(!empty($footer['footer_content'])) echo $footer['footer_content']; ?>
                        <p class="copy">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
                    </div>
                </div>
                <div class="col col--middle">
                    <div class="gfooter__logo">
                        <a class="site-logo" href="<?php echo home_url(); ?>"><?php echo $site_logo; ?></a>
                    </div>
                </div>
                <div class="col col--right">
                    <div class="gfooter-menus">
                        <nav class="menu menu--foot">
                            <?php
                                wp_nav_menu(array(
                                    'container' => false,
                                    'items_wrap' => '<ul id="%1$s">%3$s</ul>',
                                    'walker' => new PDM_Navwalker(),
                                    'theme_location' => 'foot'
                                ));
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- <div class="pdm-lightbox pdm-lightbox--reset">
    <div class="pdm-lightbox__container">
        <button class="pdm-lightbox__close" type="button">Close Popup</button>
        <div class="pdm-lightbox__content"></div>
    </div>
</div> -->

<?php wp_footer(); ?>

<?php echo get_field('body_scripts_bottom', 'option'); ?>
</body>

</html>