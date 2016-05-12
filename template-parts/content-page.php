<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rl-simple-theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rl-simple-theme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<p>Published <?php rl_simple_theme_posted_on(); ?> in <?php rl_simple_theme_entry_footer(); ?></p>
			</div><!-- .entry-meta -->
			<?php
			endif; 
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
