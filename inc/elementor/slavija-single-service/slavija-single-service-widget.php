<?php

// Silence is golden!
if ( !defined("ABSPATH") )
    exit();

class Slavija_Single_Service_Widget {

    public static function initiate() {
        add_action( 'elementor/widgets/widgets_registered', array( 'Slavija_Single_Service_Widget', 'register_widget' ) );
        add_action( 'wp_enqueue_scripts', array( 'Slavija_Single_Service_Widget', 'enqueue_scripts' ) );
    }

    public static function register_widget() {
        require __DIR__ . "/elementor-slavija-single-service-plugin.php";

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Slavija_Single_Service_Plugin() );
    }

    public static function enqueue_scripts() {
        wp_enqueue_style( 'slavija-single-service', get_template_directory_uri() . "/inc/elementor/slavija-single-service/style.css", [], "1.0.0" );
    }

}

// Initiate widget!
Slavija_Single_Service_Widget::initiate();