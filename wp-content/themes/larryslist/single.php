<?php
/**
 * single template master
 * larryslist
 */
get_header(); ?>
<section class="row">
    <article id="content" class="c12" role="main">

        <?php $options = get_option( 'larryslist_theme_options' ); ?>
        <?php if( !empty( $options['larryslist_newtitle'] ) ) { ?>
        <h3><?php esc_attr( $options['larryslist_newtitle'] ); ?></h3>
        <?php } ?>

            <?php if (have_posts()) : ?>
	    <?php while (have_posts()) : the_post(); ?>
	    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php if( is_singular( 'listing' ) ) { get_template_part( 'content', 'listing' ); }
                  else { get_template_part( 'content', 'posts' ); } ?>

        </div><!-- ends post id -->
                <div class="responses">

                    <?php //comments_popup_link(); ?>

                </div>

                    <?php if( comments_open() ) comments_template('', true); ?>
	    <?php endwhile; ?>

	        <div class="navigation">
		    <p><span class="alignleft"> <?php previous_post_link(); ?></span><span class="alignright"><?php next_post_link(); ?></span></p>
	        </div>

	    <?php else : ?>

	    <div class="post">
	        <div class="entry">

		        <?php get_template_part( 'content', 'none' ); ?>

	        </div>
        </div>

	<?php endif; ?>

    </article>


</section>

    <?php get_footer(); ?>