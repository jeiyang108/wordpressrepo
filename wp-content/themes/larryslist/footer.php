    <footer id="footer" class="row">
        <div class="inner-footer">
            <section class="c4">

                <?php get_template_part( 'content', 'social' ); ?>

                    <p><?php esc_html_e('Copyright', 'larryslist'); ?>&copy; <?php echo esc_attr( date("Y") ); ?> <a href="<?php esc_url( home_url( '/' ) ); ?>/"><?php bloginfo('name'); ?></a></p>

                <?php $options = get_option( 'larryslist_theme_options' );
                if( !isset( $options['larryslist_credits'] ) ) : ?>

                <?php do_action( 'larryslist_credits' ); ?>

                <?php else : ?>

                    <span>
                    <?php echo esc_attr( $options['larryslist_new_text'] ); ?>
                    </span>

                <?php endif; ?>

            </section>
                <section class="c4">

                    <?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>

                    <div id="secondary" class="thirds">

                    <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                    <?php endif; ?>

                </section>
                    <section class="c4">

                    <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>

                    <div id="secondary" class="thirds">

                        <?php dynamic_sidebar( 'footer-sidebar-2' ); ?><?php endif; ?>

                </section>
      </div>
    </footer>
</div>

<?php wp_footer(); ?>

</body>
</html>