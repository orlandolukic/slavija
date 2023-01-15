<?php

if ( !defined("ABSPATH") )
    exit();

class Elementor_Slavija_Team_Member_Plugin extends \Elementor\Widget_Base {

    public function get_name() {
        return "slavija-team-member-plugin";
    }

    public function get_title() {
        return "Slavija Team Member";
    }

    public function get_icon() {
        return "fas fa-home";
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

        /**
         * =========================================================================================
         * CONTENT TAB -> Opšti podaci
         * =========================================================================================
         */

        $this->start_controls_section(
            'iamge_section', [
                'label' => __( 'Opšti podaci', 'slavija-team-member' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image_src',
            [
                'label' => __( 'Slika zaposlenog', 'slavija-team-member' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'image_width',
            [
                'label' => __( 'Dužina slike', 'slavija-team-member' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 2000,
                        'step' => 10,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1
                    ]
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .image-placeholder img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_height',
            [
                'label' => __( 'Visina slike', 'slavija-team-member' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 200,
                        'max' => 600,
                        'step' => 10,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 250,
                ],
                'selectors' => [
                    '{{WRAPPER}} .image-placeholder' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_position_x',
            [
                'label' => __( 'Pozicija po x koordinati', 'slavija-team-member' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 10,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .image-placeholder img' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'image_position_y',
            [
                'label' => __( 'Pozicija po y koordinati', 'slavija-team-member' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 10,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .image-placeholder img' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );



        $this->end_controls_section();

        /**
         * =========================================================================================
         * CONTENT TAB -> Zaposleni
         * =========================================================================================
         */

        $this->start_controls_section(
            'employee_section', [
                'label' => __( 'Zaposleni', 'slavija-team-member' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'employee_name',
            [
                'label' => __( 'Ime zaposlenog', 'slavija-team-member' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Petar Petrovic', 'slavija-team-member' ),
                'placeholder' => __( 'Unesite ime i prezime zaposlenog', 'slavija-team-member' ),
            ]
        );

        $this->add_control(
            'employee_name_color',
            [
                'label' => __( 'Boja imena', 'slavija-team-member' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'employee_name_typography',
                'label' => __( 'Tipografija', 'slavija-team-member' ),
                'selector' => '{{WRAPPER}} .name',
            ]
        );

        $this->add_responsive_control(
            'employee_name_padding',
            [
                'label' => __( 'Margine', 'slavija-team-member' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

        /**
         * =========================================================================================
         * CONTENT TAB -> Titula
         * =========================================================================================
         */

        $this->start_controls_section(
            'employee_title_section', [
                'label' => __( 'Titula', 'slavija-team-member' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'employee_title',
            [
                'label' => __( 'Titula zaposlenog', 'slavija-team-member' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Web developer', 'slavija-team-member' ),
                'placeholder' => __( 'Unesite naziv titule zaposlenog', 'slavija-team-member' ),
            ]
        );

        $this->add_control(
            'employee_title_color',
            [
                'label' => __( 'Boja titule', 'slavija-team-member' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'employee_title_typography',
                'label' => __( 'Tipografija', 'slavija-team-member' ),
                'selector' => '{{WRAPPER}} .title',
            ]
        );

        $this->add_responsive_control(
            'employee_title_padding',
            [
                'label' => __( 'Margine', 'slavija-team-member' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();

        /**
         * =========================================================================================
         * STYLE TAB -> Podešavanje stilova
         * =========================================================================================
         */

        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Podešavanje stilova', 'slavija-team-member' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'style_background',
                'label' => __( 'Background', 'slavija-team-member' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .team-member-placeholder',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __( 'Senka', 'slavija-team-member' ),
                'selector' => '{{WRAPPER}} .team-member-placeholder',
            ]
        );


        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <style>

        </style>
        <div class="team-member-placeholder" data-id="<?= $this->get_id() ?>">
            <div class="image-placeholder">
                <img class="image" src="<?= $settings['image_src']['url'] ?>">
            </div>
            <div class="name"><?= $settings['employee_name'] ?></div>
            <div class="title"><?= $settings['employee_title'] ?></div>
        </div>
        <?php
    }

    protected function _content_template()
    {

    }

}