<?php
/**
 * JMHOF 2027 — footer.php
 * Site footer with four-column layout and cross-site bridge link.
 */
?>

<footer class="site-footer" role="contentinfo">
	<div class="site-footer__inner">

		<div class="site-footer__columns">

			<!-- Column 1: Brand -->
			<div class="footer-brand">
				<p class="footer-brand__wordmark">
					<?php if ( function_exists( 'pll_current_language' ) && pll_current_language() === 'en' ) : ?>
						Jewish Music Hall of Fame Awards
					<?php else : ?>
						פרסי היכל התהילה למוזיקה יהודית
					<?php endif; ?>
				</p>

				<p class="footer-brand__mission">
					<?php if ( function_exists( 'pll_current_language' ) && pll_current_language() === 'en' ) : ?>
						Honouring the artists, composers, and visionaries who shaped the sound of Jewish culture.
					<?php else : ?>
						מכבדים את האמנים, המלחינים והחזונאים שעיצבו את הצליל של התרבות היהודית.
					<?php endif; ?>
				</p>

				<p class="footer-brand__location">
					<?php esc_html_e( 'Tel Aviv · 2027', 'jmhof' ); ?>
				</p>

				<a href="mailto:info@hallofame.org" class="footer-brand__email">info@hallofame.org</a>
			</div>

			<!-- Column 2: Explore -->
			<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer navigation — Explore', 'jmhof' ); ?>">
				<p class="footer-nav__heading">
					<?php echo function_exists( 'pll_current_language' ) && pll_current_language() === 'en' ? 'Explore' : 'גלו'; ?>
				</p>
				<?php
				$lang     = function_exists( 'pll_current_language' ) ? pll_current_language() : 'he';
				$base     = home_url( $lang === 'en' ? '/en/' : '/' );
				wp_nav_menu( [
					'theme_location' => $lang === 'en' ? 'footer-en' : 'footer-he',
					'container'      => false,
					'menu_class'     => 'footer-nav__list',
					'items_wrap'     => '<ul class="%2$s" role="list">%3$s</ul>',
					'fallback_cb'    => function() use ( $lang, $base ) {
						?>
						<ul class="footer-nav__list" role="list">
							<li><a href="<?php echo esc_url( $base . ( $lang === 'en' ? 'about' : 'about' ) ); ?>" class="footer-nav__link"><?php echo $lang === 'en' ? 'About' : 'אודות'; ?></a></li>
							<li><a href="<?php echo esc_url( $base . 'categories' ); ?>" class="footer-nav__link"><?php echo $lang === 'en' ? 'Categories' : 'קטגוריות'; ?></a></li>
							<li><a href="<?php echo esc_url( $base . 'ceremony' ); ?>" class="footer-nav__link"><?php echo $lang === 'en' ? 'Ceremony' : 'הטקס'; ?></a></li>
							<li><a href="<?php echo esc_url( $base . 'inductees' ); ?>" class="footer-nav__link"><?php echo $lang === 'en' ? 'Inductees' : 'חברי היכל התהילה'; ?></a></li>
						</ul>
						<?php
					},
				] );
				?>
			</nav>

			<!-- Column 3: Support -->
			<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer navigation — Support', 'jmhof' ); ?>">
				<p class="footer-nav__heading">
					<?php echo function_exists( 'pll_current_language' ) && pll_current_language() === 'en' ? 'Support' : 'תמיכה'; ?>
				</p>
				<ul class="footer-nav__list" role="list">
					<li>
						<a href="<?php echo esc_url( $base . 'support' ); ?>" class="footer-nav__link">
							<?php echo $lang === 'en' ? 'Become a Donor' : 'הפכו לתורמים'; ?>
						</a>
					</li>
					<li>
						<a href="<?php echo esc_url( $base . 'support' . ( $lang === 'en' ? '#naming' : '#naming' ) ); ?>" class="footer-nav__link">
							<?php echo $lang === 'en' ? 'Naming Opportunities' : 'הזדמנויות שמות'; ?>
						</a>
					</li>
					<li>
						<a href="<?php echo esc_url( $base . 'support#corporate' ); ?>" class="footer-nav__link">
							<?php echo $lang === 'en' ? 'Corporate Partners' : 'שותפים עסקיים'; ?>
						</a>
					</li>
				</ul>
			</nav>

			<!-- Column 4: Media -->
			<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer navigation — Media', 'jmhof' ); ?>">
				<p class="footer-nav__heading">
					<?php echo function_exists( 'pll_current_language' ) && pll_current_language() === 'en' ? 'Media' : 'מדיה'; ?>
				</p>
				<ul class="footer-nav__list" role="list">
					<li>
						<a href="<?php echo esc_url( $base . 'press' ); ?>" class="footer-nav__link">
							<?php echo $lang === 'en' ? 'Press Releases' : 'הודעות לעיתונות'; ?>
						</a>
					</li>
					<li>
						<a href="mailto:press@hallofame.org" class="footer-nav__link">
							<?php echo $lang === 'en' ? 'Press Enquiries' : 'פניות עיתונות'; ?>
						</a>
					</li>
				</ul>
			</nav>

		</div><!-- .site-footer__columns -->

		<hr class="site-footer__divider" />

		<div class="site-footer__bottom">

			<!-- Copyright -->
			<p class="footer-copyright">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php esc_html_e( 'Jewish Music Hall of Fame Awards. All rights reserved.', 'jmhof' ); ?>
			</p>

			<!-- Cross-site bridge -->
			<p class="footer-bridge">
				<?php if ( function_exists( 'pll_current_language' ) && pll_current_language() === 'en' ) : ?>
					Also visit: <a href="<?php echo esc_url( jmhof_building_site_url() ); ?>" rel="noopener"><?php esc_html_e( 'Hall of Fame Building', 'jmhof' ); ?></a>
				<?php else : ?>
					בקרו גם: <a href="<?php echo esc_url( jmhof_building_site_url() ); ?>" rel="noopener"><?php esc_html_e( 'בניין היכל התהילה', 'jmhof' ); ?></a>
				<?php endif; ?>
			</p>

			<!-- Legal -->
			<ul class="footer-legal" role="list">
				<li>
					<a href="<?php echo esc_url( $base . 'privacy' ); ?>" class="footer-legal__link">
						<?php echo $lang === 'en' ? 'Privacy Policy' : 'מדיניות פרטיות'; ?>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( $base . 'accessibility' ); ?>" class="footer-legal__link">
						<?php echo $lang === 'en' ? 'Accessibility' : 'נגישות'; ?>
					</a>
				</li>
			</ul>

		</div><!-- .site-footer__bottom -->
	</div><!-- .site-footer__inner -->
</footer><!-- .site-footer -->

<?php wp_footer(); ?>
</body>
</html>
