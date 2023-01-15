<?php

if ( !defined("ABSPATH") )
    exit();

class Slavija_Our_Clients {

    public static function initiate() {
        add_action( 'elementor/widgets/widgets_registered', array( 'Slavija_Our_Clients', 'register_widget' ) );
        add_action( 'wp_enqueue_scripts', array( 'Slavija_Our_Clients', 'enqueue_scripts' ) );
    }

    public static function register_widget() {
        require __DIR__ . "/elementor-slavija-our-clients-plugin.php";

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Slavija_Our_Clients() );
    }

    public static function enqueue_scripts() {
        wp_enqueue_style( "slavija-our-clients", get_template_directory_uri() . "/inc/elementor/slavija-our-clients/style.css", [], "1.0.0" );
        //wp_enqueue_script( "typing-widget-factory", get_template_directory_uri() . "/inc/elementor/typing-widget/factory.js", [ 'jquery' ] , "1.0.0", false );
    }

}

// Initiate widget!
Slavija_Our_Clients::initiate();