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
				<?php
					$twitter_handle = get_theme_mod( 'twitter_handle_setting' );
					$tweet_id = get_post_meta( $post->ID, 'tweet_id', true ); 
					$short_url = urlencode( get_post_meta( $post->ID, 'short_url', true ) );

					$tweet = urlencode( '"' . get_the_title( $post->ID ) . '"' );

					if ( ! empty( $twitter_handle ) ) {
						$tweet .= ' - @' . $twitter_handle; 
					}

					if ( ! empty( $short_url ) ) {
						$tweet .= ', ' . $short_url; 
					} else {
						$tweet .= ', ' . get_permalink( $post->ID ); 
					}

					if ( count( wp_get_post_terms( $post->ID, 'post_tag' ) )  ) {
						$tweet .= ', ' . urlencode( '#' . implode( ' #', wp_get_post_terms( $post->ID, 'post_tag', array( "fields" => "names" ) ) ) ); 
					}
				?>
			</div><!-- .entry-meta -->
			<?php
			endif; 
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
