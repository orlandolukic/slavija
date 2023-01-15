<?php

if ( !defined("ABSPATH") )
    exit();

class Elementor_Slavija_Single_Service_Plugin extends \Elementor\Widget_Base {

    public function get_name() {
        return "slavija-single-service-widget";
    }

    public function get_title() {
        return "Slavija Single Service";
    }

    public function get_icon() {
        return "fas fa-concierge-bell";
    }

    public function get_categories() {
        return [ 'slavija' ];
    }

    public function get_script_depends() {
        return [];
    }

    public function get_style_depends() {
        return [];
    }

    protected function _register_controls() {


        $this->start_controls_section(
            'service_image_section',
            [
                'label' => __( 'Slika usluge', 'elementor-slavija-single-service-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'service_image',
            [
                'label' => __( 'Odaberite sliku', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_responsive_control(
            'service_image_height',
            [
                'label' => __( 'Visina slike', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 500,
                'step' => 5,
                'default' => 300,
                'selectors' => [
                        '{{WRAPPER}} .image-placeholder' => 'height: {{VALUE}}px;'
                ]
            ]
        );

        $this->add_responsive_control(
            'service_image_position_x',
            [
                'label' => __( 'Pozicija X osa', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 10,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .img' => 'transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_image_position_y',
            [
                'label' => __( 'Pozicija Y osa', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 10,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .img' => 'transform: translateY({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_image_border_radius',
            [
                'label' => __( 'Zakrivljenost ivica slike', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .image-placeholder' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'service_content_section',
            [
                'label' => __( 'Podaci - usluga', 'elementor-slavija-single-service-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Podaci - usluga --> Ikonica

        $this->add_control(
            'service_icon_heading',
            [
                'label' => __( 'Ikonica', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'service_icon',
            [
                'label' => __( 'Odaberite ikonicu', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        // Podaci - usluga --> NASLOV

        $this->add_control(
            'service_title_heading',
            [
                'label' => __( 'Naslov', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'service_title',
            [
                'label' => __( 'Naslov usluge', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tekst', 'elementor-slavija-single-service-plugin' ),
                'placeholder' => __( 'Ovde upišite naslov usluge', 'elementor-slavija-single-service-plugin' ),
            ]
        );

        // Podaci - usluga --> OPIS

        $this->add_control(
            'service_description_heading',
            [
                'label' => __( 'Naslov', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'service_description',
            [
                'label' => __( 'Opis usluge', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Opis usluge', 'elementor-slavija-single-service-plugin' ),
                'placeholder' => __( 'Ovde upišite opis usluge', 'elementor-slavija-single-service-plugin' ),
            ]
        );

        // Podaci - usluga --> Dugme

        $this->add_control(
            'service_button_heading',
            [
                'label' => __( 'Dugme', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'service_button_text',
            [
                'label' => __( 'Tekst dugmeta', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Saznajte više', 'elementor-slavija-single-service-plugin' ),
                'placeholder' => __( 'Ovde upišite tekst dugmeta', 'elementor-slavija-single-service-plugin' ),
            ]
        );

        $this->add_control(
            'service_button_link',
            [
                'label' => __( 'Link dugmeta', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://slavijadoo.co.rs', 'elementor-slavija-single-service-plugin' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => true,
                ],
            ]
        );

        $this->end_controls_section();
        // Podaci - usluga

        // ========================================================================================================

        $this->start_controls_section(
            'service_style_textual',
            [
                'label' => __( 'Stil tekstualnog dela usluge', 'elementor-slavija-single-service-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'service_style_width',
            [
                'label' => __( 'Duzina tekstualnog dela', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 40,
                        'max' => 500,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-content' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_style_padding',
            [
                'label' => __( 'Unutrašnji razmak', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .service-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => 15,
                    'right' => 20,
                    'bottom' => 15,
                    'left' => 20
                ]
            ]
        );

        $this->add_responsive_control(
            'service_style_background_color',
            [
                'label' => __( 'Boja pozadine tekstualnog dela', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fefefe',
                'selectors' => [
                    '{{WRAPPER}} .service-content' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_style_position_x',
            [
                'label' => __( 'Pozicija tekstualnog dela [X koordinata]', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 0,
                        'step' => 10,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-content' => 'transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_style_position_y',
            [
                'label' => __( 'Pozicija tekstualnog dela [Y koordinata]', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 0,
                        'step' => 10,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => -100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-content' => 'position: relative; top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_style_border_radius',
            [
                'label' => __( 'Zakrivljenost ivica', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-content' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'service_style_box_shadow',
                'label' => __( 'Pozadinska senka', 'elementor-slavija-single-service-plugin' ),
                'selector' => '{{WRAPPER}} .service-content',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'service_style_border',
                'label' => __( 'Ivice (borders)', 'elementor-slavija-single-service-plugin' ),
                'selector' => '{{WRAPPER}} .service-content',
            ]
        );

        $this->end_controls_section();

        // STYLE => TITLE
        // ========================================================================================================

        $this->start_controls_section(
            'service_style_title',
            [
                'label' => __( 'Stil naslova', 'elementor-slavija-single-service-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_style_title_color',
            [
                'label' => __( 'Boja naslova', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_style_title_typography',
                'label' => __( 'Tipografija', 'elementor-slavija-single-service-plugin' ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_responsive_control(
            'service_style_title_margin',
            [
                'label' => __( 'Margine', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                        'top' => 0,
                        'right' => 0,
                        'bottom' => 15,
                        'left' => 0
                ]
            ]
        );

        $this->add_responsive_control(
            'service_style_title_padding',
            [
                'label' => __( 'Unutrasnji razmak', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // STYLE => Description
        // ========================================================================================================

        $this->start_controls_section(
            'service_style_description',
            [
                'label' => __( 'Stil opisa', 'elementor-slavija-single-service-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_style_description_color',
            [
                'label' => __( 'Boja opisa', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}}',
                ],
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_style_description_typography',
                'label' => __( 'Tipografija', 'elementor-slavija-single-service-plugin' ),
                'selector' => '{{WRAPPER}} .description',
            ]
        );

        $this->add_control(
            'service_style_description_alignment',
            [
                'label' => esc_html__( 'Poravnanje teksta', 'elementor-slavija-single-service-plugin' ),
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

        $this->add_responsive_control(
            'service_style_description_margin',
            [
                'label' => __( 'Margine', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 15,
                    'left' => 0
                ]
            ]
        );

        $this->add_responsive_control(
            'service_style_description_padding',
            [
                'label' => __( 'Unutrasnji razmak', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // STYLE => Ikonica
        // ========================================================================================================

        $this->start_controls_section(
            'service_style_icon',
            [
                'label' => __( 'Stil ikonice', 'elementor-slavija-single-service-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'service_style_icon_size',
            [
                'label' => __( 'Velicina ikonice', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 12,
                        'max' => 80,
                        'step' => 2,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 16,
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'service_style_icon_color',
            [
                'label' => __( 'Boja ikonice', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'service_style_icon_margin',
            [
                'label' => __( 'Margine', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .service-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 15,
                    'left' => 0
                ]
            ]
        );

        $this->add_responsive_control(
            'service_style_icon_padding',
            [
                'label' => __( 'Unutrasnji razmak', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .service-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // STYLE => Dugme
        // ========================================================================================================

        $this->start_controls_section(
            'service_style_button',
            [
                'label' => __( 'Stil dugmeta', 'elementor-slavija-single-service-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_style_button_typography',
                'label' => __( 'Tipografija', 'elementor-slavija-single-service-plugin' ),
                'selector' => '{{WRAPPER}} .button',
            ]
        );

        $this->add_control(
            'service_style_button_background_color',
            [
                'label' => __( 'Boja pozadine dugmeta', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button' => 'background-color: {{VALUE}}',
                ],
                'default' => '#020101'
            ]
        );

        $this->add_control(
            'service_style_button_text_color',
            [
                'label' => __( 'Boja teksta dugmeta', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button' => 'color: {{VALUE}}',
                ],
                'default' => 'white'
            ]
        );

        $this->add_responsive_control(
            'service_style_button_margin',
            [
                'label' => __( 'Margine', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0
                ]
            ]
        );

        $this->add_responsive_control(
            'service_style_button_padding',
            [
                'label' => __( 'Unutrasnji razmak', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => 10,
                    'right' => 15,
                    'bottom' => 10,
                    'left' => 15
                ]
            ]
        );

        $this->add_responsive_control(
            'service_style_button_size',
            [
                'label' => __( 'Zakrivljenost ivica', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'service_button_hover_heading',
            [
                'label' => __( 'HOVER', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'service_style_button_hover_transition',
            [
                'label' => __( 'Tranzicija', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 2,
                'step' => 0.1,
                'default' => 0.2,
                'selectors' => [
                    '{{WRAPPER}} .button' => 'transition: {{VALUE}}s;'
                ]
            ]
        );

        $this->add_control(
            'service_style_button_hover_background_color',
            [
                'label' => __( 'Boja teksta dugmeta', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .button:hover' => 'background-color: {{VALUE}}',
                ],
                'default' => 'black'
            ]
        );

        $this->add_control(
            'service_style_button_hover_animation',
            [
                'label' => __( 'Animacija', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
            ]
        );


        $this->add_responsive_control(
            'service_style_button_hover_border_radius',
            [
                'label' => __( 'Zakrivljenost ivica', 'elementor-slavija-single-service-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .button:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $image = $settings['service_image'];
        $btnAnimation = $settings['service_style_button_hover_animation'] ? " elementor-animation-" . $settings['service_style_button_hover_animation'] : "";
        ?>
        <div class="slavija-single-service-placeholder">
            <div class="image-placeholder">
                <img class="img" src="<?= $image['url'] ?>" />
            </div>
            <div class="service-content">
                <div class="service-icon">
                   <i class="<?= $settings['service_icon']['value'] ?>"></i>
                </div>
                <div class="title"><?= $settings['service_title'] ?></div>
                <div class="description" style="text-align: <?= $settings['service_style_description_alignment'] ?>;"><?= $settings['service_description'] ?></div>
                <div class="button-placeholder">
                    <a href="<?= $settings['service_button_link']['url'] ?>" target="<?= ($settings['service_button_link']['is_external'] ? "_blank" : "_self") ?>">
                        <div class="button<?= $btnAnimation ?>">
                            <?= $settings['service_button_text'] ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <?php
    }

    protected function _content_template() {
        ?>
        <#
            let x = settings.service_button_link.is_external ? "_blank" : "_self";
            let y = settings.service_style_button_hover_animation ? " elementor-animation-" + settings.service_style_button_hover_animation : "";
        #>
        <div class="slavija-single-service-placeholder">
            <div class="image-placeholder">
                <img class="img" src="{{ settings.service_image.url }}" />
            </div>
            <div class="service-content">
                <div class="service-icon">
                    <i class="{{ settings.service_icon.value }}"></i>
                </div>
                <div class="title">{{{ settings.service_title }}}</div>
                <div class="description" style="text-align: {{ settings.service_style_description_alignment }}">{{{ settings.service_description }}}</div>
                <a href="{{ settings.service_button_link.url }}" target="{{ x }}">
                    <div class="button{{y}}">
                        {{{ settings.service_button_text }}}
                    </div>
                </a>
            </div>
        </div>
        <?php
    }

}