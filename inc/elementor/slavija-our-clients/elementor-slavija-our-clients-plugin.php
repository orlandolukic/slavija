<?php

if ( !defined("ABSPATH") )
    exit();

class Elementor_Slavija_Our_Clients extends \Elementor\Widget_Base {

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
    }

    public function get_name() {
        return "our-clients-widget";
    }

    public function get_title() {
        return "Our Clients";
    }

    public function get_icon() {
        return "fas fa-people-arrows";
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
            'client_list_section',
            [
                'label' => __( 'Klijenti', 'slavija' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'client_name', [
                    'label' => __( 'Ime klijenta', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Electrolux d.o.o' , 'slavija' ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'client_name_size',
                [
                    'label' => __( 'Veličina fonta', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 50,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 16,
                    ],
                ]
            );

            $repeater->add_responsive_control(
                'client_name_padding',
                [
                    'label' => __( 'Razmak od slike', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'default' => [
                        "left" => 0,
                        "right" => 0,
                        "bottom" => 20,
                        "left" => 0,
                        "unit" => "px",
                        "isLinked" => false
                    ]
                ]
            );

            $repeater->add_control(
                'client_name_bold',
                [
                    'label' => __( 'Boldovan naslov?', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Da', 'slavija' ),
                    'label_off' => __( 'Ne', 'slavija' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $repeater->add_control(
                'client_name_color',
                [
                    'label' => __( 'Boja teksta', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    "selectors" => []
                ]
            );

            $repeater->add_control(
                'client_logo',
                [
                    'label' => __( 'Logo', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $repeater->add_control(
                'client_logo_width',
                [
                    'label' => __( 'Dužina slike logo-a', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 500,
                            'step' => 10,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 250,
                    ],
                ]
            );

            $repeater->add_control(
                'client_logo_height',
                [
                    'label' => __( 'Visina slike logo-a', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 10,
                            'max' => 500,
                            'step' => 10,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 200,
                    ],
                ]
            );

            $repeater->add_control(
                'client_text_padding_heading',
                [
                    'label' => __( 'Tekst', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $repeater->add_control(
                'client_description1',
                [
                    'label' => __( 'Opis klijenta', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'Unesite opis ovde...', 'slavija' ),
                    'placeholder' => __( 'Unesite opis klijenta', 'slavija' ),
                ]
            );

            $repeater->add_responsive_control(
                'client_name_1_padding',
                [
                    'label' => __( 'Unutrašnji razmak teksta', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'default' => [
                        "left" => 0,
                        "right" => 0,
                        "bottom" => 0,
                        "left" => 20,
                        "unit" => "px",
                        "isLinked" => false
                    ]
                ]
            );

            $repeater->add_control(
                'client_description2',
                [
                    'label' => __( 'Dodatni opis', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'Unesite opis ovde...', 'slavija' ),
                    'placeholder' => __( 'Unesite opis klijenta', 'slavija' ),
                ]
            );

            $repeater->add_responsive_control(
                'client_name_2_padding',
                [
                    'label' => __( 'Unutrašnji razmak drugog opisa', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'default' => [
                        "left" => 0,
                        "right" => 0,
                        "bottom" => 0,
                        "left" => 20,
                        "unit" => "px",
                        "isLinked" => false
                    ]
                ]
            );

            $repeater->add_control(
                'client_year_with_us_heading',
                [
                    'label' => __( 'Godine & iskustvo', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $repeater->add_control(
                'client_year_with_us',
                [
                    'label' => __( 'Godina koliko nam je klijent', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '5+', 'plugin-domain' ),
                    'placeholder' => __( 'Unesite broj godina koliko je ovaj komitent naš klijent ', 'slavija' ),
                ]
            );

            $repeater->add_responsive_control(
                'client_year_with_us_padding',
                [
                    'label' => __( 'Unutrašnji razmak iskustva', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'default' => [
                        "left" => 0,
                        "right" => 0,
                        "bottom" => 0,
                        "left" => 20,
                        "unit" => "px",
                        "isLinked" => false
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'client_year_with_us_number_padding',
                [
                    'label' => __( 'Unutrašnji razmak broja godina', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'default' => [
                        "left" => 0,
                        "right" => 0,
                        "bottom" => 0,
                        "left" => 20,
                        "unit" => "px",
                        "isLinked" => false
                    ]
                ]
            );

            $repeater->add_responsive_control(
                'client_year_with_us_number_margin',
                [
                    'label' => __( 'Margine broja godina', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px' ],
                    'default' => [
                        "left" => 0,
                        "right" => 0,
                        "bottom" => 0,
                        "left" => 20,
                        "unit" => "px",
                        "isLinked" => false
                    ]
                ]
            );

            $repeater->add_control(
                'client_year_with_us_precolor',
                [
                    'label' => __( 'Boja teksta "NAS KLIJENT"', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    "selectors" => []
                ]
            );

            $repeater->add_control(
                'client_year_with_us_background_color',
                [
                    'label' => __( 'Boja pozadine broja godina', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    "selectors" => []
                ]
            );

            $repeater->add_responsive_control(
                'client_year_with_us_border_radius',
                [
                    'label' => __( 'Zakrivljenost ivica', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'default' => [
                        "left" => 50,
                        "right" => 50,
                        "bottom" => 50,
                        "left" => 50,
                        "unit" => "%",
                        "isLinked" => true
                    ]
                ]
            );

            $repeater->add_control(
                'client_year_with_us_color',
                [
                    'label' => __( 'Boja teksta za broj godina', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    "selectors" => []
                ]
            );

            $repeater->add_control(
                'client_link_section',
                [
                    'label' => __( 'Link', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $repeater->add_control(
                'client_link',
                [
                    'label' => __( 'Link', 'slavija' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'slavija' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => false,
                        'nofollow' => true,
                    ],
                ]
            );


        $this->add_control(
            'client_list',
            [
                'label' => __( 'Svi klijenti', 'slavija' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ client_name }}}',
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'client_style_section',
            [
                'label' => __( 'Podešavanja stila', 'slavija' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'client_style_background_color',
            [
                'label' => __( 'Boja pozadine', 'slavija' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .client-placeholder' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'client_style_margin',
            [
                'label' => __( 'Margine', 'slavija' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .client-placeholder' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'client_style_padding',
            [
                'label' => __( 'Padding', 'slavija' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .client-placeholder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'client_shadow',
                'label' => __( 'Senka', 'slavija' ),
                'selector' => '{{ WRAPPER }} .client-list-placeholder .client-placeholder'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'client_shadow_hover',
                'label' => __( 'Senka [hover]', 'slavija' ),
                'selector' => '{{ WRAPPER }} .client-list-placeholder .client-placeholder:hover'
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="client-list-placeholder">
            <?php foreach (  $settings['client_list'] as $item ) {
                if ( $item['client_link']['url'] !== '' ) {
                    $target = $item['client_link']['is_external'] ? ' target="_blank"' : '';
                    $nofollow = $item['client_link']['nofollow'] ? ' rel="nofollow"' : '';
                    echo '<a href="' . $item['client_link']['url'] . '"' . $target . $nofollow . '>';
                }
            ?>
                <div class="client-placeholder" data-id="<?= $item['_id'] ?>">
                    <div class="client-logo">
                        <img class="logo-image" src="<?= $item['client_logo']['url'] ?>">
                        <div class="client-year-with-us">
                            <div class="color-faded uppercase pre-number-eticket" style="font-size: 80%;"><?= __( 'Naš klijent', 'slavija' ) ?></div>
                            <div class="number-eticket"><?= $item['client_year_with_us'] ?></div>
                        </div>
                    </div>
                    <div class="client-text">
                        <div class="client-name">
                            <?= $item['client_name'] ?>
                        </div>
                        <div class="client-description-1">
                            <?= $item['client_description1'] ?>
                        </div>
                        <div class="client-description-2">
                            <?= $item['client_description2'] ?>
                        </div>
                    </div>
                    <?php if ( $item['client_link']['url'] !== '' ) { ?>
                        <div class="link-popup-button">
                            <i class="fas fa-external-link-alt"></i>
                        </div>
                    <?php }; ?>
                    <style type="text/css">
                        .client-placeholder[data-id="<?= $item['_id'] ?>"] .client-logo .logo-image {
                            width: <?= $item['client_logo_width']['size'] ?>px;
                            height: <?= $item['client_logo_height']['size'] ?>px;
                            cursor: pointer;
                        }
                        .client-placeholder[data-id="<?= $item['_id'] ?>"] .client-text {
                            padding: <?= $item['client_name_padding']['top'] ?>px <?= $item['client_name_padding']['right'] ?>px <?= $item['client_name_padding']['bottom'] ?>px <?= $item['client_name_padding']['left'] ?>px;
                        }
                        .client-placeholder[data-id="<?= $item['_id'] ?>"] .client-name {
                            font-size: <?= $item['client_name_size']['size'] ?>px;
                            <?php if ( $item['client_name_bold'] === "yes" ) : ?>
                            font-weight: bold;
                            <?php endif; ?>
                            color: <?= $item['client_name_color'] ?>;
                        }
                        .client-placeholder[data-id="<?= $item['_id'] ?>"] .client-description-1 {
                            padding: <?= $item['client_name_1_padding']['top'] ?>px <?= $item['client_name_1_padding']['right'] ?>px <?= $item['client_name_1_padding']['bottom'] ?>px <?= $item['client_name_1_padding']['left'] ?>px;
                        }
                        .client-placeholder[data-id="<?= $item['_id'] ?>"] .client-description-2 {
                            padding: <?= $item['client_name_2_padding']['top'] ?>px <?= $item['client_name_2_padding']['right'] ?>px <?= $item['client_name_2_padding']['bottom'] ?>px <?= $item['client_name_2_padding']['left'] ?>px;
                        }
                        .client-placeholder[data-id="<?= $item['_id'] ?>"] .client-year-with-us {
                            padding: <?= $item['client_year_with_us_padding']['top'] ?>px <?= $item['client_year_with_us_padding']['right'] ?>px <?= $item['client_year_with_us_padding']['bottom'] ?>px <?= $item['client_year_with_us_padding']['left'] ?>px;
                        }
                        .client-placeholder[data-id="<?= $item['_id'] ?>"] .client-year-with-us .number-eticket {
                            padding: <?= $item['client_year_with_us_number_padding']['top'] ?>px <?= $item['client_year_with_us_number_padding']['right'] ?>px <?= $item['client_year_with_us_number_padding']['bottom'] ?>px <?= $item['client_year_with_us_number_padding']['left'] ?>px;
                            margin: <?= $item['client_year_with_us_number_margin']['top'] ?>px <?= $item['client_year_with_us_number_margin']['right'] ?>px <?= $item['client_year_with_us_number_margin']['bottom'] ?>px <?= $item['client_year_with_us_number_margin']['left'] ?>px;
                            background-color: <?= $item['client_year_with_us_background_color'] ?>;
                            border-radius: <?= $item['client_year_with_us_border_radius']['top'] ?>px <?= $item['client_year_with_us_border_radius']['right'] ?>px <?= $item['client_year_with_us_border_radius']['bottom'] ?>px <?= $item['client_year_with_us_border_radius']['left'] ?>px;
                            display: inline-block;
                            color: <?= $item['client_year_with_us_color'] ?>;
                        }
                        .client-placeholder[data-id="<?= $item['_id'] ?>"] .client-year-with-us .pre-number-eticket {
                            color: <?= $item['client_year_with_us_precolor'] ?>;
                        }
                    </style>
                </div>
            <?php
                if ( $item['client_link']['url'] !== '' ) {
                    echo '</a>';
                }
            }; ?>
        </div>
        <?php
    }

}