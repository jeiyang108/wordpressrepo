<?php
/*
 * index.php
 * The main template.
 */ 
get_header(); ?>

<section class="row">
    <article id="content" class="c12" role="main">

        <?php $options = get_option( 'larryslist_theme_options' ); 
        if (!empty( $options['larryslist_newtitle']) ) { echo '<h2 class="alt-title">' . esc_attr($options['larryslist_newtitle']) . '</h2>'; ?>
        <?php } ?>

            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'excerpt' ); ?>

            <?php endwhile; ?>
                    
                    <?php the_posts_pagination(); ?>

                <?php else : get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>

    </article>

</section>

    <?php get_footer(); ?>