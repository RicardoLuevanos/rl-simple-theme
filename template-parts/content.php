<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rl-simple-theme
 */

?>

<?php if ( 'post' === get_post_type() ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> onclick="window.location='<?php echo esc_url( get_permalink() ) ?>'">
	<header class="entry-header">
		<?php the_title( '<h3 class="entry-title"><a title="' . get_the_title() . '" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

		<div class="entry-meta">
			<?php rl_simple_theme_posted_on(); ?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->
</article><!-- #post-## -->

<?php endif; ?>
