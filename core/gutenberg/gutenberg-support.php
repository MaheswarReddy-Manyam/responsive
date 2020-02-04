<?php
/**
 * Functions file for Gutenberg support.
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Function to add customizer color options to gutenberg color palette.
 */
function responsive_gutenberg_color_palette() {

	$body_typography = get_theme_mod( 'body_typography' );

	$text_color = ( isset( $body_typography ) && isset( $body_typography['color'] ) ) ? $body_typography['color'] : '#555555';

	$responsive_gutenberg_color_options = array(

		// Button colors.
		array(
			'name'  => __( 'Button Color', 'responsive' ),
			'slug'  => 'button-color',
			'color' => esc_html( get_theme_mod( 'button-color', '#1874cd' ) ),
		),
		array(
			'name'  => __( 'Button Hover Color', 'responsive' ),
			'slug'  => 'button-hover-color',
			'color' => esc_html( get_theme_mod( 'button-hover-color', '#7db7f0' ) ),
		),
		array(
			'name'  => __( 'Button Hover Text Color', 'responsive' ),
			'slug'  => 'button-hover-text-color',
			'color' => esc_html( get_theme_mod( 'button-hover-text-color', '#333333' ) ),
		),
		array(
			'name'  => __( 'Button Text Color', 'responsive' ),
			'slug'  => 'button-text-color',
			'color' => esc_html( get_theme_mod( 'button-text-color', '#ffffff' ) ),
		),

		// Blog Post Background Color.
		array(
			'name'  => __( 'Text color', 'responsive' ),
			'slug'  => 'responsive-container-background-color',
			'color' => esc_html( $text_color ),
		),

		// Container Background Color.
		array(
			'name'  => __( 'Container Background Color', 'responsive' ),
			'slug'  => 'responsive-main-container-background-color',
			'color' => esc_html( get_theme_mod( 'responsive_main_container_background_color', '#ffffff' ) ),
		),
	);

	return $responsive_gutenberg_color_options;
}

/**
 * Add custom color classes to Gutenberg
 *
 * @param array $responsive_gutenberg_color_options List of customizer color options for Gutenberg editor.
 */
function responsive_gutenberg_colors( $responsive_gutenberg_color_options ) {

	if ( empty( $responsive_gutenberg_color_options ) ) {
		return;
	}
	$css = '';
	foreach ( $responsive_gutenberg_color_options as $color ) {
		if ( ! empty( $color['color'] ) ) {
			$custom_color = get_theme_mod( $color['slug'], $color['color'] );
			$css         .= '.has-' . $color['slug'] . '-color { color: ' . esc_attr( $custom_color ) . '; }';
			$css         .= '.has-' . $color['slug'] . '-background-color { background-color: ' . esc_attr( $custom_color ) . '; }';
		}
	}
	return wp_strip_all_tags( $css );
}


/**
 * [customizer_css description].
 *
 * @return string.
 */
function responsive_gutenberg_customizer_css() {
	$link_color       = get_theme_mod( 'responsive_link_color', '#0066CC' );
	$link_hover_color = get_theme_mod( 'responsive_link_hover_color', '#10659C' );

	$button_color              = get_theme_mod( 'responsive_button_color', '#0066CC' );
	$button_hover_color        = get_theme_mod( 'responsive_button_hover_color', '#10659C' );
	$button_text_color         = get_theme_mod( 'responsive_button_text_color', '#FFFFFF' );
	$button_hover_text_color   = get_theme_mod( 'responsive_button_hover_text_color', '#FFFFFF' );
	$button_border_color       = get_theme_mod( 'responsive_button_border_color', '#10659C' );
	$button_hover_border_color = get_theme_mod( 'responsive_button_hover_border_color', '#0066CC' );

	$buttons_padding_right  = get_theme_mod( 'responsive_buttons_right_padding', 10 );
	$buttons_padding_left   = get_theme_mod( 'responsive_buttons_left_padding', 10 );
	$buttons_padding_top    = get_theme_mod( 'responsive_buttons_top_padding', 10 );
	$buttons_padding_bottom = get_theme_mod( 'responsive_buttons_bottom_padding', 10 );

	$buttons_tablet_padding_right  = get_theme_mod( 'responsive_buttons_tablet_right_padding', 10 );
	$buttons_tablet_padding_left   = get_theme_mod( 'responsive_buttons_tablet_left_padding', 10 );
	$buttons_tablet_padding_top    = get_theme_mod( 'responsive_buttons_tablet_top_padding', 10 );
	$buttons_tablet_padding_bottom = get_theme_mod( 'responsive_buttons_tablet_bottom_padding', 10 );

	$buttons_mobile_padding_right  = get_theme_mod( 'responsive_buttons_mobile_right_padding', 10 );
	$buttons_mobile_padding_left   = get_theme_mod( 'responsive_buttons_mobile_left_padding', 10 );
	$buttons_mobile_padding_top    = get_theme_mod( 'responsive_buttons_mobile_top_padding', 10 );
	$buttons_mobile_padding_bottom = get_theme_mod( 'responsive_buttons_mobile_bottom_padding', 10 );

	$buttons_radius       = get_theme_mod( 'responsive_buttons_radius', 0 );
	$buttons_border_width = get_theme_mod( 'responsive_buttons_border_width', 0 );

	$box_background_color = get_theme_mod( 'responsive_box_background_color', '#ffffff' );

	$h1_typography   = get_theme_mod( 'heading_h1_typography' );
	$h2_typography   = get_theme_mod( 'heading_h2_typography' );
	$h3_typography   = get_theme_mod( 'heading_h3_typography' );
	$h4_typography   = get_theme_mod( 'heading_h4_typography' );
	$h5_typography   = get_theme_mod( 'heading_h5_typography' );
	$h6_typography   = get_theme_mod( 'heading_h6_typography' );
	$body_typography = get_theme_mod( 'body_typography' );

	$custom_css = '';

	if ( $h1_typography ) {
		$custom_css = '.edit-post-visual-editor.editor-styles-wrapper .editor-post-title__block .editor-post-title__input,
		.editor-post-title__block .editor-post-title__input,
		.edit-post-visual-editor.editor-styles-wrapper .wp-block h1,
		.wp-block-freeform.block-library-rich-text__tinymce h1,
		.wp-block-heading h1.editor-rich-text__tinymce {';

		foreach ( $h1_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= '}';
	}

	if ( $body_typography ) {
		$custom_css .= '.edit-post-visual-editor.editor-styles-wrapper,
		.wp-block-freeform,
		.editor-writing-flow,
		.editor-styles-wrapper{
			background-color: ' . $box_background_color . ';';

		foreach ( $body_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= '}';
	}

	if ( $h2_typography ) {

		$custom_css .= '.edit-post-visual-editor.editor-styles-wrapper .wp-block h2,
		.wp-block-freeform.block-library-rich-text__tinymce h2,
		.wp-block-heading h2.editor-rich-text__tinymce {';

		foreach ( $h2_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= '}';
	}

	if ( $h3_typography ) {
		$custom_css .= '.edit-post-visual-editor.editor-styles-wrapper .wp-block h3,
		.wp-block-freeform.block-library-rich-text__tinymce h3,
		.wp-block-heading h3.editor-rich-text__tinymce {';

		foreach ( $h3_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= '}';
	}

	if ( $h4_typography ) {
		$custom_css .= '.edit-post-visual-editor.editor-styles-wrapper .wp-block h4,
		.wp-block-freeform.block-library-rich-text__tinymce h4,
		.wp-block-heading h4.editor-rich-text__tinymce {';

		foreach ( $h4_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= '}';
	}

	if ( $h5_typography ) {
		$custom_css .= '.edit-post-visual-editor.editor-styles-wrapper .wp-block h5,
		.wp-block-freeform.block-library-rich-text__tinymce h5,
		.wp-block-heading h5.editor-rich-text__tinymce {';

		foreach ( $h5_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= '}';
	}

	if ( $h6_typography ) {
		$custom_css .= ' .edit-post-visual-editor.editor-styles-wrapper .wp-block h6,
		.wp-block-freeform.block-library-rich-text__tinymce h6,
		.wp-block-heading h6.editor-rich-text__tinymce {';

		foreach ( $h6_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= '}';
	}

	$custom_css .= ".edit-post-visual-editor.editor-styles-wrapper .editor-block-list__layout a,
	.wp-block-freeform.block-library-rich-text__tinymce a,
	.editor-writing-flow a{
		color:{$link_color};
		text-decoration: none;
	}
	.edit-post-visual-editor.editor-styles-wrapper{
	background-color: #{$box_background_color};
	}

	.wp-block-freeform.block-library-rich-text__tinymce a:hover,
	.wp-block-freeform.block-library-rich-text__tinymce a:focus,
	.editor-writing-flow a:hover,
	.editor-writing-flow a:focus{
		color: {$link_hover_color};
	}";

	$custom_css .= '
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button{
		background-color:' . $button_color . ';
		border: ' . $buttons_border_width . 'px solid ' . $button_border_color . ';
		border-radius:' . $buttons_radius . 'px;
	    color: ' . $button_text_color . ';
		padding: ' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . ';
    }
	@media screen and ( max-width: 992px ) {
		.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link,
		.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button{
			padding: ' . responsive_spacing_css( $buttons_tablet_padding_top, $buttons_tablet_padding_right, $buttons_tablet_padding_bottom, $buttons_tablet_padding_left ) . ';
		}
	}
	@media screen and ( max-width: 576px ) {
		.edit-post-visual-editor.editor-styles-wrapper .wp-block-button__link,
		.edit-post-visual-editor.editor-styles-wrapper .wp-block-file__button{
			padding: ' . responsive_spacing_css( $buttons_mobile_padding_top, $buttons_mobile_padding_right, $buttons_mobile_padding_bottom, $buttons_mobile_padding_left ) . ';
		}
	}
	';

	return $custom_css;
}
/**
 *  Enqueue block styles  in editor
 */
function responsive_block_styles() {
	wp_enqueue_style( 'responsive-gutenberg-blocks', get_stylesheet_directory_uri() . '/core/css/gutenberg-editor.css', array(), '4.1' );
	wp_add_inline_style( 'responsive-gutenberg-blocks', responsive_gutenberg_customizer_css() );

	// Add customizer colors to Gutenberg editor in backend.
	wp_add_inline_style( 'responsive-gutenberg-blocks', responsive_gutenberg_colors( responsive_gutenberg_color_palette() ) );
}
add_action( 'enqueue_block_editor_assets', 'responsive_block_styles' );
