<?php

fusion_builder_map( array(
    'name'        => esc_attr__( $widget, 'propertyhive' ),
    'shortcode'   => 'avada_' . str_replace("-", "_", sanitize_title($widget)),
    'icon'        => 'fusiona-dollar', // Use a Fusion icon
    'preview'    => dirname( PH_PLUGIN_FILE ) . '/includes/avada-widgets/' . sanitize_title($widget) . '-preview.php',
	'preview_id' => 'fusion-builder-block-module-' . sanitize_title($widget) . '-preview-template',
    'params'      => array(
        [
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Show Price Qualifier', 'fusion-builder' ),
			'param_name'  => 'show_price_qualifier',
			'value'       => [
				'on'  => esc_attr__( 'On', 'fusion-builder' ),
				'off' => esc_attr__( 'Off', 'fusion-builder' ),
			],
			'default'     => 'on',
		],
        [
			'type'        => 'radio_button_set',
			'heading'     => esc_attr__( 'Alignment', 'fusion-builder' ),
			'description' => esc_attr__( 'Choose to align the output left, right or center.', 'fusion-builder' ),
			'param_name'  => 'content_align',
			'responsive'  => [
				'state'         => 'large',
				'default_value' => true,
			],
			'value'       => [
				'left'   => esc_attr__( 'Left', 'fusion-builder' ),
				'center' => esc_attr__( 'Center', 'fusion-builder' ),
				'right'  => esc_attr__( 'Right', 'fusion-builder' ),
			],
			'default'     => 'left',
			'group'       => esc_attr__( 'Design', 'fusion-builder' ),
		],
		[
			'type'             => 'typography',
			//'remove_from_atts' => true,
			'global'           => true,
			'heading'          => esc_attr__( 'Typography', 'fusion-builder' ),
			'param_name'       => 'main_typography',
			'group'            => esc_attr__( 'Design', 'fusion-builder' ),
			'choices'          => [
				'font-family'    => 'price_font',
				'font-size'      => 'font_size',
				'line-height'    => 'line_height',
				'letter-spacing' => 'letter_spacing',
				'text-transform' => 'text_transform',
			],
			'default'          => [
				'font-family'    => '',
				'variant'        => '',
				'font-size'      => '',
				'line-height'    => '',
				'letter-spacing' => '',
				'text-transform' => '',
			],
		],
		[
			'type'        => 'colorpickeralpha',
			'heading'     => esc_attr__( 'Font Color', 'fusion-builder' ),
			'param_name'  => 'text_color',
			'value'       => '',
			'group'       => esc_attr__( 'Design', 'fusion-builder' ),
		],
    ),
) );