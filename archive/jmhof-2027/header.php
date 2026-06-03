<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to main content', 'jmhof' ); ?></a>

<header class="site-header" role="banner">
	<div class="site-header__inner">

		<!-- Wordmark -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-wordmark" rel="home" aria-label="<?php esc_attr_e( 'Jewish Music Hall of Fame Awards — Home', 'jmhof' ); ?>">
			<?php if ( function_exists( 'pll_current_language' ) && pll_current_language() === 'en' ) : ?>
				Jewish Music Hall of Fame Awards
			<?php else : ?>
				טקס פרסי היכל התהילה<span class="pipe" aria-hidden="true"> | </span>Jewish Music Hall of Fame Awards
			<?php endif; ?>
		</a>

		<!-- Mobile toggle -->
		<button class="menu-toggle" aria-controls="site-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle menu', 'jmhof' ); ?>">
			<span class="menu-toggle__bar" aria-hidden="true"></span>
			<span class="menu-toggle__bar" aria-hidden="true"></span>
			<span class="menu-toggle__bar" aria-hidden="true"></span>
		</button>

		<nav class="site-nav" id="site-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'jmhof' ); ?>">

			<?php
			// Show Hebrew or English menu depending on active language
			$menu_location = ( function_exists( 'pll_current_language' ) && pll_current_language() === 'en' )
				? 'primary-en'
				: 'primary-he';

			wp_nav_menu( [
				'theme_location' => $menu_location,
				'container'      => false,
				'menu_class'     => 'site-nav__list',
				'link_before'    => '',
				'link_after'     => '',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" role="list">%3$s</ul>',
				'walker'         => null,
				'fallback_cb'    => function() {
					// Fallback nav while menus aren't configured
					$lang = function_exists( 'pll_current_language' ) ? pll_current_language() : 'he';
					$home = home_url( $lang === 'en' ? '/en/' : '/' );
					?>
					<ul class="site-nav__list" role="list">
						<li><a href="<?php echo esc_url( $home . ( $lang === 'en' ? 'about' : 'about' ) ); ?>" class="site-nav__link"><?php echo $lang === 'en' ? 'About' : 'אודות'; ?></a></li>
						<li><a href="<?php echo esc_url( $home . 'categories' ); ?>" class="site-nav__link"><?php echo $lang === 'en' ? 'Categories' : 'קטגוריות'; ?></a></li>
						<li><a href="<?php echo esc_url( $home . 'ceremony' ); ?>" class="site-nav__link"><?php echo $lang === 'en' ? 'Ceremony' : 'הטקס'; ?></a></li>
						<li><a href="<?php echo esc_url( $home . 'support' ); ?>" class="site-nav__link"><?php echo $lang === 'en' ? 'Support' : 'תמיכה'; ?></a></li>
					</ul>
					<?php
				},
			] );
			?>

			<!-- Language Switcher -->
			<div class="lang-switcher" role="navigation" aria-label="<?php esc_attr_e( 'Language switcher', 'jmhof' ); ?>">
				<?php if ( function_exists( 'pll_the_languages' ) ) : ?>
					<?php
					$languages = pll_the_languages( [ 'raw' => 1 ] );
					$current   = function_exists( 'pll_current_language' ) ? pll_current_language() : 'he';
					foreach ( $languages as $slug => $lang ) :
						$isCurrent = ( $slug === $current );
					?>
						<?php if ( $slug !== array_key_first( $languages ) ) : ?>
							<span class="lang-switcher__separator" aria-hidden="true">·</span>
						<?php endif; ?>
						<a
							href="<?php echo esc_url( $lang['url'] ); ?>"
							class="lang-switcher__link<?php echo $isCurrent ? ' current' : ''; ?>"
							lang="<?php echo esc_attr( $lang['locale'] ); ?>"
							<?php echo $isCurrent ? 'aria-current="true"' : ''; ?>
						>
							<?php echo $slug === 'he' ? 'עברית' : 'English'; ?>
						</a>
					<?php endforeach; ?>
				<?php else : ?>
					<!-- Polylang not configured yet — static placeholder -->
					<a href="/" class="lang-switcher__link current" lang="he" aria-current="true">עברית</a>
					<span class="lang-switcher__separator" aria-hidden="true">·</span>
					<a href="/en/" class="lang-switcher__link" lang="en">English</a>
				<?php endif; ?>
			</div>

		</nav><!-- .site-nav -->
	</div><!-- .site-header__inner -->
</header><!-- .site-header -->
