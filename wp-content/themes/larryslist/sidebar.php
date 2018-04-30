<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>