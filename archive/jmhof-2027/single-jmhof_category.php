<?php
/**
 * JMHOF 2027 — single-jmhof_category.php
 * Single Award Category page — description + inductees for this category.
 */
get_header();

$lang  = function_exists( 'pll_current_language' ) ? pll_current_language() : 'he';
$is_en = $lang === 'en';
$base  = home_url( $is_en ? '/en/' : '/' );
?>

<main id="main" class="site-main">

	<?php while ( have_posts() ) : the_post();
		$cat_number   = get_post_meta( get_the_ID(), 'category_number', true );
		$is_announced = get_post_meta( get_the_ID(), 'is_announced', true );
		$category_id  = get_the_ID();
	?>

	<!-- ── CATEGORY HEADER ─────────────────────────────────────────── -->
	<header class="category-header section">
		<div class="category-header__inner section-inner">

			<div class="category-header__meta">
				<a href="<?php echo esc_url( $base . 'categories' ); ?>" class="btn-text btn-text--back">
					<span class="btn-arrow btn-arrow--prev" aria-hidden="true">&#8594;</span>
					<?php echo $is_en ? 'All Categories' : 'כל הקטגוריות'; ?>
				</a>

				<?php if ( $cat_number ) : ?>
					<p class="label-caps text-ember num"><?php echo esc_html( $cat_number ); ?></p>
				<?php endif; ?>
			</div>

			<h1 class="display-lg"><?php the_title(); ?></h1>

			<?php if ( ! $is_announced ) : ?>
				<p class="label-caps text-ash">
					<?php echo $is_en ? 'To be announced' : 'יוכרז בקרוב'; ?>
				</p>
			<?php endif; ?>

			<?php if ( get_the_content() ) : ?>
				<div class="category-header__desc body-lg text-ash entry-content">
					<?php the_content(); ?>
				</div>
			<?php endif; ?>

		</div>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="category-header__image">
				<?php the_post_thumbnail( 'jmhof-hero', [
					'loading' => 'eager',
					'alt'     => '',
				] ); ?>
			</div>
		<?php endif; ?>
	</header>

	<!-- ── INDUCTEES IN THIS CATEGORY ─────────────────────────────── -->
	<?php
	$inductees = new WP_Query( [
		'post_type'      => 'jmhof_inductee',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'meta_query'     => [
			[
				'key'     => 'award_category',
				'value'   => $category_id,
				'compare' => '=',
			],
		],
	] );

	if ( $inductees->have_posts() ) :
	?>
	<section class="inductees-grid section" aria-label="<?php esc_attr_e( 'Inductees', 'jmhof' ); ?>">
		<div class="section-inner">

			<h2 class="display-sm">
				<?php echo $is_en ? 'Inductees' : 'חברי היכל התהילה'; ?>
			</h2>

			<div class="inductee-cards grid-12" role="list">
				<?php while ( $inductees->have_posts() ) : $inductees->the_post();
					$is_rights    = get_post_meta( get_the_ID(), 'is_rights_cleared', true );
					$inductee_ann = get_post_meta( get_the_ID(), 'is_announced', true );
					$subtitle     = get_post_meta( get_the_ID(), 'inductee_subtitle', true );
				?>
					<article class="inductee-card col-3" role="listitem">
						<a href="<?php the_permalink(); ?>" class="inductee-card__link">

							<div class="inductee-card__portrait">
								<?php if ( $is_rights && has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'jmhof-portrait', [
										'loading' => 'lazy',
										'alt'     => get_the_title(),
										'class'   => 'inductee-card__img',
									] ); ?>
								<?php else : ?>
									<!-- Silhouette — no rights clearance yet -->
									<div class="inductee-card__silhouette" aria-hidden="true">
										<svg viewBox="0 0 300 400" xmlns="http://www.w3.org/2000/svg">
											<rect width="300" height="400" fill="var(--stage-lift)" />
											<ellipse cx="150" cy="120" rx="56" ry="62" fill="var(--stage-mid)" />
											<path d="M30 400 Q30 260 150 230 Q270 260 270 400Z" fill="var(--stage-mid)" />
										</svg>
									</div>
								<?php endif; ?>
							</div>

							<div class="inductee-card__body">
								<h3 class="inductee-card__name body-lg">
									<?php if ( $inductee_ann ) : ?>
										<?php the_title(); ?>
									<?php else : ?>
										<span class="text-ash"><?php echo $is_en ? 'TBA' : 'יוכרז'; ?></span>
									<?php endif; ?>
								</h3>
								<?php if ( $subtitle && $inductee_ann ) : ?>
									<p class="inductee-card__subtitle text-ash"><?php echo esc_html( $subtitle ); ?></p>
								<?php endif; ?>
							</div>

						</a>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>

		</div>
	</section>
	<?php endif; ?>

	<?php endwhile; ?>

</main>

<?php
get_footer();
