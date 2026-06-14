<?php
/**
 * @package wp-bootstrap-starter
 */

get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
 <!-- Post Date -->
        <div class="entry-date">
            <time datetime="<?php echo get_the_date('c'); ?>">
                <?php echo get_the_date(); ?>
            </time>
        </div>
 <!-- START: Featured Image Thumbnail -->
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                </a>
            </div>
        <?php endif; ?>
        <!-- END: Featured Image Thumbnail -->


<!-- Post Excerpt -->
        <div class="entry-summary">
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
        </div>


	<?php endwhile; endif; ?>

<?php get_footer(); ?>