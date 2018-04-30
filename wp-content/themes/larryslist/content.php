<?php
/**
 * content template
 * @larryslist
 */
if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <article class="article-content">
                  <header>
		    <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                  </header>
                    <div class="article-entry">

                        <?php the_content(); ?>
                            <div class="pagedlink"><?php wp_link_pages(); ?></div>

                                <div class="meta-data">
                                    <p class="cat-link"><?php esc_html_e( 'Filed under: ', 'larryslist' ); ?> - <?php the_category(',') ?> - <?php the_tags() ?> - <span class="authorlinks"><?php the_author() ?></span> @ <?php the_date() ?> <span class="edit-link"><?php edit_post_link(__('Edit', 'larryslist' ) ); ?></p>
                                </div>
                </article>
            </div>
				 
            <?php endwhile; ?>

                <div id="navigation">
		    <div class="alignleft"><?php next_posts_link( ' &laquo; ' ) ?></div>
		    <div class="alignright"> <?php previous_posts_link( ' &raquo; ' ) ?></div>
	        </div>

                <?php else : ?>

	        <?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>
