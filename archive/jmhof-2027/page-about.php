<?php
/**
 * JMHOF 2027 — page-about.php
 * About the Jewish Music Hall of Fame Awards.
 * Applied when page slug is "about".
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
				<?php echo $is_en ? 'About the Awards' : 'אודות הפרסים'; ?>
			</p>
			<h1 class="display-lg">
				<?php the_title(); ?>
			</h1>
		</div>
	</header>

	<!-- ── MISSION ─────────────────────────────────────────────────── -->
	<section class="about-mission section">
		<div class="section-inner about-mission__inner">

			<div class="about-mission__text">
				<h2 class="display-sm">
					<?php echo $is_en ? 'Our Mission' : 'המשימה שלנו'; ?>
				</h2>
				<div class="body-lg entry-content">
					<?php if ( get_the_content() ) : ?>
						<?php the_content(); ?>
					<?php else : ?>
						<p><?php echo $is_en
							? '[Mission statement pending — Roei]'
							: '[טקסט משימה ממתין — רועי]'; ?></p>
					<?php endif; ?>
				</div>
			</div>

			<div class="about-mission__aside">
				<blockquote class="about-pullquote">
					<p class="display-xs">
						<?php echo $is_en
							? '&ldquo;[Pull quote pending — Roei]&rdquo;'
							: '&rdquo;[ציטוט ממתין — רועי]&ldquo;'; ?>
					</p>
				</blockquote>
			</div>

		</div>
	</section>

	<!-- ── HISTORY ─────────────────────────────────────────────────── -->
	<section class="about-history section section--paper">
		<div class="section-inner section-inner--narrow">
			<h2 class="display-sm">
				<?php echo $is_en ? 'History' : 'ההיסטוריה'; ?>
			</h2>
			<div class="body-lg entry-content">
				<p><?php echo $is_en
					? '[History copy pending — Roei]'
					: '[תוכן היסטוריה ממתין — רועי]'; ?></p>
			</div>
		</div>
	</section>

	<!-- ── BOARD / LEADERSHIP ──────────────────────────────────────── -->
	<section class="about-board section">
		<div class="section-inner">
			<h2 class="display-sm">
				<?php echo $is_en ? 'Leadership' : 'הנהגה'; ?>
			</h2>
			<div class="board-grid grid-12">
				<?php
				// Placeholder board members — replace with CPT or ACF repeater when content is ready
				$members = $is_en
					? [
						[ 'name' => '[Board Member Name — Roei]', 'role' => '[Title — Roei]' ],
						[ 'name' => '[Board Member Name — Roei]', 'role' => '[Title — Roei]' ],
						[ 'name' => '[Board Member Name — Roei]', 'role' => '[Title — Roei]' ],
					]
					: [
						[ 'name' => '[שם חבר הוועד — רועי]', 'role' => '[תפקיד — רועי]' ],
						[ 'name' => '[שם חבר הוועד — רועי]', 'role' => '[תפקיד — רועי]' ],
						[ 'name' => '[שם חבר הוועד — רועי]', 'role' => '[תפקיד — רועי]' ],
					];
				foreach ( $members as $member ) : ?>
					<div class="board-card col-4">
						<div class="board-card__portrait-placeholder" aria-hidden="true"></div>
						<p class="board-card__name body-lg"><?php echo esc_html( $member['name'] ); ?></p>
						<p class="board-card__role label-caps text-ash"><?php echo esc_html( $member['role'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ── SELECTION PROCESS ───────────────────────────────────────── -->
	<section class="about-process section section--dark">
		<div class="section-inner section-inner--narrow">
			<h2 class="display-sm">
				<?php echo $is_en ? 'Selection Process' : 'תהליך הבחירה'; ?>
			</h2>
			<div class="body-lg entry-content text-ash">
				<p><?php echo $is_en
					? '[Selection process copy pending — Roei]'
					: '[תוכן תהליך הבחירה ממתין — רועי]'; ?></p>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
