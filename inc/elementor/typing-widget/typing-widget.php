<?php

if ( !defined("ABSPATH") )
    exit();

class Typing_Widget {

    public static function initiate() {
        add_action( 'elementor/widgets/widgets_registered', array( 'Typing_Widget', 'register_widget' ) );
        add_action( 'wp_enqueue_scripts', array( 'Typing_Widget', 'enqueue_scripts' ) );
    }

    public static function register_widget() {
        require get_template_directory() . "/inc/elementor/typing-widget/elementor-typing-plugin.php";

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Typing_Widget() );
    }

    public static function enqueue_scripts() {
        wp_enqueue_style( "typing-widget-style", get_template_directory_uri() . "/inc/elementor/typing-widget/style.css", [], "1.0.0" );
        wp_enqueue_script( "typing-widget-factory", get_template_directory_uri() . "/inc/elementor/typing-widget/factory.js", [ 'jquery' ] , "1.0.0", false );
    }

}

// Initiate widget!
Typing_Widget::initiate();