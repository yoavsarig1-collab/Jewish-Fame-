<?php
/**
 * JMHOF 2027 — page.php
 * Default page template.
 */
get_header();
?>

<main id="main" class="site-main">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="page-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>

			<header class="page-header section">
				<div class="section-inner section-inner--narrow">
					<h1 class="display-lg"><?php the_title(); ?></h1>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="page-featured-image">
					<?php the_post_thumbnail( 'jmhof-hero', [ 'loading' => 'eager' ] ); ?>
				</div>
			<?php endif; ?>

			<div class="page-body section">
				<div class="section-inner section-inner--narrow">
					<div class="body-lg entry-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>

		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();
