<?php
class Elementor_Demo_Form_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'demo_form_widget';
	}

	public function get_title() {
		return esc_html__( 'Demo Form', 'elementor-comport' );
	}

	public function get_icon() {
		return 'eicon-heart';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'demo', 'form' ];
	}

    protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Demo Form', 'elementor-comport' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'headline',
			array(
				'label'   => __( 'Headline', 'elementor-comport' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Request a Demo', 'elementor-comport' ),
			)
		);

		$this->add_control(
			'body_copy',
			array(
				'label'   => __( 'Body Copy (NO HTML)', 'elementor-comport' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Body Copy', 'elementor-comport' ),
			)
		);

        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-comport' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'background_image',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => esc_html__( 'Choose Background', 'elementor-comport' ),
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_control(
			'demo_product',
			array(
				'label'   => __( 'Demo This Product', 'elementor-comport' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Product Name', 'elementor-comport' ),
			)
		);

		$this->end_controls_section();

		// Content Tab End



	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>

        <div class="demo-request-section">
            <div class="container demo-request-flex" style="background-image: url('<?php echo $settings['background_image']['url']; ?>')">
                <div class="demo-request-text">
                    <h2 style="color: <?php echo $settings['text_color']; ?>;"><?php echo $settings['headline']; ?></h2>
                    <p  style="color: <?php echo $settings['text_color']; ?>;"><?php echo $settings['body_copy']; ?></p>
                </div>
                <div class="demo-request-form">
                    <?php echo do_shortcode('[contact-form-7 id="8520" title="Request a Demo (Dynamic)"]'); ?>
                </div>
            </div>
        </div>
        <script>
            jQuery('#demoproduct').val('<?php echo $settings['demo_product']; ?>');
        </script>

        <?php
	}
}