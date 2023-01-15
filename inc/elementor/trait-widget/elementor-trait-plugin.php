<?php

if ( !defined("ABSPATH") )
    exit();

class Elementor_Trait_Plugin extends \Elementor\Widget_Base {

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
    }

    public function get_name() {
        return "trait-widget";
    }

    public function get_title() {
        return "Trait";
    }

    public function get_icon() {
        return "fas fa-crown";
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    public function get_script_depends() {
        return [];
    }

    public function get_style_depends() {
        return [];
    }

    protected function _register_controls() {


        $this->start_controls_section(
            'icon_section',
            [
                'label' => __( 'Ikonica', 'slavija' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'trait_icon',
            [
                'label' => __( 'Odabir ikonice', 'elementor-trait-plugin' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_responsive_control(
            'trait_icon_size',
            [
                'label' => __( 'Veličina ikonice', 'elementor-trait-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 12,
                        'step' => 1,
                        'max' => 150,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                "selectors" => [
                    "{{WRAPPER}} .icon" => "font-size: {{SIZE}}{{UNIT}};"
                ]
            ]
        );

        $this->add_control(
            'trait_icon_color',
            [
                'label' => __( 'Boja ikonice', 'elementor-trait-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                "selectors" => [
                    "{{WRAPPER}} .icon" => "color: {{VALUE}}"
                ]
            ]
        );

        $this->end_controls_section();

        // Tekst
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Naslov', 'elementor-trait-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Boja naslova', 'elementor-trait-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                "selectors" => [
                    "{{WRAPPER}} .title" => "color: {{VALUE}}"
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => __( 'Tipografija', 'elementor-trait-plugin' ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_control(
            'text_title',
            [
                'label' => __( 'Unesite naslov', 'elementor-trait-widget' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Naslovna poruka', 'elementor-trait-widget' ),
                'placeholder' => __( 'Otkucajte ovde naslov', 'elementor-trait-widget' ),
            ]
        );

        $this->add_responsive_control(
            'text_margin',
            [
                'label' => __( 'Margine', 'elementor-trait-widget' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                "default" => [
                    "left" => 30,
                    "right" => 15,
                    "bottom" => 0,
                    "top" => 0,
                    "unit" => 'px',
                ],
            ]
        );


        $this->end_controls_section();


        // Podnaslov
        $this->start_controls_section(
            'subtext_section',
            [
                'label' => __( 'Podnaslov', 'elementor-trait-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtext_color',
            [
                'label' => __( 'Boja podnaslova', 'elementor-trait-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#999999',
                "selectors" => [
                    "{{WRAPPER}} .text" => "color: {{VALUE}}"
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtext_typography',
                'label' => __( 'Tipografija', 'elementor-trait-plugin' ),
                'selector' => '{{WRAPPER}} .text',
            ]
        );

        $this->add_control(
            'subtext_alignment',
            [
                'label' => esc_html__( 'Poravnanje teksta', 'elementor-trait-plugin' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'elementor-trait-plugin' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'elementor-trait-plugin' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'elementor-trait-plugin' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'elementor-trait-plugin' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left'
            ]
        );

        $this->add_control(
            'text_subtitle',
            [
                'label' => __( 'Unesite podnaslov', 'elementor-trait-widget' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ornare posuere nulla non bibendum.', 'elementor-trait-widget' ),
                'placeholder' => __( 'Otkucajte ovde podnaslov', 'elementor-trait-widget' ),
            ]
        );

        $this->add_responsive_control(
            'subtext_margin',
            [
                'label' => __( 'Margine', 'elementor-trait-widget' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                "default" => [
                    "left" => 30,
                    "right" => 15,
                    "bottom" => 0,
                    "top" => 15,
                    "unit" => 'px'
                ],
                'selectors' => [
                    '{{WRAPPER}} .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
            <div class="trait-widget-container">
                <div class="icon">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['trait_icon'] ); ?>
                </div>
                <div class="content">
                    <div class="title"><?= $settings["text_title"] ?></div>
                    <div class="text" style="text-align: <?= $settings['subtext_alignment']; ?>"><?= $settings["text_subtitle"] ?></div>
                </div>
            </div>

        <?php
    }

    protected function _content_template() {
        ?>
        <# var iconHTML = elementor.helpers.renderIcon( view, settings.trait_icon, { 'aria-hidden': true }, 'i' , 'object' ); #>
        <div class="trait-widget-container">
            <div class="icon">
                {{{ iconHTML.value }}}
            </div>
            <div class="content">
                <div class="title">{{{ settings.text_title }}}</div>
                <div class="text" style="text-align: {{ settings.subtext_alignment }};">{{{ settings.text_subtitle }}}</div>
            </div>
        </div>
        <?php
    }

}