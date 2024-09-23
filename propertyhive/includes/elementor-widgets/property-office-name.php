<?php
/**
 * Elementor Property Office Name Widget.
 *
 * @since 1.0.0
 */
class Elementor_Property_Office_Name_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'property-office-name';
	}

	public function get_title() {
		return __( 'Office Name', 'propertyhive' );
	}

	public function get_icon() {
		return 'eicon-info';
	}

	public function get_categories() {
		return [ 'property-hive' ];
	}

	public function get_keywords() {
		return [ 'property hive', 'propertyhive', 'property', 'office' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Office Name', 'propertyhive' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'propertyhive' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}}',
			]
		);

		$this->add_control(
			'color',
			[
				'label' => __( 'Colour', 'propertyhive' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		global $property;

		$settings = $this->get_settings_for_display();

		if ( !isset($property->id) ) {
			return;
		}

		if ( $property->office_name != '' )
		{
	        echo $property->office_name;
	    }

	}

}