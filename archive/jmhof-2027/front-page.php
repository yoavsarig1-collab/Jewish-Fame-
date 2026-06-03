<?php
/**
 * JMHOF 2027 — front-page.php
 * Homepage template — Hero, intro text, category grid preview, ceremony CTA.
 */
get_header();

$lang = function_exists( 'pll_current_language' ) ? pll_current_language() : 'he';
$is_en = $lang === 'en';
$base  = home_url( $is_en ? '/en/' : '/' );
?>

<main id="main" class="site-main">

	<!-- ══ HERO ══════════════════════════════════════════════════════ -->
	<section class="hero section" aria-label="<?php esc_attr_e( 'Hero', 'jmhof' ); ?>">
		<div class="hero__inner section-inner">

			<div class="hero__eyebrow">
				<span class="label-caps text-ember">
					<?php echo $is_en
						? '2027 Ceremony'
						: 'טקס 2027'; ?>
				</span>
			</div>

			<h1 class="hero__headline display-xl">
				<?php echo $is_en
					? 'Jewish Music Hall of Fame Awards'
					: 'פרסי היכל התהילה<br>למוזיקה יהודית'; ?>
			</h1>

			<p class="hero__sub display-sm text-ash">
				<?php echo $is_en
					? 'Celebrating the artists, composers, and visionaries who shaped the sound of Jewish culture.'
					: 'חוגגים את האמנים, המלחינים והחזונאים שעיצבו את הצליל של התרבות היהודית.'; ?>
			</p>

			<div class="hero__actions">
				<a href="<?php echo esc_url( $base . 'categories' ); ?>" class="btn-primary">
					<?php echo $is_en ? 'View Categories' : 'לקטגוריות'; ?>
				</a>
				<a href="<?php echo esc_url( $base . 'ceremony' ); ?>" class="btn-text">
					<?php echo $is_en ? 'Ceremony details' : 'פרטי הטקס'; ?>
					<span class="btn-arrow" aria-hidden="true">&#8592;</span>
				</a>
			</div>

		</div>
	</section>
	<!-- ══ /HERO ═══════════════════════════════════════════════════ -->

	<!-- ══ CATEGORIES PREVIEW ═══════════════════════════════════════ -->
	<?php
	$categories = new WP_Query( [
		'post_type'      => 'jmhof_category',
		'posts_per_page' => 6,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	] );

	if ( $categories->have_posts() ) :
	?>
	<section class="categories-preview section" aria-label="<?php esc_attr_e( 'Award Categories', 'jmhof' ); ?>">
		<div class="section-inner">

			<header class="section-header">
				<h2 class="display-sm">
					<?php echo $is_en ? 'Award Categories' : 'קטגוריות הפרסים'; ?>
				</h2>
				<a href="<?php echo esc_url( $base . 'categories' ); ?>" class="btn-text">
					<?php echo $is_en ? 'All categories' : 'כל הקטגוריות'; ?>
					<span class="btn-arrow" aria-hidden="true">&#8592;</span>
				</a>
			</header>

			<div class="category-grid grid-12">
				<?php while ( $categories->have_posts() ) : $categories->the_post(); ?>
					<article class="category-card col-4">
						<a href="<?php the_permalink(); ?>" class="category-card__link">

							<div class="category-card__image">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'jmhof-card', [ 'loading' => 'lazy' ] ); ?>
								<?php else : ?>
									<div class="category-card__image-placeholder" aria-hidden="true"></div>
								<?php endif; ?>
							</div>

							<div class="category-card__body">
								<?php
								$cat_number = get_post_meta( get_the_ID(), 'category_number', true );
								if ( $cat_number ) : ?>
									<span class="category-number label-caps text-ember"><?php echo esc_html( $cat_number ); ?></span>
								<?php endif; ?>
								<h3 class="category-card__title body-lg"><?php the_title(); ?></h3>
							</div>

						</a>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>

		</div>
	</section>
	<?php endif; ?>
	<!-- ══ /CATEGORIES PREVIEW ══════════════════════════════════════ -->

	<!-- ══ CEREMONY CTA ═════════════════════════════════════════════ -->
	<section class="ceremony-cta section section--dark" aria-label="<?php esc_attr_e( 'Ceremony', 'jmhof' ); ?>">
		<div class="section-inner section-inner--narrow text-center">

			<p class="label-caps text-ember">
				<?php echo $is_en ? 'Save the date' : 'שמרו את התאריך'; ?>
			</p>
			<h2 class="display-md">
				<?php echo $is_en ? '2027 Awards Ceremony' : 'טקס הפרסים 2027'; ?>
			</h2>
			<p class="body-lg text-ash">
				<?php echo $is_en
					? 'Tel Aviv. Full details to be announced.'
					: 'תל אביב. פרטים מלאים יפורסמו בקרוב.'; ?>
			</p>
			<a href="<?php echo esc_url( $base . 'support' ); ?>" class="btn-primary">
				<?php echo $is_en ? 'Support the Awards' : 'תמכו בפרסים'; ?>
			</a>

		</div>
	</section>
	<!-- ══ /CEREMONY CTA ════════════════════════════════════════════ -->

</main>

<?php
get_footer();
