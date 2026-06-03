<?php
/**
 * JMHOF 2027 — index.php
 * Fallback template. All real templates are in /templates/.
 */
get_header();
?>
<main id="main" class="site-main section">
	<div class="section-inner">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h1 class="display-lg"><?php the_title(); ?></h1>
				<div class="body-lg"><?php the_content(); ?></div>
			</article>
		<?php endwhile; else : ?>
			<p class="text-ash"><?php esc_html_e( '[Content pending — Roei]', 'jmhof' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
