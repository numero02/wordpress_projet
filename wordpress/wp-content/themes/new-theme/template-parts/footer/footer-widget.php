
<?php
if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'new-theme' ); ?>">
    <?php
    if ( is_active_sidebar( 'sidebar-2' ) ) {
        ?>
                <div class="widget-column footer-widget-1">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
                </div>
            <?php
    }
    ?>
</aside><!-- .widget-area -->

<?php endif; ?>
