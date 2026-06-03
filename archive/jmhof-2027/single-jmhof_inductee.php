<?php
/**
 * JMHOF 2027 — single-jmhof_inductee.php
 * Single inductee profile.
 * Respects is_rights_cleared flag — shows portrait or silhouette placeholder.
 */
get_header();

$lang   = function_exists( 'pll_current_language' ) ? pll_current_language() : 'he';
$is_en  = $lang === 'en';
?>

<main id="main" class="site-main">

	<?php while ( have_posts() ) : the_post();

		$is_announced    = get_post_meta( get_the_ID(), 'is_announced',    true );
		$is_rights       = get_post_meta( get_the_ID(), 'is_rights_cleared', true );
		$category_ids    = get_post_meta( get_the_ID(), 'award_category',  true ); // array or single ID
		$category_name   = '';
		if ( $category_ids ) {
			$cat_post = get_post( is_array( $category_ids ) ? $category_ids[0] : $category_ids );
			if ( $cat_post ) {
				$category_name = get_the_title( $cat_post );
			}
		}
	?>

		<article id="inductee-<?php the_ID(); ?>" <?php post_class( 'inductee-single' ); ?>>

			<!-- Portrait + bio header -->
			<header class="inductee-header section">
				<div class="inductee-header__inner section-inner">

					<div class="inductee-portrait">
						<?php if ( $is_rights && has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'jmhof-portrait', [
								'class'   => 'inductee-portrait__img',
								'loading' => 'eager',
								'alt'     => get_the_title(),
							] ); ?>
						<?php else : ?>
							<!-- Silhouette placeholder — photo not yet cleared -->
							<div class="inductee-portrait__silhouette" aria-label="<?php esc_attr_e( 'Portrait pending rights clearance', 'jmhof' ); ?>">
								<svg viewBox="0 0 300 400" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
									<rect width="300" height="400" fill="var(--stage-lift)" />
									<!-- Head -->
									<ellipse cx="150" cy="120" rx="56" ry="62" fill="var(--stage-mid)" />
									<!-- Body/shoulders -->
									<path d="M30 400 Q30 260 150 230 Q270 260 270 400Z" fill="var(--stage-mid)" />
								</svg>
							</div>
						<?php endif; ?>
					</div>

					<div class="inductee-meta">

						<?php if ( $category_name ) : ?>
							<p class="label-caps text-ember">
								<?php echo esc_html( $category_name ); ?>
							</p>
						<?php endif; ?>

						<h1 class="display-lg"><?php the_title(); ?></h1>

						<?php
						$subtitle = get_post_meta( get_the_ID(), 'inductee_subtitle', true );
						if ( $subtitle ) :
						?>
							<p class="body-lg text-ash"><?php echo esc_html( $subtitle ); ?></p>
						<?php endif; ?>

						<?php if ( ! $is_announced ) : ?>
							<p class="inductee-unannounced label-caps text-ash">
								<?php echo $is_en ? 'To be announced' : 'יוכרז בקרוב'; ?>
							</p>
						<?php endif; ?>

					</div>

				</div>
			</header>

			<!-- Bio body -->
			<?php if ( $is_announced && get_the_content() ) : ?>
			<div class="inductee-body section">
				<div class="section-inner section-inner--narrow">
					<div class="body-lg entry-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php endif; ?>

		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();
