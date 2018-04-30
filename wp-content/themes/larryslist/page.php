<?php
/*
 * page.php
 * The page template.
 */
get_header(); ?>
<section class="row">
    <article id="content" class="c12" role="main">

    <?php $options = get_option( 'larryslist_theme_options' ); ?>
    <?php if( !empty( $options['larryslist_newtitle'] ) ) { ?>
        <h2><?php esc_attr( $options['larryslist_newtitle'] ); ?></h2><?php } ?>

            <div class="content-container">

                <?php get_template_part( 'content' ); ?>

            </div>
 
    </article>

</section>

    <?php get_footer(); ?>
