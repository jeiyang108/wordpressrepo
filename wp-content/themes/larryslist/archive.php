<?php
/*
 * archive, category
 * The page for listing category items or tags or by date.
 */
get_header(); ?>

<div class="row">
    <section id="content" class="c8" role="main">
        <header>

            <?php $options = get_option( 'larryslist_theme_options' ); ?>
            <?php if( !empty ($options['larryslist_newtitle']) ) : ?>
            <h2 class="alt-title">
            <?php echo esc_attr( $options['larryslist_newtitle'] ); ?></h2>
            <?php endif; ?>

        </header>
            <h3 class="new-title">

                <?php if( is_post_type_archive( 'listing'  ) ) {
                      echo get_the_term_list( get_the_ID(), 'tsw-taxonomy', '', ', ', '' ); } ?>
                <?php if( is_post_type_archive( 'post'  ) ) {
                      echo the_category(); } ?>

            </h3>
            <br>

            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php get_template_part( 'content', 'excerpt' ); ?>

            </div>

                <?php endwhile; ?>

                    <?php the_posts_pagination(); ?>

                    <?php else : ?>

	                <div class="entry">

		            <?php get_template_part( 'content', 'none' ); ?>

                        </div>

                <?php endif; ?>

    </section><!-- ends sect c8 -->
        <div class="c4 end">

            <?php get_sidebar(); ?>

        </div>
</div><!-- ends row page -->

    <?php get_footer(); ?>