<?php
/*
 * page.php
 * The page template.
 */
get_header(); ?>
<section class="row">
    <article id="content" class="c8" role="main">

    <?php $options = get_option( 'larryslist_theme_options' ); ?>
    <?php if( !empty( $options['larryslist_newtitle'] ) ) { ?>
        <h2><?php esc_attr( $options['larryslist_newtitle'] ); ?></h2><?php } ?>

            <div class="content-container">

                <?php get_template_part( 'content' ); ?>

            </div>
 
    </article>
        <div class="c4 end">

            <?php get_sidebar(); ?>

        </div>
</section>

    <?php get_footer(); ?>
