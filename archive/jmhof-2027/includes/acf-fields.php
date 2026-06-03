<?php
/**
 * JMHOF 2027 — ACF Field Group Definitions
 * Registers via acf_add_local_field_group() so fields work
 * without needing to export/import through ACF UI.
 * Compatible with both ACF Free and ACF Pro.
 *
 * All get_field() / get_post_meta() calls in templates use
 * the same meta keys — works with or without ACF installed.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'acf/init', 'jmhof_register_acf_fields' );

function jmhof_register_acf_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// ── AWARD CATEGORY FIELDS ──────────────────────────────────────
	acf_add_local_field_group( [
		'key'      => 'group_jmhof_category',
		'title'    => 'Award Category Details',
		'fields'   => [
			[
				'key'           => 'field_category_number',
				'label'         => 'Category Number',
				'name'          => 'category_number',
				'type'          => 'text',
				'instructions'  => 'Display number for this award category (e.g. "01", "02").',
				'required'      => 0,
			],
			[
				'key'           => 'field_category_is_announced',
				'label'         => 'Is Announced?',
				'name'          => 'is_announced',
				'type'          => 'true_false',
				'instructions'  => 'Tick when this category can be publicly revealed.',
				'default_value' => 0,
				'ui'            => 1,
			],
			[
				'key'           => 'field_category_color',
				'label'         => 'Accent Colour (optional)',
				'name'          => 'category_color',
				'type'          => 'color_picker',
				'instructions'  => 'Override ember accent for this category card. Leave blank to use default.',
				'required'      => 0,
			],
		],
		'location' => [
			[ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'jmhof_category' ] ],
		],
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
	] );

	// ── INDUCTEE FIELDS ───────────────────────────────────────────
	acf_add_local_field_group( [
		'key'      => 'group_jmhof_inductee',
		'title'    => 'Inductee Details',
		'fields'   => [
			[
				'key'           => 'field_inductee_subtitle',
				'label'         => 'Subtitle / Instrument / Era',
				'name'          => 'inductee_subtitle',
				'type'          => 'text',
				'instructions'  => 'Short descriptor shown under the name (e.g. "Composer · 1920–1987").',
				'required'      => 0,
			],
			[
				'key'           => 'field_inductee_is_announced',
				'label'         => 'Is Announced?',
				'name'          => 'is_announced',
				'type'          => 'true_false',
				'instructions'  => 'Tick when this inductee can be publicly named.',
				'default_value' => 0,
				'ui'            => 1,
			],
			[
				'key'           => 'field_inductee_rights_cleared',
				'label'         => 'Portrait Rights Cleared?',
				'name'          => 'is_rights_cleared',
				'type'          => 'true_false',
				'instructions'  => 'Tick only after image rights are confirmed. Unticked = silhouette placeholder shown.',
				'default_value' => 0,
				'ui'            => 1,
				'ui_on_text'    => 'Cleared',
				'ui_off_text'   => 'Pending',
			],
			[
				'key'           => 'field_inductee_award_category',
				'label'         => 'Award Category',
				'name'          => 'award_category',
				'type'          => 'post_object',
				'instructions'  => 'Link this inductee to their award category.',
				'post_type'     => [ 'jmhof_category' ],
				'allow_null'    => 1,
				'multiple'      => 0,
				'return_format' => 'id',
				'ui'            => 1,
			],
			[
				'key'           => 'field_inductee_year',
				'label'         => 'Induction Year',
				'name'          => 'induction_year',
				'type'          => 'number',
				'instructions'  => 'Year of induction (e.g. 2027).',
				'default_value' => 2027,
				'min'           => 2000,
				'max'           => 2100,
				'step'          => 1,
			],
		],
		'location' => [
			[ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'jmhof_inductee' ] ],
		],
		'menu_order'      => 0,
		'position'        => 'normal',
		'style'           => 'default',
		'label_placement' => 'top',
	] );

	// ── DONOR TIER FIELDS ─────────────────────────────────────────
	acf_add_local_field_group( [
		'key'      => 'group_jmhof_donor_tier',
		'title'    => 'Donor Tier Details',
		'fields'   => [
			[
				'key'           => 'field_tier_amount',
				'label'         => 'Donation Amount',
				'name'          => 'tier_amount',
				'type'          => 'text',
				'instructions'  => 'Display string for the donation level (e.g. "₪10,000+" or "$5,000+").',
				'required'      => 0,
			],
			[
				'key'           => 'field_tier_color',
				'label'         => 'Tier Colour',
				'name'          => 'tier_color',
				'type'          => 'color_picker',
				'instructions'  => 'Accent colour for this tier card (optional).',
				'required'      => 0,
			],
		],
		'location' => [
			[ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'jmhof_donor_tier' ] ],
		],
		'menu_order'      => 0,
		'position'        => 'normal',
		'style'           => 'default',
		'label_placement' => 'top',
	] );

	// ── PRESS RELEASE FIELDS ──────────────────────────────────────
	acf_add_local_field_group( [
		'key'      => 'group_jmhof_press',
		'title'    => 'Press Release Details',
		'fields'   => [
			[
				'key'           => 'field_press_publication',
				'label'         => 'Publication / Outlet',
				'name'          => 'press_publication',
				'type'          => 'text',
				'instructions'  => 'Name of publication picking up the story, if applicable.',
				'required'      => 0,
			],
			[
				'key'           => 'field_press_external_url',
				'label'         => 'External Coverage URL',
				'name'          => 'press_external_url',
				'type'          => 'url',
				'instructions'  => 'Link to external press coverage (if hosted off-site).',
				'required'      => 0,
			],
		],
		'location' => [
			[ [ 'param' => 'post_type', 'operator' => '==', 'value' => 'jmhof_press' ] ],
		],
		'menu_order'      => 0,
		'position'        => 'normal',
		'style'           => 'default',
		'label_placement' => 'top',
	] );

	// ── CEREMONY PAGE FIELDS ──────────────────────────────────────
	acf_add_local_field_group( [
		'key'      => 'group_jmhof_ceremony_page',
		'title'    => 'Ceremony Details',
		'fields'   => [
			[
				'key'           => 'field_ceremony_datetime',
				'label'         => 'Ceremony Date & Time',
				'name'          => 'ceremony_datetime',
				'type'          => 'text',
				'instructions'  => 'ISO 8601 format: 2027-05-15T20:00:00+03:00. Overrides the global setting for this page\'s countdown.',
				'required'      => 0,
				'placeholder'   => '2027-05-15T20:00:00+03:00',
			],
		],
		'location' => [
			[ [ 'param' => 'page_template', 'operator' => '==', 'value' => 'default' ],
			  [ 'param' => 'page', 'operator' => '==', 'value' => 'ceremony' ] ],
		],
		'menu_order'      => 0,
		'position'        => 'side',
		'style'           => 'default',
		'label_placement' => 'top',
	] );

}
