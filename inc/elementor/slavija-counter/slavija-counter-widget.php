<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

class Slavija_Counter_Widget {

    public static function initiate() {
        add_action( 'elementor/widgets/widgets_registered', array( 'Slavija_Counter_Widget', 'register_widget' ) );
        add_action( 'wp_enqueue_scripts', array( 'Slavija_Counter_Widget', 'enqueue_scripts' ) );
    }

    public static function register_widget() {
        require __DIR__ . "/elementor-slavija-counter-plugin.php";

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Slavija_Counter_Plugin() );
    }

    public static function enqueue_scripts() {
        wp_enqueue_style( 'slavija-counter', get_template_directory_uri() . "/inc/elementor/slavija-counter/style.css", [], "1.0.0" );
        wp_enqueue_script( 'slavija-counter', get_template_directory_uri() . "/inc/elementor/slavija-counter/factory.js", ['jquery', 'cubic-bezier-library'], "1.0.0" );
        wp_enqueue_script( 'cubic-bezier-library', get_template_directory_uri() . "/inc/elementor/slavija-counter/cubic-bezier-library.js", ['jquery'], "1.0.0" );
    }

}

// Initiate widget!
Slavija_Counter_Widget::initiate();