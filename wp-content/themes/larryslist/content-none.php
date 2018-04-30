<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * larryslist
 */
?>

	<article id="post-0" class="post error404 not-found">
   	   	<h1 class="entry-title"><?php esc_html_e( 'Nothing found', 'larryslist' ); ?></h1>

        <div class="entry-content">
            <p><?php esc_html_e( 'No results were found. Please try again.', 'larryslist' ); ?></p>
            <hr>
            <p><?php get_search_form(); ?></p>
        </div>
    </article><!-- #post-0.post -->