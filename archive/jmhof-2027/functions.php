<?php
/**
 * JMHOF 2027 — functions.php
 * Theme setup, enqueues, fonts, CPTs, and global config.
 */

defined( 'ABSPATH' ) || exit;

define( 'JMHOF_VERSION', '0.1.0' );

// ─── INCLUDES ────────────────────────────────────────────────────────
require_once JMHOF_DIR . '/includes/acf-fields.php';
define( 'JMHOF_DIR',     get_template_directory() );
define( 'JMHOF_URI',     get_template_directory_uri() );

// ─── THEME SETUP ────────────────────────────────────────────────────
add_action( 'after_setup_theme', function () {

	load_theme_textdomain( 'jmhof', JMHOF_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [
		'search-form', 'comment-form', 'comment-list',
		'gallery', 'caption', 'style', 'script',
	] );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );

	// Custom image sizes
	add_image_size( 'jmhof-portrait',  600,  800, true );  // Inductee portraits 3:4
	add_image_size( 'jmhof-hero',     1920,  960, true );  // Hero banners 2:1
	add_image_size( 'jmhof-card',      800,  600, true );  // Category cards

	// Nav menus
	register_nav_menus( [
		'primary-he' => __( 'Primary Navigation (Hebrew)', 'jmhof' ),
		'primary-en' => __( 'Primary Navigation (English)', 'jmhof' ),
		'footer-he'  => __( 'Footer Navigation (Hebrew)', 'jmhof' ),
		'footer-en'  => __( 'Footer Navigation (English)', 'jmhof' ),
	] );

} );

// ─── ENQUEUE STYLES ─────────────────────────────────────────────────
add_action( 'wp_enqueue_scripts', function () {

	// Design tokens (always first)
	wp_enqueue_style(
		'jmhof-tokens',
		JMHOF_URI . '/assets/css/design-tokens.css',
		[],
		JMHOF_VERSION
	);

	// Base styles
	wp_enqueue_style(
		'jmhof-base',
		JMHOF_URI . '/assets/css/base.css',
		[ 'jmhof-tokens' ],
		JMHOF_VERSION
	);

	// Navigation
	wp_enqueue_style(
		'jmhof-nav',
		JMHOF_URI . '/assets/css/nav.css',
		[ 'jmhof-base' ],
		JMHOF_VERSION
	);

	// Footer
	wp_enqueue_style(
		'jmhof-footer',
		JMHOF_URI . '/assets/css/footer.css',
		[ 'jmhof-base' ],
		JMHOF_VERSION
	);

	// Components
	wp_enqueue_style(
		'jmhof-components',
		JMHOF_URI . '/assets/css/components.css',
		[ 'jmhof-base' ],
		JMHOF_VERSION
	);

	// Category pages
	if ( is_singular( 'jmhof_category' ) || is_page( 'categories' ) ) {
		wp_enqueue_style(
			'jmhof-category',
			JMHOF_URI . '/assets/css/category.css',
			[ 'jmhof-components' ],
			JMHOF_VERSION
		);
	}

	// Ceremony page + About page (shared ceremony.css handles both)
	if ( is_page( 'ceremony' ) || is_page( 'about' ) ) {
		wp_enqueue_style(
			'jmhof-ceremony',
			JMHOF_URI . '/assets/css/ceremony.css',
			[ 'jmhof-components' ],
			JMHOF_VERSION
		);
	}

	// Inductee (only on inductee singles)
	if ( is_singular( 'jmhof_inductee' ) ) {
		wp_enqueue_style(
			'jmhof-inductee',
			JMHOF_URI . '/assets/css/inductee.css',
			[ 'jmhof-components' ],
			JMHOF_VERSION
		);
	}

	// Main style.css (theme declaration — minimal, just the header)
	wp_enqueue_style(
		'jmhof-style',
		get_stylesheet_uri(),
		[ 'jmhof-base' ],
		JMHOF_VERSION
	);

	// Google Fonts — self-hosted via local file or Bunny Fonts CDN
	// TODO: Replace with self-hosted OMGF version before launch
	wp_enqueue_style(
		'jmhof-fonts',
		'https://fonts.bunny.net/css?family=frank-ruhl-libre:400,700,800|heebo:400,500,700|fraunces:400,700,800|inter:400,500&display=swap',
		[],
		null
	);

} );

// ─── ENQUEUE SCRIPTS ────────────────────────────────────────────────
add_action( 'wp_enqueue_scripts', function () {

	wp_enqueue_script(
		'jmhof-nav',
		JMHOF_URI . '/assets/js/nav.js',
		[],
		JMHOF_VERSION,
		true // Load in footer
	);

	// Countdown — only on ceremony page
	if ( is_page( 'ceremony' ) ) {
		wp_enqueue_script(
			'jmhof-countdown',
			JMHOF_URI . '/assets/js/countdown.js',
			[],
			JMHOF_VERSION,
			true
		);
	}

} );

// ─── BUILDING SITE URL (configurable theme option) ──────────────────
if ( ! function_exists( 'jmhof_building_site_url' ) ) {
	function jmhof_building_site_url() {
		return get_option( 'jmhof_building_site_url', 'https://buildingsite.hallofame.org' );
	}
}

// ─── THEME OPTIONS PAGE ─────────────────────────────────────────────
add_action( 'admin_menu', function () {
	add_options_page(
		__( 'JMHOF Theme Options', 'jmhof' ),
		__( 'JMHOF Options', 'jmhof' ),
		'manage_options',
		'jmhof-options',
		'jmhof_options_page'
	);
} );

function jmhof_options_page() {
	if ( isset( $_POST['jmhof_save'] ) && check_admin_referer( 'jmhof_options' ) ) {
		update_option( 'jmhof_building_site_url', esc_url_raw( $_POST['jmhof_building_site_url'] ?? '' ) );
		update_option( 'jmhof_public_mode',        intval( $_POST['jmhof_public_mode'] ?? 0 ) );
		update_option( 'jmhof_ceremony_date',       sanitize_text_field( $_POST['jmhof_ceremony_date'] ?? '' ) );
		echo '<div class="notice notice-success"><p>' . esc_html__( 'Settings saved.', 'jmhof' ) . '</p></div>';
	}
	$building_url   = get_option( 'jmhof_building_site_url', '' );
	$public_mode    = get_option( 'jmhof_public_mode', 0 );
	$ceremony_date  = get_option( 'jmhof_ceremony_date', '2027-05-15T20:00:00+03:00' );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'JMHOF Theme Options', 'jmhof' ); ?></h1>
		<form method="post">
			<?php wp_nonce_field( 'jmhof_options' ); ?>
			<table class="form-table">
				<tr>
					<th><label for="jmhof_building_site_url"><?php esc_html_e( 'Hall of Fame Building Site URL', 'jmhof' ); ?></label></th>
					<td>
						<input type="url" id="jmhof_building_site_url" name="jmhof_building_site_url"
							value="<?php echo esc_url( $building_url ); ?>" class="regular-text" />
						<p class="description"><?php esc_html_e( 'Cross-site bridge destination. Placeholder until Building Site is live.', 'jmhof' ); ?></p>
					</td>
				</tr>
				<tr>
					<th><label><?php esc_html_e( 'Site Mode', 'jmhof' ); ?></label></th>
					<td>
						<label>
							<input type="radio" name="jmhof_public_mode" value="1" <?php checked( $public_mode, 1 ); ?> />
							<?php esc_html_e( 'Public — site is fully accessible', 'jmhof' ); ?>
						</label><br>
						<label>
							<input type="radio" name="jmhof_public_mode" value="0" <?php checked( $public_mode, 0 ); ?> />
							<?php esc_html_e( 'Marketing Preview — password-gated (uses WP built-in password protection)', 'jmhof' ); ?>
						</label>
					</td>
				</tr>
				<tr>
					<th><label for="jmhof_ceremony_date"><?php esc_html_e( 'Ceremony Date & Time (ISO 8601)', 'jmhof' ); ?></label></th>
					<td>
						<input type="text" id="jmhof_ceremony_date" name="jmhof_ceremony_date"
							value="<?php echo esc_attr( $ceremony_date ); ?>" class="regular-text"
							placeholder="2027-05-15T20:00:00+03:00" />
						<p class="description"><?php esc_html_e( 'Drives the countdown timer on the Ceremony page. Format: 2027-05-15T20:00:00+03:00', 'jmhof' ); ?></p>
					</td>
				</tr>
			</table>
			<p><input type="submit" name="jmhof_save" class="button-primary" value="<?php esc_attr_e( 'Save Settings', 'jmhof' ); ?>" /></p>
		</form>
	</div>
	<?php
}

// ─── CPT: CATEGORY (Award Category) ─────────────────────────────────
add_action( 'init', function () {
	register_post_type( 'jmhof_category', [
		'labels' => [
			'name'          => __( 'Award Categories', 'jmhof' ),
			'singular_name' => __( 'Award Category', 'jmhof' ),
			'add_new_item'  => __( 'Add New Category', 'jmhof' ),
		],
		'public'       => true,
		'show_in_rest' => true,
		'has_archive'  => false,
		'rewrite'      => [ 'slug' => 'categories' ],
		'supports'     => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
		'menu_icon'    => 'dashicons-awards',
		'menu_position' => 5,
	] );
} );

// ─── CPT: INDUCTEE ───────────────────────────────────────────────────
add_action( 'init', function () {
	register_post_type( 'jmhof_inductee', [
		'labels' => [
			'name'          => __( 'Inductees', 'jmhof' ),
			'singular_name' => __( 'Inductee', 'jmhof' ),
			'add_new_item'  => __( 'Add New Inductee', 'jmhof' ),
		],
		'public'       => true,
		'show_in_rest' => true,
		'has_archive'  => false,
		'rewrite'      => [ 'slug' => 'inductees' ],
		'supports'     => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
		'menu_icon'    => 'dashicons-admin-users',
		'menu_position' => 6,
	] );
} );

// ─── CPT: DONOR TIER ─────────────────────────────────────────────────
add_action( 'init', function () {
	register_post_type( 'jmhof_donor_tier', [
		'labels' => [
			'name'          => __( 'Donor Tiers', 'jmhof' ),
			'singular_name' => __( 'Donor Tier', 'jmhof' ),
		],
		'public'       => false,
		'show_ui'      => true,
		'show_in_rest' => true,
		'supports'     => [ 'title', 'editor', 'custom-fields' ],
		'menu_icon'    => 'dashicons-heart',
		'menu_position' => 7,
	] );
} );

// ─── CPT: PRESS RELEASE ──────────────────────────────────────────────
add_action( 'init', function () {
	register_post_type( 'jmhof_press', [
		'labels' => [
			'name'          => __( 'Press Releases', 'jmhof' ),
			'singular_name' => __( 'Press Release', 'jmhof' ),
			'add_new_item'  => __( 'Add New Press Release', 'jmhof' ),
		],
		'public'       => true,
		'show_in_rest' => true,
		'has_archive'  => true,
		'rewrite'      => [ 'slug' => 'press' ],
		'supports'     => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ],
		'menu_icon'    => 'dashicons-media-document',
		'menu_position' => 8,
	] );
} );

// ─── RTL DIRECTION ───────────────────────────────────────────────────
// Set html dir and lang correctly per Polylang's active language
add_filter( 'language_attributes', function ( $output ) {
	if ( function_exists( 'pll_current_language' ) ) {
		$lang = pll_current_language( 'locale' );
		if ( $lang && strpos( $lang, 'he' ) !== false ) {
			$output = str_replace( 'dir="ltr"', 'dir="rtl"', $output );
			if ( strpos( $output, 'dir=' ) === false ) {
				$output .= ' dir="rtl"';
			}
		}
	}
	return $output;
} );

// ─── FLUSH REWRITE RULES ON ACTIVATION ──────────────────────────────
add_action( 'after_switch_theme', function () {
	flush_rewrite_rules();
} );
