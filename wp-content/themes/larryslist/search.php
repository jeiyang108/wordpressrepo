<?php
/**
 * The template for displaying Search Results pages.
 *
 * larryslist
 */
get_header(); ?>

<section class="row">
    <article id="content" class="c8" role="main">

        <?php $options = get_option( 'larryslist_theme_options' );
        if (!empty( $options['newtitle']) ) { echo '<h1 class="alt-title">' . esc_attr($options['newtitle']) . '</h1><hr>'; ?>
        <?php } ?>
            <?php if ( have_posts() ) : ?>

            <header class="new-title">
                <h3><?php if($wp_query->post_count > 0): ?>
                    <?php esc_html_e( 'Showing 1 through', 'larryslist' ); ?>
                    <?php echo $wp_query->post_count ?>
                    <?php esc_html_e( ' out of ', 'larryslist' ); ?>
                    <?php echo $wp_query->found_posts; ?>
                    <?php endif; ?>

                </h3>
            </header><hr><br>

            <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'excerpt' ); ?>

            <?php endwhile; ?>
                <?php the_posts_pagination(); ?>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>

    </article>
        <div class="c4 end">

            <?php get_sidebar(); ?>

        </div>
</section>

<?php get_footer(); ?>