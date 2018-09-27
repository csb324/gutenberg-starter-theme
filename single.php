<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gutenbergtheme
 */

get_header(); ?>

	<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) : the_post();
		// check if the post or page has a Featured Image assigned to it.
		$header_background = "";

		if ( has_post_thumbnail() ) {
			$featured_image = get_the_post_thumbnail_url();
			$header_background = "background: url('" . $featured_image . "'); background-size: cover; background-position: center;";
		}
		?>

		<div class="entry-header-container" style="<?= $header_background ?>">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

		</div>

	<?php
		get_template_part( 'template-parts/content', get_post_type() );

		the_post_navigation( array(
			'prev_text' => '← %title',
			'next_text' => '%title →',
		) );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	</main><!-- #primary -->

<?php
get_footer();
