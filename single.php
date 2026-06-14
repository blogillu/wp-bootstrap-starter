<?php
/**
 * @package wp-bootstrap-starter
 */
defined( 'ABSPATH' ) || exit;

get_header(); ?>

  <?php
    // Checks if there are any posts available to display
    if ( have_posts() ) :
        
        // Starts the standard WordPress Loop
        while ( have_posts() ) : the_post(); ?>



<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		 <div class="entry-meta">
                        <!-- Displays the publication date and author name -->
                        Posted on <?php the_date(); ?> 
			 <?php
// Place this inside the loop to display links to the current post's categories
if ( has_category() ) {
    echo '| <span class="post-categories"> Posted Under ';
    the_category( ', ' ); // Separates categories with a comma
    echo '</span>';
}
?>
                    </div>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article>

  <?php
        // Ends the while loop
        endwhile; 
        
    endif; // Ends the if statement
    ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>