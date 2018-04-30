<?php
/*
 * content for single post standard post type
 * theme larryslist
 */
?>

<header>
    <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
</header>
    <article class="article-entry">
        <figure>

            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); $url = esc_url( $thumb['0'] ); ?><a href="<?php echo esc_url($url); ?>" onclick="centeredPopup(this.href,'myWindow','500','450','yes');return false"><?php the_post_thumbnail(array( 200, 200 )); ?></a>

        </figure>
            <div class="content-container">

                <?php the_content(); ?>
                    <div class="navigation"><?php wp_link_pages(); ?></div>

            </div>
                <div class="meta-data">
                    <p class="cat-link"><?php esc_html_e( 'Category: ', 'larryslist' ); ?> <?php the_category( ', ' ) ?><i id="sep"> | </i><?php the_tags(); ?>  <br><span class="authorlinks"><a href="<?php echo the_author_link(); ?>"><?php the_author() ?></a> <span class="date"><?php the_date() ?></span> @ <?php the_time() ?> </span> <span class="edit-link"><?php edit_post_link(__('Edit', 'larryslist' ) ); ?></p>
                </div>
    </article><!-- ends article-entry -->
