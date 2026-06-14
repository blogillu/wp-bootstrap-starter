<?php
// Check if the sidebar has active widgets to prevent empty HTML wrappers
/**
 * @package wp-bootstrap-starter
 */

if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
    <aside id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
    </aside>
<?php endif; ?>
