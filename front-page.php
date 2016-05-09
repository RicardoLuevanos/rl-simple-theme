<?php
/**
 * Template Name: Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rl-simple-theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section>
				<h2>Recent</h2>
				<?php $latest_posts = new WP_Query( array( 'posts_per_page' => 5 ) );
				if ( $latest_posts->have_posts() ) : while ( $latest_posts->have_posts() ) : $latest_posts->the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile; else : ?> 
					No Content	
				<?php endif; ?>
			</section>

			<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<section>
					<?php echo the_content(); ?>
				</section>
			<?php endwhile; endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
