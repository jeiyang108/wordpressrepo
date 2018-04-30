<?php
/**
 * Template Name: View Listings
 * for theme larryslist
 * @since v. 1.3
 */
get_header(); ?>

<div class="row">
    <section id="content" class="c8" role="main">

        <?php $options = get_option( 'larryslist_theme_options' ); ?>
        <?php if (!empty( $options['larryslist_newtitle'] ) ) { ?><h2 class="alt-title"><?php echo esc_attr($options['larryslist_newtitle']); ?></h2>
        <?php } else { echo '<div></div>'; } ?>

        <?php
             $larryslist_cppp = (int)$options['larryslist_cppp'];
             $args = array( 'post_type' => 'listing', 'posts_per_page' => $larryslist_cppp  );

             $the_query = new WP_Query( $args );
             if ( $the_query->have_posts() ) : ?>
             <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <div class="row">

        <div class="listings-view">

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="c2 list-img">
                    <figure class="listing-thumb">
                        <a href="<?php the_permalink() ?>" 
                           rel="bookmark" 
                           title="<?php the_title(); ?>">
                           
                           <?php if ( !has_post_thumbnail() ) : ?>
                               
                           <img src="<?php echo esc_url(get_template_directory_uri()) 
                           . '/include/images/default-thumbnail-100x75.png'; ?>" 
                               title="<?php the_title(); ?>"  
                               class="img-responsive list-thumb" alt="" />
                               <?php else : ?>
                               <?php the_post_thumbnail(); ?>

                           <?php endif; ?></a>
                    </figure>
                </div>
                <div class="c10">
                    <article class="excerpt-entry">
                        <header>
		            <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        </header>
                        <div class="entry">

                            <?php the_excerpt(''); ?>

                        </div>
                            <div class="metadata">
                                <p class="cat-link">

                                <?php if ( post_type_exists( 'listing' ) ) {
                                      echo get_the_term_list( get_the_ID(), 'tsw-taxonomy', '', ', ', '' ); } ?>
                                <?php edit_post_link(__('Edit', 'larryslist' ) ); ?></p>

                            </div>
                    </article>
                </div>

            </div><!-- endes post id -->

        </div>

        </div><!-- ends inner row -->

             <?php endwhile; ?>

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
