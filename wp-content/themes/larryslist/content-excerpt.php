<?php
/**
 * content for excerpts
 * larryslist
 */
?>

<section class="row">

        <div class="c12">
            <header>		
                <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            </header>
                <article class="article-entry">

                    <?php the_excerpt(); ?>

                        <div class="metadata">
                            <p class="cat-link">
                            <?php if ( is_post_type_archive( 'listing' ) ) {   
                                  echo get_the_term_list( get_the_ID(), 'tsw-taxonomy', '', ', ', '' ); } ?>
                            <?php if( is_post_type_archive( 'post' ) ) {
                                  echo the_category(); } ?>

<?php the_category( ', ' ) ?>  <span class="authorlinks"><?php the_author() ?> <span class="date"><?php the_date() ?></span> @ <?php the_time() ?> </span> <span class="edit-link"><?php edit_post_link(__('Edit', 'larryslist' ) ); ?></p>
                        </div>
                </article>
        </div>
</section>
