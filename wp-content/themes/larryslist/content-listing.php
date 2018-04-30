<?php
/**
 * content part for custom-listing single posts type
 * larryslist
 */
?>

<article class="c12">
    <header>
        <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
    </header>
	<div class="img-center">
        <figure class="listing-finger">
            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail-listing' ); $url = $thumb['0']; ?>
<a href="<?php echo esc_url($url); ?>" onclick="centeredPopup(this.href,'myWindow','500','450','yes');return false"><?php the_post_thumbnail(array( 200, 200 )); ?></a>
        </figure>
    </div>
        <div class="article-entry">
            <div class="content-container">

                <?php the_content(); ?>

            </div>
                <div class="meta-data">
                <p class="cat-link"><?php esc_html_e( 'Category: ', 'larryslist' ); ?>

                <?php if ( post_type_exists( 'listing' ) ) {
                      echo get_the_term_list( get_the_ID(), 'tsw-taxonomy', '', ', ', '' ); } ?>

<i id="sep"> | </i><?php the_tags(); ?>  <br><span class="authorlinks"><a href="<?php echo the_author_link(); ?>"><?php the_author() ?></a> <span class="date"><?php the_date() ?></span> @ <?php the_time() ?> </span> <span class="edit-link"><?php edit_post_link(__('Edit', 'larryslist' ) ); ?></span></p>
                </div><!-- ends meta-data -->

                    <?php if( is_singular( array('page', 'attachment', 'listing') ) ) { ?>

                    <aside class="othersby">
                        <h3><?php esc_html_e( 'Other Listings by ', 'larryslist' ); the_author(); ?></h3>
                            <?php echo larryslist_get_author_posts(); ?>
                                <div class="clearfix"><br></div>
                    </aside>

                    <?php } ?>
</article>
    
