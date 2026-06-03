<?php
/**
 * JMHOF 2027 — page-ceremony.php
 * Ceremony page — date/venue, countdown timer, programme.
 * Applied when page slug is "ceremony".
 */
get_header();

$lang  = function_exists( 'pll_current_language' ) ? pll_current_language() : 'he';
$is_en = $lang === 'en';

// Ceremony date — stored in theme option or ACF field on this page.
// Format: ISO 8601 — "2027-05-15T20:00:00+03:00"
$ceremony_date = get_post_meta( get_the_ID(), 'ceremony_datetime', true );
if ( ! $ceremony_date ) {
	$ceremony_date = get_option( 'jmhof_ceremony_date', '2027-05-15T20:00:00+03:00' );
}
?>

<main id="main" class="site-main">

	<!-- ── CEREMONY HERO ───────────────────────────────────────────── -->
	<header class="ceremony-hero section">
		<div class="ceremony-hero__inner section-inner">

			<div class="ceremony-hero__text">
				<p class="label-caps text-ember">
					<?php echo $is_en ? '2027 Awards Ceremony' : 'טקס הפרסים 2027'; ?>
				</p>
				<h1 class="display-xl">
					<?php echo $is_en
						? '[Ceremony headline — Roei]'
						: '[כותרת הטקס — רועי]'; ?>
				</h1>

				<p class="ceremony-details body-lg text-ash">
					<?php echo $is_en
						? '<strong>[Date pending — Roei]</strong> · <strong>[Venue name — Roei]</strong> · Tel Aviv'
						: '<strong>[תאריך ממתין — רועי]</strong> · <strong>[שם המקום — רועי]</strong> · תל אביב'; ?>
				</p>
			</div>

			<!-- Countdown Timer -->
			<div class="ceremony-countdown" aria-label="<?php esc_attr_e( 'Countdown to ceremony', 'jmhof' ); ?>"
				data-ceremony-date="<?php echo esc_attr( $ceremony_date ); ?>">
				<div class="countdown-unit">
					<span class="countdown-digit num" data-unit="days">––</span>
					<span class="countdown-label label-caps">
						<?php echo $is_en ? 'Days' : 'ימים'; ?>
					</span>
				</div>
				<span class="countdown-sep" aria-hidden="true">:</span>
				<div class="countdown-unit">
					<span class="countdown-digit num" data-unit="hours">––</span>
					<span class="countdown-label label-caps">
						<?php echo $is_en ? 'Hours' : 'שעות'; ?>
					</span>
				</div>
				<span class="countdown-sep" aria-hidden="true">:</span>
				<div class="countdown-unit">
					<span class="countdown-digit num" data-unit="minutes">––</span>
					<span class="countdown-label label-caps">
						<?php echo $is_en ? 'Minutes' : 'דקות'; ?>
					</span>
				</div>
				<span class="countdown-sep" aria-hidden="true">:</span>
				<div class="countdown-unit">
					<span class="countdown-digit num" data-unit="seconds">––</span>
					<span class="countdown-label label-caps">
						<?php echo $is_en ? 'Seconds' : 'שניות'; ?>
					</span>
				</div>
			</div>

		</div>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="ceremony-hero__bg">
				<?php the_post_thumbnail( 'jmhof-hero', [ 'loading' => 'eager', 'alt' => '' ] ); ?>
			</div>
		<?php endif; ?>
	</header>

	<!-- ── VENUE ───────────────────────────────────────────────────── -->
	<section class="ceremony-venue section">
		<div class="section-inner ceremony-venue__inner">

			<div class="ceremony-venue__text">
				<p class="label-caps text-ember">
					<?php echo $is_en ? 'Venue' : 'מקום הטקס'; ?>
				</p>
				<h2 class="display-sm">
					<?php echo $is_en
						? '[Venue name — Roei]'
						: '[שם המקום — רועי]'; ?>
				</h2>
				<p class="body-lg text-ash">
					<?php echo $is_en
						? '[Venue description — Roei]'
						: '[תיאור המקום — רועי]'; ?>
				</p>
				<address class="ceremony-address body-lg">
					<?php echo $is_en
						? '[Address line 1 — Roei]<br>[City, Country — Roei]'
						: '[שורת כתובת 1 — רועי]<br>[עיר, מדינה — רועי]'; ?>
				</address>
			</div>

			<div class="ceremony-venue__image">
				<div class="image-placeholder" aria-hidden="true">[Venue image — Roei]</div>
			</div>

		</div>
	</section>

	<!-- ── PROGRAMME ───────────────────────────────────────────────── -->
	<section class="ceremony-programme section section--paper">
		<div class="section-inner section-inner--narrow">
			<h2 class="display-sm">
				<?php echo $is_en ? 'Programme' : 'תוכנית הערב'; ?>
			</h2>
			<div class="body-lg entry-content">
				<?php if ( get_the_content() ) : ?>
					<?php the_content(); ?>
				<?php else : ?>
					<p><?php echo $is_en
						? '[Programme copy pending — Roei]'
						: '[תוכן תוכנית הערב ממתין — רועי]'; ?></p>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ── SUPPORT CTA ─────────────────────────────────────────────── -->
	<section class="ceremony-support section section--dark">
		<div class="section-inner section-inner--narrow text-center">
			<h2 class="display-md">
				<?php echo $is_en
					? 'Support the Ceremony'
					: 'תמכו בטקס'; ?>
			</h2>
			<p class="body-lg text-ash">
				<?php echo $is_en
					? '[Support CTA copy pending — Roei]'
					: '[טקסט קריאה לפעולה — רועי]'; ?>
			</p>
			<?php
			$base = home_url( $is_en ? '/en/' : '/' );
			?>
			<a href="<?php echo esc_url( $base . 'support' ); ?>" class="btn-primary">
				<?php echo $is_en ? 'Become a Supporter' : 'הפכו לתומכים'; ?>
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
