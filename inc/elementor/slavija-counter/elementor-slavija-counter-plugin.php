<?php

if ( !defined("ABSPATH") )
    exit();

class Elementor_Slavija_Counter_Plugin extends \Elementor\Widget_Base {

    public function get_name() {
        return "slavija-counter-widget";
    }

    public function get_title() {
        return "Slavija Counter";
    }

    public function get_icon() {
        return "fas fa-hourglass-half";
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
         * CONTENT TAB -> Broj
         * =========================================================================================
         */

        $this->start_controls_section(
            'number_section', [
                'label' => __( 'Broj', 'slavija-counter' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'number_from',
            [
                'label' => __( 'Broj od koga počinje da se broji', 'slavija-counter' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'step' => 1,
                'default' => 0,
            ]
        );

        $this->add_control(
            'number_to',
            [
                'label' => __( 'Broj do koga se broji', 'slavija-counter' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'step' => 1,
                'default' => 1000,
            ]
        );

        $this->add_control(
            'number_count_delay',
            [
                'label' => __( 'Čekanje pre početka', 'slavija-counter' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'step' => 10,
                'min' => 0,
                'default' => 300,
            ]
        );

        $this->add_control(
            'number_prefix',
            [
                'label' => __( 'Prefiks broja', 'slavija-counter' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => ''
            ]
        );

        $this->add_control(
            'number_suffix',
            [
                'label' => __( 'Sufiks broja', 'slavija-counter' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => ''
            ]
        );

        $this->add_control(
            'number_count_duration',
            [
                'label' => __( 'Brzina brojanja', 'slavija-counter' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'ms' ],
                'range' => [
                    'ms' => [
                        'min' => 500,
                        'max' => 6000,
                        'step' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'ms',
                    'size' => 2000,
                ]
            ]
        );

        $this->add_control(
            'number_count_offset',
            [
                'label' => __( 'Offset do početka brojanja [px]', 'slavija-counter' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'step' => 50,
                'min' => 0,
                'max' => 5000,
                'default' => 350,
            ]
        );

        $this->end_controls_section();

        /**
         * =========================================================================================
         * STYLE TAB -> Stil broja
         * =========================================================================================
         */

        $this->start_controls_section(
            'number_style', [
                'label' => __( 'Stil broja', 'slavija-counter' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'number_color',
            [
                'label' => __( 'Boja broja ', 'slavija-counter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .number' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => __( 'Typography', 'slavija-counter' ),
                'selector' => '{{WRAPPER}} .number',
            ]
        );

        $this->add_control(
            'number_alignment',
            [
                'label' => __( 'Poravnanje', 'slavija-counter' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __( 'Levo', 'slavija-counter' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Centar', 'slavija-counter' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => __( 'Desno', 'slavija-counter' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                "selectors" =>  [
                    "{{WRAPPER}} .number" => "display: flex; justify-content: {{VALUE}};"
                ]
            ]
        );


        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="number-placeholder" data-id="<?= $this->get_id() ?>">
            <div class="number">
                <div class="number-suffix"><?= $settings['number_prefix'] ?></div>
                <div class="number-content"><?= $settings['number_from'] ?></div>
                <div class="number-suffix"><?= $settings['number_suffix'] ?></div>
            </div>
        </div>
        <script type="text/javascript">
            CounterFactory.produce({
                id: "<?= $this->get_id() ?>",
                countDuration: <?= $settings['number_count_duration']['size'] ?>,
                countFrom: <?= $settings['number_from'] ?>,
                countTo: <?= $settings['number_to'] ?>,
                countDelay: <?= $settings['number_count_delay'] ?>,
                countOffset: <?= $settings['number_count_offset'] ?>,
                fromElementor: false
            });
        </script>
        <?php
    }

    protected function _content_template()
    {
        ?>
        <div class="number-placeholder" data-id="{{ view.model.id }}">
            <div class="number">
                <div class="number-suffix">{{{ settings.number_prefix }}}</div>
                <div class="number-content">{{{ settings.number_from }}}</div>
                <div class="number-suffix">{{{ settings.number_suffix }}}</div>
            </div>
        </div>
        <script type="text/javascript">
            CounterFactory.reregister({
                id: "{{ view.model.id }}",
                countDuration: {{{ settings.number_count_duration.size }}},
                countFrom: {{{ settings.number_from }}},
                countTo: {{{ settings.number_to }}},
                countDelay: {{{ settings.number_count_delay }}},
                countOffset: {{{ settings.number_count_offset }}},
                fromElementor: true
            });
        </script>
        <?php
    }

}
