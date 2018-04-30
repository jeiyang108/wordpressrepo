<?php
/*
 * 404.php
 * The page-not-found template.
 */
get_header(); ?>
<section class="row">
    <article id="content" class="c8" role="main">
        <?php $options = get_option( 'larryslist_theme_options' ); ?>
        <?php if( !empty ($options['larryslist_newtitle']) ) { ?>
        <h2><?php esc_attr( $options['larryslist_newtitle'] ); ?></h2><?php } ?>

            <?php get_template_part( 'content', 'none' ); ?>

                <div class="archive-page">

	            <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

                        <div class="widget">
			    <h2 class="widgettitle"><?php esc_html_e( 'Categories', 'larryslist' ); ?></h2>
				<ul>
                                <?php wp_list_categories( array(
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'show_count' => 1,
                                'title_li'   => '',
                                'taxonomy'   => 'tsw-taxonomy',
                                'number'     => 10,
                                ) ); ?>
						</ul>
			</div><!-- ends widget -->
                </div>
    </article>
        <div class="c4 end">

            <?php get_sidebar(); ?>

        </div>
</section>

    <?php get_footer(); ?>