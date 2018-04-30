<?php
/*
 * comments.php
 * larryslist
 */
    if ( post_password_required() )
        return;
?>

    <section id="comments">

    <?php if ( have_comments() ) : ?>

        <h2 class="comments-title"><?php get_the_title() ?></h2>
                <ol class="commentlist">

                <?php wp_list_comments( array(
                    'reply_text' => __( 'Reply to this thread', 'larryslist' ))
                ); ?>

                </ol><!-- ends commentlist -->
                <div class="navigation">
                  <p><?php previous_comments_link() ?><span><?php next_comments_link() ?></span></p>
                </div><br>

	<?php else : // then this if comments are closed ?>

	        <small><?php esc_html_e( '- No Comments on this Post - ', 'larryslist' ); ?></small>

	    <?php endif; ?>

        <div><br>

        <?php
        comment_form();
        ?>

        </div>
    </section><!-- #comments .comments-area -->