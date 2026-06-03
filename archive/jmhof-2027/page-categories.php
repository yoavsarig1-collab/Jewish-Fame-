<?php
/**
 * JMHOF 2027 — page-categories.php
 * Award Categories index — grid of all jmhof_category CPT entries.
 * WordPress auto-applies this when the page slug is "categories".
 */
get_header();

$lang  = function_exists( 'pll_current_language' ) ? pll_current_language() : 'he';
$is_en = $lang === 'en';
?>

<main id="main" class="site-main">

	<!-- ── PAGE HEADER ─────────────────────────────────────────────── -->
	<header class="page-header section">
		<div class="section-inner section-inner--narrow">
			<p class="label-caps text-ember">
				<?php echo $is_en ? '2027 Awards' : 'פרסים 2027'; ?>
			</p>
			<h1 class="display-lg">
				<?php echo $is_en ? 'Award Categories' : 'קטגוריות הפרסים'; ?>
			</h1>
			<p class="body-lg text-ash">
				<?php echo $is_en
					? 'Honouring excellence across the full breadth of Jewish musical tradition.'
					: 'הוקרה למצוינות על פני מלוא רוחב המסורת המוזיקלית היהודית.'; ?>
			</p>
		</div>
	</header>

	<!-- ── CATEGORIES GRID ─────────────────────────────────────────── -->
	<section class="categories-archive section" aria-label="<?php esc_attr_e( 'Award Categories', 'jmhof' ); ?>">
		<div class="section-inner">
			<?php
			$categories = new WP_Query( [
				'post_type'      => 'jmhof_category',
				'posts_per_page' => -1,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
			] );

			if ( $categories->have_posts() ) :
			?>
			<div class="category-grid grid-12" role="list">
				<?php while ( $categories->have_posts() ) : $categories->the_post();
					$cat_number  = get_post_meta( get_the_ID(), 'category_number', true );
					$is_announced = get_post_meta( get_the_ID(), 'is_announced', true );
				?>
					<article class="category-card col-4" role="listitem">
						<a href="<?php the_permalink(); ?>" class="category-card__link">

							<div class="category-card__image">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'jmhof-card', [
										'loading' => 'lazy',
										'alt'     => get_the_title(),
									] ); ?>
								<?php else : ?>
									<div class="category-card__image-placeholder" aria-hidden="true"></div>
								<?php endif; ?>

								<?php if ( ! $is_announced ) : ?>
									<span class="category-card__badge label-caps">
										<?php echo $is_en ? 'To be announced' : 'יוכרז בקרוב'; ?>
									</span>
								<?php endif; ?>
							</div>

							<div class="category-card__body">
								<?php if ( $cat_number ) : ?>
									<span class="category-number label-caps text-ember num"><?php echo esc_html( $cat_number ); ?></span>
								<?php endif; ?>
								<h2 class="category-card__title body-lg"><?php the_title(); ?></h2>
								<?php if ( has_excerpt() ) : ?>
									<p class="category-card__desc text-ash"><?php the_excerpt(); ?></p>
								<?php endif; ?>
							</div>

						</a>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>

			<?php else : ?>
				<p class="body-lg text-ash">
					<?php echo $is_en
						? 'Categories will be announced soon.'
						: 'הקטגוריות יוכרזו בקרוב.'; ?>
				</p>
			<?php endif; ?>
		</div>
	</section>

</main>

<?php
get_footer();
