<?php
if (!defined('ABSPATH')) {
    exit;
}

class Divi_Property_Address_County_Widget extends ET_Builder_Module
{
    public $slug       = 'et_pb_property_address_county_widget';
    public $vb_support = 'partial';

    public function init() {
        $this->name = esc_html__( 'Property Address County', 'propertyhive' );
        $this->icon = '3';
        $this->main_css_element = '%%order_class%%';
    }

    public function get_fields()
    {
        $fields = array();

        return $fields;
    }

    public function render( $attrs, $content, $render_slug )
    {
        $post_id = get_the_ID();

        $property = new PH_Property($post_id);

        if ( !isset($property->id) ) {
            return;
        }

        if ( $property->address_four == '' )
        {
            return;
        }

        $return = '<div class="divi-widget-address-county">';

        $return .= $property->address_four;

        $return .= '</div>';

        return $this->_render_module_wrapper( $return, $render_slug );
    }
}