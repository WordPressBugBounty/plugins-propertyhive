<?php

add_shortcode( 'avada_property_price', function( $atts ) {
    $atts = shortcode_atts( array(
        'show_price_qualifier' => 'on',
        'content_align'    => 'left',
        'fusion_font_family_price_font' => '',
        'fusion_font_variant_price_font' => '',
        'font_size'  => '',
        'letter_spacing'  => '',
        'text_transform'  => '',
        'line_height'  => '',
        'text_color'       => '',
    ), $atts );

    if ( get_post_type( get_the_ID() ) != 'property' )
    {
    	return '';
    }

    fusion_element_rendering_elements( true );

    global $property;
    
    if ( empty($property) )
    {
        $property = new PH_Property(get_the_ID());
    }

    $style = Fusion_Builder_Element_Helper::get_font_styling( $atts, 'price_font' );

	if ( $atts['font_size'] ) {
		$style .= 'font-size:' . fusion_library()->sanitize->get_value_with_unit( $atts['font_size'] ) . ';';
	}

	if ( $atts['letter_spacing'] ) {
		$style .= 'letter-spacing:' . fusion_library()->sanitize->get_value_with_unit( $atts['letter_spacing'] ) . ';';
	}

	if ( ! empty( $atts['text_transform'] ) ) {
		$style .= 'text-transform:' . $atts['text_transform'] . ';';
	}

	if ( ! empty( $atts['content_align'] ) ) {
		$style .= 'text-align:' . $atts['content_align'] . ';';
	}

    ob_start();

    if ( isset($atts['show_price_qualifier']) && $atts['show_price_qualifier'] != 'on' )
	{
?>
<style type="text/css">
.price .price-qualifier { display:none; }
</style>
<?php
	}

    echo '<div ' . FusionBuilder::attributes( 'property-price-shortcode' ) . '>
    	<div style="' . $style . '">';
            propertyhive_template_single_price();
    echo '
    	</div>
    </div>';

    $html = ob_get_clean();

    fusion_element_rendering_elements( false );

    return $html;
});