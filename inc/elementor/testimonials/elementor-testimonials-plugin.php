<?php

if ( !defined("ABSPATH") )
    exit();

class Elementor_Testimonials_Plugin extends \Elementor\Widget_Base {

    public function get_name() {
        return "testimonials-widget";
    }

    public function get_title() {
        return "Testimonials";
    }

    public function get_icon() {
        return "fas fa-quote-right";
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
            'testimonials_section',
            [
                'label' => __( 'Iskustva', 'testimonials-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

                $repeater = new \Elementor\Repeater();

                $repeater->add_control(
                    'single_testimonial_writer_title',
                    [
                        'label' => __( 'O piscu', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'after',
                    ]
                );

                $repeater->add_control(
                    'single_testimonial_writer', [
                        'label' => __( 'Pisac iskustva', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __( 'Petar Petrović' , 'testimonials-plugin' ),
                        'label_block' => true,
                    ]
                );

                $repeater->add_control(
                    'single_testimonial_writer_subtitle', [
                        'label' => __( 'Detaljnije o piscu', 'testimonials-plugin' ),
                        'description' => __( 'Na primer, u kojoj firmi je zaposlen ili direktor', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __( 'Petar Petrović' , 'testimonials-plugin' ),
                        'label_block' => true,
                    ]
                );

                $repeater->add_control(
                    'single_testimonial_writer_image',
                    [
                        'label' => __( 'Odaberite sliku', 'plugin-domain' ),
                        'description' => __( 'Slika logo-a ili slika firme' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                        'default' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_writer_image_width',
                    [
                        'label' => __( 'Dužina slike', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 10,
                                'max' => 300,
                                'step' => 10,
                            ]
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 50,
                        ],
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_writer_image_height',
                    [
                        'label' => __( 'Visina slike', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 10,
                                'max' => 300,
                                'step' => 10,
                            ]
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 50,
                        ],
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_writer_image_border_radius',
                    [
                        'label' => __( 'Zakrivljenost ivica', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 300,
                                'step' => 1,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                                'step' => 1
                            ]
                        ],
                        'default' => [
                            'unit' => '%',
                            'size' => 100,
                        ],
                    ]
                );

                $repeater->add_group_control(
                    \Elementor\Group_Control_Box_Shadow::get_type(),
                    [
                        'name' => 'testimonials_style_box_shadow',
                        'label' => __( 'Senka nad slikom', 'testimonials-plugin' ),
                        'selector' => '{{WRAPPER}} .testimonials-placeholder .image',
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_writer_section_margin',
                    [
                        'label' => __( 'Margine',  'testimonials-plugin'  ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ]
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_writer_section_padding',
                    [
                        'label' => __( 'Unutrašnje ivice',  'testimonials-plugin'  ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ]
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_writer_name_margin',
                    [
                        'label' => __( 'Margine za ime pisca',  'testimonials-plugin'  ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ]
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_writer_name_padding',
                    [
                        'label' => __( 'Unutrašnje ivice za ime pisca',  'testimonials-plugin'  ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ]
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_writer_subtitle_margin',
                    [
                        'label' => __( 'Margine za podnaslov',  'testimonials-plugin'  ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ]
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_writer_subtitle_padding',
                    [
                        'label' => __( 'Unutrašnje ivice za podnaslov',  'testimonials-plugin'  ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ]
                    ]
                );

                $repeater->add_control(
                    'single_testimonial_writer_grade_title',
                    [
                        'label' => __( 'Ocena', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

                $repeater->add_control(
                    'single_testimonial_writer_grade_showing',
                    [
                        'label' => __( 'Prikazujemo ocenu?', 'testimonials-plugin'  ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => __( 'Da', 'testimonials-plugin'  ),
                        'label_off' => __( 'Ne', 'testimonials-plugin'  ),
                        'return_value' => 'yes',
                        'default' => 'yes',
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_writer_grade',
                    [
                        'label' => __( 'Unesite željenu ocenu', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 1,
                                'max' => 5,
                                'step' => 1,
                            ]
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 3,
                        ],
                    ]
                );

                $repeater->add_control(
                    'single_testimonial_writer_grade_color',
                    [
                        'label' => __( 'Boja ocene', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'default' => 'black'
                    ]
                );

                $repeater->add_control(
                    'single_testimonial_writer_grade_alignment',
                    [
                        'label' => __( 'Poravnanje', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::CHOOSE,
                        'options' => [
                            'left' => [
                                'title' => __( 'Levo', 'testimonials-plugin' ),
                                'icon' => 'fa fa-align-left',
                            ],
                            'center' => [
                                'title' => __( 'Centar', 'testimonials-plugin' ),
                                'icon' => 'fa fa-align-center',
                            ],
                            'right' => [
                                'title' => __( 'Desno', 'testimonials-plugin' ),
                                'icon' => 'fa fa-align-right',
                            ],
                        ],
                        'default' => 'left',
                        'toggle' => true,
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_writer_grade_fontsize',
                    [
                        'label' => __( 'Veličina zvezdica', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 12,
                                'max' => 40,
                                'step' => 1,
                            ]
                        ],
                        'default' => [
                            'unit' => 'px',
                            'size' => 14,
                        ],
                    ]
                );

                $repeater->add_control(
                    'single_testimonial_text_title',
                    [
                        'label' => __( 'Utisak', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_text_margin',
                    [
                        'label' => __( 'Margine',  'testimonials-plugin'  ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ]
                    ]
                );

                $repeater->add_responsive_control(
                    'single_testimonial_text_padding',
                    [
                        'label' => __( 'Unutrašnji razmak',  'testimonials-plugin'  ),
                        'type' => \Elementor\Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ]
                    ]
                );

                $repeater->add_control(
                    'single_testimonial_text', [
                        'label' => __( 'Unsite tekst utiska', 'testimonials-plugin' ),
                        'type' => \Elementor\Controls_Manager::WYSIWYG,
                        'default' => __( 'Lorem ipsum sed et numquam dolorem videt.' , 'testimonials-plugin' ),
                        'label_block' => true,
                    ]
                );

        $this->add_control(
            'all_testimonials',
            [
                'label' => __( 'Sva iskustva', 'testimonials-plugin' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ single_testimonial_writer }}}',
            ]
        );

        $this->end_controls_section();

        /**
         * ===============================
         * STYLE TAB
         * ===============================
         */

        /**
         * =========================================================================================
         * STYLE TAB -> Vreme
         * =========================================================================================
         */

        $this->start_controls_section(
            'testimonials_style_timing',
            [
                'label' => __( 'Vreme', 'testimonials-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'testimonials_style_timing_each',
            [
                'label' => __( 'Vreme zadržavanja jedne ispovesti', 'testimonials-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 's' ],
                'range' => [
                    's' => [
                        'min' => 1,
                        'max' => 10,
                        'step' => 1,
                    ]
                ],
                'default' => [
                    'unit' => 's',
                    'size' => 3,
                ]
            ]
        );

        $this->add_responsive_control(
            'testimonials_style_timing_sliding',
            [
                'label' => __( 'Vreme premotavanja', 'testimonials-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'ms' ],
                'range' => [
                    'ms' => [
                        'min' => 100,
                        'max' => 2000,
                        'step' => 100,
                    ]
                ],
                'default' => [
                    'unit' => 'ms',
                    'size' => 300,
                ]
            ]
        );

        $this->add_responsive_control(
            'testimonials_style_timing_retracement',
            [
                'label' => __( 'Vreme vraćanja', 'testimonials-plugin' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'ms' ],
                'range' => [
                    'ms' => [
                        'min' => 100,
                        'max' => 2000,
                        'step' => 100,
                    ]
                ],
                'default' => [
                    'unit' => 'ms',
                    'size' => 200,
                ]
            ]
        );

        $this->end_controls_section();

        /**
         * =========================================================================================
         * STYLE TAB -> Opsta podesavanja stila
         * =========================================================================================
         */

        $this->start_controls_section(
            'testimonials_style',
            [
                'label' => __( 'Opšta podešavanja stila', 'testimonials-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'testimonials_style_background',
                'label' => __( 'Pozadina dodatka', 'testimonials-plugin' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .testimonials-placeholder',
            ]
        );

        $this->add_responsive_control(
            'testimonials_style_margin',
            [
                'label' => __( 'Margine',  'testimonials-plugin'  ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonials-placeholder' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonials_style_padding',
            [
                'label' => __( 'Unutrašnji razmak',  'testimonials-plugin'  ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .testimonials-placeholder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonials_style_border_radius',
            [
                'label' => __( 'Zakrivljenost ivica', 'testimonials-plugin' ),
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
                    'size' => 3,
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonials-placeholder' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'testimonials_style_box_shadow',
                'label' => __( 'Senka (box shadow)', 'testimonials-plugin' ),
                'selector' => '{{WRAPPER}} .testimonials-placeholder',
            ]
        );

        $this->end_controls_section();

        /**
         * =========================================================================================
         * STYLE TAB -> Tekst
         * =========================================================================================
         */

        $this->start_controls_section(
        'testimonials_text_style', [
                'label' => __( 'Tekst', 'testimonials-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'testimonials_text_style_typography',
                'label' => __( 'Tipografija', 'testimonials-plugin' ),
                'selector' => '{{WRAPPER}} .single-testimonial .main'
            ]
        );

        $this->end_controls_section();

        /**
         * =========================================================================================
         * STYLE TAB -> Pisac
         * =========================================================================================
         */

        $this->start_controls_section(
            'testimonials_writer_style', [
                'label' => __( 'Pisac', 'testimonials-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'testimonials_writer_style_typography',
                'label' => __( 'Tipografija naslova', 'testimonials-plugin' ),
                'selector' => '{{WRAPPER}} .single-testimonial .writer-placeholder .text .title'
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'testimonials_writer_style_subtitle_typography',
                'label' => __( 'Tipografija podnaslova', 'testimonials-plugin' ),
                'selector' => '{{WRAPPER}} .single-testimonial .writer-placeholder .text .subtitle'
            ]
        );

        $this->add_control(
            'single_testimonial_writer_name_color',
            [
                'label' => __( 'Boja naslova', 'testimonials-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => ''
            ]
        );

        $this->add_control(
            'single_testimonial_writer_subtitle_color',
            [
                'label' => __( 'Boja podnaslova', 'testimonials-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => ''
            ]
        );

        $this->end_controls_section();
    }

    private function printDimensions( $type, $dimensionObj ) {

        $str = $type . ": ";

        if ( $dimensionObj['top'] != '' )
            $str .= $dimensionObj['top'] . $dimensionObj['unit'];
        else
            $str .= "auto";

        $str .= " ";

        if ( $dimensionObj['right'] != '' )
            $str .= $dimensionObj['right'] . $dimensionObj['unit'];
        else
            $str .= "auto";

        $str .= " ";

        if ( $dimensionObj['bottom'] != '' )
            $str .= $dimensionObj['bottom'] . $dimensionObj['unit'];
        else
            $str .= "auto";

        $str .= " ";

        if ( $dimensionObj['left'] != '' )
            $str .= $dimensionObj['left'] . $dimensionObj['unit'];
        else
            $str .= "auto";

        return $str;
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <style>
            <?php foreach (  $settings['all_testimonials'] as $item ) : ?>
            .testimonials-placeholder .single-testimonial[data-id="<?= $item["_id"] ?>"] img.image {
                width: <?= $item['single_testimonial_writer_image_width']['size'] . $item['single_testimonial_writer_image_width']['unit'] ?>;
                height: <?= $item['single_testimonial_writer_image_height']['size'] . $item['single_testimonial_writer_image_height']['unit'] ?>;
                border-radius: <?= $item['single_testimonial_writer_image_border_radius']['size'] . $item['single_testimonial_writer_image_border_radius']['unit'] ?>;
            }

            .testimonials-placeholder .single-testimonial[data-id="<?= $item["_id"] ?>"] .writer-placeholder {
                <?= $this->printDimensions( "margin", $item['single_testimonial_writer_section_margin'] ) ?>;
                <?= $this->printDimensions( "padding", $item['single_testimonial_writer_section_padding'] ) ?>;
            }

            .testimonials-placeholder .single-testimonial[data-id="<?= $item["_id"] ?>"] .writer-placeholder .text .title {
                <?= $this->printDimensions( "margin", $item['single_testimonial_writer_name_margin'] ) ?>;
                <?= $this->printDimensions( "padding", $item['single_testimonial_writer_name_padding'] ) ?>;
                color: <?= $settings['single_testimonial_writer_name_color'] ?>;
            }

            .testimonials-placeholder .single-testimonial[data-id="<?= $item["_id"] ?>"] .writer-placeholder .text .subtitle {
                <?= $this->printDimensions( "margin", $item['single_testimonial_writer_subtitle_margin'] ) ?>;
                <?= $this->printDimensions( "padding", $item['single_testimonial_writer_subtitle_padding'] ) ?>;
                color: <?= $settings['single_testimonial_writer_subtitle_color'] ?>;
            }


            .testimonials-placeholder .single-testimonial[data-id="<?= $item["_id"] ?>"] .main {
                <?= $this->printDimensions( "margin", $item['single_testimonial_text_margin'] ) ?>;
                <?= $this->printDimensions( "padding", $item['single_testimonial_text_padding'] ) ?>;
            }

            <?php if ( $item['single_testimonial_writer_grade_showing'] == 'yes' ) : ?>
            .testimonials-placeholder .single-testimonial[data-id="<?= $item["_id"] ?>"] .grades {
                text-align: <?= $item['single_testimonial_writer_grade_alignment'] ?>;
                color: <?= $item['single_testimonial_writer_grade_color'] ?>;
                font-size: <?= $item['single_testimonial_writer_grade_fontsize']['size'] . $item['single_testimonial_writer_grade_fontsize']['unit'] ?>;
            }
            <?php endif; ?>
            <?php endforeach; ?>
        </style>
        <div class="testimonials-wrapper" data-id="<?= $this->get_id() ?>" data-testimonials-count="<?= count($settings['all_testimonials']) ?>">
            <div class="testimonials-wrapper-main">
                <div class="testimonials-loader">
                    <i class="fa fa-spin fa-circle-o-notch fa-6x"></i>
                </div>
                <div class="testimonials-placeholder">
                    <ul class="testimonial-list">
                        <?php foreach (  $settings['all_testimonials'] as $item ) : ?>
                            <li class="single-testimonial" data-id="<?= $item["_id"] ?>">
                                <?php if ( $item['single_testimonial_writer_grade_showing'] == 'yes' ) : ?>
                                    <div class="grades">
                                        <?php $MAX = $item["single_testimonial_writer_grade"]['size'] ? $item["single_testimonial_writer_grade"]['size'] : 3; ?>
                                        <?php for( $i = 0; $i < $MAX; $i++) : ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="main">
                                    <?= $item["single_testimonial_text"] ?>
                                </div>
                                <div class="writer-placeholder">
                                    <?php if ( $item["single_testimonial_writer_image"]['url'] ) : ?>
                                        <img class="image" src="<?= $item['single_testimonial_writer_image']['url'] ?>" />
                                    <?php endif; ?>
                                    <div class="text">
                                        <div class="title">
                                            <?= $item['single_testimonial_writer'] ?>
                                        </div>
                                        <div class="subtitle">
                                            <?= $item['single_testimonial_writer_subtitle'] ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="testimonials-bottom-navigation">
                <div class="testimonials-bottom-navigation-placeholder">
                    <?php for( $i = 0; $i < count($settings['all_testimonials']); $i++ ) : ?>
                        <div class="testimonials-change-button <?= ($i==0 ? 'selected' : '') ?>">
                            <div class="inner"></div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            TestimonialsFactory.init({
                id: "<?= $this->get_id() ?>",
                intervalTicks: <?= $settings['testimonials_style_timing_each']['size'] ?>,
                slidingInterval: <?= $settings['testimonials_style_timing_sliding']['size'] ?>,
                slidingRetracement: <?= $settings['testimonials_style_timing_retracement']['size'] ?>
            });
        </script>
        <?php
    }

    protected function _content_template() {
        ?>
        <style>
            <# _.each( settings.all_testimonials, function( item ) { #>
            .testimonials-placeholder .single-testimonial[data-id="{{ item._id }}"] img.image {
                width: {{{ item.single_testimonial_writer_image_width.size }}}{{{ item.single_testimonial_writer_image_width.unit}}};
                height: {{{ item.single_testimonial_writer_image_height.size }}}{{{ item.single_testimonial_writer_image_height.unit}}};
                border-radius: {{{ item.single_testimonial_writer_image_border_radius.size }}}{{{ item.single_testimonial_writer_image_border_radius.unit }}};
            }
            .testimonials-placeholder .single-testimonial[data-id="{{ item._id }}"] .writer-placeholder {
                margin-top: {{{ item.single_testimonial_writer_section_margin.top + item.single_testimonial_writer_section_margin.unit }}};
                margin-right: {{{ item.single_testimonial_writer_section_margin.right + item.single_testimonial_writer_section_margin.unit }}};
                margin-bottom: {{{ item.single_testimonial_writer_section_margin.bottom + item.single_testimonial_writer_section_margin.unit }}};
                margin-left: {{{ item.single_testimonial_writer_section_margin.left + item.single_testimonial_writer_section_margin.unit }}};

                padding-top: {{{ item.single_testimonial_writer_section_padding.top + item.single_testimonial_writer_section_padding.unit }}};
                padding-right: {{{ item.single_testimonial_writer_section_padding.right + item.single_testimonial_writer_section_padding.unit }}};
                padding-bottom: {{{ item.single_testimonial_writer_section_padding.bottom + item.single_testimonial_writer_section_padding.unit }}};
                padding-left: {{{ item.single_testimonial_writer_section_padding.left + item.single_testimonial_writer_section_padding.unit }}};
            }

            .testimonials-placeholder .single-testimonial[data-id="{{ item._id }}"] .writer-placeholder .text .title {
                margin-top: {{{ item.single_testimonial_writer_name_margin.top + item.single_testimonial_writer_name_margin.unit }}};
                margin-right: {{{ item.single_testimonial_writer_name_margin.right + item.single_testimonial_writer_name_margin.unit }}};
                margin-bottom: {{{ item.single_testimonial_writer_name_margin.bottom + item.single_testimonial_writer_name_margin.unit }}};
                margin-left: {{{ item.single_testimonial_writer_name_margin.left + item.single_testimonial_writer_name_margin.unit }}};

                padding-top: {{{ item.single_testimonial_writer_name_padding.top + item.single_testimonial_writer_name_padding.unit }}};
                padding-right: {{{ item.single_testimonial_writer_name_padding.right + item.single_testimonial_writer_name_padding.unit }}};
                padding-bottom: {{{ item.single_testimonial_writer_name_padding.bottom + item.single_testimonial_writer_name_padding.unit }}};
                padding-left: {{{ item.single_testimonial_writer_name_padding.left + item.single_testimonial_writer_name_padding.unit }}};

                color: {{{ settings.single_testimonial_writer_name_color }}};
            }

            .testimonials-placeholder .single-testimonial[data-id="{{ item._id }}"] .writer-placeholder .text .subtitle {
                margin-top: {{{ item.single_testimonial_writer_subtitle_margin.top + item.single_testimonial_writer_subtitle_margin.unit }}};
                margin-right: {{{ item.single_testimonial_writer_subtitle_margin.right + item.single_testimonial_writer_subtitle_margin.unit }}};
                margin-bottom: {{{ item.single_testimonial_writer_subtitle_margin.bottom + item.single_testimonial_writer_subtitle_margin.unit }}};
                margin-left: {{{ item.single_testimonial_writer_subtitle_margin.left + item.single_testimonial_writer_subtitle_margin.unit }}};

                padding-top: {{{ item.single_testimonial_writer_subtitle_padding.top + item.single_testimonial_writer_subtitle_padding.unit }}};
                padding-right: {{{ item.single_testimonial_writer_subtitle_padding.right + item.single_testimonial_writer_subtitle_padding.unit }}};
                padding-bottom: {{{ item.single_testimonial_writer_subtitle_padding.bottom + item.single_testimonial_writer_subtitle_padding.unit }}};
                padding-left: {{{ item.single_testimonial_writer_subtitle_padding.left + item.single_testimonial_writer_subtitle_padding.unit }}};

                color: {{{ settings.single_testimonial_writer_subtitle_color }}};
            }

            .testimonials-placeholder .single-testimonial[data-id="{{ item._id }}"] .main {
                margin-top: {{{ item.single_testimonial_text_margin.top + item.single_testimonial_text_margin.unit }}};
                margin-right: {{{ item.single_testimonial_text_margin.right + item.single_testimonial_text_margin.unit }}};
                margin-bottom: {{{ item.single_testimonial_text_margin.bottom + item.single_testimonial_text_margin.unit }}};
                margin-left: {{{ item.single_testimonial_text_margin.left + item.single_testimonial_text_margin.unit }}};

                padding-top: {{{ item.single_testimonial_text_padding.top + item.single_testimonial_text_padding.unit }}};
                padding-right: {{{ item.single_testimonial_text_padding.right + item.single_testimonial_text_padding.unit }}};
                padding-bottom: {{{ item.single_testimonial_text_padding.bottom + item.single_testimonial_text_padding.unit }}};
                padding-left: {{{ item.single_testimonial_text_padding.left + item.single_testimonial_text_padding.unit }}};
            }

            <# if ( item.single_testimonial_writer_grade_showing == 'yes' ) { #>
            .testimonials-placeholder .single-testimonial[data-id="{{ item._id }}"] .grades {
                text-align: {{{ item.single_testimonial_writer_grade_alignment }}};
                color: {{{ item.single_testimonial_writer_grade_color }}};
                font-size: {{{ item.single_testimonial_writer_grade_fontsize.size + item.single_testimonial_writer_grade_fontsize.unit }}};
            }
            <# } #>
            <# }) #>
        </style>
        <div class="testimonials-loader">
            <i class="far fa-circle-o-notch fa-3x"></i>
        </div>
        <div class="testimonials-wrapper" data-id="{{ view.model._id }}" data-testimonials-count="{{ settings.all_testimonials.length }}">
            <div class="testimonials-wrapper-main">
                <div class="testimonials-loader">
                    <i class="fa fa-spin fa-circle-o-notch fa-6x"></i>
                </div>
                <div class="testimonials-placeholder" data-id="{{ view.model._id }}" data-testimonials-count="{{ settings.all_testimonials.length }}">
                    <ul class="testimonial-list">
                        <# _.each( settings.all_testimonials, function( item ) { #>
                        <li class="single-testimonial" data-id="{{ item._id }}">
                            <# if ( item.single_testimonial_writer_grade_showing == 'yes' ) { #>
                            <div class="grades">
                                <# for( let i = 0; i < item.single_testimonial_writer_grade.size; i++ ) { #>
                                    <i class="fas fa-star"></i>
                                <# } #>
                            </div>
                            <# } #>
                            <div class="main">
                                {{{ item.single_testimonial_text }}}
                            </div>
                            <div class="writer-placeholder">
                                <# if ( item.single_testimonial_writer_image.url ) { #>
                                <img class="image" src="{{item.single_testimonial_writer_image.url}}" />
                                <# } #>
                                <div class="text">
                                    <div class="title">
                                        {{{ item.single_testimonial_writer }}}
                                    </div>
                                    <div class="subtitle">
                                        {{{ item.single_testimonial_writer_subtitle }}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        <# }); #>
                    </ul>
                </div>
            </div>
            <div class="testimonials-bottom-navigation">
                <div class="testimonials-bottom-navigation-placeholder">
                    <# for( i = 0; i < settings.all_testimonials.length; i++ ) { #>
                        <div class="testimonials-change-button {{ i === 0 ? 'selected' : '' }}">
                            <div class="inner"></div>
                        </div>
                    <# } #>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            TestimonialsFactory.destroy();
            TestimonialsFactory.init({
                id: "{{ view.model._id }}",
                intervalTicks: {{{ settings.testimonials_style_timing_each.size }}},
                slidingInterval: {{{ settings.testimonials_style_timing_sliding.size }}},
                slidingRetracement: {{{ settings.testimonials_style_timing_retracement.size }}}
            })
        </script>
        <?php
    }

}