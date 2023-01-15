<?php

if ( !defined("ABSPATH") )
    exit();

class Elementor_Typing_Widget extends \Elementor\Widget_Base {

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
    }

    public function get_name() {
        return "typing-widget";
    }

    public function get_title() {
        return "Typing Widget";
    }

    public function get_icon() {
        return "fas fa-diagnoses";
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
            'text_section',
            [
                'label' => __( 'Tekst', 'slavija' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ct',
                'label' => __( 'Tipografija', 'plugin-domain' ),
                'selectors' => [
                    '{{WRAPPER}} .text' => "font-size: {{settings.ct_font_size.size}}{{settings.ct_font_size.unit}};" .
                        "font-weight:{{settings.ct_font_weight}};" .
                        "font-transform:{{settings.ct_font_transform}};" .
                        "font-style:{{settings.ct_font_style}};"
                ]
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Boja teksta', 'typing-widget' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text' => 'color: {{VALUE}};',
                ],
                "default" => "white"
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title', [
                'label' => __( 'Tekst', 'typing-widget' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'List Title' , 'typing-widget' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'list',
            [
                'label' => __( 'Ispis', 'typing-widget' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                "title_field" => "{{{ list_title }}}",
                "default" => [
                    [
                        "list_title" => "Probni tekst"
                    ]
                ]
            ]
        );


        $this->end_controls_section();

        // STYLE TAB

        $this->start_controls_section(
            'blinker_section',
            [
                'label' => __( 'Blinker', 'typing-widget' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'blinker_width',
            [
                'label' => __( 'Duzina', 'typing-widget' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 200,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    "{{WRAPPER}} .blinker" => "width: {{SIZE}}{{UNIT}};"
                ]
            ]
        );

        $this->add_control(
            'blinker_background_color',
            [
                "label" => __( 'Pozadina blinkera', 'typing-widget' ),
                "type" => \Elementor\Controls_Manager::COLOR,
                "default" => "black",
            ]
        );

        $this->add_responsive_control(
            'blinker_margin',
            [
                'label' => __( 'Margine blinkera', 'typing-widget' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .blinker' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    "top" => [
                        "size" => 15,
                        "unit" => "px"
                    ],
                    "bottom" => [
                        "size" => 15,
                        "unit" => "px"
                    ]
                ]
            ]
        );

        $this->add_responsive_control(
            'blinker_border_radius',
            [
                'label' => __( 'Zakrivljenost ivica blinkera', 'typing-widget' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .blinker' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'blinker_waiting_timeout',
            [
                'label' => __( 'Cekanje izmedju dve reci', 'typing-widget' ),
                "description" => __( "Broj milisekundi koliko se ceka dok se ne otpocne brisanje trenutne reci", "typing-widget" ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'ms' ],
                'range' => [
                    'ms' => [
                        'min' => 500,
                        'max' => 7000,
                        'step' => 100,
                    ]
                ],
                'default' => [
                    'unit' => 'ms',
                    'size' => 2000
                ]
            ]
        );

        $this->add_control(
            'blinker_timeout',
            [
                'label' => __( 'Duzina treptanja', 'typing-widget' ),
                "description" => __( "Broj milisekundi koliko se zadrzava kursor na ekranu", "typing-widget" ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'ms' ],
                'range' => [
                    'ms' => [
                        'min' => 100,
                        'max' => 2000,
                        'step' => 10,
                    ]
                ],
                'default' => [
                    'unit' => 'ms',
                    'size' => 1000
                ]
            ]
        );

        $this->add_control(
            'blinker_deleting_speed',
            [
                'label' => __( 'Brzina brisanja karaktera', 'typing-widget' ),
                "description" => __( "Broj milisekundi koliko se brzo brise jedan karakter", "typing-widget" ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'ms' ],
                'range' => [
                    'ms' => [
                        'min' => 10,
                        'max' => 500,
                        'step' => 10,
                    ]
                ],
                'default' => [
                    'unit' => 'ms',
                    'size' => 150
                ]
            ]
        );

        $this->add_control(
            'blinker_writing_speed',
            [
                'label' => __( 'Brzina pisanja karaktera', 'typing-widget' ),
                "description" => __( "Broj milisekundi koliko se brzo pise jedan karakter", "typing-widget" ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'ms' ],
                'range' => [
                    'ms' => [
                        'min' => 10,
                        'max' => 500,
                        'step' => 10,
                    ]
                ],
                'default' => [
                    'unit' => 'ms',
                    'size' => 300
                ]
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'blinker_box_shadow',
                'label' => __( 'Senka blinkera', 'typing-widget' ),
                'selector' => '{{WRAPPER}} .blinker',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $color = isset( $settings["title_color"] ) ? $settings["title_color"] : "inherit";
        $font_size = isset( $settings["ct_font_size"] ) ? $settings["ct_font_size"]["size"] . $settings["ct_font_size"]["unit"] : "30px";
        $blinker_bg_color = isset( $settings["blinker_background_color"] ) ? $settings["blinker_background_color"] : "white";

        ?>
        <style>
            .typing-container[data-id='<?=  $this->get_id() ?>'] .text {
                display: flex;
                color: <?= $color; ?>;
            <?php if ( isset( $settings["ct_font_weight"] ) && $settings["ct_font_weight"] ) : ?>
                font-weight: <?= $settings["ct_font_weight"] ?>;
            <?php endif; ?>
            <?php if ( isset( $settings["ct_font_style"] ) && $settings["ct_font_style"] ) : ?>
                font-style: <?= $settings["ct_font_style"] ?>;
            <?php endif; ?>
            }

            .typing-container[data-id='<?=  $this->get_id() ?>'] .blinker {
                display: flex;
                width: <?= $settings["blinker_width"]["size"] . $settings["blinker_width"]["unit"] ?>;
                margin-left: 10px;
                background-color: <?= $blinker_bg_color ?>;
                opacity: 1;
            }
        </style>

        <div class="typing-container" data-id="<?=  $this->get_id() ?>">
            <div class="text">
               <?= $settings["list"][0]["list_title"] ?>
            </div>
        </div>

        <script type="text/javascript">
            TypingWidgetFactory.registerTypingWidget("<?= $this->get_id() ?>", <?= json_encode($settings["list"]) ?>, <?= $settings["blinker_timeout"]["size"] ?>, <?= $settings["blinker_writing_speed"]["size"] ?>, <?= $settings["blinker_deleting_speed"]["size"] ?>, <?= $settings["blinker_waiting_timeout"]["size"] ?>);
        </script>


        <?php
    }

    protected function _content_template() {
        ?>
        <#
            let arr = [];
            for( let key in settings.list ) {
                arr.push( settings.list[key] );
            };
        #>
        <style>

            .typing-container[data-id='{{ view.model.id }}'] .blinker {
                display: flex;
                width: 15px;
                margin-left: 10px;
                background-color: {{{ settings.blinker_background_color }}};
                margin-top: 15px;
                margin-bottom: 15px;
                opacity: 1;
            }
        </style>
        <div class="typing-container" data-id="{{ view.model.id }}">
            <div class="text">
                {{{ settings.list[0].list_title }}}
            </div>
        </div>
        <script type="text/javascript">
            TypingWidgetFactory.unregisterTypingWidget("{{ view.model.id }}");
            TypingWidgetFactory.registerTypingWidget("{{ view.model.id }}", {{{ JSON.stringify(arr) }}}, {{ settings.blinker_timeout.size }}, {{ settings.blinker_writing_speed.size }}, {{ settings.blinker_deleting_speed.size }}, {{ settings.blinker_waiting_timeout.size }} )
        </script>
        <?php
    }

}