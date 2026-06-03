<?php
/**
 * JMHOF 2027 — page-support.php
 * Support / Donate page — donor tiers, contact form placeholder.
 * Applied when the page slug is "support".
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
				<?php echo $is_en ? 'Support the Awards' : 'תמכו בפרסים'; ?>
			</p>
			<h1 class="display-lg">
				<?php echo $is_en
					? 'Become a Supporter'
					: 'הפכו לתומכים'; ?>
			</h1>
			<p class="body-lg text-ash">
				<?php echo $is_en
					? 'Your support makes the Jewish Music Hall of Fame Awards possible. Join us in honouring the artists who shaped Jewish musical heritage.'
					: 'התמיכה שלכם מאפשרת את פרסי היכל התהילה למוזיקה יהודית. הצטרפו אלינו בהוקרת האמנים שעיצבו את המורשת המוזיקלית היהודית.'; ?>
			</p>
		</div>
	</header>

	<!-- ── DONOR TIERS ─────────────────────────────────────────────── -->
	<?php
	$tiers = new WP_Query( [
		'post_type'      => 'jmhof_donor_tier',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	] );

	if ( $tiers->have_posts() ) :
	?>
	<section class="donor-tiers section" id="tiers" aria-label="<?php esc_attr_e( 'Donor Tiers', 'jmhof' ); ?>">
		<div class="section-inner">

			<h2 class="display-sm">
				<?php echo $is_en ? 'Supporter Tiers' : 'רמות תמיכה'; ?>
			</h2>

			<div class="tier-grid grid-12">
				<?php while ( $tiers->have_posts() ) : $tiers->the_post();
					$tier_amount  = get_post_meta( get_the_ID(), 'tier_amount', true );
					$tier_perks   = get_post_meta( get_the_ID(), 'tier_perks', true );
					$tier_color   = get_post_meta( get_the_ID(), 'tier_color', true );
				?>
					<article class="tier-card col-4">
						<div class="tier-card__inner">
							<h3 class="tier-card__name display-xs"><?php the_title(); ?></h3>
							<?php if ( $tier_amount ) : ?>
								<p class="tier-card__amount display-sm text-ember num">
									<?php echo esc_html( $tier_amount ); ?>
								</p>
							<?php endif; ?>
							<?php if ( get_the_content() ) : ?>
								<div class="tier-card__desc body-lg entry-content">
									<?php the_content(); ?>
								</div>
							<?php endif; ?>
							<a href="#contact" class="btn-primary">
								<?php echo $is_en ? 'Support at this level' : 'תמכו ברמה זו'; ?>
							</a>
						</div>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>

		</div>
	</section>
	<?php endif; ?>

	<!-- ── NAMING OPPORTUNITIES ────────────────────────────────────── -->
	<section class="naming-opps section section--paper" id="naming">
		<div class="section-inner section-inner--narrow">
			<h2 class="display-sm">
				<?php echo $is_en ? 'Naming Opportunities' : 'הזדמנויות שמות'; ?>
			</h2>
			<p class="body-lg">
				<?php echo $is_en
					? 'Honour a loved one or celebrate your organisation by naming an award category, stage element, or programme. Contact us to discuss available opportunities.'
					: 'כבדו יקיר לבכם או חגגו את הארגון שלכם על ידי מתן שם לקטגוריית פרס, אלמנט בימה או תוכנית. צרו איתנו קשר לדיון על הזדמנויות זמינות.'; ?>
			</p>
		</div>
	</section>

	<!-- ── CORPORATE PARTNERS ──────────────────────────────────────── -->
	<section class="corp-partners section" id="corporate">
		<div class="section-inner section-inner--narrow">
			<h2 class="display-sm">
				<?php echo $is_en ? 'Corporate Partners' : 'שותפים עסקיים'; ?>
			</h2>
			<p class="body-lg text-ash">
				<?php echo $is_en
					? 'Align your brand with a landmark cultural event. Partnership packages available for all levels of engagement.'
					: 'יישרו את המותג שלכם עם אירוע תרבותי היסטורי. חבילות שותפות זמינות לכל רמות ההתקשרות.'; ?>
			</p>
		</div>
	</section>

	<!-- ── CONTACT FORM ────────────────────────────────────────────── -->
	<section class="support-contact section section--dark" id="contact">
		<div class="section-inner section-inner--narrow">
			<h2 class="display-sm">
				<?php echo $is_en ? 'Get in Touch' : 'צרו קשר'; ?>
			</h2>
			<p class="body-lg text-ash">
				<?php echo $is_en
					? 'To discuss support opportunities, please contact us:'
					: 'לדיון בהזדמנויות תמיכה, אנא צרו קשר:'; ?>
			</p>
			<a href="mailto:support@hallofame.org" class="btn-primary">
				support@hallofame.org
			</a>
			<?php
			// Fluent Forms shortcode goes here once installed.
			// [fluentform id="1"]
			do_action( 'jmhof_support_form' );
			?>
		</div>
	</section>

</main>

<?php
get_footer();
