<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

class Trait_Widget {

    public static function initiate() {
        add_action( 'elementor/widgets/widgets_registered', array( 'Trait_Widget', 'register_widget' ) );
        add_action( 'wp_enqueue_scripts', array( 'Trait_Widget', 'enqueue_scripts' ) );
    }

    public static function register_widget() {
        require __DIR__ . "/elementor-trait-plugin.php";

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Trait_Plugin() );
    }

    public static function enqueue_scripts() {
        wp_enqueue_style( 'trait-widget-style', get_template_directory_uri() . "/inc/elementor/trait-widget/style.css", [], "1.0.0" );
    }

}

// Initiate widget!
Trait_Widget::initiate();